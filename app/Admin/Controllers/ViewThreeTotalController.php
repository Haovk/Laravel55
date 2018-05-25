<?php

namespace App\Admin\Controllers;

use App\Models\ViewThreeTotal;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ViewThreeTotalController extends Controller
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
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(ViewThreeTotal::class, function (Grid $grid) {
            
            $grid->session_id('期数');
            $grid->nick_name('用户昵称');
            $grid->user_id('用户编号');            
            $grid->bet_goldtotal('押注金额总计');
            $grid->bet_pattern('押注牌型')->display(
                function($bet_pattern){
                    switch ($bet_pattern) {
                        case 1:return '单牌';break;
                        case 2:return '对子';break;
                        case 3:return '顺子';break;
                        case 4:return '金花';break;
                        case 5:return '顺金';break;
                        case 6:return '豹子';break;
                        case 7:return '特殊';break;
                        case 8:return 'AAA';break;
                    }
                })->label();            
            $grid->bet_datelast('最后押注时间')->sortable();
            $grid->award_pattern('开奖牌型')->display(
                function($award_pattern){
                    switch ($award_pattern) {
                        case 1:return '单牌';break;
                        case 2:return '对子';break;
                        case 3:return '顺子';break;
                        case 4:return '金花';break;
                        case 5:return '顺金';break;
                        case 6:return '豹子';break;
                        case 7:return '特殊';break;
                        case 8:return 'AAA';break;
                    }
                })->label();
            $grid->award_gold('中奖金额');
            $grid->award_date('中奖时间');

            $grid->disableActions();
            $grid->disableCreation();
            $grid->tools->disableBatchActions();
            
            
            $grid->filter(function ($filter) {
                // 设置created_at字段的范围查询
                $filter->equal('session_id', '期数')->integer();
                $filter->like('nick_name', '用户昵称');
                $filter->equal('user_id', '用户编号')->integer();
            });
        });
    }


}
