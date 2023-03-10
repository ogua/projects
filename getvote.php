<?php
               include('db.php');
			   //get rows query
			   $sqls = "SELECT * FROM `positions` WHERE id < ".$_POST['cid']." ORDER BY id DESC LIMIT 1";
			
			   $query = mysqli_query($conn,$sqls);
			  //number of rows
			  $rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
				$rows = mysqli_fetch_array($query);
				$position = $rows['name'];
				$ids =  $rows['id'];
				
				$sql2 = "SELECT * FROM `candidates` WHERE `position` = '$position' ";
				$query2 = mysqli_query($conn,$sql2);
				$result = mysqli_num_rows($query2);
				$fwrd = strtolower($position);
				$fstrg = ucwords($fwrd);
				echo '<h1 style="border:1px solid #ccc;padding:5px;">Position '.$fstrg.'</h1>';
				if($result > 0){
					echo'
			<div class="table-responsive">
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Fullname</th>
						<th>Image</th>
						<th>Position</th>
						<th>vote</th>
					</tr>
				';
				$x = 1;
				while($row = mysqli_fetch_assoc($query2)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['name'].'</td>
				<td><img src="images/'.$row['images'].'" height="50" width="50" class="img-circle"></td>
				<td>'.$row['position'].'</td>
				<input type="hidden" value="'.$row['position'].'" id="position_'.$row['id'].'">
				<td><input type="radio" name="radio" cid="'.$row['id'].'" class="radioinput" value="'.$row['name'].'"></td>
				</tr>
						';
							$x++;
						$tutorial_id = 	$row['id'];
				}
				
			echo'
				</table>
			</div>
					';
				}
				echo'<a href="#" id="getid" cid="'.$ids.'" class="pull-right btn btn-info">Next</a>
				<br><br><br><br>
			<div id="displayfeedback"></div>
				';
					
			}else{
				echo'
				<div class="callout callout-success">
                <h4>Succssfully!</h4>
                <p>Voting Finished Successfully!</p>
              </div>
				';
			}
            ?>		