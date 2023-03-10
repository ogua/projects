<?php
	include('db.php');
	session_start();
	if(isset($_POST['DelBranch'])){
		$id = $_POST['cid'];
		$sql = "DELETE FROM `Branch` WHERE `id` = '$id'";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"Failed to Delete Information";
		}
	}
	if(isset($_POST['Delmanager'])){
		$id = $_POST['cid'];
		$sql = "DELETE FROM `manager` WHERE `id` = '$id'";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"Failed to Delete Information";
		}
	}
	if(isset($_POST['DelAgent'])){
		$id = $_POST['cid'];
		$sql = "DELETE FROM `agent` WHERE `id` = '$id'";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"Failed to Delete Information";
		}
	}
	if(isset($_POST['Delpolicy'])){
		$id = $_POST['cid'];
		$sql = "DELETE FROM `policy` WHERE `id` = '$id'";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"Failed to Delete Information";
		}
	}
	if(isset($_POST['DelCustomer'])){
		$id = $_POST['cid'];
		$sql = "DELETE FROM `customers` WHERE `id` = '$id'";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"Failed to Delete Information";
		}
	}
	
	if(isset($_POST['delcustomerpolicy'])){
		$id = $_POST['cid'];
		$sql = "DELETE FROM `customerpolicy` WHERE `id` = '$id'";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"Failed to Delete Information";
		}
	}
	
	if(isset($_POST['UpdateStatus'])){
		$id = $_POST['cid'];
		$sql = "UPDATE `claims` SET `status` = '1' WHERE `id` = '$id' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"Failed to Approve Claim";
		}
	}
	
	if(isset($_POST['UpdateStatus2'])){
		$id = $_POST['cid'];
		$sql = "UPDATE `claims` SET `status` = '0' WHERE `id` = '$id' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"Failed to UnApprove Claim";
		}
	}
	
	
	
	if(isset($_POST['generate'])){
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		// Output: 54esmdr0qf
		echo substr(str_shuffle($permitted_chars), 0, 8);
		 
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		// Output: video-g6swmAP8X5VG4jCi.mp4
		echo substr(str_shuffle($permitted_chars), 0, 8);
		
	}
	
	if(isset($_POST['getPolicyDetails'])){
		$sql = "SELECT * FROM `policy` WHERE `name` = '".$_POST['text']."'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
	
	if(isset($_POST['getPolicyAmount'])){
		if($_POST['text'] == "HEALTH INSURANCE"){
			echo"30000";
		}if($_POST['text'] == "HOUSE INSURANCE"){
			echo"50000";
		}if($_POST['text'] == "PROPERTY INSURANCE"){
			echo"70000";
		}if($_POST['text'] == "TRAVEL INSURANCE"){
			echo"80000";
		}if($_POST['text'] == "VEHICLE INSURANCE"){
			echo"60000";
		}
	}
	
	if(isset($_POST['CustomerReport'])){
		//get rows query
			$query = mysqli_query($conn, "SELECT * FROM `customers` WHERE `dates` BETWEEN '".$_POST['tfrm']."' AND '".$_POST['tto']."'");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Customers Name</th>
						<th>Age</th>
						<th>Gender</th>
						<th>Volters ID</th>
						<th>Contact</th>
						<th>Email</th>
						<th>Date Registered</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['age'].'</td>
				<td>'.$row['gender'].'</td>
				<td>'.$row['voltersid'].'</td>
				<td>'.$row['contact'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['dates'].'</td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
				<hr>
				<a href="#" id="print_button" class="btn btn-success">Print Report</a>
			</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Customer Registered Yet</strong></div>';
			}
	}
	
	if(isset($_POST['AgentReport'])){
		//get rows query
			$query = mysqli_query($conn, "SELECT * FROM `agent` WHERE `dates` BETWEEN '".$_POST['tfrm']."' AND '".$_POST['tto']."'");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Agents Name</th>
						<th>Age</th>
						<th>Gender</th>
						<th>Volters ID</th>
						<th>Contact</th>
						<th>Email</th>
						<th>Date Registered</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['age'].'</td>
				<td>'.$row['sex'].'</td>
				<td>'.$row['voltersid'].'</td>
				<td>'.$row['contact'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['dates'].'</td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
				<hr>
				<a href="#" id="print_button" class="btn btn-success">Print Report</a>
			</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Agent Registered Yet</strong></div>';
			}
	}
	
	if(isset($_POST['PolicyCusReport'])){
		//get rows query
			$query = mysqli_query($conn, "SELECT * FROM `customerpolicy` WHERE `dates` BETWEEN '".$_POST['tfrm']."' AND '".$_POST['tto']."'");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Customers Name</th>
						<th>Policy</th>
						<th>Amount</th>
						<th>Premium</th>
						<th>Premium Type</th>
						<th>Date Registered</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['Customername'].'</td>
				<td>'.$row['policy'].'</td>
				<td>'.$row['policyAmount'].'</td>
				<td>'.$row['premium'].'</td>
				<td>'.$row['premiumType'].'</td>
				<td>'.$row['dates'].'</td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
				<hr>
				<a href="#" id="print_button" class="btn btn-success">Print Report</a>
			</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Policy Registered Yet by Any Customer</strong></div>';
			}
	}
	
	if(isset($_POST['RepotcustClaims'])){
		//get rows query
			$query = mysqli_query($conn, "SELECT * FROM `claims` WHERE `customerid` = '".$_SESSION['id']."' AND `dates` BETWEEN  '".$_POST['tfrm']."' AND '".$_POST['tto']."'");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Customers Name</th>
						<th>Policy</th>
						<th>Entitled</th>
						<th>Description</th>
						<th>Status</th>
						<th>Date Sent</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['policy'].'</td>
				<td>'.$row['entitled'].'</td>
				<td>'.$row['descrbclaim'].'</td>
				<td>';
					if($row['status'] == "0"){
						echo'<p class="text-danger">Claim Processing...<i class="fa fa-refresh fa-spin"></i></p>';
					}else{
						echo'<p class="text-success">Claim Approved <i class="fa fa-check"></i></p>';
					}
					echo'
				</td>
				<td>'.$row['dates'].'</td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
				<hr>
				<a href="#" id="print_button" class="btn btn-success">Print Report</a>
			</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Policy Claim Sent Yet</strong></div>';
			}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	if(isset($_POST['gettotusers'])){
		$sql = "SELECT * FROM `customers`";
		$query = mysqli_query($conn,$sql);
		echo $result = mysqli_num_rows($query);
	}
	
	if(isset($_POST['gettotpolicy'])){
		$sql = "SELECT * FROM `customerpolicy` WHERE `customerid` = '".$_SESSION['id']."'";
		$query = mysqli_query($conn,$sql);
		echo $result = mysqli_num_rows($query);
	}
	
	if(isset($_POST['gettoAgents'])){
		$sql = "SELECT * FROM `agent`";
		$query = mysqli_query($conn,$sql);
		echo $result = mysqli_num_rows($query);
	}
	
	if(isset($_POST['totmanagers'])){
		$sql = "SELECT * FROM `manager`"; 
		$query = mysqli_query($conn,$sql);
		echo $result = mysqli_num_rows($query);
	}
	
	if(isset($_POST['totbranches'])){
		$sql = "SELECT * FROM `branch`"; 
		$query = mysqli_query($conn,$sql);
		echo $result = mysqli_num_rows($query);
	}
	
	
	
	
	
?>