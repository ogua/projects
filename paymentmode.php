<?php //error_reporting(0);?>
<!DOCTYPE html>
<html>
<head>
<title>3layouts</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,600,800,700,500,300,100,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/component.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Fashions Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" 
		/>	
<script src="js/jquery.easydropdown.js"></script>		
<script src="js/jquery.min.js"></script>
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- start menu -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/action.js"></script>
<script type="text/javascript" src="js/action2.js"></script>
	<style>
		.reg form input[type="email"]{
			width: 100%;
			padding: 8px;
			font-size: 1em;
			font-weight: 400;
			border: 1px solid #D6D6D6;
			outline: none;
			color:#5d5959;
		}
	</style>
</head>
<body>
<!--header-->
<div class="header2 text-center">
	 <div class="container">
		 <div class="main-header">
			  <div class="carting">
				 
				 </div>
			 <div class="logo">
			  </div>			  
			 <div class="box_1">				 
				 <a href="cart.php"><h3><span class="glyphicon glyphicon-shopping-cart insercart"></span>Cart:<span class="badge" id="bage">0</span></h3></a>
			 
			 </div>
			 
			 <div class="clearfix"></div>
		 </div>		 
				<!-- start header menu -->
		 <ul class="megamenu skyblue">
			<li class="grid"><a class="color1" href="index.php">Home</a></li>
			<li class="grid"><a class="color1" href="login.php">Products</a></li>
		</ul> 	
			  <div class="clearfix"></div> 
	 </div>
