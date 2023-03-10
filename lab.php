<?php
    session_start();
	error_reporting(0);
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
		$sql2 = " UPDATE `patients` SET `Ref` = '".$_POST['PatREf']."',`firstname` =  '".$_POST['prefname']."' ,
		`othernames` =  '".$_POST['prefoname']."' ,
		`temperature` =  '".$_POST['preftmpe']."' , `height` =  '".$_POST['prefheig']."' , `PWeight` =  '".$_POST['prefweig']."' , `Bp` =  '".$_POST['prefbp']."' ,
		`Age` =  '".$_POST['prefAge']."' ,`Reason` =  '".$_POST['pReason']."' , 
		`bloodgrp` =  '".$_POST['blodgrp']."' ,
		`sicking` =  '".$_POST['sickli']."' , `hbgenotype` =  '".$_POST['genoty']."' , `Hivst` =  '".$_POST['Hivsta']."' ,
		`hypertS` =  '".$_POST['Hipstc']."',
		`Ucolor` = '".$_POST['Uc']."', `Uappera` = '".$_POST['uap']."', `Ph` = '".$_POST['Uph']."', `Uprote` = '".$_POST['upr']."', 
		`Ugluc` = '".$_POST['ugl']."', `UcliniT` = '".$_POST['uclin']."', `UKet` = '".$_POST['ukeyt']."', `Ubili` = '".$_POST['uBIL']."',
		`Ublod` = '".$_POST['ublod']."', `Unitri` = '".$_POST['unit']."', `Urbc` = '".$_POST['urbc']."', `Uwbc` = '".$_POST['uWbc']."' where `Ref` =  '".$_POST['PatREf']."' ";
		$querys = mysqli_query($conn,$sql2);
		if($querys){
			echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Details Submitted SuccessFully</strong></div> 
';
		}else{
			echo $sql2;
			'
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
  background-image: url("images/lucas-vasques-453684.jpg");
background-size:cover;
background-image: no-repeat;
}

