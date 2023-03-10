<?php
	include_once("db.php");
	$sql2 = "INSERT INTO `Issues`(`fullname`, `Type`, `Issue`) VALUES ('".$_POST['text']."','".$_POST['text2']."','".$_POST['text3']."')";
		$query2 = mysqli_query($conn,$sql2);
		if($query2){
			echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Query Sent Successfully, A representative will to sent to your aid very soon</strong>';
		}else{
			echo '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong> Failed </strong>';
		}
?>