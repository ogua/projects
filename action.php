<?php
	include_once('db.php');
	session_start();
	if(isset($_POST['Approvehostel'])){
		$id = $_POST['id'];
		$sql = "UPDATE `hostels` SET `Approval` = '1' WHERE id = '$id' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo'Hostel Approved Successfully';
		}else{
			echo'Failed, Try again Later';
		}
	}

	
	if(isset($_POST['Post1'])){
		echo'
			<div class="form-group">
				<select name="roomnumber" class="form-control">
				<option value="">Select Room Number</option>
				<option value="Room 1">Room 1</option>
				<option value="Room 2">Room 2</option>
				<option value="Room 3">Room 3</option>
				<option value="Room 4">Room 4</option>
				<option value="Room 5">Room 5</option>
				<option value="Room 6">Room 6</option>
				<option value="Room 7">Room 7</option>
				<option value="Room 8">Room 8</option>
				<option value="Room 9">Room 9</option>
				<option value="Room 10">Room 10</option>
				</select>
			</div>
		';
	}
	
	if(isset($_POST['Post2'])){
		echo'
			<div class="form-group">
				<select name="roomnumber" class="form-control">
				<option value="">Select Room Number</option>
				<option value="Room 11">Room 11</option>
				<option value="Room 12">Room 12</option>
				<option value="Room 13">Room 13</option>
				<option value="Room 14">Room 14</option>
				<option value="Room 15">Room 15</option>
				<option value="Room 16">Room 16</option>
				<option value="Room 17">Room 17</option>
				<option value="Room 18">Room 18</option>
				<option value="Room 19">Room 19</option>
				<option value="Room 20">Room 20</option>
				</select>
			</div>
		';
	}
	
	if(isset($_POST['Post3'])){
		echo'
			<div class="form-group">
				<select name="roomnumber" class="form-control">
				<option value="">Select Room Number</option>
				<option value="Room 21">Room 21</option>
				<option value="Room 22">Room 22</option>
				<option value="Room 23">Room 23</option>
				<option value="Room 24">Room 24</option>
				<option value="Room 25">Room 25</option>
				<option value="Room 26">Room 26</option>
				<option value="Room 27">Room 27</option>
				<option value="Room 28">Room 28</option>
				<option value="Room 29">Room 29</option>
				<option value="Room 30">Room 30</option>
				</select>
			</div>
		';
	}
	
	if(isset($_POST['Post4'])){
		echo'
			<div class="form-group">
				<select name="roomnumber" class="form-control">
				<option value="">Select Room Number</option>
				<option value="Room GTX 31">Room GTX 31</option>
				<option value="Room GTX 32">Room GTX 22</option>
				<option value="Room GTX 33">Room GTX 33</option>
				<option value="Room GTX 34">Room GTX 34</option>
				<option value="Room GTX 35">Room GTX 35</option>
				<option value="Room GTX 36">Room GTX 36</option>
				<option value="Room GTX 37">Room GTX 37</option>
				<option value="Room GTX 38">Room GTX 38</option>
				<option value="Room GTX 39">Room GTX 39</option>
				<option value="Room GTX 40">Room GTX 40</option>
				</select>
			</div>
		';
	}
	
	if(isset($_POST['Post5'])){
		echo'
			<div class="form-group">
				<select name="roomnumber" class="form-control">
				<option value="">Select Room Number</option>
				<option value="Room ACD 1">Room ACD 1</option>
				<option value="Room ACD 2">Room ACD 2</option>
				<option value="Room ACD 3">Room ACD 3</option>
				<option value="Room ACD 4">Room ACD 4</option>
				<option value="Room ACD 5">Room ACD 5</option>
				<option value="Room ACD 6">Room ACD 6</option>
				<option value="Room ACD 7">Room ACD 7</option>
				<option value="Room ACD 8">Room ACD 8</option>
				<option value="Room ACD 9">Room ACD 9</option>
				<option value="Room ACD 10">Room ACD 10</option>
				</select>
			</div>
		';
	}
	
	if(isset($_POST['Payonarrive'])){
		$sql = "INSERT INTO `payment`(`userid`, `hostleid`, `Amonnt`, `dates`, `status`) 
		VALUES('".$_SESSION['id']."','".$_SESSION['hostid']."','".$_SESSION['amnt']."',CURRENT_DATE,'Pay On Arrival')";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"Details Submitted Successfully";
		}else{
			echo"Failed to submit details";
		}
	}
	
	if(isset($_POST['gettotusers'])){
		$sql = "SELECT * FROM `users`";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		echo $result;
	}
	if(isset($_POST['getbooking'])){
		$sql = "SELECT * FROM `booking`";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		echo $result;
	}
	if(isset($_POST['getpublish'])){
		$sql = "SELECT * FROM `hostels` WHERE `Approval` = '1'";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		echo $result;
	}if(isset($_POST['getpending'])){
		$sql = "SELECT * FROM `hostels` WHERE `Approval` = '0'";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		echo $result;
	}
	
	
	if(isset($_POST['getnerate1'])){
		$sqlAll = mysqli_query($conn,"SELECT count(*) as numofrows FROM `hostels`  WHERE `Approval` = '1' AND dates BETWEEN '".$_POST['dfrom']."' AND '".$_POST['dto']."' ");
			$row = mysqli_fetch_assoc($sqlAll);
			$allrow = $row['numofrows'];
			//get rows query
			$sql = "SELECT * FROM `hostels`  WHERE `Approval` = '1' AND dates BETWEEN '".$_POST['dfrom']."' AND '".$_POST['dto']."'";
			$query = mysqli_query($conn,$sql);
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<button class="btn btn-default">Total Published Hostels&nbsp;<span style="font-size:1.0em;"class="badge">'.$allrow.'</span></button>	
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Hostel Name</th>
						<th>location</th>
						<th>Type of Hostel</th>
						<th>Number of rooms</th>
						<th>Room Size</th>
						<th>People per Room</th>
						<th>Aproved</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['location'].'</td>
				<td>'.$row['typeifHostel'].'</td>
				<td>'.$row['numofrooms'].'</td>
				<td>';
				if($row['roomsize'] == "1"){
				echo"Single Beds, Toliet + Bath";
			}else if($row['roomsize'] == "2"){
				echo "Joint Double Beds, Toliet + Bath";
			}else if($row['roomsize'] == "3"){
				echo "Two single beds, Toilet + bath";
			}else if($row['roomsize'] == "4"){
				echo "Single Beds, Toliet + Bath + Aircondition";
			}else if($row['roomsize'] == "5"){
				echo "Joint Double Beds, Toliet + Bath + Aircondition";
			}
				
				echo'</td>
				<td>'.$row['pplPerroom'].'</td>
				';
					if($row['Approval'] == "0"){
						echo '<td class="text-danger">No</td>';
					}else{
						echo '<td class="text-info">Yes</td>';
					}
					echo'
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
				<hr>
				<a href="#" id="print_button2" class="btn btn-sm btn-info pull-right">Print Report</a>
			</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Hostels Published Yet</strong></div>';
			}
	}
	
	if(isset($_POST['getnerate2'])){
		$sqlAll = mysqli_query($conn,"SELECT count(*) as numofrows FROM `hostels`  WHERE `Approval` = '0' AND dates BETWEEN '".$_POST['dfrom']."' AND '".$_POST['dto']."' ");
			$row = mysqli_fetch_assoc($sqlAll);
			$allrow = $row['numofrows'];
			//get rows query
			$sql = "SELECT * FROM `hostels`  WHERE `Approval` = '0' AND dates BETWEEN '".$_POST['dfrom']."' AND '".$_POST['dto']."'";
			$query = mysqli_query($conn,$sql);
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<button class="btn btn-default">Total Pending Hostels&nbsp;<span style="font-size:1.0em;"class="badge">'.$allrow.'</span></button>	
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Hostel Name</th>
						<th>location</th>
						<th>Type of Hostel</th>
						<th>Number of rooms</th>
						<th>Room Size</th>
						<th>People per Room</th>
						<th>Aproved</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['location'].'</td>
				<td>'.$row['typeifHostel'].'</td>
				<td>'.$row['numofrooms'].'</td>
				<td>';
				if($row['roomsize'] == "1"){
				echo"Single Beds, Toliet + Bath";
			}else if($row['roomsize'] == "2"){
				echo "Joint Double Beds, Toliet + Bath";
			}else if($row['roomsize'] == "3"){
				echo "Two single beds, Toilet + bath";
			}else if($row['roomsize'] == "4"){
				echo "Single Beds, Toliet + Bath + Aircondition";
			}else if($row['roomsize'] == "5"){
				echo "Joint Double Beds, Toliet + Bath + Aircondition";
			}
				
				echo'</td>
				<td>'.$row['pplPerroom'].'</td>
				';
					if($row['Approval'] == "0"){
						echo '<td class="text-danger">No</td>';
					}else{
						echo '<td class="text-info">Yes</td>';
					}
					echo'
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
				<hr>
				<a href="#" id="print_button2" class="btn btn-sm btn-info pull-right">Print Report</a>
			</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Hostels Pending Yet</strong></div>';
			}
	}
	
	
	if(isset($_POST['getnerate3'])){
		$sqlAll = mysqli_query($conn,"SELECT count(*) as numofrows FROM `users`  WHERE `role` != 'Admin' AND dates BETWEEN '".$_POST['dfrom']."' AND '".$_POST['dto']."'");
			$row = mysqli_fetch_assoc($sqlAll);
			$allrow = $row['numofrows'];
			//get rows query
			$query = mysqli_query($conn, "SELECT * FROM `users`  WHERE `role` != 'Admin' AND dates BETWEEN '".$_POST['dfrom']."' AND '".$_POST['dto']."'");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<button class="btn btn-default">Total Customers&nbsp;<span style="font-size:1.0em;"class="badge">'.$allrow.'</span></button>	
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone Number</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['phone'].'</td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
				<hr>
				<a href="#" id="print_button2" class="btn btn-sm btn-info pull-right">Print Report</a>
			</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Customers To Display</strong></div>';
			}
	}
	
	if(isset($_POST['UpadetForm'])){
		$uname = $_POST['uname'];
		$uemail = $_POST['uemail'];
		$upass = $_POST['uphone'];
		$userid = $_POST['id'];
		
		$sql = "UPDATE `users` SET `name` = '$uname', `email` = '$uemail', `phone` = '$upass' WHERE `id` = '$userid' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"User Information Updated Successfully!";
		}else{
			echo"Failed to Update User Information!";
		}
	}
	
	if(isset($_POST['getnerate5'])){
		$sqlAll = mysqli_query($conn,"SELECT count(*) as numofrows FROM `booking`  WHERE `userid` = '".$_SESSION['id']."' AND dates BETWEEN '".$_POST['dfrom']."' AND '".$_POST['dto']."'");
			$row = mysqli_fetch_assoc($sqlAll);
			$allrow = $row['numofrows'];
			//get rows query
			$sql = "SELECT * FROM `booking`  WHERE `userid` = '".$_SESSION['id']."' AND dates BETWEEN '".$_POST['dfrom']."' AND '".$_POST['dto']."'";
			$query = mysqli_query($conn,$sql);
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<button class="btn btn-default">Total Booking&nbsp;<span style="font-size:1.0em;"class="badge">'.$allrow.'</span></button>
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Phone Number</th>
						<th>Hostel Booked</th>
						<th>Floor Booked</th>
						<th>Room Number</th>
						<th>Room Type</th>
						<th>Status</th>
						<th>Payment Status</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['CustomerName'].'</td>
				<td>'.$row['CustomerPhone'].'</td>
				<td>'.$row['Hostelname'].'</td>
				<td>'.$row['hostelFloor'].'</td>
				<td>'.$row['HostelroomNum'].'</td>
				<td>'.$row['hostelRoomType'].'</td>
				<td>';
						if($row['status'] == "0"){
							echo"Submitted";
						}else{
							echo"Booked";
					}
										
				echo'
				</td>
				<td>';
				if($row['PaymentStatus'] == "0"){
					echo"No";
					}else{
				echo"Yes";
				}echo'
				</td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
				<hr>
				<a href="#" id="print_button2" class="btn btn-sm btn-info pull-right">Print Report</a>
			</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Hostels Booked Yet</strong></div>';
			}
	}
	
	if(isset($_POST['getnerate6'])){
		$sqlAll = mysqli_query($conn,"SELECT count(*) as numofrows FROM `booking`  WHERE `Hostelid` = '".$_SESSION['id']."' AND dates BETWEEN '".$_POST['dfrom']."' AND '".$_POST['dto']."'");
			$row = mysqli_fetch_assoc($sqlAll);
			$allrow = $row['numofrows'];
			//get rows query
			$sql = "SELECT * FROM `booking`  WHERE `Hostelid` = '".$_SESSION['id']."' AND dates BETWEEN '".$_POST['dfrom']."' AND '".$_POST['dto']."'";
			$query = mysqli_query($conn,$sql);
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<button class="btn btn-default">Total Booking&nbsp;<span style="font-size:1.0em;"class="badge">'.$allrow.'</span></button>
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Phone Number</th>
						<th>Hostel Booked</th>
						<th>Floor Booked</th>
						<th>Room Number</th>
						<th>Room Type</th>
						<th>Status</th>
						<th>Payment Status</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['CustomerName'].'</td>
				<td>'.$row['CustomerPhone'].'</td>
				<td>'.$row['Hostelname'].'</td>
				<td>'.$row['hostelFloor'].'</td>
				<td>'.$row['HostelroomNum'].'</td>
				<td>'.$row['hostelRoomType'].'</td>
				<td>';
						if($row['status'] == "0"){
							echo"Submitted";
						}else{
							echo"Booked";
					}
										
				echo'
				</td>
				<td>';
				if($row['PaymentStatus'] == "0"){
					echo"No";
					}else{
				echo"Yes";
				}echo'
				</td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
				<hr>
				<a href="#" id="print_button2" class="btn btn-sm btn-info pull-right">Print Report</a>
			</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Hostels Booked Yet</strong></div>';
			}
	}
	
?>