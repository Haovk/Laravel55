<?php

namespace App\Admin\Controllers;

use App\Models\ViewTotalUserActivity;

use Illuminate\Support\Facades\DB;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ViewTotalUserActivityController extends Controller
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

            $content->header('总况 / 用户活跃总况');
            $content->description('description');

            $content->row('周活跃用户数:统计日期最近7天登录过游戏进行对局的用户数');
            $content->row('活跃1天比率(%):统计日期最近7天里只有1天登录过游戏进行对局的用户数/周活跃用户数');
            $content->row('活跃7天比率(%):统计日期最近7天里都有登录过游戏进行对局的用户数/周活跃用户数');

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
        return Admin::grid(ViewTotalUserActivity::class, function (Grid $grid) {
            $grid->StatisticsDate('统计日期')->sortable();
            $grid->RegisterCount('注册数');
            //$grid->D2LoginCount('次日留存用户数');
            $grid->D2LoginRatio('次日留存率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D2LoginCount/$this->RegisterCount*100;
            });
            $grid->D1PlayGameCount('周活跃用户数');
            $grid->D1_7PlayGameCount('活跃1天比率(%)');
            $grid->D1_7_in_1_PlayGameRatio('活跃7天比率(%)');
            $grid->D1_7_in_7_PlayGameRatio('活跃用户数');
            $grid->D_Old7RegisterCount('前1周(不含当天)注册用户数');
            $grid->D_Old30RegisterCount('前1月(不含前1周)注册用户数');
            $grid->D_OldAllRegisterCount('历史(不含前1月)注册用户数');

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
        return Admin::form(ViewTotalUserActivity::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
