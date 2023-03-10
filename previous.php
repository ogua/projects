<!DOCTYPE HTML>
<html>
<head>
<title>UPSA DOCTORS DEPARTMENT</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=" />
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<style>
.back{
  background-image: url("images/anner.jpg");
background-size:cover;
background-image: no-repeat;
}

</style>
</head> 
<body class="back">
    <h1 class="text-center">Doctors Department</h1>
			   	<img class="img-rounded"src="images/UPSA.png" height="100" width="100"alt="upsa image" style="position:absolute;margin-left:20px;">

			<?php 
			   error_reporting(0);
			    include('db.php');
				if(isset($_GET['id'])){
				$id = $_GET['id'];
			}
			$sql = "SELECT * FROM `patients` WHERE `cardid`= '$id' ";
			$query = mysqli_query($conn,$sql);
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){
				echo'
					<div class="col-sm-9 col-sm-offset-2" style="height:550px; overflow: scroll;">
			                   <div class="jumbotron">	
				';
				while($row = mysqli_fetch_assoc($query)){
					echo'
					  <ul class="list-inline" style="margin:20px;">
														<li>RefID : <b style="color: #d8bc35;">'.$row['Ref'].' </b></li>
														<li>First name :<b style="color: #d8bc35;"> '.$row['firstname'].'  </b></li>
														<li>Other names :<b style="color: #d8bc35;"> '.$row['othernames'].'  </b></li>
														<li>Age :<b style="color: #d8bc35;"> '.$row['Age'].'  </b></li>
														<li>Height :<b style="color: #d8bc35;"> '.$row['height'].'  </b></li>
											  </ul>
											    <h3 style="font-weight:bold;"class="text-center">Reason for visiting the Hospitel</h3>
			                                    <div class="form-group">
				                                         <textarea rows="5"class="form-control" name="pReason"placeholder="Enter Patient issue" style="resize:none;">'.$row['Reason'].'</textarea>
			                                     </div>
											 <div class="col-sm-12" style="boder:1px solid blue;border-style:double;">    
			         <h3 class="text-center" style="border:1px solid black;color:#d8bc35; background-color: #42327a; padding:10px;">Blood Test Results</h3>
			     <div class="table-responsive" >
				 <table class="table table-striped"  cellpadding="10" style="margin-left:10px;color:white; ">
	       <tr>
			   <th style="font-size:20px;color:#5cb85c;font-weight:bold;">Measurement</th>
			   <th style="font-size:20px;color:#5cb85c;font-weight:bold;">Value</th>
		   <tr>
		   <tbody>
			    <tr>
				    <td style="color:#42327a;">Blood Group</td> 
					 <td style="color:#d8bc35;"> '.$row['bloodgrp'].'</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Sickling</td> 
					 <td style="color: #d8bc35;">'.$row['sicking'].'</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">HB Denotype</td> 
					 <td style="color: #d8bc35;">'.row['hbgenotype'].'</td> 
				<tr>	
				<tr>
				    <td style="color:#42327a;">HIV Status</td> 
					 <td style="color: #d8bc35;">'.$row['Hivst'].'</td> 
				<tr>	
			    <tr>
				    <td style="color:#42327a;">Hypertise B</td> 
					 <td style="color: #d8bc35;">'.$row['hypertS'].'</td> 
				<tr>	
		   </tbody>
	   </table>	
 </div>	   
					   <h3 class="text-center" style="border:1px solid black;color:#d8bc35; background-color: #42327a;padding:10px;">Urine Test Results</h3>
					   <div class="table-responsive">
					   <table class="table table-striped"  cellpadding="10" style="margin-left:10px;color:white; ">
	       <tr>
			   <th style="font-size:15px;color:#5cb85c;font-weight:bold;">Measurement</th>
			   <th style="font-size:15px;color:#5cb85c;font-weight:bold;">Value</th>
			   <th style="font-size:15px;color:#5cb85c;font-weight:bold;">Reference Range</th>
		   <tr>
		   <tbody>
			    <tr>
				    <td style="color:#42327a;">Color</td> 
					 <td style="color: #d8bc35;font-weight:bold;">'.$row['Ucolor'].'</td> 
					  <td style="color:#42327a;">Yellow</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Apperance</td> 
					 <td  style="color: #d8bc35;font-weight:bold;">'.$row['Uappera'].'</td> 
					  <td style="color:#42327a;">clear</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">PH</td> 
					 <td  style="color: #d8bc35;font-weight:bold;">'.$row['Ph'].'</td> 
					  <td style="color:#42327a;">5.0-5.8</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Protein (mg/dl)</td> 
					 <td  style="color: #d8bc35;font-weight:bold;">'.$row['Uprote'].'</td> 
					  <td style="color:#42327a;">Neagative</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Glucose (mg/dl)</td> 
					 <td  style="color: #d8bc35;font-weight:bold;">'.$row['Ugluc'].'</td> 
					  <td style="color:#42327a;">Neagative</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">CliniTest (%)</td> 
					 <td  style="color: #d8bc35;font-weight:bold;">'.$row['UcliniT'].'</td> 
					  <td style="color:#42327a;">Neagative</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Ketones (mg/dl)</td> 
					 <td  style="color: #d8bc35;font-weight:bold;">'.$row['UKet'].'</td> 
					  <td style="color:#42327a;">Neagative</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Bilirubin</td> 
					 <td  style="color: #d8bc35;font-weight:bold;">'.$row['Ubili'].'</td> 
					  <td style="color:#42327a;">Neagative</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Blood</td> 
					 <td  style="color: #d8bc35;font-weight:bold;">'.$row['Ublod'].'</td> 
					  <td style="color:#42327a;">Neagative</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Nitrite</td> 
					 <td  style="color: #d8bc35;font-weight:bold;">'.$row['Unitri'].'</td> 
					  <td style="color:#42327a;">Neagative</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">WBC</td> 
					 <td  style="color: #d8bc35;font-weight:bold;">'.$row['Uwbc'].'</td> 
					  <td style="color:#42327a;">0-4</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">RBC</td> 
					 <td  style="color: #d8bc35;font-weight:bold;">'.$row['Urbc'].'</td> 
					  <td style="color:#42327a;">0-4</td> 
				<tr>
		   </tbody>
	   </table>
	   </div>
			</div>
								 <h3 style="font-weight:bold;" class="text-center">Drugs Prescriped</h4>
								 <div class="form-group">
				                         <textarea rows="9" class="form-control" name="drudpre"placeholder="List Drugs Here" style="resize:none;">'.$row['Prescibe'].'</textarea>
			                    </div>
						<b style="margin-left:20px;color:red;">Date and time : '.$row['dateofReg'].' </b>
						<hr><hr>
					';
				}
				echo '
				</div>
			                </div>
				';
			}else{
				echo
				' 
					<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed to fetch information. Patient Id Dont Exist </strong></div> 
				';
			}
			?>										   								 
		<a href="doctor.php"><button style="margin-right:20px;background-color: #d8bc35;border-color: #d8bc35;"type"button" class="btn btn-info pull-right">&larr;Go  Back</button></a>
</body>
</html>