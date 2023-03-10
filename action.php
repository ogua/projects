<?php
	include('db.php');
	session_start();
	
	if(isset($_POST['getEventid'])){
		$sql = "SELECT max(`Eventid`) as maxnumber  FROM `event` ";
		$query = mysqli_query($conn,$sql);
		$row  = mysqli_fetch_array($query);
		echo $resul = $row['maxnumber'] + 1;
	}
	
	if(isset($_POST['gettotusers'])){
		$sql = "SELECT * FROM `users`";
		$query = mysqli_query($conn,$sql);
		$resul  = mysqli_num_rows($query);
		echo $resul;
	}
	
	if(isset($_POST['gettoprodcts'])){
		$sql = "SELECT * FROM `products`";
		$query = mysqli_query($conn,$sql);
		$resul  = mysqli_num_rows($query);
		echo $resul;
	}
	
	if(isset($_POST['totsales'])){
		$sql = "SELECT SUM(`Quantity`) FROM sale";
		$query = mysqli_query($conn,$sql);
		$row  = mysqli_fetch_array($query);
		echo $row['SUM(`Quantity`)'];
	}
	if(isset($_POST['toexpied'])){
		$sql = "SELECT sum(`Quantity`) ,DATEDIFF(`ExpirinDate`,`ManufacDate`) as datediff FROM products WHERE DATEDIFF(`ExpirinDate`,`ManufacDate`)  < 0";
		$query = mysqli_query($conn,$sql);
		$row  = mysqli_fetch_array($query);
		echo $row['sum(`Quantity`)'];
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