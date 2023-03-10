
<?php

//REGISTER FORM HANDLER

Session_start ();

// initializing variables
$Fullname = "";
$Username = "";
$Password = "";
$Confirm_Password = "";
$errors = array();

// connect to the database
Include_once "connection.php";

// Register user
if (isset($_POST['reg_btn'])) {

 // Receive all input values from the form
$Fullname = mysqli_real_escape_string($Connection, $_POST['Fullname']);
$Username = mysqli_real_escape_string($Connection, $_POST['Username']);
$Password = mysqli_real_escape_string($Connection, $_POST['Password']);
$Confirm_Password = mysqli_real_escape_string($Connection, $_POST['Confirm_Password']);

// form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  
 if (empty($Fullname)) { array_push($errors, "Fullname is required"); }
  if (empty($Username)) { array_push($errors, "Username is required"); }
   if (empty($Password)) { array_push($errors, "Enter Password"); }
    if (empty($Confirm_Password)) { array_push($errors, "Confirm Password"); }
	if ($Password != $Confirm_Password) {
	array_push($errors, "The two passwords do not match");
	}
	
	
	
	
	// first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM register WHERE Fullname='$Fullname' OR Username='$Username' LIMIT 1";
  $result = mysqli_query($Connection, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Fullname'] === $Fullname) {
      array_push($errors, "Fullname already exists");
    }

    if ($user['Username'] === $Username) {
		echo '<div class="alert alert-primary"><h4><i class="icon fa fa-warning"></i> <strong> Alert! </strong> <br></h4> <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>Username Already Exist <br> <a href="register.php" class="btn btn-warning">OK</a></div>';
    }
  }
  

 // Finally, register user if there are no errors in the form
  
  if (count($errors) == 0) {
  	$Password = md5($Confirm_Password);//encrypt the password before saving in the database
	


  	$query = "INSERT INTO register (Fullname, Username, Password)
  			  VALUES('$Fullname', '$Username', '$Password')";
  }
  

			  
if($query){
		 echo '<div class="alert alert-success" <h2><i class="icon fa fa-check"></i> <strong> Feedback! </strong> <br> </h2> <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a> You Have Successfully Been Registered <br><a href="login.php" class="btn btn-info">Login</a> </div>';
	 }else{
		 echo '<div class="alert alert-danger"><h4><i class="icon fa fa-warning"></i> <strong> Alert! </strong> <br></h4> <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>Failed something went wrong try again <br> <a href="register.php" class="btn btn-warning">OK</a></div>';
	 }
	 }
  	
  	


//LOGIN SERVER HANDLER

if (isset($_POST['sign_btn'])) {
 
  
  if (empty($Username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($Password)) {
  	array_push($errors, "Password is required");
  }
  
  if (count($errors) == 0) {
  	$Password = md5($Password);
  	$query = "SELECT * FROM 'register' WHERE Username='$Username' AND Password='$Password'";
  	$results = mysqli_query($Connection, $query);
  	
	if($result == 1){
		 session_start();
		$_SESSION['username'] = $Username;
		echo'
		<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Login Successful!</strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "index.php";
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
					</div>
		';
	 }else{
		 		echo
				
				'<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong></strong>Username or password in correct, Failed to login</div> </div>';	 }
 }
  }

?>


