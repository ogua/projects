<html>
	<head>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
</head>
<body>
		<div class="col-md-10 col-md-offset-1 well printAlll" style="margin-top:100px;">
			<h1 class="text-center">Report Generated</h1>
<?php
					     include_once('db.php');
						 $sqli6 = "SELECT * FROM `booking` WHERE `dates` BETWEEN '".$_POST['dates']."' AND '".$_POST['datess']."'";
						 $query6 = mysqli_query($conn,$sqli6);
						 $result6 = mysqli_num_rows($query6);
						 if($result6){
							 echo'<div class="table-responsive" style="background-color: #;">
					         <table class="table table-striped"  border="1" >
						         <thead style="background-color: #d9534f;">
								     <tr>
									     <th style="font-weight:bold;font-size:20px;">Event Booked</th>
										 <th style="font-weight:bold;font-size:20px;">Event Type</th>
										 <th style="font-weight:bold;font-size:20px;">Boked by</th>
										 <th style="font-weight:bold;font-size:20px;">Event Organiser ID</th>
										 <th style="font-weight:bold;font-size:20px;">Event Venue</th>
										 <th style="font-weight:bold;font-size:20px;">Event Date</th>
										 <th style="font-weight:bold;font-size:20px;">Date</th>
									 </tr>
								 </thead>
								 <tbody>';
							 while($row6 = mysqli_fetch_array($query6)){
								 echo'
								     <tr>
									     <td style="font-weight:bold;font-size:15px;">'.$row6['nameofEvent'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['TypeofEvent'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['Name'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['Userid'].'</td>
									     <td style="font-weight:bold;font-size:15px;">'.$row6['Evenue'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['Edate'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['datetime'].'</td>
										 </tr>';
							 }
							 echo'</tbody>
						     </table>
						</div>
						<a href="adminPage.php">Back to AdminPage</a>
						<a href="#"  onclick="print()" class="btn btn-xs btn-success pull-right">Print</a>
						<hr>
						';
						 }else{
							 
						 }
					?>
			<!------
					     include_once('db.php');
						 $sqli6 = "SELECT * FROM `booking` WHERE `dates` BETWEEN '".$_POST['dates']."' AND '".$_POST['datess']."'";
						 $query6 = mysqli_query($conn,$sqli6);
						 $result6 = mysqli_num_rows($query6);
						 if($result6){
							 $output .=' <div class="table-responsive" style="background-color: #;">
					         <table class="table table-striped"  border="1" >
						         <thead style="background-color: #d9534f;">
								     <tr>
									     <th style="font-weight:bold;font-size:20px;">Event Booked</th>
										 <th style="font-weight:bold;font-size:20px;">Event Type</th>
										 <th style="font-weight:bold;font-size:20px;">Boked by</th>
										 <th style="font-weight:bold;font-size:20px;">Event Organiser ID</th>
										 <th style="font-weight:bold;font-size:20px;">Event Venue</th>
										 <th style="font-weight:bold;font-size:20px;">Event Date</th>
										 <th style="font-weight:bold;font-size:20px;">Date</th>
									 </tr>
								 </thead>
								 <tbody>';
							 while($row6 = mysqli_fetch_array($query6)){
								 $output .='
								     <tr>
									     <td style="font-weight:bold;font-size:15px;">'.$row6['nameofEvent'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['TypeofEvent'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['Name'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['Userid'].'</td>
									     <td style="font-weight:bold;font-size:15px;">'.$row6['Evenue'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['Edate'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['datetime'].'</td>
										 </tr>';
							 }
							$output .=' </tbody>
						     </table>
						</div>
						';
				header("Content-Type: Application/csv");
			  header("Content-Disposition: attachment; filename = report.xls");
			  echo $output;
						 }else{
							 
						 }
					------->
				</div>