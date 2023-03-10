<?php
include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> ""</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
  
 <!--Index Page -->
 <link rel="index" href="../../index.php">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  
</head>

<body class="hold-transition register-page">
<div class="register-box">
	<div id="dispresult"></div>
	<div id="dispError" style="color:red;"></div>
  <div class="register-logo">
    <a href="KSJI_DB/pages/examples/register.php"><b>""</b> ""</a>
  </div>

  <div class="register-box-body">
  
    <p class="login-box-msg">Register a New User</p>

    <form action="register.php" method="Post">
	<?php 
		error_reporting(0);
	include('errors.php'); 
	?> 
	<div id="displayerrormsghere"></div>
      <div class="form-group has-feedback">
        <input type="text" id="Fullname" name= "Fullname" class="form-control" placeholder="Fullname"/>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
		<div id="fnameError" style="color:red;"></div>
      </div>
      
	  <div id="displayerrormsghere"></div>
	  <div class="form-group has-feedback">
        <input type="Username" id="Username" name= "Username" class="form-control" placeholder="Username"/>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
		<div id="unameError" style="color:red;"></div>
      </div>
	  
      <div class="form-group has-feedback">
        <input type="password" id="Password" name= "Password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		<div id="passwordError" style="color:red;"></div>
      </div>
	  
      <div class="form-group has-feedback">
        <input type="password" id="Confirm_Password" name= "Confirm_Password" class="form-control" placeholder="Confirm Password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
		<div id="password2Error" style="color:red;"></div>
      </div>
	  

				  
      <div class="row">
        <div class="col-xs-6">
          <div class="checkbox icheck">
            
			
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <a href="../examples/index.php"><button type="submit" id="reg_btn" name= "reg_btn"  class="btn btn-primary btn-block btn-flat">Register</button></a>
		</div>
        <!-- /.col -->
      </div>
    </form>
	
	
	

	
    <a href="../examples/login.php" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script>
	$("document").ready(function(){
		$("#reg_btn").click(function(e){
			e.preventDefault();
			var fullname = $("#Fullname").val();
			var username = $("#Username").val();
			var password1 = $("#Password").val();
			var password2 = $("#Confirm_Password").val();
			if(fullname ==""){
				$("#fnameError").text("Fullname cant be Empty");
			}else{
				$("#fnameError").text("");
			}if(username ==""){
				$("#unameError").text("Username cant be Empty");
			}else{
				$("#unameError").text("");
			}if(password1 ==""){
				$("#passwordError").text("Password cant be Empty");
			}else{
				$("#passwordError").text("");
			}if(password2 ==""){
				$("#password2Error").text("Password Confirm cant be Empty");
				return false;				
			}else{
				$("#password2Error").text("");
			}
			$.ajax({
				url: 'server.php',
				method: 'POST',
				data: {register: 1, fullname: fullname, username: username, password1: password1, password2: password2},
				success: function(data){
					if(data.match("fullname")){
						$("#displayerrormsghere").html('<div class="alert alert-danger"><h4><i class="icon fa fa-warning"></i> <strong> Alert! </strong> <br></h4> <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>Fullname Already Exist</div>');
					}else if(data.match("username")){
						$("#displayerrormsghere").html('<div class="alert alert-danger"><h4><i class="icon fa fa-warning"></i> <strong> Alert! </strong> <br></h4> <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>Username Already Exist</div>');
					}else if(data.match("notmatch")){
						$("#password2Error").text("Password Does not Match");
					}else if(data.match("successfully")){
						$("#dispresult").html('<div class="alert alert-success" <h2><i class="icon fa fa-check"></i> <strong> Feedback! </strong> <br> </h2> <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a> You Have Successfully Been Registered <br><a href="login.php" class="btn btn-info">Login</a> </div>');
					}else{
						if(data.match("FirstNameE")){
						 $("#fnameError").text("Fullname cant be Empty");
						}if(data.match("UserNameE")){
						$("#unameError").text("Username cant be Empty");
						}if(data.match("PasswordE")){
						$("#passwordError").text("Password cant be Empty");
						}else{
							$("#dispError").html(data);
						}						
					}
				}
			});
		});
	});
</script>
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