<?php
	//error_reporting(0);
	if(is_array($_FILES)){
		include_once("db.php");
			
			$cusname = $_POST['funame'];
			$userid = $_POST['useid'];
			$hostelid = $_POST['hostelid'];
			$cusemail =  $_POST['femail'];
			$cusgender = $_POST['gender'];
			$cusphone = $_POST['fphone'];
			$hostename = $_POST['hotelname'];
			$hostflorr = $_POST['hotelfloor'];
			if($_POST['romsize'] == "1"){
				$hostroostype = "Single Beds, Toliet + Bath";
				$hostelpx = "1500";
			}else if($_POST['romsize'] == "2"){
				$hostroostype = "Joint Double Beds, Toliet + Bath";
				$hostelpx = "1500";
			}else if($_POST['romsize'] == "3"){
				$hostroostype = "Two single beds, Toilet + bath";
				$hostelpx = "1700";
			}else if($_POST['romsize'] == "4"){
				$hostroostype = "Single Beds, Toliet + Bath + Aircondition";
				$hostelpx = "2500";
			}else if($_POST['romsize'] == "5"){
				$hostroostype = "Joint Double Beds, Toliet + Bath + Aircondition";
				$hostelpx = "2500";
			}
			$hostroomnumb = $_POST['roomnumber'];
			$image = $_FILES['InputFile']['name'];
			
			
			$tmpimage = $_FILES['InputFile']['tmp_name'];
			$source ="images/";
			$target_file = $source.basename($image);	
		
		
			$ext = strtolower(substr($image, strripos($image, '.')+1));
			$filename = round(microtime(true)).mt_rand().'.'.$ext;
			
			if(move_uploaded_file($tmpimage,$source.$filename)){
					$sql3 = "INSERT INTO `booking`(`Hostelid`, `userid`, `CustomerName`, `Customeremail`, `Customergender`, `CustomerPhone`, `Hostelname`, `hostelFloor`, `hostelRoomType`, `HostelroomNum`, `price`,`dates`,`image`) 
					VALUES ('$hostelid','$userid','$cusname','$cusemail','$cusgender','$cusphone','$hostename','$hostflorr','$hostroostype','$hostroomnumb','$hostelpx',CURRENT_DATE,'$filename')";
					$query3 = mysqli_query($conn,$sql3);
					if($query3){
						session_start();
						$_SESSION['hostid'] = $_POST['hostelid'];
						$_SESSION['amnt'] = $hostelpx;
						$_SESSION['lastid'] = mysqli_insert_id($conn);
						echo"success";
					}else{
						echo'Failed! to book, try again later';
					}
				}else{
					echo"Unable to upload Image";
				}				
	}
?>