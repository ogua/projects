

<?php
   //error_reporting(0);
	session_start();
	include_once("db.php");
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

	if(isset($_POST['login'])){
		echo $_POST['uname'];
	}
	
	
	if(isset($_POST['getIDDoc'])){
	 $sql = "SELECT max(`docID`) as MaxNumber FROM `doctors`";
	 $query = mysqli_query($conn,$sql);
	 if($query){
	 $row = mysqli_fetch_array($query);
	 $num = $row['MaxNumber'];
	 $num3 = substr($num,4,10);
	 $num2 = substr($num,0,4);
	 $num4 = $num3 + 1;
	 echo $num2.$num4;
	 }else{
		 echo"failed";
	 }
	}
	
	if(isset($_POST['ViewAppmntid'])){
	 $sql = "SELECT max(`appntmntid`) as MaxNumber FROM `newbooking`";
	 $query = mysqli_query($conn,$sql);
	 if($query){
	 $row = mysqli_fetch_array($query);
	 $num = $row['MaxNumber'];
	 $num3 = substr($num,4,10);
	 $num2 = substr($num,0,4);
	 $num4 = $num3 + 1;
	 echo $num2.$num4;
	 }else{
		 echo"failed";
	 }
	}
	
	if(isset($_POST['ViewUserid'])){
	 $sql = "SELECT max(`userId`) as MaxNumber FROM `patiencedetails`";
	 $query = mysqli_query($conn,$sql);
	 if($query){
	 $row = mysqli_fetch_array($query);
	 $num = $row['MaxNumber'];
	 $num3 = substr($num,4,10);
	 $num2 = substr($num,0,4);
	 $num4 = $num3 + 1;
	 echo $num2.$num4;
	 }else{
		 echo"failed";
	 }
	}
	
	if(isset($_POST['addDoctor'])){
		$dcid = $_POST['text'];
		if(strlen($_POST['text4']) !== 10 || !is_numeric($_POST['text4'])){
			echo "error1";
			exit;
		}
		
		if(!filter_var($_POST['text5'], FILTER_VALIDATE_EMAIL)){
			echo "error2";
			exit;
		}
		
		if(strlen($_POST['text8']) < 6){
			echo "error3";
			exit;
		}
		
		$sql = "INSERT INTO `doctors`(dates,`name`, `address`, `mobi`, `email`, `category`,`docID`,`username`,`password`,`Role`) 
		VALUES (CURRENT_DATE,'".$_POST['text2']."','".$_POST['text3']."','".$_POST['text4']."','".$_POST['text5']."','".$_POST['text6']."','$dcid','".$_POST['text7']."','".$_POST['text8']."','".$_POST['text9']."')";
		$query = mysqli_query($conn,$sql);
		if($query){
			$sql2 = "INSERT INTO `login`(`userid`, `username`, `password`, `Role`) 
			VALUES ('".$_POST['text']."','".$_POST['text7']."','".$_POST['text8']."','".$_POST['text9']."')";
			$query2 = mysqli_query($conn,$sql2);
			if($query2){
					echo'success';		 
			}else{
				 echo'error3';		 

		         }
		}
	}
	
	if(isset($_POST['viewDoc'])){
		$sql = "SELECT * FROM `doctors`";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo '    <div class="table-responsive" >	
						<table class="table table-striped" style="background-color:#abc;">
						<thead class="bg-danger">
							<tr>
								<th style="color:red;"><b>Doc ID</b></th>
								<th style="color:red;"><b>Name</b></th>
								<th style="color:red;"><b>Address</b></th>
								<th style="color:red;"><b>Mobile</b></th>
								<th style="color:red;"><b>Category</b></th>
								<th style="color:red;"><b>Added</b></th>
							</tr>
						</thead>
						<tbody>';
			while($row = mysqli_fetch_array($query)){
				$add = $row['address'];
				$addl = strtolower($add);
				 echo'
				  <tr>
					        <td><b>'.$row['docID'].'</b></td>
							<td><b>'.ucwords($row['name']).'</b></td>
							<td><b>'.ucwords($addl).'</b></td>
							<td><b>'.$row['mobi'].'</b></td>
							<td><b>'.ucwords($row['category']).'</b></td>
							<td><b>'.facebook_time_ago($row['dateTime']).'</b></td>
					  </tr>
				  ';
			}
			 echo '
			  </tbody>
				</table> </div>                                
			  ';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong> No Results Failed! </div>';
		}
	}
	
	if(isset($_POST['ViewPatince'])){
		$sql = "SELECT * FROM `patiencedetails`";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo ' <div class="table-responsive" >	
						<table class="table table-striped" style="background-color:#abc;>
						<thead class="bg-danger">
							<tr>
								<th style="color:red;"><b>User ID</b></th>
								<th style="color:red;"><b>Name</b></th>
								<th style="color:red;"><b>Address</b></th>
								<th style="color:red;"><b>Contact</b></th>
								<th style="color:red;"><b>Email</b></th>
								
							</tr>
						</thead>
						<tbody>';
			while($row = mysqli_fetch_array($query)){
				$add = $row['address'];
				$addl = strtolower($add);
				
				$name = $row['name'];
				$namel = strtolower($name);
				 echo'
				  <tr>
					        <td><b>'.$row['userId'].'</b></td>
							<td><b>'.ucwords($namel).'</b></td>
							<td><b>'.ucwords($addl).'</b></td>
							<td><b>'.$row['contactno'].'</b></td>
							<td><b>'.strtolower($row['email']).'</b></td>
					  </tr>
				  ';
			}
			 echo '
			  </tbody>
				</table>  </div>                               
			  ';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong> No Results Failed! </div>';
		}
	}
	
	if(isset($_POST['ViewAppmntadmi'])){
		$sql = "SELECT * FROM `newbooking`";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo ' <div class="table-responsive" >	
						<table class="table table-striped table-responsive" style="background-color:#abc;>
						<thead class="bg-danger">
							<tr>
								<th style="color:red;"><b>User ID</b></th>
								<th style="color:red;"><b>Name</b></th>
								<th style="color:red;"><b>Doctors Name</b></th>
								<th style="color:red;"><b>Appointment Date</b></th>
								<th style="color:red;"><b>Booked</b></th>
								<th style="color:red;"><b>Cls</b></th>
							</tr>
						</thead>
						<tbody>';
			while($row = mysqli_fetch_array($query)){
				 echo'
				  <tr>
					        <td><b>'.$row['userid'].'</b></td>
							<td><b>'.$row['patientName'].'</b></td>
							<td><b>'.$row['doctor'].'</b></td>
							<td><b>'.$row['APdate'].'</b></td>
							<td><b>'.facebook_time_ago($row['datetime']).'</b></td>
			                <td><a href="#'.$row['id'].'" cid="'.$row['id'].'" style="background-color:ed;"class="deleadmin btn btn-danger" ><span class="glyphicon glyphicon-remove"></span></a></td>
					  </tr>
				  ';
			}
			 echo '
			  </tbody>
				</table>  </div>                               
			  ';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong> No Results Failed! </div>';
		}
	}
	
	if(isset($_POST['ViewAppmnt'])){
		$sql = "SELECT * FROM `newbooking` where userid = '".$_SESSION['userid']."' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo '
				<div class="table-responsive" >	
						<table class="table table-striped" style="background-color:#abc;>
						<thead class="bg-danger">
							<tr>
								<th style="color:red;"><b>User ID</b></th>
								<th style="color:red;"><b>Name</b></th>
								<th style="color:red;"><b>Doctors Name</b></th>
								<th style="color:red;"><b>Appointment Date</b></th>
								<th style="color:red;"><b>Booked</b></th>
								<th style="color:red;"><b>Cls</b></th>
							</tr>
						</thead>
						<tbody>';
			while($row = mysqli_fetch_array($query)){
				 echo'
				  <tr>
					        <td><b>'.$row['userid'].'</b></td>
							<td><b>'.$row['patientName'].'</b></td>
							<td><b>'.$row['doctor'].'</b></td>
							<td><b>'.$row['APdate'].'</b></td>
							<td><b>'.facebook_time_ago($row['datetime']).'</b></td>
			                <td><a href="#'.$row['id'].'" cid="'.$row['id'].'" style="background-color:ed;"class="delebooking btn btn-danger" ><span class="glyphicon glyphicon-remove"></span></a></td>
					  </tr>
				  ';
			}
			 echo '
			  </tbody>
				</table> 
			</div>
			  ';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong> No Results Failed! </div>';
		}
	}
	
	
	if(isset($_POST['ViewBooking'])){
		$sql = "SELECT * FROM `newbooking` where userid = '".$_SESSION['userid']."' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo '
			<div class="table-responsive" >	
						<table class="table table-striped table-responsive" style="background-color:#abc;>
						<thead class="bg-danger">
							<tr>
								<th style="color:red;"><b>User ID</b></th>
								<th style="color:red;"><b>Booking ID</b></th>
								<th style="color:red;"><b>Doctors Name</b></th>
								<th style="color:red;"><b>Date</b></th>
								<th style="color:red;"><b>Time</b></th>
								<th style="color:red;"><b>Booked</b></th>
							</tr>
						</thead>
						<tbody>';
			while($row = mysqli_fetch_array($query)){
				 echo'
				  <tr>
					        <td><b>'.$row['userid'].'</b></td>
							<td><b>'.$row['appntmntid'].'</b></td>
							<td><b>'.$row['doctor'].'</b></td>
							<td><b>'.$row['APdate'].'</b></td>
							<td><b>'.$row['ApTime'].'</b></td>
							<td><b>'.facebook_time_ago($row['datetime']).'</b></td>
					  </tr>
				  ';
			}
			 echo '
			  </tbody>
				</table> 
</div>				
			  ';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong> No Results Failed! </div>';
		}
	}if(isset($_POST['ViewBooking2'])){
		$sql = "SELECT * FROM `newbooking` where userid = '".$_SESSION['userid']."' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo '
			<div class="table-responsive" >	
						<table class="table table-striped table-responsive" style="background-color:#abc;>
						<thead class="bg-danger">
							<tr>
								<th style="color:red;"><b>User ID</b></th>
								<th style="color:red;"><b>Booking ID</b></th>
								<th style="color:red;"><b>Doctors Name</b></th>
								<th style="color:red;"><b>Treatment</b></th>
								<th style="color:red;"><b>Note</b></th>
								<th style="color:red;"><b>Booked</b></th>
							</tr>
						</thead>
						<tbody>';
			while($row = mysqli_fetch_array($query)){
				 echo'
				  <tr>
					        <td><b>'.$row['userid'].'</b></td>
							<td><b>'.$row['appntmntid'].'</b></td>
							<td><b>'.$row['doctor'].'</b></td>
							<td><b>'.$row['Treatment'].'</b></td>
							<td><b>'.$row['Denote'].'</b></td>
							<td><b>'.facebook_time_ago($row['datetime']).'</b></td>
					  </tr>
				  ';
			}
			 echo '
			  </tbody>
				</table> </div>                                
			  ';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong> No Results Failed! </div>';
		}
	}
	
	if(isset($_POST['ViewAppmntaddoc'])){
		$sql = "SELECT * FROM `doctors` WHERE `docID` = '".$_SESSION['userid']."' ";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		$rows = mysqli_fetch_array($query);
		if($result == 1){			
            $name = $rows['name'];
			$categ = $rows['category'];
			$sql2 = "SELECT * FROM `newbooking` WHERE `doctor` = '$name' AND `category` = '$categ' ";
			$query2 = mysqli_query($conn,$sql2);
			$result2 =  mysqli_num_rows($query2);
			if($result2 > 0){
				echo ' <div class="table-responsive" >	
						<table class="table table-striped" style="background-color:#abc;>
						<thead class="bg-danger">
							<tr>
								<th style="color:red;"><b>App ID</b></th>
								<th style="color:red;"><b>Name</b></th>
								<th style="color:red;"><b>Address</b></th>
								<th style="color:red;"><b>Mobile</b></th>
								<th style="color:red;"><b>Sex</b></th>
								<th style="color:red;"><b>Age</b></th>
								<th style="color:red;"><b>Time</b></th>
								<th style="color:red;"><b>Date</b></th>
							</tr>
						</thead>
						<tbody>';
			while($row = mysqli_fetch_array($query2)){
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
				</table>   </div>                              
			  ';
			}else{
				 echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>You Have No Appointment With Any Patient!</strong></div>';		 
			}
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong> No Results Failed! </div>';
		}
	}
	
	
	if(isset($_POST['check'])){
		
		if(strlen($_POST['text10']) !== 10 || !is_numeric($_POST['text10'])){
			echo '<script> alert("Invalid Mobile Number");</script>';
			exit;
		}
		
		$docname = $_POST['text4'];	
		
		echo '
				<h2 style="color:white;" class="text-center">Working Hours</h2>
		<div class="row">
			<div class="col-md-12">
				<a href="#"  class="cvalue btn btn-default" style="width:100%;">09:00 AM - 9:30 AM</a>
			</div>
			<div class="col-md-12">
			<a href="#"  class="cvalue btn btn-default" style="width:100%;">9:30 AM - 10:00 AM</a>
			</div>
			<div class="col-md-12">
			<a href="#" class="cvalue btn btn-default" style="width:100%;">10:00 AM - 10:30 AM</a>
			</div>
			<div class="col-md-12">
			<a href="#" class="cvalue btn btn-default" style="width:100%;">10:30 AM - 11:00 AM</a>
			</div>
			<div class="col-md-12">
			<a href="#" class="cvalue btn btn-default" style="width:100%;">11:00 AM - 11:30 AM</a>
			</div>
			<div class="col-md-12">
			<a href="#" class="cvalue btn btn-default" style="width:100%;">11:30 AM - 12:00 PM</a>
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-12">
			<a href="#" class="cvalue btn btn-default" style="width:100%;">12:00 PM - 12:30 PM</a>
			</div>
			<div class="col-md-12">
			<a href="#" class="cvalue btn btn-default" style="width:100%;">12:30 PM - 1:00 PM</a>
			</div>
			<div class="col-md-12">
			<a href="#" class="cvalue btn btn-default" style="width:100%;">01:00 PM - 1:30 PM</a>
			</div>
			<div class="col-md-12">
			<a href="#" class="cvalue btn btn-default" style="width:100%;">01:30 PM - 2:00 PM</a>
			</div>
			<div class="col-md-12">
			<a href="#" class="cvalue btn btn-default" style="width:100%;">02:00 PM - 2:30 PM</a>
			</div>
			<div class="col-md-12">
			<a href="#" class="cvalue btn btn-default" style="width:100%;">02:30 PM - 3:00 PM</a>
			</div>
		</div>
		';
		$sql = "SELECT * FROM `newbooking` WHERE `doctor` = '".$_POST['text4']."'";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		if($result > 0){
			echo '<h4 class="" style="color:#55938e;">Slot Booked To See Dr. '.$docname.' By Other Patients</h4>
			<div class="row">
			';
			while($row = mysqli_fetch_array($query)){
				echo'
				<div class="col-md-12">
						<a href="#" class="btn btn-danger" style="background-color:#20555d;border:#20555d;width:100%;">'.$row['ApTime'].'</a>
				</div>
				';
			}
			echo '</div><br>';
		}
		echo'
		<hr>
		<div class="clearfix"></div>
		<div class="col-sm-12">
			<h3 style="color:white;"> Enter Time Prefered To book an Appointment</h3>
			<div class="col-sm-4">				
				   <label class="text-info" style="color:white;">TIME FROM</label>
					<input type="time" id="nbukfrom" class="form-control">	
			</div>
			   <div class="col-sm-4">				
				   <label class="text-info" style="color:white;">TIME TO</label>
					<input type="time" id="nbukto"class="form-control">			  
			</div>
	           
		</div>
		<div class="clearfix"></div>
				<p><br></p>
		<input type="submit" value="Book"  style="background-color:#55938e;border:#55938e;" name="book" id="book" class="addbook btn btn-success btn-ms pull-right">
		<div class="clearfix"></div>
		<div class="displayCartMessage"></div>
		';
	}
	
	if(isset($_POST['Signup'])){
		$sql = "INSERT INTO `patiencedetails`(dates,`userId`, `name`, `address`, `contactno`, `email`, `username`, `password`)
		VALUES (CURRENT_DATE,'".$_POST['text']."','".$_POST['text2']."','".$_POST['text3']."','".$_POST['text4']."','".$_POST['text5']."','".$_POST['text6']."','".$_POST['text7']."')";
		$query = mysqli_query($conn,$sql);
		$affectd = mysqli_affected_rows($conn);
		if($affectd > 0){
			$sql2 = "INSERT INTO `login`(`userid`, `username`, `password`, `Role`) 
			VALUES ('".$_POST['text']."','".$_POST['text6']."','".$_POST['text7']."','Patient')";
			$query2 = mysqli_query($conn,$sql2);
			if($query2){
				echo'Successfully';		 
			}else{
				echo'failed';		 
			}
		}else{
			$result = mysqli_error($conn);
			echo $result;
		}
	}
	
	if(isset($_POST['Newbooking'])){	
		$sql = "SELECT * FROM `patiencedetails` WHERE `id`= '".$_SESSION['id'] ."' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			$row = mysqli_fetch_array($query);
			$name = $row['name'];
			$time = $_POST['text6']."-".$_POST['text7'];
			$sql3 = "SELECT * FROM `newbooking` WHERE `doctor` = '".$_POST['text4']."' AND `ApTime` = '$time' ";
			$query3 =  mysqli_query($conn,$sql3);
			$result3 = mysqli_num_rows($query3);
			if($result3 > 0){
					echo"failed! Slot Has Already been choosen by other patients, Try another Slot";	
					exit();
			}else{
				$sql2 = "INSERT INTO `newbooking`(dates,`appntmntid`, `userid`, `category`, `doctor`, `APdate`, `ApTime`,`patientName`,`Gender`,`Age`,`MobileNumber`,`Address`)
			    VALUES (CURRENT_DATE,'".$_POST['text']."','".$_POST['text2']."','".$_POST['text3']."','".$_POST['text4']."','".$_POST['text5']."','$time', '$name','".$_POST['text8']."','".$_POST['text9']."','".$_POST['text10']."','".$_POST['text11']."')";
		        $query2 = mysqli_query($conn,$sql2);
			    if($query2){
$key="4IdLh3Vb5vEYA4B4TJlJnHmoFNGzBzyGhLrzOnKUTpTut"; //your unique API key;
$number = $_POST['text10'];
$add = substr($number,1,9);
$results = "00233".$add;	
$msgs = "Hi, This is FIDEN MEDICAL CLINIC. thanks for booking an appointment with us. you booked ".$_POST['text4']." at ".$time." please make it a point to come on time. thank you!";
$phone = $results;
$message=urlencode($msgs); //encode url;
$sender_id = "FIDEN BOOKING";
/*******************API URL FOR SENDING MESSAGES********/
$url="https://apps.mnotify.net/smsapi?key=$key&to=$phone&msg=$message&sender_id=$sender_id";
/****************API URL TO CHECK BALANCE****************/
$urls="https://apps.mnotify.net/smsapi/balance?key=$key";
$result=file_get_contents($url); //call url and store result;
switch($result){                                           
    case "1000":
	echo "TEXT Message sent SuccessFully <br> Click ok to proceed";
	break;
    case "1002":
	echo "TEXT Message not sent <br> Click ok to proceed";
	break;
    case "1003":
	echo "You don't have enough balance <br> Click ok to proceed";
	break;
    case "1004":
	echo "Invalid API Key <br> Click ok to proceed";
	break;
    case "1005":
	echo "Phone number not valid <br> Click ok to proceed";
	break;
    case "1006":
	echo "Invalid Sender ID <br> Click ok to proceed";
	break;
    case "1008":
	echo "Empty message <br> Click ok to proceed";
	break;
}	
				echo'New Booking Booked SuccessFully';		 
			}else{
					echo'Patient Nooking failed! Try again Later';		 
			}
			}			
		}		
			
	}
	
	if(isset($_POST['updatePat'])){
		$sql = "UPDATE `patiencedetails` SET `address` = '".$_POST['text']."', `contactno`= '".$_POST['text2']."', `email` = '".$_POST['text3']."' WHERE `id` = '".$_SESSION['id']."' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			 echo'Update SuccessFully!';		 

		}else{
			 echo'Failed! Try again Later';		 

		}
	}
	
	if(isset($_POST['SearchDoc'])){
		$name = $_POST['text'];
		$sql = "SELECT * FROM `doctors` WHERE $name = '".$_POST['text2']."' ";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		if($result > 0){
			echo ' <div class="table-responsive" >	
						<table class="table table-striped style="background-color:#abc;>
						<thead class="bg-danger">
							<tr>
								<th style="color:red;"><b>Doctors ID</b></th>
								<th style="color:red;"><b>Doctors Name</b></th>
								<th style="color:red;"><b>Address</b></th>
								<th style="color:red;"><b>Mobile</b></th>
								<th style="color:red;"><b>Category</b></th>
							</tr>
						</thead>
						<tbody>';
			while($row = mysqli_fetch_array($query)){
				 echo'
				  <tr>
					        <td><b>'.$row['docID'].'</b></td>
							<td><b>'.$row['name'].'</b></td>
							<td><b>'.$row['address'].'</b></td>
							<td><b>'.$row['mobi'].'</b></td>
							<td><b>'.$row['category'].'</b></td>
					  </tr>
				  ';
			}
			 echo '
			  </tbody>
				</table>
</div>				
			  ';
		}else{
				 echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed! Select Another Category</strong></div>';		 
		}
	}
	
	if(isset($_POST['delebookings'])){
		$id = $_POST['cid'];
		echo'<div class="modal fadeIn" id="myModa2" role="dialog">
		<div class="modal-dialog">   
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title text-center">Cancel Booking</h4>
			</div>
			<div class="modal-body">
					<h3>Are You Sure You Want To Cancel This Booking</h3>
					<ul class="list-inline">
						<li><a href="#" cid="'.$id.'" class="deletit btn btn-danger">Yes</a></li>
						<li><a href="#" cid="" class="deletenot btn btn-success">No</a></li>
					</ul>
			</div>
		  </div>      
		</div>
	</div>';
	}
	
	if(isset($_POST['delebooking'])){
		$sql = "DELETE FROM `newbooking` WHERE `id` = '".$_POST['cid']."' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			 echo'Booking Cancel SuccessFully!';		 
		}else{
			echo'Failed! try again later';		 
		}
	}
	
	if(isset($_POST['deleadmin2'])){
		$id = $_POST['cid'];
		echo'<div class="modal fadeIn" id="myModa2" role="dialog">
		<div class="modal-dialog">   
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title text-center">Cancel Booking</h4>
			</div>
			<div class="modal-body">
					<h3>Are You Sure You Want To Cancel This Booking</h3>
					<ul class="list-inline">
						<li><a href="#" cid="'.$id.'" class="deletit btn btn-danger">Yes</a></li>
						<li><a href="#" cid="" class="deletenot btn btn-success">No</a></li>
					</ul>
			</div>
		  </div>      
		</div>
	</div>';
	}
	
	if(isset($_POST['deleadmin'])){
		$sql = "DELETE FROM `newbooking` WHERE `id` = '".$_POST['cid']."' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			 echo'Booking Cancel SuccessFully!';		 
		}else{
			echo'Failed! try again later';		 
		}
	}
	
	if(isset($_POST['getTreatment'])){
		$sql = "SELECT * FROM `newbooking` WHERE `appntmntid` = '".$_POST['text']."' ";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		if($result == 1){
			$row = mysqli_fetch_array($query);
			$pname = $row['patientName'];
			echo'
			    <div class="col-sm-12">
													<div class="col-sm-9">
														<div class="form-group">
																<input type="text" class="form-control" value="'.$row['patientName'].'" placeholder="PATIENT Name" disabled>
														</div>
													</div>
													<div class="col-sm-3">
													</div>
															
											 </div>
											 <div class="col-sm-12">
													<div class="col-sm-9">
														<div class="form-group">
																<input type="text" class="form-control" id="stretf" name="stretf" placeholder="TREATMENT FOR" >
														</div>
													</div>
													<div class="col-sm-3">
													</div>
															
											 </div>
											 <div class="col-sm-12">
													<div class="col-sm-9">
														<div class="form-group">
																<input type="text"  class="form-control" id="stret" name="stret" placeholder="TREATMENT" >
														</div>
													</div>
													<div class="col-sm-3">
													</div>
															
											 </div>
											 <div class="col-sm-12">
													<div class="col-sm-9">
														<div class="form-group">
																<textarea style="resize:none;" cols="4" id="snote" rows="4" class="form-control" placeholder="WRITE NOTE"></textarea>
														</div>
													</div>
													<div class="col-sm-3">
													</div>
											<div class="col-sm-12">
													<div class="col-sm-9">
														<div class="form-group">
																	<input type="submit" class="btn btn-info btn-sm pull-right" id="ssend" name="ssend" value="Add Note" >
														</div>
													</div>
													<div class="col-sm-3">
													</div>
															
					 </div>

			';
		}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed! Appointment ID Dont Exist</strong></div>';		 
	
		}
	}
	
	if(isset($_POST['searchSubmit'])){
		$sql = "UPDATE `newbooking` SET `TreatmentFor` = '".$_POST['text']."', `Treatment` ='".$_POST['text2']."' , `Denote` = '".$_POST['text3']."' WHERE `appntmntid` = '".$_POST['text4']."' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Submitted SuccessFully!</strong></div>';		 
		}else{
			echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed! Please Try Again</strong></div>';		 	
		}
	}
	
	if(isset($_POST['SearchSelect'])){
		$sql = "SELECT * FROM `doctors` WHERE `category` = '".$_POST['text']."'";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo '<div class="col-sm-12">
							<div class="form-group">
									<select  style="border-top-right-radius:25px;border-top-left-radius:25px;" name="docnames" id="docnames" class="form-control">
											<option value="">Select Doctor</option>';
			while($row = mysqli_fetch_array($query)){
				echo ' 
				<option value="'.$row['name'].'">'.$row['name'].'</option>	
				';
			}
			echo '
			</select>
		             </div>
						</div>
			';
		}else{
			echo '
			<div class="col-sm-12">
														   <div class="form-group">
																<select  style="border-top-right-radius:25px;border-top-left-radius:25px;" name="docnames" id="docnames" class="form-control">
																  <option value="">Select Doctor</option>
																   <option value="">No Doctor Available For Such Treatment</option>											 
																</select>
													        </div>
													</div>
			';
		}
	}
?>