</div>
<!--header//-->
<div class="registration-form">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Select Mode of Payment</li>
		 </ol>
		 <h2>Registration</h2>
		 <div class="col-md-6 reg-form">
			 <div class="reg">
				<ul class="list-unstyled">
					<li><a href="#" class="btn btn-success" id="payons" style="width:100%;">Pay on Delivery</a></li>
					<li><a href="mobilemoney.php" class="btn btn-success"  style="width:100%;">Pay Using Mobile Money</a></li>
				</ul>
				 
			 </div>
		 </div>
		 <div class="col-md-6 reg-right">
		 <hr><hr>
			<div id="disply"></div>
			<div id="displyS"></div>
			
			<?php
				if(isset($_POST['suborder'])){
					include('db.php');
					session_start();
					$user = $_SESSION['id'];
					$genrateId = $_SESSION['genrateid'];
					if(empty($user)){
					 $sql = "SELECT MAX(`Refta`) as maximum_num FROM refTable ";
					 $query = mysqli_query($conn,$sql);
					 if($query){
					 $row = mysqli_fetch_array($query);
					 $num = $row['maximum_num'];
					 $num3 = $num + rand(0,488);
					 $num4 = 'REF'.$num3.'AF'.$num3;
					 $_SESSION['Refids'] = $num4;
					 $sql9 = "SELECT * FROM `users` WHERE `Gid` = '$genrateId' ";
					$query9 = mysqli_query($conn,$sql9);		
					$rows =  mysqli_fetch_array($query9);
					$names = $rows['firstname'].'  '.$rows['Lastname'];
					$nub = $rows['mobile'];
					$alnumb = $rows['AlNumber'];
					$alfulna = $rows['AlName'];
				$sql7 = "SELECT * FROM `customerorder` WHERE `generateid` = '$genrateId' ";
				$query7= mysqli_query($conn,$sql7);
				$result = mysqli_num_rows($query7);
				if($result > 0){
						echo '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Order Has Already Been Submitted Successful!</strong>';
						exit();
				}else{
					$sql9 = "SELECT * FROM `users` WHERE `Gid` = '$genrateId' ";
					$query9 = mysqli_query($conn,$sql9);
					$rows =  mysqli_fetch_array($query9);
					$names = $rows['firstname'].'  '.$rows['Lastname'];
					$nub = $rows['mobile'];
					$alnumb = $rows['AlNumber'];
					$alfulna = $rows['AlName'];	
			$sql2 = "INSERT INTO customerorder(Sellerid,`id`,`prod_id`,`user_id`,`generateid`,`prod_title`,`prod_image`,`qty`,`price`,`totalpx`) SELECT Sellerid,`id`,`prod_id`,`user_id`,`generateid`,`prod_title`,`prod_image`,`qty`,`price`,`totalpx` FROM cart where `generateid` = '$genrateId' ";
				 $query2 = mysqli_query($conn,$sql2);
				 if($query2){
					 $sql3 = "INSERT INTO `idtable` (`id`, `genrateId`) VALUES (NULL, '$genrateId')";
					 $query3 = mysqli_query($conn,$sql3);
					 if($query3){
						  $sql6 = "UPDATE `customerorder` SET `ReFid` = '$num4',`Fullname` = '$names', `Number` = '$nub', `AlFullName` = '$alfulna', `AlNumber` = '$alnumb', `dates` = CURRENT_DATE WHERE `generateid` = '$genrateId' ";
						 $query5 = mysqli_query($conn,$sql6);
						 if($query5){
							 $sql33 = "INSERT INTO `reftable`(`id`, `Refta`) VALUES (null,'$num4')";
							 $query33 = mysqli_query($conn,$sql33);
							$number = $nub;
							$add = substr($number,1,9);
							$results = "00233".$add;				 
							$key="xIzPqqjQjxA5Pk5qyLzUqsOZ9"; //your unique API key;
							$msgs = "Thank you! your order has been received Your Reference Id is ".$_SESSION['Refids'];
							$phone = $results;
							$message=urlencode($msgs); //encode url;
							$sender_id = "OCMA ONLINE";
							/*******************API URL FOR SENDING MESSAGES********/
							$url="https://apps.mnotify.net/smsapi?key=$key&to=$phone&msg=$message&sender_id=$sender_id";


							/****************API URL TO CHECK BALANCE****************/
							$urls="https://apps.mnotify.net/smsapi/balance?key=$key";

echo	
		'<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>'.$rows['AlName'].' Order Submitted Successful!</strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "pickup.php";
						function countDown(){
  							 var timer =document.getElementById("timer");
   						 if(count > 0){
     				   count--;
        				timer.innerHTML = "<B>redirecting in </b>"+count+" <b>seconds.</b><br>";
       			 setTimeout("countDown()", 500);
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
			 }
		 }else{
			  echo "failed";
		 }
	}else{
		 echo "";
	}			
	 }
	}
	}
	
	else{
	 $sql = "SELECT MAX(`Refta`) as maximum_num FROM refTable ";
	 $query = mysqli_query($conn,$sql);
	 if($query){
	 $row = mysqli_fetch_array($query);
	 $num = $row['maximum_num'];
	 $num3 = $num + rand(0,488);
	 $num4 = 'REF'.$num3.'AF'.$num3;
	 $_SESSION['Refids'] = $num4;
	 $sql9 = "SELECT * FROM `users` WHERE `id` = '$user' ";
			$query9 = mysqli_query($conn,$sql9);		
			$rows =  mysqli_fetch_array($query9);
			$names = $rows['firstname'].'  '.$rows['Lastname'];
			$nub = $rows['mobile'];
			$alnumb = $rows['AlNumber'];
			$alfulna = $rows['AlName'];
	 $sql2 = "INSERT INTO customerorder(Sellerid,`id`,`prod_id`,`user_id`,`generateid`,`prod_title`,`prod_image`,`qty`,`price`,`totalpx`) SELECT Sellerid,`id`,`prod_id`,`user_id`,`generateid`,`prod_title`,`prod_image`,`qty`,`price`,`totalpx` FROM cart where `user_id` = '$user' and orders = '0' ";
	 $query2 = mysqli_query($conn,$sql2);
	 if($query2){
		 $sql3 = "UPDATE `cart` SET `orders` = '1' where `user_id` = '$user' ";
		 $query3 = mysqli_query($conn,$sql3);
		 if($query3){
			 $sql3 = "INSERT INTO `idtable` (`id`, `genrateId`) VALUES (NULL, '$genrateId')";
		 $query3 = mysqli_query($conn,$sql3);
		 if($query3){
			  $sql6 = "UPDATE `customerorder` SET `ReFid` = '$num4', `Fullname` = '$names', `Number` = '$nub', `AlFullName` = '$alfulna', `AlNumber` = '$alnumb', `dates` = CURRENT_DATE WHERE `user_id` = '$user' and generateid = '$genrateId'";
			 $query5 = mysqli_query($conn,$sql6);
			 if($query5){
				 unset($_SESSION['genrateid']);
				//generatidgaian();
				 $sql33 = "INSERT INTO `reftable`(`id`, `Refta`) VALUES (null,'$num4')";
				 $query33 = mysqli_query($conn,$sql33);
				$key="xIzPqqjQjxA5Pk5qyLzUqsOZ9"; //your unique API key;
				$number = $nub;
				$add = substr($number,1,9);
				$results = "00233".$add;	
				$msgs = "Thank you! your order has been received Your Reference Id is".$_SESSION['Refids'];
				$phone = $results;
				$message=urlencode($msgs); //encode url;
				$sender_id = "OCMA ONLINE";
				/*******************API URL FOR SENDING MESSAGES********/
				$url="https://apps.mnotify.net/smsapi?key=$key&to=$phone&msg=$message&sender_id=$sender_id";
				/****************API URL TO CHECK BALANCE****************/
				$urls="https://apps.mnotify.net/smsapi/balance?key=$key";

		echo'
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>'.$rows['AlName'].' Order Submitted Successful!</strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "pickup2.php";
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
			 }
		 }else{
			  echo "failed";
		 }
		 }else{
			 echo "Unable to update Cart Information";
		 }
	}else{
		 echo "";
	}
	 
	}
	
	}	 
				}
				
			?>
			
		</div>
		 <div class="clearfix"></div>		 
	 </div>
</div>
<!--fotter-->
<br>
<div class="fotter-logo">
	 <div class="container">
	 <div class="ftr-info">
<p><a href="http://www.oits.epizy.com/index.html">Powered By Ogua IT Solutions</a></p>	
	</div>
	 <div class="clearfix"></div>
	 </div>
</div>
<!--fotter//-->	
	<script>
		$('document').ready(function(){
			$('#payons').on("click",function(e){
				e.preventDefault();
				$.ajax({
				 url : "action.php",
				 method : "post",
				 data: {payon: 1},
				 success: function(data){
					$("#disply").html(data);
				}
				});
				//alert("go");
			});
			
			$(document).on("click","#subOrder", function(e){
				e.preventDefault();
				//alert("goo");
				$.ajax({
					beforeSend:function(){
						$(".text-success").addClass("spinner-border");
					},complete:function(){
						$(".text-success").removeClass("spinner-border");
					},
					url: 'action.php',
					method: 'post',
					data: {subOrder: 1},
					success: function(data){
						if(data.match("go")){
							alert("order_submitted_successfully");
							window.location.href="pickup2.php";
						}else{
							alert("order_submitted_successfully");
							window.location.href="pickup.php";
						}
					}
				});
			})
			
			
		});
	</script>
</body>
</html>
		