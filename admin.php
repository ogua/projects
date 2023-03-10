<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>:: Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">  <!-- Optional Bootstrap theme -->
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  
  <!-- jQuery -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<style>
.back{
  background-image: url("images/samuel-zeller-113381.jpg");
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
<?php
    error_reporting(0);
      include('db.php');
	session_start();
	if(isset($_POST['send'])){
	$fname = $_POST['fuser'];
	$oname = $_POST['fother'];
	if(filter_var($fname, FILTER_VALIDATE_INT)){
		echo' <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Firstname cant contain numbers!</strong>
	</div> ';
	}else if(filter_var($oname, FILTER_VALIDATE_INT)){
echo' <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Othernames cant contain numbers!!</strong>
</div> ';
	}else{
		$sql = "INSERT INTO `Employee`(`firstname`, `Lastname`, `Username`, `Gender`, `Age`, `Dateofbirth`, `Department`, `Status`, `password`) VALUES ('".$_POST['fname']."','".$_POST['fother']."','".$_POST['fuser']."','".$_POST['gende']."','".$_POST['fage']."','".$_POST['fdateob']."','".$_POST['roles']."','".$_POST['statu']."','".$_POST['fpass']."') ";
	  $query = mysqli_query($conn,$sql);
      if($query){
		 $sql2 = "INSERT INTO `login`(`username`, `password`, `role`) VALUES ('".$_POST['fuser']."','".$_POST['fpass']."', '".$_POST['roles']."')";
		$query2 = mysqli_query($conn,$sql2);
		 echo '		     
			<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Details Saved Successfully. please Login with your Username and Password!</strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "admin.php";
						function countDown(){
  							 var timer =document.getElementById("timer");
   						 if(count > 0){
     				   count--;
        				timer.innerHTML = "<B>reloading page in </b>"+count+" <b>seconds.</b><br>";
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
		echo'
			<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed to Insert Data Try again Later</strong></div> 
		';
	  }
	}
	  
	}
	if(isset($_POST['logout'])){
		session_destroy();
		header("location:index.php");
	}
	if(isset($_POST['searchU'])){
	$sql = "SELECT * FROM `employee` WHERE `Username` = '".$_POST['fname']."' and `Department` = '".$_POST['roles']."' ";
	  $query = mysqli_query($conn,$sql);
	  $result = mysqli_num_rows($query);
	  if($result > 0){
		$rows = mysqli_fetch_array($query);
		$_SESSION['unmane'] = $rows['Username'];
		$_SESSION['unrole'] = $rows['Department'];
	  }else{
					echo '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>USER DONT EXIT</strong> </div>';

	  }
	}
	if(isset($_POST['resetpas'])){
		$pass2 = $_POST['psw2'];
		//if(strlen($pass2 < 8)){
					//echo '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>password Should be more than eight Characters</strong>';
					//exit();
		//}
	   $kofi =  password_hash($pass2, PASSWORD_DEFAULT);
       if(password_verify($_POST['pwrd2'], $kofi )){
		    $sql = "UPDATE `login` SET `password` = '".$_POST['pwrd2']."' WHERE `username` =  '".$_SESSION['unmane']."' and role = '".$_SESSION['unrole']."' ";
	  $query = mysqli_query($conn,$sql);
	    if($query){
							echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>password Reset Successfully. Current password is <h1>'.$pass2.'</h1></strong> </div>';

		}
	}else{
					echo '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>password does not match, check and Retype Password Again</strong> </div>';

		}
	}
?>
       <h1 class="text-center">Admin</h1>
	   	 <img class="img-rounded"src="images/UPSA.png" height="100" width="100"alt="upsa image" style="position:absolute;margin-left:20px;">

	   <form method="post" action="" >
	   
	    <div class="form-group pull-right" style="margin-right:20px;">
		      <div class="col-sm-9">
					 <label style="font-size:20px;color:white;">Welcome: <?php echo $_SESSION['name']; ?></label>
			  </div>
			  <div class="col-sm-3">
				<input type="submit" style="background-color: #d8bc35;border-color: #d8bc35;" name="logout" id="logout" class="btn btn-success"value="logout" />
				</div>
	   </div>
	   </form>
	   
	    <div class="clearfix"></div>
        <div class="row" style="margin-top:50px;margin-left:20px;margin-right:20px;margin-bottom:30px;">
				<div class="col-sm-4" style="background-color: #42327a;border-color: #42327a;height:400px;">
				           <ul style="list-style:none;margin-top:120px;">
                                      <li><a href="admin.php"><button style="width:200px;"type="button" class="btn btn-sm btn-success">Add User</button></a></li>
                                       <li><a href="viewuser.php"><button style="width:200px;margin-top:10px;"type="button" class="btn btn-sm btn-success">View Users Information</button></a></li>
									   <li><a href="reseetpass.php"><button style="width:200px;margin-top:10px;"type="button" class="btn btn-sm btn-success">Reset Password</button></a></li>
						             <li><a href="deletuser.php"><button style="width:200px;margin-top:10px;"type="button" class="btn btn-sm btn-success">Delete User</button></a></li>
									 <li><a href="generatereport.php"><button style="width:200px;margin-top:10px;"type="button" class="btn btn-sm btn-success">Generate Report</button></a></li>
                           </ul>                 

				</div>
				<div class="col-sm-8"style="background-color: #d8bc35;border-color: #d8bc35;">
      <h3>Add User</h3>
	    <form method="post" action="">
                     <div class="form-group">
				                <input class="form-control"type="text" name="fname" id="username" placeholder="FIRSTNAME" required />
			         </div>
					 <div class="form-group">
				                <input class="form-control"type="text" name="fother" id="username" placeholder="OTHER NAMES" required />
			         </div>
					 <div class="form-group">
				                <input class="form-control"type="text" name="fuser" id="username" placeholder="USERNAME" required />
			         </div>
					 <div class="form-group">
				                <input class="form-control"type="password" name="fpass" id="psw" placeholder="PASSWORD" required />
			         </div>
					 <div class="form-group">
				            <select class="form-control" name="gende" style="width:200px">
				                   <option value="">Select Gender</<option>
				                   <option value="Male">Male</<option>
				                   <option value="Female">Female</<option>
				            </select>
			          </div>
					 <div class="form-group">
				                <input type="number" class="form-control" name="fage" id="username" placeholder="AGE" required />
			         </div>
					 <label>Date of Birth</label>
					 <div class="form-group">
				                <input class="form-control"type="date" name="fdateob" id="username" placeholder="DATE OF BIRTH" required />
			         </div>
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
								<div class="form-group">
										<select class="form-control" name="statu" style="width:200px">
											   <option value="">Select Status</<option>
											   <option value="Male">Married</<option>
											   <option value="Female">Single</<option>
										</select>
								  </div>
		                <input class="btn btn-lg btn-success pull-right" type="submit"  name="send" id="send" value="Add User" />
			</form>
    <div id="sectionB" class="tab-pane fade">
      <h3>Users Information</h3>
	        <?php
			  include('db.php');
			  $sqli3 = "SELECT * FROM `employee`";
			  $query3 = mysqli_query($conn,$sqli3);
			  if($query3){
				  echo'
				  <div class="table-responsive" >
				 <table class="table table-striped"  cellpadding="10" border="1" style="margin-left:10px; ">
	            <tr>
			   <th style="color:#5cb85c;font-weight:bold;">FIRSTNAME</th>
			   <th style="color:#5cb85c;font-weight:bold;">OTHER NAMES</th>
			    <th style="color:#5cb85c;font-weight:bold;">USERNAME</th>
				<th style="color:#5cb85c;font-weight:bold;">GENDER</th>
				<th style="color:#5cb85c;font-weight:bold;">AGE</th>
				<th style="color:#5cb85c;font-weight:bold;">DATE OF BIRTH</th>
				<th style="color:#5cb85c;font-weight:bold;">DEPARTMENT</th>
				<th style="color:#5cb85c;font-weight:bold;">STATUS</th>
		   <tr>
		   <tbody>
				  ';
				  while($row = mysqli_fetch_array($query3)){
					  echo'
					   <tr>
				    <td style="color:#42327a;">'.$row['firstname'].'</td> 
					 <td style="color:#d8bc35;">'.$row['Lastname'].'</td>
                    <td style="color:#42327a;">'.$row['Username'].'</td> 
					 <td style="color:#d8bc35;">'.$row['Gender'].'</td> 
                        <td style="color:#42327a;">'.$row['Age'].'</td> 
					 <td style="color:#d8bc35;">'.$row['Dateofbirth'].'</td> 
                     <td style="color:#42327a;">'.$row['Department'].'</td> 
					 <td style="color:#d8bc35;">'.$row['Status'].'</td> 					 
				<tr>
					  ';
				  }
				  echo'
				     </tbody>
	   </table>		  
    </div>
				  ';
			  }else{
				  
			  }
	         
			   
		   
	          ?>
  </div>
  <div id="sectionC" class="tab-pane fade">
   <form method="post" action="">
		<ul class="list-inline" style="margin-top:30px;">
			<li> <div class="form-group">
				                <input class="form-control form-sm"type="text" name="fname" id="fname" placeholder="ENTER USERNAME" required style="widtg:500px;" />
			         </div></li>
					 <li> <div style="color:#42327a;width:200px;" class="form-group">
                                   <select name="roles"class="form-control">
									  <option value="">Select Department</option>
									   <option value="Doctor">Doctor</option>
									  <option value="Lab">Lab Technician</option>
                                     <option value="Nurse">Nurse</option>		
                                    <option value="Pharmacist">Pharmacist</option>
							<option value="Cashier">Cashier</option>
                                   <option value="Admin">Admin</option>											
									</select>								
								</div></li>
			<li>		              <input class="btn btn-sm btn-success" type="submit"  name="searchU" id="searchU" value="Search User" />
</li>
		</ul>                 
			</form>
					<?php if($display ==""){echo '';}else{echo $display; }?>
					 <form method="post" action="">
                     <div class="form-group">
				                <input class="form-control"type="text" value="<?php echo $rows['firstname'] ?>"name="fname" id="username" placeholder="FIRSTNAME" required />
			         </div>
					  <div class="form-group">
				                <input class="form-control"type="text"  value="<?php echo $rows['Lastname'] ?>" name="fname" id="username" placeholder="OTHERNAMES NAME"  required/>
			         </div>
					  <div class="form-group">
				                <input class="form-control"type="password" name="psw2" id="psw2" placeholder="New Password" required />
			         </div>
					  <div class="form-group">
				                <input class="form-control"type="password" name="pwrd2" id="pwrd2" placeholder="Confirm Password" required />
			         </div>
		              <input class="btn btn-sm btn-success pull-right" type="submit"  name="resetpas" id="resetpas" value="Reset Password" />
			</form>
			<div class="clearfix"></div>
						
			<div id="message2" style="margin-left:30px;">
				<h3>Password must contain the following:</h3>
				<p id="letter2" class="invalid">A <b>lowercase</b> letter</p>
				<p id="capital2" class="invalid">A <b>capital (uppercase)</b> letter</p>
				<p id="number2" class="invalid">A <b>number</b></p>
				<p id="length2" class="invalid">Minimum <b>8 characters</b></p>
			</div>
				
<script>
var myInput = document.getElementById("psw2");
var letter = document.getElementById("letter2");
var capital = document.getElementById("capital2");
var number = document.getElementById("number2");
var length = document.getElementById("length2");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message2").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message2").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
	</div>
	
			</div>
		
		<script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		 <script src="jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>
<script>
$("document").ready(function(){
	 function gettable(){
		 $.ajax({
			 url: 'del.php',
			 method: 'post',
			 success: function(data){
				 $("#getta").html(data);
			 }
		 });
	 }
	 gettable();
	 $("body").delegate(".delekey", "click", (function(event){
		  event.preventDefault();
		 var cid = $(this).attr("cid");
		 $.ajax({
			 url: 'delq.php',
			 method: 'post',
			 data: {cid: cid},
			 success: function(data){
				gettable();
			 }
		 });
	 }));
})
</script>
</body>
</html>