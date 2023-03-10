<?php
	include('db.php');
	if(isset($_POST['getReferenceID'])){
		$queryAll = mysqli_query($conn,"SELECT max(`Ref`) as maxnum FROM `patients`");
		$row = mysqli_fetch_assoc($queryAll);
        $allRows = $row['maxnum'];
		  if(strlen($allRows) == 6 || strlen($allRows) > 6){
			 $memsub = substr($allRows,3,3)."<br>";
			 $addtomem = (int)$memsub + 1;
				if(strlen($addtomem) == 1){
					echo $memberid = 'REF00'.$addtomem;
				}if(strlen($addtomem) == 2){
					echo $memberid = 'REF0'.$addtomem;
				}if(strlen($addtomem) > 2){
					echo $memberid = 'REF'.$addtomem;
				}
		 }else{
			 $memsubAdd =  $allRows + 1;
			 echo $memberid = "REF00".$memsubAdd;
		}
	}
	
	if(isset($_POST['getSearchData'])){
		$sql = "SELECT * FROM `patients` WHERE `Ref` =  '".$_POST['searchText']."'";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		if($result > 0){
			$rows = mysqli_fetch_array($query);
			echo json_encode($rows);
		}else{
			echo "Invalid";
		}
	}
	
	if(isset($_POST['delRecord'])){
		$sql = "DELETE FROM `patients` WHERE `Ref` = '".$_POST['delect']."' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo'Record Delected Successfully';
		}else{
			echo"Failed to delete Record";
		}
		
	}
	
?>