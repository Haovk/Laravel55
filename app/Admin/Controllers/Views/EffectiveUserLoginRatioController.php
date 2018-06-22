<?php

namespace App\Admin\Controllers\Views;

use App\Models\Views\ViewEffectiveUserLoginRatio;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class EffectiveUserLoginRatioController extends Controller
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
        return Admin::grid(ViewEffectiveUserLoginRatio::class, function (Grid $grid) {

            $grid->StatisticsDate('统计日期')->sortable();
            $grid->RegisterCount('注册数量');
            $grid->TRegisterCount('有效注册用户数');
            $grid->TRegisterLoginCount('有效留存用户数');
            $grid->LoginRatio('登录比(%)')->display(function(){
                return $this->TRegisterCount==0?0:$this->TRegisterLoginCount/$this->TRegisterCount*100;
            });
            $grid->ValidRatio('有效率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->TRegisterCount/$this->RegisterCount*100;
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
        return Admin::form(ViewEffectiveUserLoginRatio::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
