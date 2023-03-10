<?php
	include('db.php');
	session_start();
	
	$colors = ["#f0ad4e","#3c8dbc","#00a65a","#dd4b39","#1ed8ee","#e3f599","#b89354","#59805c","#031605","#868cb6","#3a6541","#758a78","#e64f81"];
	
	if(isset($_POST['DelUser'])){
		$ssql = "SELECT * FROM `admin` WHERE `id` = '".$_POST['cid']."' ";
		$squery = mysqli_query($conn,$ssql);
		$row = mysqli_fetch_array($squery);
		
		$sql = "DELETE FROM `Admin` WHERE `id` = '".$_POST['cid']."'"; 
		$query = mysqli_query($conn,$sql);
		if($query){
			unlink('images/'.$row['images'].'');
			echo"success";
		}else{
			echo"failed";
		}
	}
	
	if(isset($_POST['DelVolter'])){
		if(!empty($_SESSION['role'])){
			echo'Not Empty';
			exit;
		}
		$sql = "DELETE FROM `farmers` WHERE `id` = '".$_POST['cid']."'"; 
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"failed";
		}
	}
	
	if(isset($_POST['DelCrop'])){
		if(!empty($_SESSION['role'])){
			echo'Not Empty';
			exit;
		}
		$sql = "DELETE FROM `crop` WHERE `id` = '".$_POST['cid']."'"; 
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"failed";
		}
	}
	
	
	if(isset($_POST['DelPest'])){
		if(!empty($_SESSION['role'])){
			echo'Not Empty';
			exit;
		}
		$sql = "DELETE FROM `spray` WHERE `id` = '".$_POST['cid']."'"; 
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"failed";
		}
	}
	
	if(isset($_POST['Delland'])){
		if(!empty($_SESSION['role'])){
			echo'Not Empty';
			exit;
		}
		$sql = "DELETE FROM `land` WHERE `id` = '".$_POST['cid']."'"; 
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"failed";
		}
	}
	
	if(isset($_POST['DelEquiment'])){
		if(!empty($_SESSION['role'])){
			echo'Not Empty';
			exit;
		}
		$sql = "DELETE FROM `equipments` WHERE `id` = '".$_POST['cid']."'"; 
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"failed";
		}
	}
	
	if(isset($_POST['DelTraining'])){
		if(!empty($_SESSION['role'])){
			echo'Not Empty';
			exit;
		}
		$sql = "DELETE FROM `training` WHERE `id` = '".$_POST['cid']."'"; 
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"failed";
		}
	}
	
	if(isset($_POST['DelFertizer'])){
		if(!empty($_SESSION['role'])){
			echo'Not Empty';
			exit;
		}
		$sql = "DELETE FROM `fertilizer` WHERE `id` = '".$_POST['cid']."'"; 
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"failed";
		}
	}
	
	
	if(isset($_POST['AddPosition'])){
		$sql = "INSERT INTO `Positions`(`name`) VALUES ('".$_POST['name']."')"; 
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"failed";
		}
	}
	
	if(isset($_POST['DelPos'])){
		$sql = "DELETE FROM `Positions` WHERE `id` = '".$_POST['cid']."'";  
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"failed";
		}
	}
	
	if(isset($_POST['StartVote'])){
		$sql = "SELECT * FROM `monitor` WHERE `userid` = '".$_POST['volterid']."' AND `satus` = '0'";  
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		if($result > 0){
			echo '
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Alert!</h4>
						Youve Already Volted!
				</div>
			';
		}else{
			$sql2 = "INSERT INTO `monitor`(`userid`, `satus`) VALUES ('".$_POST['volterid']."','0')";  
		   $query2 = mysqli_query($conn,$sql2);
		   if($query2){
			   echo"success";
		   }
		}
	}
	
	
	
	if(isset($_POST['DelCandidate'])){
		$ssql = "SELECT * FROM `candidates` WHERE `id` = '".$_POST['cid']."' ";
		$squery = mysqli_query($conn,$ssql);
		$row = mysqli_fetch_array($squery);
		
		$sql = "DELETE FROM `candidates` WHERE `id` = '".$_POST['cid']."'";  
		$query = mysqli_query($conn,$sql);
		if($query){
			unlink('images/'.$row['images'].'');
			echo"success";
		}else{
			echo"failed";
		}
	}
		
	if(isset($_POST['ViewResults'])){
		$sql = "SELECT `name`,`position`,`votes`,`images` FROM `candidates` WHERE `position` = '".$_POST['name']."' ";  
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		
		$sql2 = "SELECT sum(`votes`) FROM `candidates` WHERE `position` = '".$_POST['name']."' ";  
		$query2 = mysqli_query($conn,$sql2);
		$results = mysqli_fetch_array($query2);
		if($query){
			$votes = array();
			$sum = $results['sum(`votes`)'];
			$index = 0;
			while($row = mysqli_fetch_array($query)){
				$voteu = $row['votes'];
				if($row['votes'] > 0){
				  $votepec = 100*round($row['votes']/($sum),$result);
				  echo'
						<ul class="list-inline">
							<li><img src="images/'.$row['images'].'" height="50" width="50" class="img-circle"></li>
							<li><b>'.$row['name'].'</b></li>
						</ul>
						<div class="progress">
							<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="'.$votepec.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$votepec.'%;background-color: '.$colors[$index].';">
							  <span class="sr-only">$votepec% Complete (success)</span>
						</div>
						</div>
						<b>'.$votepec.'% of '.$sum.' total votes</b><br>
						<b>votes '.$voteu.'</b>
						<hr style="border:1px solid #ccc;">
				  ';				  
				}
				$index++;
			}
		}else{
			echo"failed";
		}
	}
	
	
	
	if(isset($_POST['viewreport'])){
		$sql = "SELECT `name`,`position`,`votes`,`images` FROM `candidates` WHERE `position` = '".$_POST['name']."' ";  
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		
		$sql2 = "SELECT sum(`votes`) FROM `candidates` WHERE `position` = '".$_POST['name']."' ";  
		$query2 = mysqli_query($conn,$sql2);
		$results = mysqli_fetch_array($query2);
		if($query){
			$votes = array();
			$sum = $results['sum(`votes`)'];
			echo'
			<div class="table-responsive">
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Fullname</th>
						<th>Img</th>
						<th>Number Of Votes</th>
						<th>Number of Votes in %</th>
					</tr>
				';
			
			
			$index = 0;
			while($row = mysqli_fetch_array($query)){
				$voteu = $row['votes'];
				if($row['votes'] > 0){
				  $votepec = 100*round($row['votes']/($sum),$result);
				  echo'
				<tr>
				<td>'.$index.'</td>
				<td>'.$row['name'].'</td>
				<td><img src="images/'.$row['images'].'" height="50" width="50" class="img-circle"></td>
				<td>'.$voteu.'</td>
				<td>'.$votepec.'%</td>
				</tr>
						';	  
				}
				$index++;
			}
		}else{
			echo"failed";
		}
	}
	
	
	if(isset($_POST['Vote'])){
		$sql = "SELECT * FROM `votes` WHERE `volterid` = '".$_POST['volterid']."' AND `position` = '".$_POST['position']."' ";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		if($result > 0){
			echo'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
					Youve Already Voted for This Slot,
					Proceed to Next Vote
              </div>';
		}else{
			$insertsql = "INSERT INTO `votes`(`volterid`, `position`, `candidatename`) VALUES ('".$_POST['volterid']."','".$_POST['position']."','".$_POST['name']."')";
			$insertquery = mysqli_query($conn,$insertsql);
			if($insertquery){
				$upsql = "UPDATE `candidates` SET `votes` = `votes`+1 WHERE `name` = '".$_POST['name']."' AND `position` = '".$_POST['position']."' ";
				$upquery = mysqli_query($conn,$upsql);
				if($upquery){
					echo'<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Thank You, You Voted For '.$_POST['name'].', Proceed to next Vote
              </div>';
				}
			}
		}
	}
	
?>