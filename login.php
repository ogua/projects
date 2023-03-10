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
  background-image: url("images/official-banner.jpg");
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
<?php
	if(isset($_POST['send'])){
	   include('db.php');
	  if($_POST['role'] =="Admin"){
		  $sql = "SELECT * FROM `admin` WHERE `email` = '".$_POST['username']."' ";
		  $query = mysqli_query($conn,$sql);
		  if($query){
			  $row = mysqli_fetch_array($query);
			  $passdord = $row['password'];
			  if(password_verify($_POST['pass'],$passdord)){
				  session_start();
				  $_SESSION['id'] = $row['id'];
				  $_SESSION['name'] = $row['fullname'];
				  header("location:admin.php"); 
			  }else{
				  echo'<script>alert("Email or Password Incorrect");</script>';
			  }
		  }else{
			  echo'<script>alert("Email or Password Incorrect");</script>';
		  }
	  }else{
		  $sql = "SELECT * FROM `airtest` WHERE `email` = '".$_POST['username']."'";
		  $query = mysqli_query($conn,$sql);
		  if($query){
			  $row = mysqli_fetch_array($query);
			  $passdord = $row['password'];
			  if(password_verify($_POST['pass'],$passdord)){
				  session_start();
				  $_SESSION['id'] = $row['id'];
				  $_SESSION['name'] = $row['fullname'];
				  header("location:atrtistpage.php"); 
			  }else{
				  echo'<script>alert("Email or Password Incorrect");</script>';
			  }
		  }else{
			  echo'<script>alert("Email or Password Incorrect");</script>';
		  }
	  }
	}
?>
<body class="back">
		<ul class="list-inline pull-right" style="margin-top:10px;">
						<li>
							<a href="index.php" style="color:white;">Home</a>
						</li>
						<li class="active">
							<a href="about.php" style="color:white;">About</a>
						</li>
						<li>
							<a href="artistsignUp.php" style="color:white;">Artist SignUp</a>
						</li>
						<li>
							<a href="book.php" style="color:white;">Book Artist</a>
						</li>
						<li>
							<a href="gallery.php" style="color:white;">Gallery</a>
						</li>
						<li>
							<a href="contact.php" style="color:white;">Contact Us</a>
						</li>
						<li>
							<a href="login.php" style="color:white;">Login</a>
						</li>
						<div class="clear"></div>
					</ul>
     <div class="col-sm-6 col-sm-offset-3" style="margin-top:140px;">
	                                      <h3 style="padding:20px;font-size:60px;text-align:center;color:white;font-family:Tahoma;">Login</h3>
		<form method="post" action="">
			<div class="form-group">
				<input class="form-control" style="color:#42327a;" type="text" name="username" id="username" placeholder="Email Address" required />
			</div>
			<div class="form-group">
				<input class="form-control" style="color:#42327a;" type="password" name="pass"  id="psw" placeholder="PASSWRORD" required />
			</div>
			<div class="form-group">
				<select name="role" class="form-control">
					<option value="">Select Role</option>
					<option value="Admin">Admin</option>
					<option value="Artist">Artist</option>
				</select>
			</div>
			<!----<label><a href="password.php" style="text-decoration:none;">Forget Password ?</a></label>	----->		       
			<input type="submit" name="send" style="margin-right:20px;background-color: #d8bc35;border-color: #d8bc35;" id="send" class="btn btn-success pull-right"value="Login" />
		</form>
	 </div>
</body>
</html>