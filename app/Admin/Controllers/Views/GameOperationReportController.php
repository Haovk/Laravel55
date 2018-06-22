<?php

namespace App\Admin\Controllers\Views;

use App\Models\Views\ViewGameOperationReport;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class GameOperationReportController extends Controller
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
            $grid->D2LoginRatio('次日留存率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D2LoginCount/$this->RegisterCount*100;
            });
            $grid->D1PlayGameCount('活跃用户数量');
            $grid->D2_7LoginDieRatio('前1天流失率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D2_7LoginDie/$this->RegisterCount*100;
            });
            $grid->D4_7LoginDieRatio('前3天流失率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D4_7LoginDie/$this->RegisterCount*100;
            });
            $grid->PayUserCount('充值用户数');
            $grid->ConsumeUserCount('消费用户数');
            $grid->PayMoenySum('充值金额');
            $grid->ConsumeMoneySum('消费金额');
            $grid->AvgPayMoeny('人均充值金额')->display(function(){
                return $this->PayUserCount==0?0:$this->PayMoenySum/$this->PayUserCount*100;
            });
            $grid->AvgConsumeMoney('人均消费金额')->display(function(){
                return $this->ConsumeUserCount==0?0:$this->ConsumeMoneySum/$this->ConsumeUserCount*100;
            });

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
