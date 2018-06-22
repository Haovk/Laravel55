<?php

namespace App\Admin\Controllers\Views;

use App\Models\Views\ViewRegisteredUserRetentionAnalysis;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class RegisteredUserRetentionAnalysisController extends Controller
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
        return Admin::grid(ViewRegisteredUserRetentionAnalysis::class, function (Grid $grid) {
            
            $grid->ObservationDate('观察日期')->sortable();
            $grid->RegisterCount('注册数量');
            $grid->D2LoginCount('第2天留存用户数');
            $grid->D3LoginCount('第3天留存用户数');
            $grid->D4LoginCount('第4天留存用户数');
            $grid->D5LoginCount('第5天留存用户数');
            $grid->D6LoginCount('第6天留存用户数');
            $grid->D7LoginCount('第7天留存用户数');
            $grid->D2LoginRatio('第2天留存率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D2LoginCount/$this->RegisterCount*100;
            });
            $grid->D3LoginRatio('第3天留存率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D3LoginCount/$this->RegisterCount*100;
            });
            $grid->D4LoginRatio('第4天留存率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D4LoginCount/$this->RegisterCount*100;
            });
            $grid->D5LoginRatio('第5天留存率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D5LoginCount/$this->RegisterCount*100;
            });
            $grid->D6LoginRatio('第6天留存率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D6LoginCount/$this->RegisterCount*100;
            });
            $grid->D7LoginRatio('第7天留存率(%)')->display(function(){
                return $this->RegisterCount==0?0:$this->D7LoginCount/$this->RegisterCount*100;
            });
            $grid->SumD1_7LoginRatio('加权留存率(%)')->display(function(){
                return $this->RegisterCount==0?0:($this->D4LoginCount+$this->D3LoginCount+$this->D4LoginCount
                +$this->D5LoginCount+$this->D6LoginCount+$this->D7LoginCount)/($this->RegisterCount*6)*100;
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
        return Admin::form(ViewRegisteredUserRetentionAnalysis::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
