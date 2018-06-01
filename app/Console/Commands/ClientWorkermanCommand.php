<?php

namespace App\Console\Commands;

use Workerman\Worker;
use Illuminate\Console\Command;
define	('HEAD_LEN' ,						11);						//包头长度
define	('MSG_REQ_ROOM_LIST' ,	0x15);					//http服务器通知交易完成
class ClientWorkermanCommand extends Command
{
    private $server;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clientwk {action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start a Workerman server.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        global $argv;
        $arg = $this->argument('action');
        $argv[1] = $argv[2];
        $argv[2] = isset($argv[3]) ? "-{$argv[3]}" : '';
        switch ($arg) {
            case 'start':
                $this->start();
                break;
            case 'stop':
                break;
            case 'restart':
                break;
            case 'reload':
                break;
            case 'status':
                break;
            case 'connections':
                break;
        }
    }

    private function start()
    {
        $task = new Worker();
        // 进程启动时异步建立一个到www.baidu.com连接对象，并发送数据获取数据
        $task->onWorkerStart = function($task)
        {
            $connection_to_baidu = new AsyncTcpConnection('tcp://192.168.2.27:9001');
            // 当连接建立成功时，发送http请求数据
            $connection_to_baidu->onConnect = function($connection_to_baidu)
            {
                echo "connect success\n";
                $Req = pack("Ca*C1C",'');
			    $len = strlen($Req) ;
                /*
                    WORD		len;			//数据长度
                    BYTE		version;		//版本号
                    WORD		msg_type_id;	//消息类型
                    TFlag		flag ;			//short类型
                    DWORD		packet_seq;		//包序号
                    
                */
                $packet_head = pack("SCSSIa*",$len ,1 , MSG_REQ_ROOM_LIST ,0 ,0, $Req );
                
                $packet_body="";
                //$rc = socket_send($this->sock, $packet_head, HEAD_LEN + $len, MSG_DONTROUTE );
                $connection_to_baidu->send($packet_head);
            };
            $connection_to_baidu->onMessage = function($connection_to_baidu, $http_buffer)
            {
                echo $http_buffer;
            };
            $connection_to_baidu->onClose = function($connection_to_baidu)
            {
                echo "connection closed\n";
            };
            $connection_to_baidu->onError = function($connection_to_baidu, $code, $msg)
            {
                echo "Error code:$code msg:$msg\n";
            };
            $connection_to_baidu->connect();
        };

        // 运行worker
        Worker::runAll();
    }
}
