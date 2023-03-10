<?php 
	 error_reporting(0);
	 session_start();
	 include('db.php');
	if(isset($_POST['searchs'])){
		 $sql = " SELECT * FROM `patients` WHERE `Ref` = '".$_POST['prefs']."' ";
		 $query =  mysqli_query($conn, $sql );
		 $row = mysqli_fetch_assoc($query);
	}
	if(isset($_POST['logout'])){
		session_destroy();
		header("location:index.php");
	}
	if(isset($_POST['send'])){
		$sql2 = " UPDATE `patients` SET `Ref` = '".$_POST['PatREf']."', `PatientID` =  '".$_POST['preid']."' , `firstname` =  '".$_POST['prefname']."' ,
		`othernames` =  '".$_POST['prefoname']."' , `course` =  '".$_POST['prefcou']."' , `contact` =  '".$_POST['prefcnumb']."' , 
		`temperature` =  '".$_POST['preftmpe']."' , `height` =  '".$_POST['prefheig']."' , `PWeight` =  '".$_POST['prefweig']."' , `Bp` =  '".$_POST['prefbp']."' ,
		`Age` =  '".$_POST['prefAge']."' , `dateofBirth` =  '".$_POST['prefwei']."' , `Reason` =  '".$_POST['pReason']."' , `Prescibe` =  '".$_POST['drudpre']."', `DoctorsName` = '".$_POST['docname']."'
		where `Ref` =  '".$_POST['PatREf']."' ";
		$querys = mysqli_query($conn,$sql2);
		if($querys){
			echo '
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Details Saved SuccessFully</strong></div> 
			';
		}else{
			echo '
				<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed to Insert Data Try again Later</strong></div> 
			';
		}
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
background-image: no-repeat;
}.backs{
  background-image: url("images/federico-beccari-62960.jpg");
background-size:cover;
background-image: no-repeat;
}
.detai li{
	list-style:none;
}.navbar-header {
        float: none;
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

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Appointment</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav" id="myTab">
         <li><a><i class="glyphicon glyphicon-user"></i>&nbsp; Welcome: Guest</a></li>
         <li><a href="signup.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Signup</a></li>
		 <li><a href="index.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Login</a></li>						   
                </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid" style="margin-top:70px;">
		<div class="panel panel-info">
										<div class="panel-heading"><h4 id="dispcatName">Doctors Appointment System</h4></div>
										<div class="panel-body">
										  <div id="getProct">
										  
										  </div>
												<div class="col-sm-12">
														<div class="panel-success">
														<div class="panel-heading" id="displayMessage">Signup Form</div>
																<div class="panel-body">
																	<div class="tab-content">
												<div id="sectionA" class="tab-pane fade in active">
										
													<div class="col-sm-12">
															<div class="form-group">
																<input style="border-top-right-radius:25px;border-top-left-radius:25px;background-color:#969ab5;"type="text" class="form-control" id="patid" name="patid" placeholder="PATIENT'S ID">
															</div>
													</div>
													<p><br></p>
													<div class="col-sm-12">
														   <div class="form-group">
																<input  style="border-top-right-radius:25px;border-top-left-radius:25px;"type="text" class="form-control" id="patname" name="patname" placeholder="PATIENT'S NAME">
													        </div>
													</div>
													<div class="col-sm-12">
														   <div class="form-group">
																<textarea  style="resize:none;border-top-right-radius:25px;border-top-left-radius:25px;"style="resize:none;"col="3" rows="3"  class="form-control" id="address"placeholder="PATIENT'S ADDRESS"></textarea>
													        </div>
													</div>
													<div class="col-sm-12">
														   <div class="form-group">
																<input  style="border-top-right-radius:25px;border-top-left-radius:25px;"type="number" class="form-control" id="docmob" name="docmob" placeholder="PATIENT'S MOBILE NUMBER">
													        </div>
													</div>
													<div class="col-sm-12">
														   <div class="form-group">
																<input  style="border-top-right-radius:25px;border-top-left-radius:25px;"type="email" class="form-control" id="docemail" name="docemail" placeholder="PATIENT'S EMAIL">
													        </div>
													</div>
													<div class="col-sm-12">
														   <div class="form-group">
																<input  style="border-top-right-radius:25px;border-top-left-radius:25px;"type="text" class="form-control" id="docuname" name="docuname" placeholder="PATIENT'S USERNAME">
													        </div>
													</div>
													<div class="col-sm-12">
														   <div class="form-group">
																<input  style="border-top-right-radius:25px;border-top-left-radius:25px;"type="password" class="form-control" id="docepass" name="docepass" placeholder="PATIENT'S PASSWORD">
													        </div>
													</div>
													
													<input type="submit"  style="border-top-right-radius:25px;border-top-left-radius:25px;"value="Signup" name="addPat" id="addPat" class="btn btn-success btn-ms pull-right">
												</div>
							
  </div>
																
																</div>																
														</div>
												  </div>
										</div>
										<div class="panel-footer">&copy; 2017</div>
								</div>
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
