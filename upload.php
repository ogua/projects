<?php
	error_reporting(0);
	if(is_array($_FILES)){
		include_once("db.php");

			function insertdata($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
			}
			
			$prodtitle = insertdata($_POST['lname']);
			$prodcat = insertdata($_POST['cat']);
			///$prodbrand = insertdata($_POST['brnd']);
			$prodpx = insertdata($_POST['aln1']);
			$proddec = insertdata($_POST['drudpre']);
			$prodkeyword = insertdata($_POST['prdukeywrd']);
			$image = $_FILES['fileToUpload']['name'];
			
			$tmpimage = $_FILES['fileToUpload']['tmp_name'];
			$source ="images/";
			$target_file = $source.basename($image);	
		
		
			$ext = strtolower(substr($image, strripos($image, '.')+1));
			$filename = round(microtime(true)).mt_rand().'.'.$ext;
		
			if($image =="" || $prodtitle =="" || $prodcat=="" || $prodpx =="" || $proddec =="" || $prodkeyword ==""){
				if($image ==""){
					echo "emageerror";
				}else{
					echo"emageno";
				}
				
				if($prodtitle ==""){
					echo "prducterror";
				}else{
					echo"productno";
				}
				
				if($prodcat ==""){
					echo "caterror";
				}else{
					echo"catno";
				}
				
				
				if($prodpx ==""){
					echo "pxerror";
				}else{
					echo"pxno";
				}
				
				if($proddec ==""){
					echo "prdxerror";
				}else{
					echo"pxdxno";
				}
				
				if($prodkeyword ==""){
					echo "kywrderror";
				}else{
					echo"keywordno";
				}
				exit;
			}
				if(move_uploaded_file($tmpimage,$source.$filename)){
					$sellids = $_POST['sellid'];
					$sql3 = "INSERT INTO `products`(`prod_cat`, `prod_title`, `Search`, `prod_px`, `prod_desc`, `prod_img`, Sellerid) 
					VALUES ('$prodcat','$prodtitle','$prodkeyword','$prodpx','$proddec','$filename', '$sellids')";
					$query3 = mysqli_query($conn,$sql3);
					if($query3){
						echo"Successfully";
					}else{
						echo "failed";
					}
				}
			
			
	}else{
		echo"Failed";
	}
?>