<?php
	include('db.php');
	session_start();
	if(isset($_POST['DelDrug'])){
		$sql = "DELETE FROM `druginfo` WHERE `id` = '".$_POST['cid']."' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"Unable to Delete Drug Information";
		}
	}
	
	
	if(isset($_POST['getnerate1'])){
		$sqlAll = mysqli_query($conn,"SELECT count(*) as numofrows FROM `druginfo`  WHERE `userid` = '".$_SESSION['id']."' AND dates BETWEEN '".$_POST['dfrom']."' AND '".$_POST['dto']."' ");
			$row = mysqli_fetch_assoc($sqlAll);
			$allrow = $row['numofrows'];
			//get rows query
			$query = mysqli_query($conn, "SELECT * FROM `druginfo`  WHERE `userid` = '".$_SESSION['id']."' AND dates BETWEEN '".$_POST['dfrom']."' AND '".$_POST['dto']."' ");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<button class="btn btn-default">Total Drugs  Published &nbsp;<span style="font-size:1.0em;"class="badge">'.$allrow.'</span></button>	
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Manufacturer Name</th>
						<th>Brand</th>
						<th>Name of Drug</th>
						<th>Manufacturing Date</th>
						<th>Expiring Date</th>
						<th>Serial Number</th>
						<th>Distributors</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['manufacturername'].'</td>
				<td>'.$row['brand'].'</td>
				<td>'.$row['drugname'].'</td>
				<td>'.$row['manufacdate'].'</td>
				<td>'.$row['Expdate'].'</td>
				<td>'.$row['serialNumber'].'</td>
				<td>'.$row['Distributor'].'</td>
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
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Drugs Published As At This Date</strong></div>';
			}
	}
	
	
	if(isset($_POST['totdrugpu'])){
		$sql = "SELECT * FROM `druginfo`  WHERE `userid` = '".$_SESSION['id']."'";
		$query = mysqli_query($conn,$sql);
		echo $result = mysqli_num_rows($query);
	}
	
	if(isset($_POST['totdrugpu2'])){
		$sql = "SELECT * FROM `druginfo`";
		$query = mysqli_query($conn,$sql);
		echo $result = mysqli_num_rows($query);
	}
	
	if(isset($_POST['getapprove'])){
		$sql = "SELECT * FROM `druginfo`  WHERE `userid` = '".$_SESSION['id']."' and status = '1'";
		$query = mysqli_query($conn,$sql);
		echo $result = mysqli_num_rows($query);
	}
	
	if(isset($_POST['getapprove2'])){
		$sql = "SELECT * FROM `druginfo`  WHERE status = '1'";
		$query = mysqli_query($conn,$sql);
		echo $result = mysqli_num_rows($query);
	}
	
	if(isset($_POST['getending'])){
		$sql = "SELECT * FROM `druginfo`  WHERE `userid` = '".$_SESSION['id']."' and status = '0' ";
		$query = mysqli_query($conn,$sql);
		echo $result = mysqli_num_rows($query);
	}
	
	if(isset($_POST['getending2'])){
		$sql = "SELECT * FROM `druginfo`  WHERE status = '0' ";
		$query = mysqli_query($conn,$sql);
		echo $result = mysqli_num_rows($query);
	}
	
	
	
	if(isset($_POST['getnerate2'])){
		//echo"gooooooooooooooooooooo";
		//exit;
		$sqlAll = mysqli_query($conn,"SELECT count(*) as numofrows FROM `druginfo` WHERE dates BETWEEN '".$_POST['dfrom']."' AND '".$_POST['dto']."' ");
			$row = mysqli_fetch_assoc($sqlAll);
			$allrow = $row['numofrows'];
			//get rows query
			$query = mysqli_query($conn, "SELECT * FROM `druginfo`  WHERE dates BETWEEN '".$_POST['dfrom']."' AND '".$_POST['dto']."' ");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<button class="btn btn-default">Total Drugs  Published &nbsp;<span style="font-size:1.0em;"class="badge">'.$allrow.'</span></button>	
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Manufacturer Name</th>
						<th>Brand</th>
						<th>Name of Drug</th>
						<th>Manufacturing Date</th>
						<th>Expiring Date</th>
						<th>Serial Number</th>
						<th>Distributors</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['manufacturername'].'</td>
				<td>'.$row['brand'].'</td>
				<td>'.$row['drugname'].'</td>
				<td>'.$row['manufacdate'].'</td>
				<td>'.$row['Expdate'].'</td>
				<td>'.$row['serialNumber'].'</td>
				<td>'.$row['Distributor'].'</td>
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
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Drugs Published As At This Date</strong></div>';
			}
	}
	
	
	
	if(isset($_POST['FetchResult'])){
		$serail = $_POST['searchtext'];
		$sql = "SELECT * FROM `druginfo` WHERE `serialNumber` = '$serail' and status = '1' ";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		if($result > 0){
			$row = mysqli_fetch_array($query);
			echo'
	<div class="modal about-modal fade" id="SearchResults" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Drug Verify</h4>
				</div>
				<div class="modal-body">
					<div class="out-info">
						<div class="row">
							<div class="col-md-3">
								<img src="images/'.$row['images'].'" height="200" width="200">
							</div>
							<div class="col-md-7">
								<ul class="list-inline">
									<li>Manufacturers Name</li>
									<li class="pull-right">'.$row['manufacturername'].'</li>
								</ul>
								<ul class="list-inline">
									<li>Manufacturers Number</li>
									<li class="pull-right">'.$row['manNumber'].'</li>
								</ul>
								<ul class="list-inline">
									<li>Drug Name</li>
									<li class="pull-right">'.$row['drugname'].'</li>
								</ul>
								<ul class="list-inline">
									<li>Drug Brand</li>
									<li class="pull-right">'.$row['brand'].'</li>
								</ul>
								<ul class="list-inline">
									<li>Manufacturing Date</li>
									<li class="pull-right">'.$row['manufacdate'].'</li>
								</ul>
								<ul class="list-inline">
									<li>Expiring Date</li>
									<li class="pull-right">'.$row['Expdate'].'</li>
								</ul>
								<ul class="list-inline">
									<li>Status</li>
									<li class="pull-right">Approved !<i class="fa fa-check"></i></li>
								</ul>
								<img src="images/fdaaa.png" height="200" width="300">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
			';
		}else{
			echo'
	<div class="modal about-modal fade" id="SearchResults" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Drug Verify</h4>
				</div>
				<div class="modal-body">
					<div class="out-info">
						<h1 class="text-center text-danger"><b>Product Or Serial Number Dont Exist</b></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
			';
		}
	}
	
	
	
if(isset($_POST['ApproveDrug'])){
	$sql = "UPDATE `druginfo` SET status = '1' WHERE `id` = '".$_POST['cid']."'";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"Drug Approved Successfully !";
	}else{
		echo"Failed to Approve Drug !";
	}
}
	
if(isset($_POST['UnApprove'])){
	$sql = "UPDATE `druginfo` SET status = '0' WHERE `id` = '".$_POST['cid']."'";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"Drug UnApproved Successfully !";
	}else{
		echo"Failed to UnApprove Drug !";
	}
}	
	
	
if(isset($_POST['generatesid'])){
$digits_needed=8;
$random_number=''; // set up a blank string
$count=0;

	while( $count < $digits_needed ) {
		$random_digit = mt_rand(0, 9);
		$random_number .= $random_digit;
		$count++;
	}
   echo $random_number;
}
	
	
	
	
?>