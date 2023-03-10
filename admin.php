<?php 
	 session_start();
	 include('db.php');
	 $sql = "SELECT * FROM `doctors` WHERE `docID` = '".$_SESSION['userid']."' ";
	 $query =  mysqli_query($conn, $sql);
	 $row = mysqli_fetch_array($query);
	if(isset($_POST['logout'])){
		session_destroy();
		header("location:index.php");
	}
	if(empty($_SESSION['userid'])){
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<style>
.back{
  background-image: url("images/rawpixel-com-487102.jpg");
background-size:cover;
background-repeat: no-repeat;
}.backs{
  background-image: url("images/federico-beccari-62960.jpg");
background-size:cover;
background-image: no-repeat;
}
.detai li{
	list-style:none;
}.navbar-header {
        float: none;
		background-color:#3f51b5;
    }
    .navbar-toggle {
        display: block;
    }
    .navbar-collapse {
        border-top: 1px solid transparent;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
    }
    .navbar-collapse.collapse {
        display: none!important;
    }
    .navbar-nav {
        float: none!important;
        margin: 7.5px -15px;
    }
    .navbar-nav>li {
        float: none;
    }
    .navbar-nav>li>a {
        padding-top: 10px;
        padding-bottom: 10px;
    }
	.navbar-collapse.collapse.in{
    display: block!important;
}
</style>
  </head>

  <body class="back">

    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#3f51b5;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Menu</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse" style="background-color:#303F9F;">
        <ul class="nav navbar-nav">
			 <li><a><i class="glyphicon glyphicon-user"></i>&nbsp; Welcome: <?php echo $_SESSION['name']; ?></a></li>
			 <li class="active"><a href="admin.php"><i class="glyphicon glyphicon-user"></i>&nbsp;My Details</a></li>
			<li><a href="adminadddoc.php"><i class="glyphicon glyphicon-tasks"></i>&nbsp;Add Doctor / Admin</a></li>
			<li><a  href="adminviwdoc.php"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;View All Doctor </a></li>
			<li><a  href="adminviewpat.php"><i class="glyphicon glyphicon-remove"></i>&nbsp;View Patients</a></li>
			<li><a  href="adminallap.php"><i class="glyphicon glyphicon-remove"></i>&nbsp;All Appointments</a></li>
			<li><a href="Admreport.php"><i class="glyphicon glyphicon-list-alt"></i>&nbsp; Generate Report</a></li>    
			<li><a href="#" id="logout"><i class="glyphicon glyphicon-user"></i>&nbsp;logout</a></li>						   
        </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid backs" style="margin-top:50px;">	
										  <div id="getProct">
										  
										  </div>												
															<h3 style="color:white;">Admin Details</h3>
																	
					<div class="form-group">						<div class="form-group">
																		<label style="color:white;"><i class="glyphicon glyphicon-user"></i>&nbsp;Name</label>
																		<?php
																			$name = $row['name'];
																			$namel = strtolower($name);
																			$namef = ucwords($namel);
																		?>
																		<input  style="outline:none;border:0;border-bottom:1px solid #d7d7d7;"type="text" value="<?php echo $namef; ?>"class="form-control" id="pname" disabled>
																	</div>
																	<div class="form-group">
																		<label style="color:white;"><i class="glyphicon glyphicon-user"></i>&nbsp;Admin ID</label>
																		<input  style=""type="text" value="<?php echo strtolower($row['docID']); ?>"class="form-control" id="puid" disabled>
																	</div>
																	<div class="form-group">
																		<label style="color:white;"><i class="glyphicon glyphicon-map-marker"></i>&nbsp;Address</label>
																		<?php
																			$addr = $row['address'];
																			$addrl = strtolower($addr);
																			$addrf = ucwords($addrl);
																		?>
																		<input  style=""type="text" value="<?php echo $addrf; ?>"class="form-control" id="puid" disabled>
																	</div>
																	<div class="form-group">
																		<label style="color:white;"><i class="glyphicon glyphicon-phone-alt"></i>&nbsp;Contact</label>
																		<input  type="number" value="<?php echo $row['mobi']; ?>"class="form-control" id="pcont"></span></b></li><br>
																	</div>
																	<div class="form-group">
																		<label style="color:white;"><i class="glyphicon glyphicon-globe"></i>&nbsp;Email</label>
																		<?php
																			$email = $row['email'];
																			$emaill = strtolower($email);
																		?>
																		<input  style=""type="email" value="<?php echo $emaill; ?>"class="form-control" id="pemail"></span></b></li><br>	
																	</div>
																		<input type="submit" value="Update"  class="btn btn-info btn-sm pull-right" id="updatep">																																			
															
																	<br><br>
															<div id="displayCartMessage"></div>	
															<hr>
															
										
																
										<div class="panel-footer">&copy; 2019 </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery-2.1.4.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/action.js"></script>		 
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script type="text/javascript">
  $(document).ready(function()
  {	  
    $("#myTab li:eq(1) a").tab('show');
  });
  </script>
  </body>
</html>