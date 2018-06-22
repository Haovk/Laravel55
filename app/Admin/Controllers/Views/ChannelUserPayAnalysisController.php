<?php

namespace App\Admin\Controllers\Views;

use App\Models\Views\ViewChannelUserPayAnalysis;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ChannelUserPayAnalysisController extends Controller
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
        return Admin::grid(ViewChannelUserPayAnalysis::class, function (Grid $grid) {

            $grid->StatisticsDate('统计日期')->sortable();
            $grid->ChannelId('渠道编号');
            $grid->channel_name('渠道名称');
            $grid->D1PlayGameCount('日活跃用户数');
            $grid->FirstPayUserCount('日新增充值用户数');
            $grid->FirstPayMoenySum('日首次充值金额');
            $grid->PayUserCount('日充值用户数');
            $grid->PayMoenySum('日充值金额');
            $grid->Pay_stl('日充值渗透率(%)')->display(function(){
                return $this->D1PlayGameCount==0?0:$this->PayUserCount/$this->D1PlayGameCount*100;
            });
            $grid->D1_7PlayGameCount('周活跃用户数');
            $grid->WeekFirstPayUserCount('周新增充值用户数');
            $grid->WeekPayUserCount('周充值用户数');
            $grid->WeekPayMoenySum('周充值金额');
            $grid->WeekPay_stl('周充值渗透率(%)')->display(function(){
                return $this->D1_7PlayGameCount==0?0:$this->WeekPayUserCount/$this->D1_7PlayGameCount*100;
            });
            $grid->D1_30PlayGameCount('月活跃用户数');
            $grid->MonthFirstPayUserCount('月新增充值用户数');
            $grid->MonthPayUserCount('月充值用户数');
            $grid->MonthPayMoenySum('月充值金额');
            $grid->MonthPay_stl('月充值渗透率(%)')->display(function(){
                return $this->D1_30PlayGameCount==0?0:$this->MonthPayUserCount/$this->D1_30PlayGameCount*100;
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
        return Admin::form(ViewChannelUserPayAnalysis::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
