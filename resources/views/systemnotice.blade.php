<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('admin.title')}} | {{ trans('admin.login') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <!--<link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/font-awesome/css/font-awesome.min.css") }}">-->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/AdminLTE/dist/css/AdminLTE.min.css") }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/AdminLTE/plugins/iCheck/square/blue.css") }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
  html {
    width: 100%;
  height: 100%;
  display: table;
 
}

body {
    width: 100%;
  display: table-cell;
  height: 100%;
  
  font-family:FZY3JW_0;
}
@font-face { 
    font-family: FZY3JW_0; /*这里是说明调用来的字体名字*/ 
        src: url("{{ admin_asset('/font/FZY3JW_0.ttf')}}"); /*这里是字体文件路径*/ 
} 
    .mycontent{
        width: 100%;
        height:100%;
        background: -webkit-linear-gradient(rgba(46,80,142,1), rgba(29,54,102,1)); /* Safari 5.1 - 6.0 */
        background: -o-linear-gradient(rgba(46,80,142,1), rgba(29,54,102,1)); /* Opera 11.1 - 12.0 */
        background: -moz-linear-gradient(rgba(46,80,142,1), rgba(29,54,102,1)); /* Firefox 3.6 - 15 */
        background: linear-gradient(rgba(46,80,142,1), rgba(29,54,102,1)); /* 标准的语法（必须放在最后） */
        padding:10px 4px;
        float:left;
        -moz-box-shadow:0px 0px 20px #1f396a inset; 
        -webkit-box-shadow:0px 0px 20px #1f396a inset; 
        box-shadow:0px 0px 20px #1f396a inset;
    }
    .bgrtop{
        width: 100%;
        background: -webkit-linear-gradient(left, rgba(69,144,212,1), rgba(115,183,233,1)); /* Safari 5.1 - 6.0 */
        background: -o-linear-gradient(right, rgba(69,144,212,1), rgba(115,183,233,1)); /* Opera 11.1 - 12.0 */
        background: -moz-linear-gradient(right, rgba(69,144,212,1), rgba(115,183,233,1)); /* Firefox 3.6 - 15 */
        background: linear-gradient(to right, rgba(69,144,212,1), rgba(115,183,233,1)); /* 标准的语法（必须放在最后） */

        line-height:1.5em;
        background-size:100% 100%;
        text-align: center;
        border-radius:8px 8px 0px 0px;        
        font-size:24px;
        color:#fff;
        float:left;
        max-height:1.5em;
    }
    .imgbtn{
        width:100%;
        height:50px;
        float:left;
    }
    .left{
        width:20%;
        height:100%;
        float:left;
    }
    .right{
        width:80%;
        height:100%;
        float:left;
    }
    .bgrcontent{
        width:100%;
        height:88%;
        float:left;
        background: -webkit-linear-gradient(rgba(210,234,255,1), rgba(147,188,229,1)); /* Safari 5.1 - 6.0 */
        background: -o-linear-gradient(rgba(210,234,255,1), rgba(147,188,229,1)); /* Opera 11.1 - 12.0 */
        background: -moz-linear-gradient(rgba(210,234,255,1), rgba(147,188,229,1)); /* Firefox 3.6 - 15 */
        background: linear-gradient(rgba(210,234,255,1), rgba(147,188,229,1)); /* 标准的语法（必须放在最后） */
        box-shadow: 0 4px 1px rgba(44,98,159,1),0 0 0px rgba(0,0,0,0.0) inset;
        border-radius:0px 0px 8px 8px;
        
    }
    .bgrcontent2{
        width:100%;
        height:100%;
        float:left;
        border-radius:0px 0px 8px 8px;
        box-shadow: 0 2px 1px rgba(44,98,159,1),0 0 0px rgba(0,0,0,0.0) inset;
        font-size:20px;
        color:#35406a;
        text-indent:2em;
        line-height:1.2em;
        padding:5px 1em 0px 1em;
    }
  </style>
</head>
<body>
<div class="mycontent">
    <div class="left">
        <img class="imgbtn" src="{{ admin_asset('/content/images/tupdatebtn.png') }}" alt="">
    </div>
    <div class="right">
        <div class="bgrtop"><span>公告名字</span></div>
        <div class="bgrcontent"><div class="bgrcontent2"><span>公告名字公告名字公告名字公告名字公告名字公告名字公告名字公告名字公告名字公告名字公告名字公告名字</span></div></div>
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="{{ admin_asset("/vendor/laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js")}} "></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ admin_asset("/vendor/laravel-admin/AdminLTE/bootstrap/js/bootstrap.min.js")}}"></script>
<!-- iCheck -->
<script src="{{ admin_asset("/vendor/laravel-admin/AdminLTE/plugins/iCheck/icheck.min.js")}}"></script>
</body>
</html>
