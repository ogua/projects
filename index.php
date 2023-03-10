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
<body class="back bg-danger" style="height:100%";>
		      <h1 class="text-center" style="color:white;">PHARMACY MANAGEMENT SYSTEM</h1> 
			  
			  <?php
				   if(isset($_POST['send'])){
					    include_once('db.php');
					    $uname = $_POST['Cuser'];
					    $pname = $_POST['Cpass'];
					    $prole = $_POST['roles'];
						$sql = "SELECT * FROM `users` WHERE `email` = '$uname' AND `role` = '$prole' ";
						$query = mysqli_query($conn,$sql);
						$result = mysqli_num_rows($query);
						if($result > 0){
							$row = mysqli_fetch_array($query);
							if(!password_verify($_POST['Cpass'],$row['password'])){
								echo'<div class="alert alert-danger text=-center"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>User Email or Password Dont Exit !</strong>';
							}else{
								if($prole == "PHARMACIST"){
									session_start();
									$_SESSION['name'] = $row['name'];
									$_SESSION['id'] = $row['id'];
									header("location:mainprog.php");
								}else{
									session_start();
									$_SESSION['name'] = $row['name'];
									$_SESSION['id'] = $row['id'];
									header("location:admin.php");
								}
							}
						}else{
							echo'<div class="alert alert-danger text=-center"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>User Email or Password Dont Exit !</strong>';
						}
				   }
				   
				   
				   
			   ?>
			  <div class="col-sm-8 col-sm-offset-2" style="margin-top:160px;margin-bottom:80px;">
			                              <h1 style="color:white;border-top:5px solid white; border-bottom:5px solid white;text-align:center;font-family:Roboto;padding:10px;">login</h1>
						<form method="post" action="">
								<div class="form-group">
										<input type="text" class="form-control" name="Cuser" placeholder="Enter Your Email" required>
								</div>
								<div class="form-group">
										<input type="password" class="form-control"  name="Cpass" placeholder="Enter Password" required>
								</div>
								<!---<div class="form-group">
										<a class="text-default"href="passforgootton.php"><h4>Forgotten Password ?</h4></a>						
								</div>---->
								<div class="form-group" style="width:150px;">
                                     <select name="roles"class="form-control" required>
										<option value="">Choose Role</option>
											<option value="PHARMACIST">Pharmacist</option>
											<option value="ADMIN">Admin</option>											
										</select>								
								</div>
								<div class="form-group">
										<input type="submit" name="send" class="btn btn-success pull-right" value="Login"/>
								</div>
						</form>
			  </div>
			  <div class="load" >
			   <p><span class="loads">Redirecting........ PLease Wait</span><span class="load2">Connecting.......... PLease Wait</span><span class="load3">Loading................ Data</span></p>
			        <img id="img" src="images/Preloader_6.gif"/>
			  </div>
		<script type="text/javascript">
				$(document).ready(function(){
					$(.load).click(function(){
						var  redirect = "mainprog.php";
					$(".load").addClass("loadid");
					$("#img").fadeIn(20000);
					$(".load2").fadeIn(1000).fadeOut(10000);
					setTimeout(function(){
					$(".load3").fadeIn(6000).fadeOut(1000);
					},12000);
					setTimeout(function(){
						$(".loads").fadeIn(4000);
					},21000);
					setTimeout(function(){
						window.location.href = redirect;
				},24000);
					});
					
				});
				</script>		
</body>
</html>