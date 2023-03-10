<?php
	$conns = new mysqli("sql102.epizy.com","epiz_23495085","senior1992","epiz_23495085_ocma");
	if($conn->connect_error){
			echo"Failed to connect please try again later";
		}else{
			echo"Successfully";
		}
?>