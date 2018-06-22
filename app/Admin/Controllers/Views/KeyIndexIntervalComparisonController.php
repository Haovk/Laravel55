<?php

namespace App\Admin\Controllers\Views;

use App\Models\Views\ViewKeyIndexIntervalComparison;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class KeyIndexIntervalComparisonController extends Controller
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

            $content->header('总况 / 关键指标区间对比');
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
        return Admin::grid(ViewKeyIndexIntervalComparison::class, function (Grid $grid) {

            $grid->StatisticsDate('统计日期')->sortable();
            $grid->ChannelId('渠道编号');
            $grid->channel_name('渠道名称');         
            $grid->RegisterCount('注册数量');
            $grid->D1PlayGameCount('活跃用户数量');   
            $grid->FirstPayUserCount('新增首次充值用户数');
            $grid->PayUserCount('充值用户数');
            $grid->PayMoenySum('充值金额');
            $grid->AvgPayMoeny('人均充值金额')->display(function(){
                return $this->PayUserCount==0?0:$this->PayMoenySum/$this->PayUserCount*100;
            });
            $grid->Pay_stl('充值渗透率')->display(function(){
                return $this->D1PlayGameCount==0?0:$this->PayUserCount/$this->D1PlayGameCount*100;
            });
            $grid->FirstConsumeUserCount('新增首次消费用户数');
            $grid->ConsumeUserCount('消费用户数');
            $grid->ConsumeMoneySum('消费金额');
            $grid->AvgConsumeMoney('人均消费金额')->display(function(){
                return $this->ConsumeUserCount==0?0:$this->ConsumeMoneySum/$this->ConsumeUserCount*100;
            });
            $grid->Consume_stl('消费渗透率')->display(function(){
                return $this->D1PlayGameCount==0?0:$this->ConsumeUserCount/$this->D1PlayGameCount*100;
            });
            $grid->D2LoginRatio('次日留存率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D2LoginCount/$this->RegisterCount*100;
            });
            $grid->D2LoginRatio('7日留存率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_in_7_PlayGameCount/$this->RegisterCount*100;
            });
            $grid->TRegisterCount('有效注册用户数');
            $grid->TRegisterLoginCount('有效留存用户数');
            $grid->LoginRatio('登录比(%)')->display(function(){
                return $this->TRegisterCount==0?0:$this->TRegisterLoginCount/$this->TRegisterCount;
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
        return Admin::form(ViewKeyIndexIntervalComparison::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
