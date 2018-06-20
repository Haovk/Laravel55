<?php
use Workerman\Worker;
use Workerman\Connection\AsyncTcpConnection;

define	('HEAD_LEN' ,           11);						//包头长度
define	('MSG_REQ_ROOM_LIST' ,	0x15);	
define	('MSG_REQ_HTTP_ADD_USER_GOLD',0x8020);

// $task = new Worker();
// // 进程启动时异步建立一个到www.baidu.com连接对象，并发送数据获取数据
// $task->onWorkerStart = function($task)
// {
//     $connection_to_baidu = new AsyncTcpConnection('tcp://192.168.2.27:9001');
//     // 当连接建立成功时，发送http请求数据
//     $connection_to_baidu->onConnect = function($connection_to_baidu)
//     {
//         echo "connect success\n";
//         $Req = pack("Ca*C1C",'','',0,'');
//         $len = strlen($Req) ;
//         $packet_head = pack("SCSSIa*",$len ,1 , MSG_REQ_ROOM_LIST ,0 ,0, $Req );      
    
//         $connection_to_baidu->send($packet_head);
        
//     };
//     $connection_to_baidu->onMessage = function($connection_to_baidu, $http_buffer)
//     {
//         echo $http_buffer;
//     };
//     $connection_to_baidu->onClose = function($connection_to_baidu)
//     {
//         echo "connection closed\n";
//     };
//     $connection_to_baidu->onError = function($connection_to_baidu, $code, $msg)
//     {
//         echo "Error code:$code msg:$msg\n";
//     };
//     $connection_to_baidu->connect();
// };

// // 运行worker
// Worker::runAll();
    
// //require_once __DIR__ . '/Workerman/Autoloader.php';
$socket = stream_socket_client('tcp://192.168.2.27:9001', $errno, $errmsg);
echo "1";
$Req = pack("III",3,1,1000);
$len = strlen($Req) ;
                /*
                    WORD		len;			//数据长度
                    BYTE		version;		//版本号
                    WORD		msg_type_id;	//消息类型
                    TFlag		flag ;			//short类型
                    DWORD		packet_seq;		//包序号
                    
                */
$packet_head = pack("SCSSIa*",$len ,1 , MSG_REQ_HTTP_ADD_USER_GOLD ,0 ,0, $Req );
// 推送的数据，包含uid字段，表示是给这个uid推送
$data = array('uid'=>'uid1', 'percent'=>'88%');
echo "2";
fwrite($socket,$packet_head);
//$vvva1 = socket_read($socket, 11);
//echo $vvva1;
$vvva=fread($socket,10000);

// 读取推送结果
$packet_head= '';

$packet_body="";
//$myfile=fopen("testfile.txt", "w");
//fwrite($myfile, $vvva);
//if (recv_len( $socket,HEAD_LEN,$packet_head) > 0 )
{
					$array = unpack("S1len/c1ver/S1msg/C1key/C1flag/I1seq/I1Status/c*str", $vvva);
					$len = $array ['len'] ;
					$key = $array ['key'] ;
                    
                    //if (recv_len($socket,$len,$packet_body) > 0 )
                    {
						//$array  = unpack("C*str", $vvva);
						$array = unpack("S1len/c1ver/S1msg/C1key/C1flag/I1seq/I1Status/C".($len-6)."str/C2strr", $vvva);
						//加载成功
                        echo json_encode($array);
                        //echo $array['str1'];
                        unset($array['len']);
                        unset($array['ver']);
                        unset($array['msg']);
                        unset($array['key']);
                        unset($array['flag']);
                        unset($array['seq']);                        
                        // unset($array['strr1']);
                        // unset($array['strr2']);
                        $code=array(
                            "len"=>array("S1"),
                            "ver"=>array("c1"),
                            "msg"=>array("S1"),
                            "key"=>array("C1"),
                            "flag"=>array("C1"),
                            "seq"=>array("I1"),
                            "status"=>array("C".($len-2)),
                            "content"=>array("C2"));
                             
                        //$stream=file_get_contents("c:/1.txt");
                        //$content = unpack("C".($len-2)."test", $vvva);
                        //echo $content;
                        //echo var_dump(parkByArr($vvva,$code));
                        //decrypt1($array,$key);
                        $strobj= toStr($array);
                        
                    }
				}
echo "4";
echo $strobj;
$objj=array();
$objj=json_decode($strobj);
echo json_encode($objj);
//fclose($socket);
fclose($socket);
$a = pack('A*','我');$b = unpack('A*test',$a); 
echo json_encode($b);
// echo $objj->stauts;
//socket_close($socket);
//$ss='{"stauts": "200","content":"错误信息"}';
//$vss=json_decode($ss);
//echo $vss->stauts;
//echo $vss->content;
function decrypt1(&$buffer , $key){
		$len = count($buffer);
		$result ='';
		for( $i = 1 ; $i <= $len ; $i ++){
			$va     = $buffer ["str{$i}" ] ;
			$buffer["str{$i}"] = ( $va - $key ) ^ $key ;
		}
		//return $result;
}
function toStr($bytes) { 
    $str = ''; 
    foreach($bytes as $ch) { 
        $str .= chr($ch); 
    } 

       return $str; 
} 
function byteArrayToString($bytes,$charset) { 
    $bytes=array_map('chr',$bytes);
    $str=implode('',$bytes);
    $str = iconv('UTF-16',$charset,$str);
    return $str;     
}


    function parkByArr($str,$code)
    {
        $Arr=explode("\0",$str);
        $atArr=array();
        $i=0;
        foreach($code as $k=>$v)
        {
            $atArr[$k]=unpack($v[0],$Arr[$i]);
            $i++;
        }
        return $atArr;
    }