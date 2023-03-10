			<?php
				include_once("db.php");
				if(@isset($_GET['del'])){
					$id = $_GET['del'];
					$sqls = "DELETE FROM `users` WHERE `id` = $id ";
					$querys = mysqli_query($conn,$sqls);
					if($querys){
						header("location:admusers.php?suc=User Delected Successfully !");
					}else{
						header("location:admusers.php?err=Unable to Delect User!");
					}
				}
				if(@isset($_GET['edit'])){
					$id = $_GET['edit'];
					header("location:slotedit.php?edit=$id");
				}
				if(isset($_POST['updates'])){
					$upid = $_POST['id'];
					$UPADESQL = "UPDATE `packingspace` SET `name` = '".$_POST['slote']."', `capacity` = '".$_POST['capacity']."' WHERE `id` = $upid";
					$updaquaery = mysqli_query($conn,$UPADESQL);
					if($updaquaery){
						echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
						Slot Updated Successfully
						</strong></div>';
					}else{
						echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
						Failed to update Slot
							</strong></div>';
						}
				}
				if(@isset($_GET['delf'])){
					$id = $_GET['delf'];
					$sqls = "DELETE FROM `feedback` WHERE `id` = $id ";
					$querys = mysqli_query($conn,$sqls);
					if($querys){
						header("location:adminfeedback.php?suc=Feedback Delected Successfully !");
					}else{
						header("location:adminfeedback.php?err=Unable to Delect Feedback!!");
					}
				}
				if(@isset($_GET['delt'])){
					$id = $_GET['delt'];
					$sqls = "DELETE FROM `payments` WHERE `id` = $id ";
					$querys = mysqli_query($conn,$sqls);
					if($querys){
						header("location:transacedit.php?suc=Transaction Delected Successfully !");
					}else{
						header("location:transacedit.php?err=Unable to Delect Transaction!");
					}
				}
				if(@isset($_GET['editt'])){
					$id = $_GET['editt'];
					header("location:transacedit.php?edit=$id");
				}
				if(isset($_POST['updatest'])){
					$upid = $_POST['id'];
					$value = $_POST['valeus'];
					$UPADESQL = "UPDATE `payments` SET `payupdate` = '$value' WHERE `id` = $upid";
					$updaquaery = mysqli_query($conn,$UPADESQL);
					if($updaquaery){
						echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
						Payment Updated Successfully
						</strong></div>';
					}else{
						echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
						Failed to update Payment
							</strong></div>';
						}
				}
				
			?>	
				  