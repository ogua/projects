<?php
	include('db.php');
	session_start();
	if(isset($_POST['SerchAirtest'])){
		$name = $_POST['text'];
		$query = mysqli_query($conn, "SELECT * FROM `airtest` WHERE `fullname` LIKE '%$name%'");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Date of Birth</th>
						<th>Email</th>
						<th>Telephone</th>
						<th>Genre</th>
						<th>Label</th>
						<th>Country</th>
						<th>Added</th>
						<th>View</th>
						<th>Del</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['fullname'].'</td>
				<td>'.$row['gender'].'</td>
				<td>'.$row['dateofbirth'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['telephone'].'</td>
				<td>'.$row['genre'].'</td>
				<td>'.$row['label'].'</td>
				<td>'.$row['country'].'</td>
				<td>'.$row['dates'].'</td>
				<td><a href="artistview.php?id='.$row['id'].'" id="viewArtist" cid="'.$row['id'].'" class=" btn btn-info"><span class="fa fa-eye"></span></a></td>
				<td><a href="#" id="delectartsist" cid="'.$row['id'].'" class="delecthostel btn btn-danger"><span class="fa fa-trash"></span></a></td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
			</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Artist With Such Name</strong></div>';
			}
	}
	
	if(isset($_POST['AllArtists'])){
		$query = mysqli_query($conn, "SELECT * FROM `airtest`");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Date of Birth</th>
						<th>Email</th>
						<th>Telephone</th>
						<th>Genre</th>
						<th>Label</th>
						<th>Country</th>
						<th>Added</th>
						<th>View</th>
						<th>Del</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['fullname'].'</td>
				<td>'.$row['gender'].'</td>
				<td>'.$row['dateofbirth'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['telephone'].'</td>
				<td>'.$row['genre'].'</td>
				<td>'.$row['label'].'</td>
				<td>'.$row['country'].'</td>
				<td>'.$row['dates'].'</td>
				<td><a href="artistview.php?id='.$row['id'].'" id="viewArtist" cid="'.$row['id'].'" class=" btn btn-info"><span class="fa fa-eye"></span></a></td>
				<td><a href="#" id="delectartsist" cid="'.$row['id'].'" class="delecthostel btn btn-danger"><span class="fa fa-trash"></span></a></td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
			</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Artist With Such Name</strong></div>';
			}
	}
	
	if(isset($_POST['AirtestReport'])){
		//get rows query
			$query = mysqli_query($conn, "SELECT * FROM `airtest` WHERE `dates` BETWEEN '".$_POST['tfrm']."' AND '".$_POST['tto']."'");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Date of Birth</th>
						<th>Email</th>
						<th>Telephone</th>
						<th>Genre</th>
						<th>Label</th>
						<th>Country</th>
						<th>Added</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['fullname'].'</td>
				<td>'.$row['gender'].'</td>
				<td>'.$row['dateofbirth'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['telephone'].'</td>
				<td>'.$row['genre'].'</td>
				<td>'.$row['label'].'</td>
				<td>'.$row['country'].'</td>
				<td>'.$row['dates'].'</td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
				<a href="#" id="print_button" class="btn btn-success">Print Report</a>
				</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Record Found</strong></div>';
			}
		
	}
	
	if(isset($_POST['BookinReport'])){
		//get rows query
			$query = mysqli_query($conn, "SELECT * FROM `booking` WHERE `dates` BETWEEN '".$_POST['tfrm']."' AND '".$_POST['tto']."'");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Artist Booked</th>
						<th>Date Booked</th>
						<th>Event Booked</th>
						<th>Booked By</th>
						<th>Email</th>
						<th>Telephone</th>
						<th>Gender</th>
						<th>Added</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['Artistname'].'</td>
				<td>'.$row['dates'].'</td>
				<td>'.$row['event'].'</td>
				<td>'.$row['fullname'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['telephone'].'</td>
				<td>'.$row['gender'].'</td>
				<td>'.$row['dates'].'</td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
				<a href="#" id="print_button" class="btn btn-success">Print Report</a>
				</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Report Found!</strong></div>';
			}
	}
	
	if(isset($_POST['AirtestReportA'])){
		//get rows query
			$query = mysqli_query($conn, "SELECT * FROM `booking`  WHERE `id` = '".$_SESSION['id']."' AND `dates` BETWEEN '".$_POST['tfrm']."' AND '".$_POST['tto']."'");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">		
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Booked By</th>
						<th>Date Booked</th>
						<th>Event Booked</th>
						<th>Email</th>
						<th>Telephone</th>
						<th>Gender</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['fullname'].'</td>
				<td>'.$row['dates'].'</td>
				<td>'.$row['event'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['telephone'].'</td>
				<td>'.$row['gender'].'</td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
				<a href="#" id="print_button" class="btn btn-success">Print Report</a>
				</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Record to Display</strong></div>';
			}
	}
	
	if(isset($_POST['delArtist'])){
		$id = $_POST['cid'];
		$sql = "DELETE FROM `airtest` WHERE `id` = '$id'";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo'success';
		}else{
			echo'Failed to delete artist Details';
		}
	}
	
	if(isset($_POST['delBooking'])){
		$id = $_POST['cid'];
		$sql = "DELETE FROM `booking` WHERE `id` = '$id'";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo'success';
		}else{
			echo'Failed to delete Booking Details';
		}
	}
	
	
	
	
	
	
	
	
	
?>