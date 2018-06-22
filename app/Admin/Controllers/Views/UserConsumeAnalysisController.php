<?php

namespace App\Admin\Controllers\Views;

use App\Models\Views\ViewUserConsumeAnalysis;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UserConsumeAnalysisController extends Controller
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
        return Admin::grid(ViewUserConsumeAnalysis::class, function (Grid $grid) {

            $grid->StatisticsDate('统计日期')->sortable();
            $grid->D1PlayGameCount('日活跃用户数');
            $grid->FirstConsumeUserCount('日新增消费用户数');
            $grid->FirstConsumeMoenySum('日首次消费金额');
            $grid->ConsumeUserCount('日消费用户数');
            $grid->ConsumeMoneySum('日消费金额');
            $grid->Consume_stl('日消费渗透率(%)')->display(function(){
                return $this->D1PlayGameCount==0?0:$this->ConsumeUserCount/$this->D1PlayGameCount*100;
            });
            $grid->D1_7PlayGameCount('周活跃用户数');
            $grid->WeekFirstConsumeUserCount('周新增消费用户数');
            $grid->WeekConsumeUserCount('周消费用户数');
            $grid->WeekConsumeMoneySum('周消费金额');
            $grid->WeekConsume_stl('周消费渗透率(%)')->display(function(){
                return $this->D1_7PlayGameCount==0?0:$this->WeekConsumeUserCount/$this->D1_7PlayGameCount*100;
            });
            $grid->D1_30PlayGameCount('月活跃用户数');
            $grid->MonthFirstConsumeUserCount('月新增消费用户数');
            $grid->MonthConsumeUserCount('月消费用户数');
            $grid->MonthConsumeMoneySum('月消费金额');
            $grid->MonthConsume_stl('月消费渗透率(%)')->display(function(){
                return $this->D1_30PlayGameCount==0?0:$this->MonthConsumeUserCount/$this->D1_30PlayGameCount*100;
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
        return Admin::form(ViewUserConsumeAnalysis::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
