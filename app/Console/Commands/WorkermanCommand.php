<?php

namespace App\Console\Commands;

use Workerman\Worker;
use Illuminate\Console\Command;

class WorkermanCommand extends Command
{
    private $server;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wk {action}';

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
        // 创建一个Worker监听9001端口，不使用任何应用层协议
        $this->server = new Worker("tcp://101.132.158.239:9001");
        // 启动4个进程对外提供服务
        $this->server->count = 4;
        $handler = \App::make('App\Handlers\WorkermanHandler');
        // 连接时回调
        $this->server->onConnect = [$handler, 'onConnect'];
        // 收到客户端信息时回调
        $this->server->onMessage = [$handler, 'onMessage'];
        // 进程启动后的回调
        $this->server->onWorkerStart = [$handler, 'onWorkerStart'];
        // 断开时触发的回调
        $this->server->onClose = [$handler, 'onClose'];
        // 运行worker
        Worker::runAll();
    }
}
