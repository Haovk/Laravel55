<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>问题反馈</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/sweetalert/dist/sweetalert.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/toastr/build/toastr.min.css") }}">
    <script src="{{ admin_asset("/vendor/laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js")}} "></script>
  </head>
  <style>
  body{
    background: -webkit-linear-gradient(rgba(204,230,252,1), rgba(136,180,225,1)); /* Safari 5.1 - 6.0 */
    background: -o-linear-gradient(rgba(204,230,252,1), rgba(136,180,225,1)); /* Opera 11.1 - 12.0 */
    background: -moz-linear-gradient(rgba(204,230,252,1), rgba(136,180,225,1)); /* Firefox 3.6 - 15 */
    background: linear-gradient(rgba(204,230,252,1), rgba(136,180,225,1)); /* 标准的语法（必须放在最后） */
  }
  </style>
  <body>
    @if(Session::has('toastr'))
    @php
        $toastr     = Session::get('toastr');
        $type       = array_get($toastr->get('type'), 0, 'success');
        $message    = array_get($toastr->get('message'), 0, '');
        $options    = json_encode($toastr->get('options', []));
    @endphp
    <script>
        $(function () {
            toastr.{{$type}}('{!!  $message  !!}', null, {!! $options !!}); 
        });
    </script>
    @endif
    <div class="container">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="userquestion" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="formGroupExampleInput">联系QQ</label>
                <input type="text" class="form-control" name="qq" placeholder="联系QQ" value="{{ old('qq') }}">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">反馈内容</label>
                <textarea class="form-control" rows="3" name="content" placeholder="反馈内容">{{ old('content') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">提交</button>
        </form>
    </div>
    
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ admin_asset("/vendor/laravel-admin/AdminLTE/bootstrap/js/bootstrap.min.js")}}"></script>
    <script src="{{ admin_asset("/vendor/laravel-admin/sweetalert/dist/sweetalert.min.js")}}"></script>
    <script src="{{ admin_asset("/vendor/laravel-admin/toastr/build/toastr.min.js")}}"></script>
   </body>
</html>