<?php

namespace App\Admin\Controllers;

use App\Models\ViewGameOperationReport;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ViewGameOperationReportController extends Controller
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

            $content->header('总况 / 游戏运营报告');
            $content->description('description');

            $content->row('前1天流失率(%):在统计日期注册的用户中，在第2-7天都未登录过游戏的比率。');
            $content->row('前3天流失率(%):在统计日期注册的用户中，在第4-7天都未登录过游戏的比率。');
            $content->row('消费用户数:通过游戏内充值兑换的等值货币(例如“金币、元宝”等)购买游戏内物品的用户数');
            $content->row('活跃用户数量:统计日期当天登录过游戏进行对局的用户数。');

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
        return Admin::grid(ViewGameOperationReport::class, function (Grid $grid) {

            $grid->StatisticsDate('统计日期')->sortable();
            $grid->RegisterCount('注册数量');
            #$grid->D2LoginCount('次日留存用户数');
            $grid->D2LoginRatio('次日留存率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D2LoginCount/$this->RegisterCount*100;
            });
            $grid->D1PlayGameCount('活跃用户数量');
            $grid->D1_7LoginDieRatio('前1天流失率(%)');
            $grid->D4_7LoginDieRatio('前3天流失率(%)');
            $grid->PayUserCount('充值用户数');
            $grid->ConsumeUserCount('消费用户数');
            $grid->PayMoenySum('充值金额');
            $grid->ConsumeMoneySum('消费金额');
            $grid->AvgPayMoeny('人均充值金额');
            $grid->AvgConsumeMoney('人均消费金额');

            $grid->disableActions();
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
        return Admin::form(ViewGameOperationReport::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
