<?php

namespace App\Admin\Controllers\Views;

use App\Models\Views\ViewTotalUserPayment;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class TotalUserPaymentController extends Controller
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

            $content->header('总况 / 用户付费总况');
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
        return Admin::grid(ViewTotalUserPayment::class, function (Grid $grid) {
            
            $grid->StatisticsDate('统计日期')->sortable();
            $grid->PayUserCount('充值用户数');
            $grid->ConsumeUserCount('消费用户数');
            $grid->PayMoenySum('总充值金额');
            $grid->ConsumeMoneySum('总消费金额');
            $grid->AvgPayMoeny('人均充值金额')->display(function(){
                return $this->PayMoenySum==0?0:$this->PayUserCount/$this->PayMoenySum*100;
            });
            $grid->AvgConsumeMoney('人均消费金额')->display(function(){
                return $this->ConsumeMoneySum==0?0:$this->ConsumeUserCount/$this->ConsumeMoneySum*100;
            });
            $grid->Pay_stl('充值渗透率(%)')->display(function(){
                return $this->D1PlayGameCount==0?0:$this->PayUserCount/$this->D1PlayGameCount*100;
            });
            $grid->Consume_stl('消费渗透率(%)')->display(function(){
                return $this->D1PlayGameCount==0?0:$this->ConsumeUserCount/$this->D1PlayGameCount*100;
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
        return Admin::form(ViewTotalUserPayment::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