</style>
</head> 
<body class="back">
    <h1 class="text-center" style="color: #42327a;">Laborary</h1>
				   	<img class="img-rounded"src="images/UPSA.png" height="100" width="100"alt="upsa image" style="position:absolute;margin-left:20px;">
	 <form method="post" action="" >   
	    <div class="form-group pull-right" style="">
		      <div class="col-sm-8">
					 <label style="font-size:20px;color:white;">Welcome: <?php echo $_SESSION['name']; ?></label>
			  </div>
			  <div class="col-sm-3">
				<input type="submit" name="logout" style="background-color: #d8bc35;border-color: #d8bc35;" id="logout" class="btn btn-success"value="logout" />
				</div>
	   </div>
	   </form>
	      <div class="col-sm-7 col-sm-offset-6">
		       <form method="post" action="">
			        <div class="form-group">
                                <div class="col-sm-5">
                                    <input type="text" id="prefs" name="prefs" placeholder="STUDENT ID NUMBER TO SEARCH" class="form-control" required="required">
                                </div>
                                <div class="col-sm-2">
			         	         <input type="submit" name="searchs" id="searchs" style="background-color: #d8bc35;border-color: #d8bc35;" class="btn btn-success pull-right"value="search" />
                                </div>								
						    </div>
			   </form>
		  </div>
		  <div class="clearfix"></div>
		   <div class="col-sm-8 col-sm-offset-2" style="margin-top:20px;margin-bottom:20px;">
		<form method="post" action="" >
		     <label style="color:#d8bc35;">Patient Ref</label>
			 <div class="form-group">
				<input class="form-control"type="text" value="<?php echo $row['Ref']; ?>" name="PatREf" id="PatREf" placeholder="Patient Ref" required />
			</div>
			<!-----<label style="color:#d8bc35;">Patient ID</label>
			<div class="form-group">
				<input class="form-control"type="number" value="<?php echo $row['PatientID']; ?>" name="preid" id="username" placeholder="Patient ID" required />
			</div>--->
			<label style="color:#d8bc35;">Patient Firstname</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['firstname']; ?>"name="prefname" id="prefname" placeholder="Patient FirstName" required />
			</div>
						<label style="color:#d8bc35;">Patient Othernames</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['othernames']; ?>" name="prefoname" id="prefoname" placeholder="Patient OtherNames" required />
			</div>
						<label style="color:#d8bc35;">Patient Age</label>
			<div class="form-group">
				<input class="form-control" type="number" value="<?php echo $row['Age']; ?>" name="prefAge" id="prefAge" placeholder="Patient Age" required />
			</div>
			<label style="color:#d8bc35;">Patient Temperature</label>
			  <div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['temperature']; ?>" name="preftmpe" id="preftmpe" placeholder="Patient Temperature" required />
			</div>
						<label style="color:#d8bc35;">Patient Height</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['height']; ?>" name="prefheig" id="prefheig" placeholder="Patient height" required />
			</div>
						<label style="color:#d8bc35;">Patient Weight</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['PWeight']; ?>" name="prefweig" id="prefweig" placeholder="Patient Weight" required />
			</div>
						<label style="color:#d8bc35;">Patient Blood Pressure</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['Bp']; ?>" name="prefbp" id="prefbp" placeholder="Patient BP" required />
			</div>
			<label style="color:#d8bc35;">Reason for visiting the Hospitel</label>
			<div class="form-group">
				<textarea rows="4"class="form-control" name="pReason"placeholder="Enter Patient issue" style="resize:none;"><?php echo $row['Reason']; ?></textarea>
			</div>
		</div>
		<div class="container">
	<div class="row" style="margin:20px;">
			<div class="col-sm-6" style="boder:1px solid blue;border-style:double;">    
			        <h3 class="text-center" style="color:#d8bc35;background-color: #42327a; padding:10px;"><b>Blood Test Results</b></h3>
					<label>Blood Group</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['bloodgrp']; ?>" name="blodgrp" id="blodgrp" placeholder="Blood Group" required />
			</div>
			<label>Sickling</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['sicking']; ?>" name="sickli" id="sickli" placeholder="Sickling Status" required />
			</div>
			<label>Genotype</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['hbgenotype']; ?>" name="genoty" id="genoty" placeholder="Genotype Status" required />
			</div>
			<label>HIV Status</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['Hivst']; ?>" name="Hivsta" id="Hivsta" placeholder="HIV Status" required />
			</div>
			<label>Hypertise B</label>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['hypertS']; ?>" name="Hipstc" id="Hipstc" placeholder="Hypertyse B Status" required />
			</div>
			
			</div>
			<div class="col-sm-6" style="boder:1px solid black;border-style:double;">
			         <h3 class="text-center" style="color:#d8bc35;background-color: #42327a; padding:10px;"><b>Urine Test Results </b></h3>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['Ucolor']; ?>" name="Uc" id="Uc" placeholder="Urine Color" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['Uappera']; ?>" name="uap" id="uap" placeholder="Urine Appearance" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['Ph']; ?>" name="Uph" id="Uph" placeholder="PH" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['Uprote']; ?>" name="upr" id="upr" placeholder="Protein in Urine" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['Ugluc']; ?>" name="ugl" id="ugl" placeholder="Glucose In Urine" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['UcliniT']; ?>" name="uclin" id="uclin" placeholder="ClinicTest In Urine" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['UKet']; ?>" name="ukeyt" id="ukeyt" placeholder="Ketones In Urine" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['Ubili']; ?>" name="uBIL" id="uBIL" placeholder="Bilirubin In Urine" required />
			</div>
				<div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['Ublod']; ?>" name="ublod" id="ublod" placeholder="Blood Trace In Urine" required />
			</div>
           <div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['Unitri']; ?>" name="unit" id="unit" placeholder="Nitrite In Urine" required />
			</div>	
            <div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['Uwbc']; ?>" name="uWbc" id="uWbc " placeholder="White Blood Cell" required />
			</div>	
            <div class="form-group">
				<input class="form-control" type="text" value="<?php echo $row['Urbc']; ?>" name="urbc" id="urbc " placeholder="Red Blood Cell" required />
			</div>				
			</div>
	</div>
		<input style="margin-bottom:20px;background-color: #42327a;border-color: #42327a;"type="submit" name="send" id="send" class="btn btn-danger pull-right"value="Save" />
	</div>
		</form>
</body>
</html>