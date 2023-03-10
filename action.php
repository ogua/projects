<?php
	include_once("db.php");
	if(isset($_POST['Publish'])){
		$sql = "UPDATE `event` SET `publish` = '1' WHERE `id` = '".$_POST['cid']."'";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo '
								<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
									Event Published Successfully
								</strong></div>
							';
		}else{
			echo '
								<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
									=Failed to Publish Event
								</strong></div>
							';
		}
	}
	if(isset($_POST['deleteit'])){
		$sql = "DELETE FROM `event` WHERE `id` = '".$_POST['cid']."'";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo '
								<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
									Event Deleted Successfully
								</strong></div>
							';
		}else{
			echo '
								<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
									=Failed to Delete Event
								</strong></div>
							';
		}
	}
	
	if(isset($_POST['deleteUes'])){
		$sql = "DELETE FROM `event` WHERE `id` = '".$_POST['cid']."'";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo '
					<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
						Successfully
					</strong></div>
							';
		}else{
			echo '
				<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
									=Failed to Delete Event
				</strong></div>
							';
		}
	}
?>