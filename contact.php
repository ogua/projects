<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>INdex || Contact Us </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<style>
		.require{
			color:red;
		}
		.back{
  background-image: url("dist/img/joey-banks-391210-unsplash.jpg");
background-size:cover;
background-image: no-repeat;
}
	</style>

  </head>
  <body class="back">
     <div class="col-sm-8 col-sm-offset-2" style="margin-top:20px;">
		<div class="" style="background-color:#fff;padding:10px;border-radius:20px;">
			<ul class="list-inline">
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<li style="background-color:#ccc;padding:20px;"><a href="contact.php">Contact Us</a></li>
			</ul>
			<h2 class="text-success">Online Car Park Booking</h2>
		</div>
	             
	 </div>
	 <div class="container-fluid" style="background-color:#ccc;" >
		
	 </div>
<div class="container-fluid">    
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-success">
        <div class="panel-heading" style="background-color:#ccc;">CONTACT US</div>
        <div class="panel-body">
				<div class="row">
					<div class="col-md-12">
					<div class="row">
						<div class="col-md-2">
							<div class="address">
							<h4>ADDRESS</h4>
							Airport Rd, Accra<br>
								Code: ACC<br>
								Elevation: 62 m<br>
								Municipality: Accra<br>
								Phone: 030 277 6171
						</div>
						</div>
						<div class="col-md-5">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.7350705830295!2d-0.17031218523385075!3d5.606095495935774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf9b1fff72b87d%3A0xff2fe8ba5dfa0561!2sKotoka+International+Airport!5e0!3m2!1sen!2sgh!4v1541404250981" width="500" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-3">
						<?php
						if(isset($_POST['send'])){
							include_once("db.php");
							$sql = "INSERT INTO `feedback`(dates,`fullname`, `feedback`) VALUES (CURRENT_DATE,'".$_POST['fuuname']."','".$_POST['feedbk']."')";
							$query = mysqli_query($conn,$sql);
							if($query){
								echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
								Feedback Sent Successfully !
								</strong></div>';
										}else{
											echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
							   Failed to send Feddback, Please try again Later
								</strong></div>';
										}
						}							
						?>
						<H4>WRITE TO US </h4>
							<form method="post" action="">
								<div class="form-group">
									<label>FullName</label>
									<input type="text" class="form-control" name="fuuname" id="fuuname" required>									
								</div>
								<div class="form-group">
									<label>Feedback</label>
									<textarea class="form-control"cols="4" ROWS="4" style="resize:none" name="feedbk" id="feedbk" required></textarea>
								</div>
								<input type="submit" name="send" class="btn btn-default pull-right" value="Submit Feedback">
							</form>
					</div>
					<div class="col-md-1"></div>
					</div>
				</div>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
