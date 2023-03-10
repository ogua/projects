 <?php
			       if(isset($_POST['send'])){
				       include_once('db.php');
					  $sql = "SELECT * FROM `admin` WHERE `username` =  '".$_POST['EAdd']."'";
					  $query = mysqli_query($conn,$sql);
					  $result = mysqli_num_rows($query);
					  if($result > 0){
						  $curr = $_POST['psw'];
						  $rcurr = $_POST['psw2'];
						  $pass = password_hash($curr, PASSWORD_DEFAULT);
						  if(PASSWORD_VERIFY($rcurr, $pass)){
							  $sql2 = "UPDATE `admin` SET `password` = '$curr' WHERE `username` = '".$_POST['EAdd']."' ";
							  $query2 = mysqli_query($conn,$sql2);
							  if($query2){
								   echo'							
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Password Reset Successful!</strong>
				
					</div>
						   ';
							  }
						  }else{
							   echo'
						  <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
		PASSWORD DOES NOT MATCH. TRY AGAIN
		</strong></div>
						  ';
						  }
					  }else{
						  echo'
						  <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
		EMAIL DOES NOT EXIT. CHECK AND TRY AGAIN
		</strong></div>
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
     <div class="col-sm-5 col-sm-offset-3" style="margin-top:170px;">
	                                      <h3 style="padding:20px;font-size:60px;color:white;text-align:center;font-family:Tahoma;">Reset Password</h3>
		<form method="post" action="">
			<div class="form-group">
				<input class="form-control" style="color:#42327a;"type="text" name="EAdd" id="EAdd" placeholder="ENTER YOUR USERNAME" required />
			</div>
			<div class="form-group">
				<input class="form-control" style="color:#42327a;" type="password" name="psw"  id="psw"" placeholder="PASSWRORD" required />
			</div>
			<div class="form-group">
				<input class="form-control" style="color:#42327a;" type="password" name="psw2"  id="psw2"" placeholder="CONFIRM PASSWORD" required />
			</div>			       
			<input type="submit" name="send" style="margin-right:20px;background-color: #d8bc35;border-color: #d8bc35;" id="send" class="btn btn-success pull-right"value="Reset" />
		</form>
		
	 </div>
</body>
</html>