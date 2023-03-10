<?php
	session_start();
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
         <li><a href="doctor.php"><i class="glyphicon glyphicon-user"></i>&nbsp;My Details</a></li>
										<li><a href="docappnt.php"><i class="glyphicon glyphicon-tasks"></i>&nbsp;My AppointMents</a></li>
										<li><a href="docnote.php"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;Add Note</a></li>
										<li><a href="docviepat.php"><i class="glyphicon glyphicon-remove"></i>&nbsp;View Patients</a></li>
										<li  class="active"><a href="docreport.php"><i class="glyphicon glyphicon-list-alt"></i>&nbsp; Generate Report</a></li>
					          <li><a href="#" id="logout"><i class="glyphicon glyphicon-user"></i>&nbsp;logout</a></li>						   
                </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid back2" style="margin-top:30px;">																																<?php
if(empty($_SESSION['userid'])){
		header("location:index.php");
	}
//require('fpdf_barcode.php');

include_once('db.php');


//first query
/*$ssql = "SELECT * FROM `doctors` WHERE `docID` = '".$_SESSION['userid']."'";
$squery = mysqli_query($conn,$ssql);
$rowss = mysqli_fetch_array($squery);
$name = $rowss['name'];
$categ = $rowss['category'];
$mobile = $rowss['mobi'];
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

$pdf->cell(22,8,"App ID",1,0);
$pdf->cell(20,8,"Name",1,0);
$pdf->cell(40,8,"Address",1,0);
$pdf->cell(24,8,"Mobile",1,0);
$pdf->cell(17,8,"Sex",1,0);
$pdf->cell(13,8,"Age",1,0);
$pdf->cell(26,8,"Time",1,0);
$pdf->cell(28,8,"DateTime",1,1);

$pdf->SetFont('Times','',13);
$sql = "SELECT * FROM `newbooking` where dates between '".$_POST['frm']."' AND '".$_POST['to']."' AND category = '$categ' and doctor = '$name' ";
$query = mysqli_query($conn,$sql);
$result = mysqli_num_rows($query);
if($result > 0){
	while($row = mysqli_fetch_array($query)){
		$pdf->cell(22,7,$row['appntmntid'],1,0);
		$pdf->cell(20,7,$row['patientName'],1,0);
		$pdf->cell(40,7,$row['Address'],1,0);
		$pdf->cell(24,7,$row['MobileNumber'],1,0);
		$pdf->cell(17,7,$row['Gender'],1,0);
		$pdf->cell(13,7,$row['Age'],1,0);
		$pdf->cell(26,7,$row['ApTime'],1,0);
		$pdf->cell(28,7,$row['APdate'],1,1);
	}
}


$pdf->EAN13(70,250,$mobile,5,0.5,9);
//$pdf->Write(5,$html);













$pdf->Output();*/
	echo '
	<div class="container-fluid">';
	$ssql = "SELECT * FROM `doctors` WHERE `docID` = '".$_SESSION['userid']."'";
	$squery = mysqli_query($conn,$ssql);
	$rowss = mysqli_fetch_array($squery);
	$name = $rowss['name'];
	$categ = $rowss['category'];
	$mobile = $rowss['mobi'];

		$sql = "SELECT * FROM `newbooking` where dates between '".$_POST['frm']."' AND '".$_POST['to']."' AND category = '$categ' and doctor = '$name' ";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		if($result > 0){
			echo ' 
			<h4 style="text-align:center;border:1px solid #3f51b5;background-color:#fff; padding:10px;">Report Generated</h4>
			<div class="table-responsive" >	
						<table class="table table-striped" style="background-color:#abc;">
						<thead class="bg-danger">
							<tr>
								<th style="color:red;"><b>App ID</b></th>
								<th style="color:red;"><b>Name</b></th>
								<th style="color:red;"><b>Address</b></th>
								<th style="color:red;"><b>Mobile</b></th>
								<th style="color:red;"><b>Sex</b></th>
								<th style="color:red;"><b>Age</b></th>
								<th style="color:red;"><b>Time</b></th>
								<th style="color:red;"><b>TimeDate</b></th>
							</tr>
						</thead>
						<tbody>';
			while($row = mysqli_fetch_array($query)){
				 echo'
				  <tr>
					        <td><b>'.$row['appntmntid'].'</b></td>
							<td><b>'.$row['patientName'].'</b></td>
							<td><b>'.$row['Address'].'</b></td>
							<td><b>'.$row['MobileNumber'].'</b></td>
							<td><b>'.$row['Gender'].'</b></td>
							<td><b>'.$row['Age'].'</b></td>
							<td><b>'.$row['ApTime'].'</b></td>
							<td><b>'.$row['APdate'].'</b></td>
					  </tr>
				  ';
			}
			 echo '
			  </tbody>
				</table> </div>                                
			  ';
		}else{
			echo '<br><br><br><br><div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong> No Results Failed! try a different Date </div>';
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
