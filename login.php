<?php
	session_start();
	if(isset($_SESSION['id'])){
	   header("location: account.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Online Car Parking System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<style>
		.require{
			color:red;
		}
		.back{
  background-image: url("dist/img/joey-banks-391210-unsplash.jpg");
background-size:cover;
background-image: no-repeat;
}
	</style>

  </head>
  <body class="back">
	<div class="col-sm-8 col-sm-offset-2" style="margin-top:20px;">
		<div class="" style="background-color:#fff;padding:10px;border-radius:20px;">
			<ul class="list-inline">
				<li><a href="index.php">Home</a></li>
				<li style="background-color:#ccc;padding:20px;"><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<li><a href="contact.php">Contact Us</a></li>
			</ul>
			<h2 class="text-success">Online Car Park Booking</h2>
		</div>
	             
	 </div>
	 <div class="container-fluid" style="background-color:#ccc;" >
		
	 </div>
     <div class="col-sm-6 col-sm-offset-3" style="margin-bottom:50px;">
		<?php
			if(isset($_POST['send'])){
				include_once("db.php");
			$sql = "SELECT * FROM `users` WHERE `username` = '".$_POST['EAdd']."' AND `role` = '".$_POST['userolr']."' ";
			$query = mysqli_query($conn,$sql);
			$result = mysqli_num_rows($query);
			if($result > 0){
				$row = mysqli_fetch_array($query);
				$passwrd = $row['password'];
				$id = $row['id'];
				$name = $row['fullname'];
				$image = $row['image'];
				$phone = $row['phone'];
				$email = $row['email'];
				$passveri = $_POST['psw'];
				if(!PASSWORD_VERIFY($passveri, $passwrd)){
					echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
			        UserName or Password Incorrect 1
					</strong></div>';
				}else{
					$_SESSION['id'] = $id;
					$_SESSION['name'] = $name;
					$_SESSION['phone'] = $phone;
					$_SESSION['email'] = $email;
					$_SESSION['image'] = $image;
					$_SESSION['role'] = $_POST['userolr'];
					if($_POST['userolr'] == "Admin"){
						echo'
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Login Successfully<br></strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "admin.php";
						function countDown(){
  							 var timer =document.getElementById("timer");
   						 if(count > 0){
     				   count--;
        				timer.innerHTML = "<B>Saving Info redirecting in </b>"+count+" <b>seconds.</b><br>";
       			 setTimeout("countDown()", 1000);
   				 }
			else{
        window.location.href = redirect;
   				 }
					}
				</script>
				<span id="timer">
		<script type="text/javascript">countDown();</script>
					</span>
					</div>'
			;
					}else{
					echo'
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Login Successfully<br></strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "Bookprg.php";
						function countDown(){
  							 var timer =document.getElementById("timer");
   						 if(count > 0){
     				   count--;
        				timer.innerHTML = "<B>Saving Info redirecting in </b>"+count+" <b>seconds.</b><br>";
       			 setTimeout("countDown()", 1000);
   				 }
			else{
        window.location.href = redirect;
   				 }
					}
				</script>
				<span id="timer">
		<script type="text/javascript">countDown();</script>
					</span>
					</div>'
			;
					}
				}
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
			        UserName or Password Incorrect 2
					</strong></div>';
			}	
			
			}
		?>
	             <h3 style="padding:20px;font-size:60px;color:white;text-align:center;font-family:Tahoma;border-top:8px solid #ccc;border-bottom:8px solid #ccc;">Login</h3>
		<form method="post" action="">
			<div class="form-group">
				<input class="form-control" style="color:#42327a;"type="text" name="EAdd" id="EAdd" placeholder="ENTER YOUR Username" required />
			</div>
			<div class="form-group">
				<input class="form-control" style="color:#42327a;" type="password" name="psw"  id="psw"" placeholder="PASSWRORD" required />
			</div>
			<div class="form-group">
				<select name="userolr" class="form-control" required>
					<option value="">Select User Role</option>
					<option value="Customer">Customer</option>
					<option value="Admin">Admin</option>
				</select>
			</div>	
			<a href="reset.php">Forgotton Paasword ?</a>
			<input type="submit" name="send" style="margin-right:20px;background-color: #d8bc35;border-color: #d8bc35;" id="send" class="btn btn-success pull-right"value="Login" />
		</form>
		
	 </div>
</body>
</html>
