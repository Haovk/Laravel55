<?php

namespace App\Admin\Controllers;

use App\Models\ViewThreeAwardRecord;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ViewThreeAwardRecordController extends Controller
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
        return Admin::grid(ViewThreeAwardRecord::class, function (Grid $grid) {

            $grid->id('ID');
            $grid->nick_name('玩家昵称');
            $grid->session_id('期数');
            $grid->award_pattern('牌型')->display(
                function($award_pattern){
                    switch ($award_pattern) {
                        case 1:return '单牌';break;
                        case 2:return '对子';break;
                        case 3:return '顺子';break;
                        case 4:return '金花';break;
                        case 5:return '顺金';break;
                        case 6:return '豹子';break;
                        case 7:return '特殊';break;
                        case 8:return 'AAA';break;
                    }
                })->label(); 
            $grid->award_gold('中奖金额');
            $grid->award_date('中奖时间')->sortable();

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
        return Admin::form(ViewThreeAwardRecord::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
