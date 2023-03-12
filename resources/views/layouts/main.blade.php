<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{URL::to('web/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::to('bower_components/font-awesome/css/font-awesome.min.css')}}">

  <link rel="icon" href="{{ URL::to('images/favicon.png')}}" type="image/png" sizes="16x16">

  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{URL::to('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::to('web/css/AdminLTE.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{URL::to('web/blue.css')}}">

  <!-- Google Font -->
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo" style="margin-bottom: -10px;">
    <a href=""><b>@yield('infos')</b></a>
  </div>
 

    @yield('login_here')


</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{URL::to('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{URL::to('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{URL::to('plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
