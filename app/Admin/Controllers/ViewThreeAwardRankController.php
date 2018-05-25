<?php

namespace App\Admin\Controllers;

use App\Models\ViewThreeAwardRank;
use App\Models\ViewThreeProbability;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ViewThreeAwardRankController extends Controller
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

            $content->header('时时乐概率及排行');
            $content->description('description');

            $content->body($this->grid());
            $content->body($this->Rankgrid());
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
    protected function grid()
    {
        return Admin::grid(ViewThreeProbability::class, function (Grid $grid) {

            $grid->awardpattern('牌型')->display(
                function($awardpattern){
                    switch ($awardpattern) {
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
            $grid->sessioncount('开奖次数');      
            $grid->tsessioncount('总开奖次数');   
            $grid->awardratio('牌型开奖率(%)')->display(function(){
                return $this->tsessioncount==0?0:$this->sessioncount/$this->tsessioncount;
            });     
            $grid->threebetgoldsum('押注总金额');   
            $grid->threeawardgoldsum('中奖总金额');   
            $grid->avgthreeawardgoldsum('平均押注回报率(%)')->display(function(){
                return $this->threebetgoldsum==0?0:$this->threeawardgoldsum/$this->threebetgoldsum;
            });
            $grid->threeawardcount('总中奖数');   

            $grid->disableActions();
            $grid->disableCreation();
            $grid->tools->disableBatchActions();
        });
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function Rankgrid()
    {
        return Admin::grid(ViewThreeAwardRank::class, function (Grid $grid) {

            $grid->user_id('用户编号');      
            $grid->nick_name('用户昵称');      
            $grid->award_gold('奖金总计');   
            
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
        return Admin::form(ViewThreeAwardRank::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
