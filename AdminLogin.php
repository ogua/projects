<?php
	if(isset($_POST['send'])){
	   include('db.php');
	  $sql = "SELECT * FROM `admin` WHERE `username` = '".$_POST['username']."' and `password` = '".$_POST['pass']."' ";
	  $query = mysqli_query($conn,$sql);
	  $result = mysqli_num_rows($query);
      if($result){
		  session_start();
		  $_SESSION['name'] = $_POST['username'];
			echo'
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Login Successful!</strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "admin.php";
						function countDown(){
  							 var timer =document.getElementById("timer");
   						 if(count > 0){
     				   count--;
        				timer.innerHTML = "<B>redirecting in </b>"+count+" <b>seconds.</b><br>";
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
		  		<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed to Login Check Username and Passwordl!</strong></div> 
		';
	  }
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>LOGIN PAGE</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=" />
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<style>
.back{
  background-image: url("images/freddie-marriage-92621.jpg");
background-size:cover;
background-image: no-repeat;
}
/* The message box is shown when the user clicks on the password field */
#message {
    display:none;
    background: #f1f1f1;
    color: #000;
    position: relative;
    padding: 20px;
    margin-top: 10px;
}

#message p {
    padding: 10px 35px;
    font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
    color: green;
}

.valid:before {
    position: relative;
    left: -35px;
    content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
    color: red;
}

.invalid:before {
    position: relative;
    left: -35px;
    content: "✖";
}
</style>
</head> 
<body class="back">
     <div class="col-sm-6 col-sm-offset-3" style="margin-top:170px;">
	                                      <h3 style="padding:20px;font-size:60px;text-align:center;color:white;font-family:Tahoma;">Login</h3>
		<form method="post" action="">
			<div class="form-group">
				<input class="form-control" style="color:#42327a;"type="text" name="username" id="username" placeholder="USERNAME" required />
			</div>
			<div class="form-group">
				<input class="form-control" style="color:#42327a;" type="password" name="pass"  id="psw"" placeholder="PASSWRORD" required />
			</div>
			<label><a href="password.php" style="text-decoration:none;">Forget Password ?</a></label>			       
			<input type="submit" name="send" style="margin-right:20px;background-color: #d8bc35;border-color: #d8bc35;" id="send" class="btn btn-success pull-right"value="Login" />
		</form>
		<div id="message">
  <h3>Password must contain the following:</h3>
	<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
	<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
	<p id="number" class="invalid">A <b>number</b></p>
	<p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
	 </div>
</body>
</html>