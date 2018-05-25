<?php

namespace App\Admin\Controllers;

use App\Models\ViewMonthlyChannelIndexAnalysis;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ViewMonthlyChannelIndexAnalysisController extends Controller
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

            $content->header('总况 / 各渠道自然月分析');
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
        return Admin::grid(ViewMonthlyChannelIndexAnalysis::class, function (Grid $grid) {
            $grid->StatisticsDate('统计日期')->sortable();
            $grid->ChannelId('渠道编号');
            $grid->channel_name('渠道名称');
            $grid->D1PlayGameCount('活跃用户数量');
            $grid->RegisterCount('注册数量');
            $grid->FirstPayUserCount('新增首次充值用户数');
            $grid->PayUserCount('充值用户数');
            $grid->PayMoenySum('总充值金额');
            $grid->FirstConsumeUserCount('新增首次消费用户数');
            $grid->ConsumeUserCount('消费用户数');
            $grid->ConsumeMoneySum('消费金额');

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
        return Admin::form(ViewMonthlyChannelIndexAnalysis::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
