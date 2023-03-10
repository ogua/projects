<?php
	if(isset($_POST['send'])){
	   include('db.php');
	   $roll = $_POST['roles'];   
	  $sql = "SELECT * FROM `Login` WHERE `username` = '".$_POST['username']."' and `password` = '".$_POST['pass']."' and `role` = '".$_POST['roles']."' ";
	  $query = mysqli_query($conn,$sql);
	  $result = mysqli_num_rows($query);
      if($result){
		  session_start();
		  $_SESSION['name'] = $_POST['username'];
		if($roll == 'Doctor'){
			header("location:doctor.php");
		}if($roll == 'Lab'){
			header("location:lab.php");
		}if($roll == 'Nurse'){
			header("location:nurse.php");
		}if($roll == 'Pharmacist'){
			header("location:pharma.php");
		}if($roll == 'Admin'){
			header("location:admin.php");
		}if($roll == 'Cashier'){
			header("location:Cashier.php");
		}
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
<title>:: CLINIC LOGIN PAGE</title>
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
  background-image: url("images/hush-naidoo-382152.jpg");
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
	 <img style="border-radius:100px;margin-top:60px;" class="img-rounded" src="images/UPSA.png" height="100" width="100"alt="upsa image" style="margin-top:20px;">
     <div class="col-sm-8 col-sm-offset-2" style="margin-top:170px;">
	                                      <h3 style="padding:20px;font-size:60px;color:white;text-align:center;border-top:4px solid #42327a;border-bottom:4px solid #42327a;font-family:Tahoma;">Login</h3>
		<form method="post" action="">
			<div class="form-group">
				<input class="form-control" style="color:#42327a;"type="text" name="username" id="username" placeholder="USERNAME" required />
			</div>
			<div class="form-group">
				<input class="form-control" style="color:#42327a;" type="password" name="pass"  id="psw" placeholder="PASSWRORD" required />
			</div>
			<label><a href="password.php" style="text-decoration:none;">Forget Password ?</a></label>
			                 <div style="color:#42327a;width:200px;" class="form-group">
                                   <select name="roles"class="form-control">
									  <option value="">Select Department</option>
									   <option value="Doctor">Doctor</option>
									  <option value="Lab">Lab Technician</option>
                                     <option value="Nurse">Nurse</option>		
                                    <option value="Pharmacist">Pharmacist</option>
							<option value="Cashier">Cashier</option>
                                  <option value="Admin">Admin</option>									
									</select>								
								</div>
			<input type="submit" name="send" style="margin-right:20px;background-color: #d8bc35;border-color: #d8bc35;" id="send" class="btn btn-success pull-right"value="Login" />
		</form>
		
	 </div>
</body>
</html>