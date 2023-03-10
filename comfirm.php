<?php
	session_start();
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<!--mobile apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--mobile apps-->
<!--Custom Theme files-->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
<link href="css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" media="all">
<link href="css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="css/custom.css">
<!--//Custom Theme files-->
<!--//js-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/action.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/npm.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">

</head>
 <body>
		 <div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-header">
						<a href="index.php" class="navbar-brand">BookStore</a>
				</div>
				<ul class="nav navbar-nav">
						<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
						<li><a href="index.php"><span class="glyphicon glyphicon-model-home"></span>Products</a></li>
				</ul>
		 </div>
		 <p><br></p>
		 <p><br></p>
		 <p><br></p>
		 <div class="contaner-fluid">
				<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10" id="displayEr">
				<?php
						if(isset($_POST['check'])){
							include_once("db.php");
							$sql = "SELECT * FROM `users` WHERE `mobile` = '".$_POST['fname']."' and `pinCode` = '".$_POST['lname']."' ";
							$query = mysqli_query($conn,$sql);
							$result = mysqli_num_rows($query);
							if($result > 0){
								$row = mysqli_fetch_array($query);
								session_start();
								 $_SESSION['id'] = $row['id'];
		                         $_SESSION['name'] = $row['firstname'];
								echo'
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Successful!</strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "profile.php";
						function countDown(){
  							 var timer =document.getElementById("timer");
   						 if(count > 0){
     				   count--;
        				timer.innerHTML = "<B>Please wait </b>"+count+" <b>seconds.</b><br>";
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
								echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong>
								Incorrect phone number or pin </div>';
							}
						}
							
						?>
				</div>
				<div class="col-md-1"></div>
				</div>
				<div class="row">
						<div class="col-md-1">
						</div>
						<div class="col-md-10" style="margin-top:90px;">
								<div class="panel panel-info">
										<div class="panel-heading"><h2>Authorize</h2></div>
										<div class="panel-body">
										<form method="post" action="">
													<div class="row">
															<div class="col-md-6">
																	<label>Mobile Number</label>
																	<input type="text" class="form-control" value="<?php echo $_SESSION['num']; ?>"id="fname" name="fname" placeholder="Mobile Number" required>
															</div>
															<div class="col-md-6">
																	<label>Pin</label>
																	<input type="text" class="form-control" id="lname" name="lname" placeholder="Pin Code" required>
															</div>
													</div>
																																																																
										</div>
										<div class="panel-footer" style="height:50px;">
										<input type="submit" name="check" id="check" value="Confirm" class="btn btn-success btn-sm pull-right"/></div>
								<form>
								</div>
						</div>
						<div class="col-md-1"></div>
				</div>
		 </div>
		 <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('#btn1')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
 <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunctions() {
    document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('#btn2')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
 </body>
</html>