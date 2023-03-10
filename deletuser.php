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
				              <div class="tab-content">
    <div id="sectionD" class="tab-pane fadein active">
		   <div style="margin-top:30px;">
		      <h3>Delete Users</h3>
		   <div id="getta"></div>
	</div>	</div>
				</div>
		</div>
		
		<script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		 <script src="jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>
		 <script type="text/javascript">
  $(document).ready(function()
  {
    $("#myTab li:eq(1) a").tab('show');
  });
  </script>
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