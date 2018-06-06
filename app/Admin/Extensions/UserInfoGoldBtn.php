<?php

namespace App\Admin\Extensions;

use Encore\Admin\Admin;

class UserInfoGoldBtn
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    protected function script()
    {
        return <<<SCRIPT

$('.grid-check-row').on('click', function () {
    var userid=$(this).data('id');
    swal({
        title: "金币增减",
        text: "金币数量必须是整数{-9999999,9999999}",
        type: "input",
        showCancelButton:true,
        closeOnConfirm:false,
        confirmButtonText:"确认",
        cancelButtonText:"取消",
        animation: "slide-from-top",
        inputPlaceholder: "输入金币数量"
    },
    function (inputValue){
        if(inputValue){
            var re = /^-?[1-9]\d{0,6}$/;
            if(!re.test(inputValue)){
                swal("金币数量必须是整数{-9999999,9999999}");
            }else{                
                $.ajax({
                    url: "userinfo/updategold",
                    method: 'post',
                    dataType: "json",
                    data: { userid:userid,gold:inputValue,_token:LA.token  },
                    success: function (data) {
                        if (data.status==200) {
                            swal(data.message, '', 'success');
                        } else {
                            swal(data.message, '', 'error');
                        }
                    }
                });
            }
                
        }else{
            swal("输入不能为空");
            
        }
    });
});

SCRIPT;
    }

    protected function render()
    {
        Admin::script($this->script());

        return "<a class='fa fa-money grid-check-row' data-id='{$this->id}'></a>";
    }

    public function __toString()
    {
        return $this->render();
    }
}