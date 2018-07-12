<?php

namespace App\Admin\Controllers;

use App\Models\AdminUserExtend;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AdminUserExtendController extends Controller
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
        return Admin::grid(AdminUserExtend::class, function (Grid $grid) {
            $grid->AdminUserId('管理员编号')->sortable();
            $grid->GoldSetting('每日金币操作设定值');
            $grid->Gold('每日剩余可操作金币值');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(AdminUserExtend::class, function (Form $form) {
            $form->number('AdminUserId', '管理员编号');
            $form->number('GoldSetting', '每日金币操作设定值');
            $form->number('Gold', '每日剩余可操作金币值');
        });
    }
}
