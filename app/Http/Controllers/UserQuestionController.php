<?php

namespace App\Http\Controllers;

use App\Models\UserQuestion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('userquestion');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->only(['qq', 'content']);

        $messages = [
            'qq.required' => '请输入一个QQ号',
            'content.required' => '内容不能为空',
        ];

        /** @var \Illuminate\Validation\Validator $validator */
        $validator = Validator::make($credentials, [
            'qq' => 'required',
            'content' => 'required',
        ],$messages);
        
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        
        
        $userQuestion=new UserQuestion;
        $userQuestion->qq=$request->qq;
        $userQuestion->content=$request->content;
        $userQuestion->save();
        admin_toastr('提交成功');
        return redirect()->intended('userquestion');
        
        
        // return back()->withInput()->withErrors([
        //     'qq' => '请输入一个QQ号','content' => '内容不能为空',
        // ]);
        //
        // $userQuestion=new UserQuestion;
        // $userQuestion->qq=$request->qq;
        // $userQuestion->content=$request->content;
        // $userQuestion->save();
        // return "<script>swal('提交成功', '', 'success');</script>";
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserQuestion  $userQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(UserQuestion $userQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserQuestion  $userQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(UserQuestion $userQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserQuestion  $userQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserQuestion $userQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserQuestion  $userQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserQuestion $userQuestion)
    {
        //
    }
}
