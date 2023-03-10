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
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">

</head>
<body class="back">
		      <h1 class="text-center">SuperMarket Billing System</h1> 
			  
			  <?php
			       if(isset($_POST['send'])){
				       include_once('db.php');
					  $sql = "SELECT * FROM `cashier` WHERE `Email` =  '".$_POST['emadd']."'";
					  $query = mysqli_query($conn,$sql);
					  $result = mysqli_num_rows($query);
					  if($result > 0){
						  if(!preg_match('/^.*(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}/i', $_POST['cashidpass']))
						{
			echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed! Password must be at least 6 characters and must contain at least one digit</strong></div>';	
				}else{
					$curr = $_POST['npass'];
						  $rcurr = $_POST['rcpass'];
						  $pass = password_hash($curr, PASSWORD_DEFAULT);
						  if(PASSWORD_VERIFY($rcurr, $pass)){
							  $sql2 = "UPDATE `cashier` SET `password` =  '$rcurr' WHERE `Email` =  '".$_POST['emadd']."' ";
							  $query2 = mysqli_query($conn,$sql2);
							  if($query2){
								   echo'							
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Password Reset Successful!</strong>
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
							  }
						  }else{
							   echo'
						  <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
		PASSWORD DOES NOT MATCH. TRY AGAIN
		</strong></div>
						  ';
						  }
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
			  <div class="col-sm-8 col-sm-offset-2" style="margin-top:160px;">
			                              <h1 style="color:white;border-top:5px solid black; border-bottom:5px solid black;text-align:center;font-family:Roboto;padding:10px;">Password Reset</h1>
						<form method="post" action="">
								<div class="form-group">
										<input type="email" class="form-control" name="emadd" placeholder="Email Address" required/>
								</div>
								<div class="form-group">
										<input type="password" class="form-control"  name="npass" placeholder="New Password" required/>
								</div>
								<div class="form-group">
										<input type="password" class="form-control"  name="rcpass" placeholder="Repeat Password" required/>
								</div>
								
								<div class="form-group">
										<input type="submit" name="send" class="btn btn-success pull-right" value="Reset"/>
								</div>
						</form>
			  </div>
			  <div class="load" >
			   <p><span class="loads">Redirecting........ PLease Wait</span><span class="load2">Connecting.......... PLease Wait</span><span class="load3">Loading................ Data</span></p>
			        <img id="img" src="images/Preloader_6.gif"/>
			  </div>
</body>
</html>