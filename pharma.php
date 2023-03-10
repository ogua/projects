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
		$sql2 = " UPDATE `patients` SET `Ref` = '".$_POST['PatREf']."', `firstname` =  '".$_POST['prefname']."' ,
		`othernames` =  '".$_POST['prefoname']."' ,
		`temperature` =  '".$_POST['preftmpe']."' , `height` =  '".$_POST['prefheig']."' , `PWeight` =  '".$_POST['prefweig']."' , `Bp` =  '".$_POST['prefbp']."' ,
		`Age` =  '".$_POST['prefAge']."' ,`Reason` =  '".$_POST['pReason']."', `Prescibe` =  '".$_POST['drudpre']."',`Pharmacist`  =  '".$_POST['pharmanan']."'where `Ref` =  '".$_POST['PatREf']."' ";
		$querys = mysqli_query($conn,$sql2);
		if($querys){
			echo '
					  	<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Details Submitted SuccessFully</strong></div> 
			';
		}else{
			echo '
					<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed to Insert Data Try again Later</strong></div> 
			';
		}
	}
?>
     
<!DOCTYPE HTML>
<html>
<head>
<title></title>
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
  background-image: url("images/freestocks-org-126848.jpg");
background-size:cover;
background-image: no-repeat;
}

</style>
</head> 
<body class="back">
    <h1 class="text-center" style="background-color:#ccc;border:1px solid #fff;padding:20px;">Pharmacy</h1>
			   	<img class="img-rounded"src="images/UPSA.png" height="100" width="100"alt="upsa image" style="position:absolute;margin-left:20px;">
	 <form method="post" action="" >	   
	    <div class="form-group pull-right" style="">
		      <div class="col-sm-8">
					 <label style="font-size:20px;color:white;">Welcome: <?php echo $_SESSION['name']; ?></label>
			  </div>
			  <div class="col-sm-3">
				<input type="submit" style="background-color: #42327a;border-color: #42327a;" name="logout" id="logout" class="btn btn-success"value="logout" />
				</div>
	   </div>
	   </form>
	      <div class="col-sm-7 col-sm-offset-6">
		       <form method="post" action="">
			        <div class="form-group">
                                <div class="col-sm-5">
                                    <input type="text" id="prefs" name="prefs" placeholder="REFERENCE ID NUMBER TO SEARCH" class="form-control" required="required">
                                </div>
                                <div class="col-sm-2">
			         	         <input type="submit" style="background-color: #42327a;border-color: #42327a;" name="searchs" id="searchs" class="btn btn-success pull-right"value="search" />
                                </div>								
						    </div>
			   </form>
		  </div>
		  <div class="clearfix"></div>
		   <div class="col-sm-8 col-sm-offset-2" style="margin-top:20px;margin-bottom:20px;">
		<form method="post" action="" >
		     <label  style="color:#d8bc35;font-weight:bold;">Patient Ref</label>
			 <div class="form-group">
				<input class="form-control"type="text" value="<?php echo $row['Ref']; ?>" name="PatREf" id="PatREf" placeholder="Patient Ref" required />
			</div>
			<!--<label  style="color:#d8bc35;">Patient ID</label>
			<div class="form-group">
				<input class="form-control"type="number" value="<?php //echo $row['PatientID']; ?>" name="preid" id="username" placeholder="Patient ID" required />
			</div>---->
			<label  style="color:#d8bc35;">Patient Firstname</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['firstname']; ?>"name="prefname" id="prefname" placeholder="Patient FirstName" required />
			</div>
						<label  style="color:#d8bc35;">Patient Othernames</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['othernames']; ?>" name="prefoname" id="prefoname" placeholder="Patient OtherNames" required />
			</div>
						<label  style="color:#d8bc35;">Patient Age</label>
			<div class="form-group">
				<input class="form-control" type="number" value="<?php echo $row['Age']; ?>" name="prefAge" id="prefAge" placeholder="Patient Age" required />
			</div>
			<label  style="color:#d8bc35;">Patient Temperature</label>
			  <div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['temperature']; ?>" name="preftmpe" id="preftmpe" placeholder="Patient Temperature" required />
			</div>
						<label  style="color:#d8bc35;">Patient Height</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['height']; ?>" name="prefheig" id="prefheig" placeholder="Patient height" required />
			</div>
						<label  style="color:#d8bc35;">Patient Weight</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['PWeight']; ?>" name="prefweig" id="prefweig" placeholder="Patient Weight" required />
			</div>
						<label  style="color:#d8bc35;">Patient Blood Pressure</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['Bp']; ?>" name="prefbp" id="prefbp" placeholder="Patient BP" required />
			</div>
			<label  style="color:#d8bc35;">Reason for visiting the Hospitel</label>
			<div class="form-group">
				<textarea rows="4"class="form-control" name="pReason"placeholder="Enter Patient issue" style="resize:none;"><?php echo $row['Reason']; ?></textarea>
			</div>
		</div>
		<div class="container">
	<div class="row" style="margin:20px;">
			<div class="col-sm-6" style="boder:1px solid blue;border-style:double;">    
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
					 <td style="color:#d8bc35;"> <?php echo $row['bloodgrp']; ?></td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Sickling</td> 
					 <td style="color: #d8bc35;"><?php echo $row['sicking']; ?></td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">HB Denotype</td> 
					 <td style="color: #d8bc35;"><?php echo $row['hbgenotype']; ?></td> 
				<tr>	
				<tr>
				    <td style="color:#42327a;">HIV Status</td> 
					 <td style="color: #d8bc35;"><?php echo $row['Hivst']; ?></td> 
				<tr>	
			    <tr>
				    <td style="color:#42327a;">Hypertise B</td> 
					 <td style="color: #d8bc35;"><?php echo $row['hypertS']; ?></td> 
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
					 <td style="color: #d8bc35;font-weight:bold;"><?php echo $row['Ucolor']; ?></td> 
					  <td style="color:#42327a;">Yellow</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Apperance</td> 
					 <td  style="color: #d8bc35;font-weight:bold;"><?php echo $row['Uappera']; ?></td> 
					  <td style="color:#42327a;">clear</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">PH</td> 
					 <td  style="color: #d8bc35;font-weight:bold;"><?php echo $row['Ph']; ?></td> 
					  <td style="color:#42327a;">5.0-5.8</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Protein (mg/dl)</td> 
					 <td  style="color: #d8bc35;font-weight:bold;"><?php echo $row['Uprote']; ?></td> 
					  <td style="color:#42327a;">Neagative</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Glucose (mg/dl)</td> 
					 <td  style="color: #d8bc35;font-weight:bold;"><?php echo $row['Ugluc']; ?></td> 
					  <td style="color:#42327a;">Neagative</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">CliniTest (%)</td> 
					 <td  style="color: #d8bc35;font-weight:bold;"><?php echo $row['UcliniT']; ?></td> 
					  <td style="color:#42327a;">Neagative</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Ketones (mg/dl)</td> 
					 <td  style="color: #d8bc35;font-weight:bold;"><?php echo $row['UKet']; ?></td> 
					  <td style="color:#42327a;">Neagative</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Bilirubin</td> 
					 <td  style="color: #d8bc35;font-weight:bold;"><?php echo $row['Ubili']; ?></td> 
					  <td style="color:#42327a;">Neagative</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Blood</td> 
					 <td  style="color: #d8bc35;font-weight:bold;"><?php echo $row['Ublod']; ?></td> 
					  <td style="color:#42327a;">Neagative</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">Nitrite</td> 
					 <td  style="color: #d8bc35;font-weight:bold;"><?php echo $row['Unitri']; ?></td> 
					  <td style="color:#42327a;">Neagative</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">WBC</td> 
					 <td  style="color: #d8bc35;font-weight:bold;"><?php echo $row['Uwbc']; ?></td> 
					  <td style="color:#42327a;">0-4</td> 
				<tr>
				<tr>
				    <td style="color:#42327a;">RBC</td> 
					 <td  style="color: #d8bc35;font-weight:bold;"><?php echo $row['Urbc']; ?></td> 
					  <td style="color:#42327a;">0-4</td> 
				<tr>
		   </tbody>
	   </table>
	   </div>
			</div>
			<div class="col-sm-6" style="boder:1px solid black;border-style:double;height: 430px;">
			<legend><b>Drug Prescription</b></legend>
			          <div class="form-group">
				         <textarea rows="9" class="form-control" name="drudpre"placeholder="List Drugs Here" style="resize:none;"><?php echo $row['Prescibe']; ?></textarea>
			     </div>
					<label>Pharmacist Name</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['Pharmacist']; ?>" name="pharmanan" id="pharmanan" placeholder="Pharmacist Name" required />
			</div> 
			</div>
	</div>
		<input style="margin-bottom:20px;background-color: #42327a;border-color: #42327a;" type="submit" name="send" id="send" class="btn btn-danger pull-right"value="Save" />
	</div>
		</form>
</body>
</html>