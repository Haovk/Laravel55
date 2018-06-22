<?php

namespace App\Admin\Controllers\Views;

use App\Models\Views\ViewRegisteredUserPayChangeAnalysis;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class RegisteredUserPayChangeAnalysisController extends Controller
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
        return Admin::grid(ViewRegisteredUserPayChangeAnalysis::class, function (Grid $grid) {

            $grid->ObservationDate('观察日期')->sortable();
            $grid->RegisterCount('注册数量');
            $grid->D1_7_in_1_PayCount('1天转换用户');
            $grid->D1_7_in_2_PayCount('2天转换用户');
            $grid->D1_7_in_3_PayCount('3天转换用户');
            $grid->D1_7_in_4_PayCount('4天转换用户');
            $grid->D1_7_in_5_PayCount('5天转换用户');
            $grid->D1_7_in_6_PayCount('6天转换用户');
            $grid->D1_7_in_7_PayCount('7天转换用户');
            $grid->D1_7_in_1_PayRatio('1天转换率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_in_1_PayCount/$this->RegisterCount*100;
            });
            $grid->D1_7_in_2_PayRatio('2天转换率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_in_2_PayCount/$this->RegisterCount*100;
            });
            $grid->D1_7_in_3_PayRatio('3天转换率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_in_3_PayCount/$this->RegisterCount*100;
            });
            $grid->D1_7_in_4_PayRatio('4天转换率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_in_4_PayCount/$this->RegisterCount*100;
            });
            $grid->D1_7_in_5_PayRatio('5天转换率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_in_5_PayCount/$this->RegisterCount*100;
            });
            $grid->D1_7_in_6_PayRatio('6天转换率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_in_6_PayCount/$this->RegisterCount*100;
            });
            $grid->D1_7_in_7_PayRatio('7天转换率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D1_7_in_7_PayCount/$this->RegisterCount*100;
            });
            $grid->D1_7_in_1_PayMoneySum('前1天的充值金额');
            $grid->D1_7_in_1_PayMoneySum('前2天的充值金额');
            $grid->D1_7_in_1_PayMoneySum('前3天的充值金额');
            $grid->D1_7_in_1_PayMoneySum('前4天的充值金额');
            $grid->D1_7_in_1_PayMoneySum('前5天的充值金额');
            $grid->D1_7_in_1_PayMoneySum('前6天的充值金额');
            $grid->D1_7_in_1_PayMoneySum('前7天的充值金额');
            $grid->D1_7_in_1_AvgPayMoeny('1天人均')->display(function(){
                return $this->D1_7_in_1_PayCount==0?0:$this->D1_7_in_1_PayMoneySum/$this->D1_7_in_1_PayCount;
            });
            $grid->D1_7_in_2_AvgPayMoeny('2天人均')->display(function(){
                return $this->D1_7_in_2_PayCount==0?0:$this->D1_7_in_2_PayMoneySum/$this->D1_7_in_2_PayCount;
            });
            $grid->D1_7_in_3_AvgPayMoeny('3天人均')->display(function(){
                return $this->D1_7_in_3_PayCount==0?0:$this->D1_7_in_3_PayMoneySum/$this->D1_7_in_3_PayCount;
            });
            $grid->D1_7_in_4_AvgPayMoeny('4天人均')->display(function(){
                return $this->D1_7_in_4_PayCount==0?0:$this->D1_7_in_4_PayMoneySum/$this->D1_7_in_4_PayCount;
            });
            $grid->D1_7_in_5_AvgPayMoeny('5天人均')->display(function(){
                return $this->D1_7_in_5_PayCount==0?0:$this->D1_7_in_5_PayMoneySum/$this->D1_7_in_5_PayCount;
            });
            $grid->D1_7_in_6_AvgPayMoeny('6天人均')->display(function(){
                return $this->D1_7_in_6_PayCount==0?0:$this->D1_7_in_6_PayMoneySum/$this->D1_7_in_6_PayCount;
            });
            $grid->D1_7_in_7_AvgPayMoeny('7天人均')->display(function(){
                return $this->D1_7_in_7_PayCount==0?0:$this->D1_7_in_7_PayMoneySum/$this->D1_7_in_7_PayCount;
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
        return Admin::form(ViewRegisteredUserPayChangeAnalysis::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
