<?php

namespace App\Admin\Controllers;
define	('HEAD_LEN' ,           11);						//包头长度
define	('MSG_REQ_ROOM_LIST' ,	0x15);	
define	('MSG_REQ_HTTP_ADD_USER_GOLD',0x8020);
use App\Models\user_info;
use App\Models\HandleGoldLog;
use App\Admin\Extensions\UserInfoGoldBtn;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Widgets\Box;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(user_info::class, function (Grid $grid) {

            $grid->user_id('ID')->sortable();
            $grid->user_name('用户名称');
            $grid->gold('金币');

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $actions->disableDelete();
                $actions->disableEdit();
                $actions->append(new UserInfoGoldBtn($actions->getKey()));
            });
            $grid->disableCreation();
            $grid->tools->disableBatchActions();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(user_info::class, function (Form $form) {

            $form->display('user_id', '编号');
            $form->display('user_name', '用户名称');
            $form->display('gold', '金币');
        });
    }

    protected function EditGold($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->formGold()->edit($id));
        });
    }

    protected function formGold()
    {
        // $form = new \Encore\Admin\Widgets\Form();
        // $form->action(admin_base_path('userinfo/updategold'));

        // $form->select('parent_id', trans('admin.parent_id'))->options(Menu::selectOptions());
        // $form->text('title', trans('admin.title'))->rules('required');
        // $form->icon('icon', trans('admin.icon'))->default('fa-bars')->rules('required')->help($this->iconHelp());
        // $form->text('uri', trans('admin.uri'));
        // $form->multipleSelect('roles', trans('admin.roles'))->options(Role::all()->pluck('name', 'id'));
        // $form->hidden('_token')->default(csrf_token());

        //             $column->append((new Box(trans('admin.new'), $form))->style('success'));
        return Admin::form(user_info::class, function (Form $form) {

            $form->action(admin_base_path('userinfo/updategold'));
            $form->display('user_id', '编号');
            $form->display('user_name', '用户名称');
            $form->number('newgold', '金币');
        });
    }

    protected function updategold(Request $request)
    {
        $goldlog=new HandleGoldLog;
        $goldlog->userid=$request->userid;
        $goldlog->gold=abs($request->gold);
        $goldlog->handletype=$request->gold>0?1:2;
        $goldlog->status=0;
        $goldlog->createtime=date("Y-m-d h:i:s");
        $goldlog->save();

        $socket = stream_socket_client('tcp://'.config('app.game_host').':'.config('app.game_port'), $errno, $errmsg);
        $Req = pack("III",$request->userid,$request->gold>0?1:2,abs($request->gold));
        $len = strlen($Req);
        $packet_head = pack("SCSSIa*",$len ,1 , MSG_REQ_HTTP_ADD_USER_GOLD ,0 ,0, $Req );
        fwrite($socket,$packet_head);
        $readdate=fread($socket,2048);
        $array = unpack("S1len/c1ver/S1msg/C1key/C1flag/I1seq/I1Status", $readdate);
        $len = $array ['len'] ;
        $key = $array ['key'] ;
        // unset($array['len']);
        // unset($array['ver']);
        // unset($array['msg']);
        // unset($array['key']);
        // unset($array['flag']);
        // unset($array['seq']);
        
        // unset($array['str'.$len]);
        // unset($array['str'.($len-1)]);
        // $this->decrypt1($array,$key);
        // echo $this->toStr($array);
        // $obj= json_decode($this->toStr($array));
        // echo json_encode($obj);
        $goldlog->status=$array['Status'];
        $goldlog->completetime=date("Y-m-d h:i:s"); 
        $goldlog->save();
        fclose($socket);
        $msg=[];
        $msg['status']=$array['Status'];
        $msg['message']=$this->StatusMessage($array['Status']);
        return json_encode($msg);
    }
    function StatusMessage($Status)
    {
        $message="";
        switch($Status)
        {
            case 200:$message="成功";break;
            case 201:$message="操作金额大于金额上限（20亿）";break;
            case 202:$message="用户不存在";break;
            case 203:$message="增加之后金额大于金额上限";break;
            case 204:$message="金币不足";break;
        }
        return $message;
    }
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
}
