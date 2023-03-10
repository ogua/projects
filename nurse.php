<?php
	  session_start();
	  error_reporting(0);
      include('db.php');
      $queryAll = mysqli_query($conn,"SELECT max(`Ref`) as maxnum FROM `patients`");
      $row = mysqli_fetch_assoc($queryAll);
       $allRows = $row['maxnum'];
	  if(strlen($allRows) == 6 || strlen($allRows) > 6){
		 $memsub = substr($allRows,3,3)."<br>";
		 $addtomem = (int)$memsub + 1;
			if(strlen($addtomem) == 1){
				$memberid = 'REF00'.$addtomem;
			}if(strlen($addtomem) == 2){
				$memberid = 'REF0'.$addtomem;
			}if(strlen($addtomem) > 2){
				$memberid = 'REF'.$addtomem;
			}
	 }else{
		 $memsubAdd =  $allRows + 1;
		 $memberid = "REF00".$memsubAdd;
	}
	  
	  	if(isset($_POST['send'])){
	  $sql = " INSERT INTO `patients`(`Ref`, `firstname`, `othernames`,`contact`, `temperature`, `height`, `PWeight`,
	  `Bp`, `Age`, `dateofBirth`, `room`, `Reason`) VALUES 
	  ( '".$_POST['Studpref']."','".$_POST['prefname']."', '".$_POST['prefoname']."', '".$_POST['prefcnumb']."', '".$_POST['preftmpe']."',
	  '".$_POST['prefheig']."',  '".$_POST['prefweig']."', '".$_POST['prefbp']."', '".$_POST['prefage']."', '".$_POST['prefwei']."', '".$_POST['opt']."','".$_POST['prefpissue']."') ";
	  $query = mysqli_query($conn,$sql);
      if($query){
		 echo '
			<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Details Submitted SuccessFully</strong></div> 
		 ';
	  }else{
		echo'
			<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed to Insert Data Try again Later</strong></div> 
		';
	  }
	}
	if(isset($_POST['logout'])){
		session_destroy();
		header("location:index.php");
	}
	
	if(isset($_POST['searchs'])){
		$sql = "SELECT * FROM `patients` WHERE `Ref` =  '".$_POST['prefs']."'";
		$query = mysqli_query($conn,$sql);
		if($query){
			$rows = mysqli_fetch_array($query);
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
<script src="js/jquery-3.2.1.min.js"></script>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<style>
.back{
  background-image: url("images/samuel-zeller-113381.jpg");
background-size:cover;
background-image: no-repeat;
}

</style>
</head> 
<body class="back">
       <h1 class="text-center">Nurse Department</h1>
	   	 <img class="img-rounded"src="images/UPSA.png" height="100" width="100"alt="upsa image" style="position:absolute;margin-left:20px;">

	   <form method="post" action="" >
	   
	    <div class="form-group pull-right" style="margin-right:20px;">
		      <div class="col-sm-9">
					 <label style="font-size:20px;color:white;">Welcome: <?php echo $_SESSION['name']; ?></label>
			  </div>
			  <div class="col-sm-3">
				<input type="submit" style="background-color: #d8bc35;border-color: #d8bc35;" name="logout" id="logout" class="btn btn-success"value="logout" />
				</div>
	   </div><br>
	   </form>
	        <div class="col-sm-5 col-sm-offset-2" style="margin-top:20px;margin-bottom:20px;">

	   <form method="post" action="">
			        <div class="form-group">
                                <div class="col-sm-5">
                                    <input type="text" id="prefs" name="prefs" placeholder="REFERENCE NUMBER TO SEARCH" class="form-control" required="required">
                                </div>
                                <div class="col-sm-2">
			         	         <input type="submit" style="background-color: #42327a;border-color: #42327a;" name="searchs" id="searchs" class="btn btn-success pull-right"value="search" />			
                                </div>	
								<div class="col-md-2">
									<input type="button" class="btn btn-danger" value="Clear" id="clear">
								</div>
						    </div>
			   </form>
			   </div>
			   <script>
					$("#clear").click(function(e){
						e.preventDefault();
						$("#prefname").val("");
						$("#prefoname").val("");
						$("#prefcnumb").val("");
						$("#preftmpe").val("");
						$("#prefheig").val("");
						$("#prefweig").val("");
						$("#prefbp").val("");
						$("#prefage").val("");
						$("#prefwei").val("");
						$("#prefpissue").val("");
						$("#opt").val("");
					});
			   </script>
     <div class="col-sm-6 col-sm-offset-3" style="margin-top:20px;margin-bottom:20px;">
	  
		<form method="post" action="" >
		  <div class="form-group">
				<input class="form-control" style="color: red;"type="text"  value="<?php echo $memberid; ?>"  name="Studpref" id="Studpref" placeholder="Patient's RefID" required />
			</div>
			<!--<div class="form-group">
				<input class="form-control"type="number"  value="<?php echo $rows['PatientID']; ?>"name="preid" id="username" placeholder="Patient's ID" required />
			</div>--->
			<div class="form-group">
				<input class="form-control" type="text" name="prefname" value="<?php echo $rows['firstname']; ?>"id="prefname" placeholder="Patient's FirstName" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="prefoname"value="<?php echo $rows['othernames']; ?>" id="prefoname" placeholder="Patient's OtherNames" required />
			</div>
			<!----<div class="form-group">
				<select class="form-control" name="prefcou" style="width:200px">
				<option value="">Select Programme</<option>
				 <option value="Banking and Finance">Banking and Finance</<option>
				<option value="IT Management">IT Management</<option>
				<option value="Accounting">Accounting</<option>
				<option value="Marketing">Marketing</<option>
				</select>
			</div>--->
			<div class="form-group">
				<input class="form-control" type="number" name="prefcnumb" value="<?php echo $rows['contact']; ?>"id="prefcnumb" placeholder="Patient's Contact Number" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="number" name="preftmpe" value="<?php echo $rows['temperature']; ?>"id="preftmpe" placeholder="Patient's Temperature" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="prefheig" value="<?php echo $rows['height']; ?>"id="prefheig" placeholder="Patient's height" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="prefweig" value="<?php echo $rows['PWeight']; ?>"id="prefweig" placeholder="Patient's Weight" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="number" name="prefbp" value="<?php echo $rows['Bp']; ?>"id="prefbp" placeholder="Patient's BP" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="number" name="prefage"value="<?php echo $rows['Age']; ?>" id="prefage" placeholder="Patient's Age" required />
			</div>
			<label style="color:white;">Patient's Date of Birth</label>
			<div class="form-group">
				<input class="form-control" type="date" name="prefwei" value="<?php echo $rows['dateofBirth']; ?>"id="prefwei" required />
			</div>
				<?php
					if($rows['room'] !=""){
						echo'
							<div class="form-group">
								<input class="form-control" type="text" id="opt" name="opt" value="'.$rows['room'].'" id="opt"  placeholder="Room Number" required />
							</div>
						';
					}else{
						echo'
						<div class="form-group">
							<select class="form-control" name="opt" id="opt" style="width:200px" required>
							<option value="">Room Number</<option>
							<option value="ROOM 1">Room 1</<option>
							<option value="ROOM 2">Room 2 </<option>
							<option value="ROOM 3">Room 3 </<option>
							</select>
						</div>

						';
					}
				?>
			<div class="form-group">
				<textarea class="form-control" id="prefpissue" name="prefpissue"placeholder="Enter Patient's issue" style="resize:none;"><?php echo $rows['Reason']; ?></textarea>
			</div>
			<input type="submit" style="background-color: #d8bc35;border-color: #d8bc35;" name="send" id="send" class="btn btn-sm btn-success pull-right"value="Submit" />
		</form>
	 </div>
</body>
</html>