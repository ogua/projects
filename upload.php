<head>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
</head>
<?php
$images = $_FILES["fileToUpload"]["name"];
$target_dir = "images/";
$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if(isset($_POST['add'])){
		include_once('db.php');
		if($conn->connect_error){
			die('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong>Connection failed try again later</div>');
		}else{
			
		}
		if($_FILES['fileToUpload']['name'] ==""){
				die("image cant be empty");
			}
			else{
			 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					$uploadOk = 1;
					} else {
					echo "File is not an image.<br>";
						$uploadOk = 0;
						exit;
				}
			}
				// Check if file already exists
				if (file_exists($target_file)) {
					echo "Sorry, file already exists.<br>";
						$uploadOk = 0;
					exit;
						}
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
					echo "Sorry, your file is too large. max is <B>5MB</B><br>";
					$uploadOk = 0;
					exit;
					}
					// Allow certain file formats
		//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			//&& $imageFileType != "gif" ) {
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
			//$uploadOk = 0;
			//exit;
			//}
					// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				die("Sorry, your file was not uploaded.<br>");
				// if everything is ok, try to upload file
				} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO `products`(`prod_cat`, `prod_title`, `prod_isbn`, `author`, `prod_px`, `prod_desc`, `prod_img`) VALUES 
		('".$_POST['cat']."','".$_POST['lname']."','".$_POST['pwd']."','".$_POST['pwd2']."','".$_POST['aln1']."','".$_POST['drudpre']."','$images')";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo'
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>BOOK ADDED SUCCESSFULLY <br></strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "admin.php";
						function countDown(){
  							 var timer =document.getElementById("timer");
   						 if(count > 0){
     				   count--;
        				timer.innerHTML = "<B>redirecting in </b>"+count+" <b>seconds.</b><br>";
       			 setTimeout("countDown()", 1000);
   				 }
			else{
        window.location.href = redirect;
   				 }
					}
				</script>
				<span id="timer">
		<script type="text/javascript">countDown();</script>
					</span>
					</div>'
			;
			

		}else{
						echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong>FAILED TO ADD BOOK</div>';

		}
    } else {
			die("Sorry, there was an error uploading your file.<br>");
			}
	}
	}
?>