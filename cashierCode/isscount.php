<?php
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

	$sql = "SELECT * FROM `issues` WHERE `Seen` = '0' ";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		if($query){		
			echo'
			<li>
				<div class="notification_header">
				   <h3>You have '.$result.' new messages</h3>
				</div>
				</li>
			';
		 while($row = mysqli_fetch_array($query)){
			 echo '
			 <li><a href="#" cid="'.$row['id'].'" class="getIsssueDetails">
					<div class="user_img"><img src="images/user.png" alt=""></div>
						<div class="notification_desc">
					<p>A Message from '.$row['fullname'].'</p>
				<p><span>'.facebook_time_ago($row['datetime']).'</span></p>
					</div>
				<div class="clearfix"></div>	
			</a></li>
			 ';
		 }
		}else{
			echo"failed";
		}

?>