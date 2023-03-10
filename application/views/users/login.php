<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MMA RMS | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/iCheck/square/blue.css">


</head>
<body class="hold-transition login-page"
      style="background-image: url('<?= base_url() ?>uploads/images.jpg') !important;
          background-size: 100%; height: 95% !important; background-repeat: no-repeat !important;">
<div class="login-box" style="background: rgba(0,0,0,0.5); color: #fff;   ">
    <div class="login-logo">
        <a href="#" style="color: white !important;"></b> <br><h4>MAMPONG MUNICIPAL ASSEMBLY<br><br>RECORDS MANAGEMENT SYSTEM</h4></a></div>

    <?php if ($this->session->flashdata('register')) {
        echo "<div class='alert alert-success'>" . $this->session->userdata('register') . "</div>";
        $this->session->sess_destroy();
    } else {

    } ?>
    <!-- /.login-logo -->
    <?php if ($this->session->flashdata('msg')) {
        echo "<div class='alert alert-danger'>" . $this->session->flashdata('msg') . "</div>";

    } else {

    } ?>
    <div class="login-box-body" style="background: rgba(0,0,0,0.5); color: #fff;">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $attributes = array('class' => 'email', 'id' => 'myform', 'method' => 'post');
        echo form_open('users/loginauthen', $attributes); ?>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="u_email" autocomplete="off" placeholder="Username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" name="u_password" autocomplete="off" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">

            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
        <?php form_close(); ?>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<footer class="main-footer" style="background: none">
<div class="row" >
    <div class="col-lg-8 col-lg-offset-1" style="background: rgba(0,0,0,0.5); color: #fff;   ">
        <h2 style="color: #fff0ff;">copyright(c) 2019, Designed by OguSes IT Solutions,
            <br>Tel: 0545819229 , Email: malito ogua.ahmed8@gmail.com</h2>
    </div>
</div>
    </footer>
<!-- jQuery 3 -->
<script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
