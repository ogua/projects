<?php
		  include('db.php');
		  if(strlen($_POST['prefcnumb']) < 6 ){
			  echo'Reference ID is Invalid';
			exit;
		  }
		  if(strlen($_POST['prefcnumb']) < 10 || strlen($_POST['prefcnumb']) >10){
			  echo'Phone Number is Invalid';
				exit;
		  }
		$sql2 = "SELECT * FROM `patients` WHERE `Ref` = '".$_POST['Studpref']."'";
		$questys = mysqli_query($conn,$sql2);
		$results = mysqli_num_rows($questys);
		if($results > 0){
			$sqlupdate = "UPDATE `patients` SET `firstname` = '".$_POST['prefname']."', `othernames` = '".$_POST['prefoname']."', `contact` = '".$_POST['prefcnumb']."', `temperature` = '".$_POST['preftmpe']."', `height` = '".$_POST['prefheig']."', `PWeight` = '".$_POST['prefweig']."', `Bp` = '".$_POST['prefbp']."', `Age` = '".$_POST['prefage']."',cardid = '".$_POST['precardid']."',`dateofBirth` = '".$_POST['prefwei']."', `room` = '".$_POST['opt']."', `Reason` = '".$_POST['prefpissue']."' WHERE `Ref` = '".$_POST['Studpref']."' ";
			$quuodate =mysqli_query($conn,$sqlupdate);
			if($quuodate){
				echo'Details Updated SuccessFully';
			}else{
				echo'Failed to upate Info';
			}
		}else{
		  $sql = " INSERT INTO `patients`(cardid,`Ref`, `firstname`, `othernames`,`contact`, `temperature`, `height`, `PWeight`,
		  `Bp`, `Age`, `dateofBirth`, `room`, `Reason`,dates) VALUES 
		  ('".$_POST['precardid']."','".$_POST['Studpref']."','".$_POST['prefname']."', '".$_POST['prefoname']."', '".$_POST['prefcnumb']."', '".$_POST['preftmpe']."',
		  '".$_POST['prefheig']."',  '".$_POST['prefweig']."', '".$_POST['prefbp']."', '".$_POST['prefage']."', '".$_POST['prefwei']."', '".$_POST['opt']."','".$_POST['prefpissue']."',CURRENT_DATE) ";
		  $query = mysqli_query($conn,$sql);
		  if($query){
			 echo '
				Details Submitted SuccessFully
			 ';
		  }else{
			echo'
				Failed to Insert Data Try again Later
			';
		  }
	}
?>