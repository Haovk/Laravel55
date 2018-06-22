<?php

namespace App\Admin\Controllers\Views;

use App\Models\Views\ViewRegisteredUserFlowAwayAnalysis;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class RegisteredUserFlowAwayAnalysisController extends Controller
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
        return Admin::grid(ViewRegisteredUserFlowAwayAnalysis::class, function (Grid $grid) {

            $grid->ObservationDate('观察日期')->sortable();
            $grid->RegisterCount('注册数量');
            $grid->D2_7LoginDie('前1天流失用户数');
            $grid->D3_7LoginDie('前2天流失用户数');
            $grid->D4_7LoginDie('前3天流失用户数');
            $grid->D5_7LoginDie('前4天流失用户数');
            $grid->D6_7LoginDie('前5天流失用户数');
            $grid->D7_7LoginDie('前6天流失用户数');
            $grid->D2_7LoginDieRatio('前1天流失率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D2_7LoginDie/$this->RegisterCount*100;
            });
            $grid->D3_7LoginDieRatio('前2天流失率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D3_7LoginDie/$this->RegisterCount*100;
            });
            $grid->D4_7LoginDieRatio('前3天流失率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D4_7LoginDie/$this->RegisterCount*100;
            });
            $grid->D5_7LoginDieRatio('前4天流失率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D5_7LoginDie/$this->RegisterCount*100;
            });
            $grid->D6_7LoginDieRatio('前5天流失率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D6_7LoginDie/$this->RegisterCount*100;
            });
            $grid->D7_7LoginDieRatio('前6天流失率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D7_7LoginDie/$this->RegisterCount*100;
            });
            $grid->SumD1_7LoginDieRatio('加权流失率(%)')->display(function(){
                return $this->RegisterCount==0?0:($this->D2_7LoginDie+$this->D3_7LoginDie+$this->D4_7LoginDie
                +$this->D5_7LoginDie+$this->D6_7LoginDie+$this->D7_7LoginDie)/($this->RegisterCount*6)*100;
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
        return Admin::form(ViewRegisteredUserFlowAwayAnalysis::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
