<?php

namespace App\Admin\Controllers\Views;

use App\Models\Views\ViewChannelUserActivityAnalysis;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ChannelUserActivityAnalysisController extends Controller
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
        return Admin::grid(ViewChannelUserActivityAnalysis::class, function (Grid $grid) {

            $grid->StatisticsDate('统计日期')->sortable();
            $grid->ChannelId('渠道编号');
            $grid->channel_name('渠道名称');
            $grid->D1FirstloginCount('日新增注册用户数');
            $grid->D1PlayGameCount('日活跃用户数');
            $grid->D1_7FirstloginCount('周新增注册用户数');
            $grid->D1_7PlayGameCount('周活跃用户数');
            $grid->WeekLoginDie('周流失用户数');
            $grid->WeekLoginLife('周回流用户数');
            $grid->D1_30FirstloginCount('月新增注册用户数');
            $grid->D1_30PlayGameCount('月活跃用户数');
            $grid->MonthLoginDie('月流失用户数');
            $grid->MonthLoginLife('月回流用户数');

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
        return Admin::form(ViewChannelUserActivityAnalysis::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
