<?php 
		error_reporting(0);
	 session_start();
	 include('db.php');
	 $sql = "SELECT * FROM `doctors` WHERE `docID` = '".$_SESSION['userid']."' ";
	 $query =  mysqli_query($conn, $sql);
	 $row = mysqli_fetch_array($query);
	if(isset($_POST['logout'])){
		session_destroy();
		header("location:index.php");
	}if(empty($_SESSION['userid'])){
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
			 <li><a href="admin.php"><i class="glyphicon glyphicon-user"></i>&nbsp;My Details</a></li>
			<li><a href="adminadddoc.php"><i class="glyphicon glyphicon-tasks"></i>&nbsp;Add Doctor / Admin</a></li>
			<li><a  href="adminviwdoc.php"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;View All Doctor </a></li>
			<li><a  href="adminviewpat.php"><i class="glyphicon glyphicon-remove"></i>&nbsp;View Patients</a></li>
			<li><a  href="adminallap.php"><i class="glyphicon glyphicon-remove"></i>&nbsp;All Appointments</a></li>
			<li class="active"><a href="Admreport.php"><i class="glyphicon glyphicon-list-alt"></i>&nbsp; Generate Report</a></li>    
			<li><a href="#" id="logout"><i class="glyphicon glyphicon-user"></i>&nbsp;logout</a></li>						   
        </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid backs" style="margin-top:50px;">	
			<?php
if(empty($_SESSION['userid'])){
		header("location:index.php");
	}
date_default_timezone_set('Africa/Accra'); 
function facebook_time_ago($timestamp) { $time_ago = strtotime($timestamp); 
$current_time = time(); $time_difference = $current_time - $time_ago; $seconds = $time_difference; $minutes = round($seconds / 60 ); 
// value 60 is seconds 
$hours = round($seconds / 3600);
 //value 3600 is 60 minutes * 60 sec 
 $days = round($seconds / 86400);
 //86400 = 24 * 60 * 60; 
 $weeks = round($seconds / 604800);
 // 7*24*60*60;
 $months = round($seconds / 2629440);
 //((365+365+365+365+366)/5/12)*24*60*60 
 $years = round($seconds / 31553280);
 //(365+365+365+365+366)/5 * 24 * 60 * 60 
 if($seconds <= 60) { return "Just Now";} else if($minutes <=60) { if($minutes==1) { return "one minute ago"; } 
 else { return "$minutes minutes ago"; } } else if($hours <=24) { if($hours==1) { return "an hour ago"; } 
 else { return "$hours hrs ago"; } } else if($days <= 7)  { if($days==1) { return "yesterday"; }
 else { return "$days days ago"; } } else if($weeks <= 4.3) 
 //4.3 == 52/12
{ if($weeks==1){ return "a week ago"; } else { return "$weeks weeks ago"; } } else if($months <=12) 
 { if($months==1) { return "a month ago"; } else { return "$months months ago"; }} else { if($years==1) 
 { return "one year ago"; } else { return "$years years ago"; } }}


require('fpdf_barcode.php');

include_once('db.php');

/*
class PDF extends PDF_BARCODE
{
// Page header
function Header()
{
    // Logo
    $this->Image('shcut.png',6,6,20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
	$this->setFillColor(255,254,225);
	$this->setDrawColor(180,180,255);
    // Move to the right
    $this->Cell(30);
    // Title
    $this->Cell(130,10,'Report Gegerated from '.$_POST['frm'].' - '.$_POST['to'].' ',1,0,'C',true);
    // Line break
    $this->Ln(20);
}




// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',15);
$pdf->setDrawColor(180,170,255);

$pdf->cell(22,8,"User ID",1,0);
$pdf->cell(45,8,"Name",1,0);
$pdf->cell(45,8,"Doc Name",1,0);
$pdf->cell(45,8,"App Date",1,0);
$pdf->cell(30,8,"Booked",1,1);

$pdf->SetFont('Times','',13);
$sql = "SELECT * FROM `newbooking` where dates between '".$_POST['frm']."' AND '".$_POST['to']."'";
$query = mysqli_query($conn,$sql);
$result = mysqli_num_rows($query);
if($result > 0){
	while($row = mysqli_fetch_array($query)){
		$pdf->cell(22,7,$row['userid'],1,0);
		$lname = strtolower($row['patientName']);
		$cfirst = ucwords($lname );
		$pdf->cell(45,7,$cfirst,1,0);
		$ladd = strtolower($row['doctor']);
		$addfirst = ucwords($ladd);
		$pdf->cell(45,7,$addfirst,1,0);
		$pdf->cell(45,7,$row['APdate'],1,0);
		$pdf->cell(30,7,facebook_time_ago($row['datetime']),1,1);
		
	}
}


$pdf->EAN13(70,250,123456789,5,0.5,9);
//$pdf->Write(5,$html);













$pdf->Output();
*/


echo '
	<div class="container-fluid">';
	$sql = "SELECT * FROM `newbooking` where dates between '".$_POST['frm']."' AND '".$_POST['to']."'";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		if($result > 0){
			echo '    
			<h2 style="text-align:center;"><u>Report Gegerated</u> </h2>
			<div class="table-responsive" >	
						<table class="table table-striped" style="background-color:#abc;">
						<thead class="bg-danger">
							<tr>
								<th style="color:red;"><b>Patient ID</b></th>
								<th style="color:red;"><b>Name</b></th>
								<th style="color:red;"><b>Doc Name</b></th>
								<th style="color:red;"><b>App Date</b></th>
								<th style="color:red;"><b>Booked</b></th>
							</tr>
						</thead>
						<tbody>';
			while($row = mysqli_fetch_array($query)){
				$doc = $row['patientName'];
				$docl =  strtolower($doc);
				$docf = ucwords($docl);
				
				$addr = $row['doctor'];
				$addrl =  strtolower($addr);
				$addrf = ucwords($addrl);
				
				
			
				 echo'
				  <tr>
					        <td><b>'.$row['userid'].'</b></td>
							<td><b>'.$docf.'</b></td>
							<td><b>'.$addrf.'</b></td>
							<td><b>'.$row['APdate'].'</b></td>
							<td><b>'.facebook_time_ago($row['datetime']).'</b></td>
					  </tr>
				  ';
			}
			 echo '
			  </tbody>
				</table> </div>                                
			  ';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong> No Results Failed! try a different Date </div>';
		}
	
	echo '<div class="">
	</div>
	</div>
	';
?>
									
											
																
	<div class="panel-footer">&copy; 2018 - 2019 </div>
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
