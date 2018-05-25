<?php

namespace App\Admin\Controllers;

use App\Models\ThreeTotalRecord;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ThreeTotalRecordController extends Controller
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
        return Admin::grid(ThreeTotalRecord::class, function (Grid $grid) {

            $grid->session_id('期数')->sortable();
            $grid->award_pattern('开奖牌型')->display(
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
            $grid->totol_bet_num('押注总人数');
            $grid->totol_bet_gold('押注总金额');
            $grid->totol_award_num('中奖总人数');
            $grid->totol_award_gold('中奖总金额');
            $grid->award_date('开奖时间');

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
        return Admin::form(ThreeTotalRecord::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
