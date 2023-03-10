<?php
		Include_once "connection.php";
	if(isset($_POST['register'])){
		// connect to the database		
		//check if its empty
		
	if($_POST['fullname'] =="" || $_POST['username'] == "" || $_POST['password1'] ==""){
		if($_POST['fullname'] ==""){
			echo "FirstNameE";
		}if($_POST['username'] ==""){
			echo "UserNameE";
		}if($_POST['password1'] ==""){
			echo "PasswordE";
		}
		exit;
	}
		// Receive all input values from the form
		$Fullname = mysqli_real_escape_string($Connection, $_POST['fullname']);
		$Username = mysqli_real_escape_string($Connection, $_POST['username']);
		$Password = mysqli_real_escape_string($Connection, $_POST['password1']);
		$Confirm_Password = mysqli_real_escape_string($Connection, $_POST['password2']);
		
		// first check the database to make sure 
		  // a user does not already exist with the same username and/or email
		  $user_check_query = "SELECT * FROM register WHERE Fullname='$Fullname' OR Username='$Username' LIMIT 1";
		  $result = mysqli_query($Connection, $user_check_query);
		  $user = mysqli_fetch_assoc($result);
		  
		  if ($user) { // if user exists
			if ($user['Fullname'] === $Fullname) {
			   echo"fullname";
			}

			if ($user['Username'] === $Username) {
				echo"username";
			}
		  }else{
			  
			  if($Password  != $Confirm_Password){
				 echo "notmatch"; 
				 exit;
			  }
			  $Password = md5($Confirm_Password);
			  //encrypt the password before saving in the database
  	        $sql = "INSERT INTO register (Fullname, Username, Password)
  			 VALUES('$Fullname', '$Username', '$Password')";
			 $query = mysqli_query($Connection,$sql);
			 if($query){
			echo '
				`successfully
			';
			}else{
			echo '<div class="alert alert-danger"><h4><i class="icon fa fa-warning"></i> <strong> Alert! </strong> <br></h4> <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>Failed something went wrong try again <br> <a href="register.php" class="btn btn-warning">OK</a></div>';
			}
		  }
		  
		  
		
	}
	if(isset($_POST['login'])){
		if($_POST['username'] =="" || $_POST['pass'] == ""){
			if($_POST['username'] ==""){
				echo "userNameE";
			}if($_POST['pass'] ==""){
				echo "passE";
			}
			exit;
		}
	$Username = mysqli_real_escape_string($Connection, $_POST['username']);
	$Password = mysqli_real_escape_string($Connection, $_POST['pass']);
	$md5pass = md5($Password);
	$sql = "SELECT `Username`, `Password` FROM `register` WHERE `Username` = '$Username' and `Password` = '$md5pass'";
	$res = mysqli_query($Connection,$sql);
	$result = mysqli_num_rows($res);
	if($result == 1){
		session_start();
		$_SESSION['username'] = $_POST['username'];
		echo"successfully";
	}else{
		echo"Failed";
	}
	}
?>