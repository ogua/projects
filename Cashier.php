<?php
    session_start();
	error_reporting(0);
	 include('db.php');
	if(isset($_POST['searchs'])){
		 $sql = " SELECT * FROM `patients` WHERE `Ref` = '".$_POST['prefs']."' ";
		 $query =  mysqli_query($conn, $sql );
		 $row = mysqli_fetch_assoc($query);
		 $_SESSION['ref'] = $_POST['prefs'];
	}
	if(isset($_POST['logout'])){
		session_destroy();
		header("location:index.php");
	}
	if(isset($_POST['send'])){
		   $bt = $_POST['btc'];
			$ut = $_POST['utc'];
			$dudt = $_POST['dc'];
			$tot = $bt + $ut + $dudt ;
		$sql2 = "UPDATE `patients` SET `Btc` = '".$_POST['btc']."', `Utc`  = '".$_POST['utc']."', `Dc`  = '".$_POST['dc']."', `Grndtotal` = '.$tot.',`Cashier`  = '".$_POST['cashna']."' where`Ref` =  '".$_SESSION['ref']."' ";
		$querys = mysqli_query($conn,$sql2);
		if($querys){
			$sql = " SELECT * FROM `patients` WHERE `Ref` = '".$_SESSION['ref']."' ";
		    $query =  mysqli_query($conn, $sql );
		    $row = mysqli_fetch_assoc($query);
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
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
 <script src="jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<style>
.back{
  background-image: url("images/bg.jpg");
background-size:cover;
background-image: no-repeat;
}

</style>
</head> 
<body class="back">
    <h1 class="text-center" style="color: #42327a;background-color:#ccc;border:1px solid #fff;padding:20px;">Cashier</h1>
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
			<legend style="color:#d8bc35;"><b>Drug Prescription</b></legend>
			      <!-------------<div class="form-group">						     
                               <input type="checkbox" name="gitserv3" value="1001" > Refer To Pharmacist                            
				 </div>
				 <label>Drug Prescription</label>
				------> <div class="form-group">
				         <textarea rows="9" class="form-control" name="drudpre"placeholder="List Drugs Here" style="resize:none;"><?php echo $row['Prescibe']; ?></textarea>
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
	</form>
	</div>
	 <div class="col-sm-6 col-sm-offset-3" >
	 <form method="post" action="">
	 <label style="color:#d8bc35;">Blood Test Cost</label>
	<div class="form-group">
				<input class="form-control" type="number"  name="btc" id="btc" placeholder="Blood Test Cost" required />
			</div>
       <label style="color:#d8bc35;">Urine Test Cost</label>			
            <div class="form-group">
				<input class="form-control" type="number" name="utc" id="utc " placeholder="Urine Test Cost" required />
			</div>
       <label style="color:#d8bc35;">Drugs Cost</label>						
            <div class="form-group">
				<input class="form-control" type="number" name="dc" id="dc " placeholder="Drugs Cost" required />
			</div>
			<label style="color:#d8bc35;">Cashier Name</label>						
            <div class="form-group">
				<input class="form-control" type="text" name="cashna" id="cashna " placeholder="Cashier Name" required />
			</div>
			<input class="btn btn-success pull-right" type="submit" name="send" id="saveBill " value="SaveBill" />
	</form>
		</div>
		<div class="clearfix"></div><br>
		   <div class="col-sm-6 col-sm-offset-3" id="printRec" style="background-color:#fff;boder:1px dotted #42327a; border-style:double;height:320px;margin-bottom:20px;">
					<center style="color:white;" style="margin-top:20px;">UPSA CLINIC</center>
					<ul class="list-inline text-center">
					<li><h4>Kpone Poly Clinic</h4></li>
					<li><img class="img-rounded"src="images/UPSA.png" height="50" width="50"alt="upsa image" style=""></li>
					</ul>
					<div class="divider" style="background-color: #e5e5e5;height: 2px;margin: 9px 0;"></div>
						<p><br></p>
						<ul>
						<li><b>Blood Test Cost: <i style="color:#42327a;float:right;">GH <?php echo $row['Btc']; ?> .00</i></b></li>
						<li><b>Urine Test Cost: <i style="color:#42327a;float:right;">GH <?php echo $row['Utc']; ?> .00</i></b></li>
						<li><b>Drugs Cost: <i style="color:#42327a;float:right;">GH <?php echo $row['Dc']; ?> .00</i></b></li>
						</ul>
						<h4 class="pull-right">Grand Total: <i style="color:#42327a;pull-right">GH  <?php echo $row['Grndtotal']; ?> .00</i></h4><br>
						<h4 class="pull-right">Cashier:   <?php echo $row['Cashier']; ?> Signature....................</h4>
						<div class="clearfix"></div>
						<div class="clearfix"></div>
						<button type="button" class="btn btn-info pull-right"id="print_button2">PrintBill</button>
		   </div>
</body>
<!--------------- print ------------>
   <script>
	$(document).ready(function(){
		$("#print_button22").click(function(){
			alert("go");
		});
	});
  </script>
  <!--------------- print ------------>
<script>
    $(document).ready(function(){
         $("#print_button2").click(function(){
            var mode = 'iframe'; // popup
            var close = mode == "popup";
            var options = { mode : mode, popClose : close};
            $("#printRec").printArea(options);
        });
    });

  </script>
</html>