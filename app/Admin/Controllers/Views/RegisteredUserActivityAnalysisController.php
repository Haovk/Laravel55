<?php

namespace App\Admin\Controllers\Views;

use App\Models\Views\ViewRegisteredUserActivityAnalysis;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class RegisteredUserActivityAnalysisController extends Controller
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
        return Admin::grid(ViewRegisteredUserActivityAnalysis::class, function (Grid $grid) {

            $grid->ObservationDate('观察日期')->sortable();
            $grid->RegisterCount('注册数量');
            $grid->D1_7_gt_1_PlayGameCount('活跃>=1天活跃用户数');
            $grid->D1_7_gt_2_PlayGameCount('活跃>=2天活跃用户数');
            $grid->D1_7_gt_3_PlayGameCount('活跃>=3天活跃用户数');
            $grid->D1_7_gt_4_PlayGameCount('活跃>=4天活跃用户数');
            $grid->D1_7_gt_5_PlayGameCount('活跃>=5天活跃用户数');
            $grid->D1_7_gt_6_PlayGameCount('活跃>=6天活跃用户数');
            $grid->D1_7_gt_7_PlayGameCount('活跃>=7天活跃用户数');
            $grid->D1_7_gt_1_PlayGameRatio('活跃>=1天活跃率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_gt_1_PlayGameCount/$this->RegisterCount*100;
            });
            $grid->D1_7_gt_2_PlayGameRatio('活跃>=2天活跃率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_gt_2_PlayGameCount/$this->RegisterCount*100;
            });
            $grid->D1_7_gt_3_PlayGameRatio('活跃>=3天活跃率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_gt_3_PlayGameCount/$this->RegisterCount*100;
            });
            $grid->D1_7_gt_4_PlayGameRatio('活跃>=4天活跃率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_gt_4_PlayGameCount/$this->RegisterCount*100;
            });
            $grid->D1_7_gt_5_PlayGameRatio('活跃>=5天活跃率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_gt_5_PlayGameCount/$this->RegisterCount*100;
            });
            $grid->D1_7_gt_6_PlayGameRatio('活跃>=6天活跃率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_gt_6_PlayGameCount/$this->RegisterCount*100;
            });
            $grid->D1_7_gt_7_PlayGameRatio('活跃>=7天活跃率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_gt_7_PlayGameCount/$this->RegisterCount*100;
            });
            $grid->SumD1_7PlayGameRatio('加权活跃率(%)')->display(function(){
                return $this->RegisterCount==0?0:($this->D1_7_gt_1_PlayGameCount+$this->D1_7_gt_2_PlayGameCount
                +$this->D1_7_gt_3_PlayGameCount+$this->D1_7_gt_4_PlayGameCount+$this->D1_7_gt_5_PlayGameCount
                +$this->D1_7_gt_6_PlayGameCount+$this->D1_7_gt_7_PlayGameCount)/($this->RegisterCount*6)*100;
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
        return Admin::form(ViewRegisteredUserActivityAnalysis::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
