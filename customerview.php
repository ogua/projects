<?php
	session_start();
	if(! $_SESSION['name']){
	  header("location:index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<!--mobile apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--mobile apps-->
<!--Custom Theme files-->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
<link href="css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" media="all">
<link href="css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="css/custom.css">
<!--//Custom Theme files-->
<!--//js-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/action.js"></script>
<script type="text/javascript" src="js/action2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<style>
.back{
  background-image: url("images/nathan-anderson-291932.jpg");
background-size:cover;
background-image: no-repeat;
}
	.popmail{
	top:0;
	right:0;
	left:0;
	bottom:0;
	position:absolute;
	text-align:center;
	height:100px;
	margin-top:550px;
	color:red;
	font-size:30px;
	display:none;
	}
</style>
</head>
 <body class="back">
		 <div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-header">
						<a href="#" class="navbar-brand">BookStore</a>
				</div>
				<ul class="nav navbar-nav">
						<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-model-home"></span>Books</a></li>
				</ul>
				
		 </div>
		 <p><br></p>
		 <p><br></p>
		 <p><br></p>
		 <div class="contaner-fluid">
				<div class="row">
						<div class="col-md-2"></div>
						
						<div class="col-md-8">
						<div id="displMesage"></div>
								<div class="panel panel-info">

										<div id="getHei"class="panel-heading"id="searchBox">
											<ul class="list-inline">
												<li><h1>Customer Order Details </h1></li>
											</ul>
														

										</div>
										<div class="panel-body">
										  <div id="adminsho">
                                                     <?php
													 include_once("db.php");
													 if(isset($_GET['id'])){
														 $id = $_GET['id'];
													 }
		$sql = "SELECT * FROM `customerorder` WHERE `ReFid` = '$id' ";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		//$sql2 = "SELECT * FROM `users` WHERE `id` = '".$_POST['text2']."' ";
		//$query2 = mysqli_query($conn,$sql2);
		//$rows = mysqli_fetch_array($query2);
		if($result > 0){
			$sql2 = "SELECT sum(`totalpx`) as totalpayment FROM `customerorder` WHERE `ReFid` = '$id' ";
			$query2 = mysqli_query($conn,$sql2);
			if($query2){
				$rows = mysqli_fetch_array($query2);
				$sql3 = "SELECT * FROM `customerorder` WHERE `ReFid` = '$id' ";
				$query3 = mysqli_query($conn,$sql3);
				if($query3){
					$row3 = mysqli_fetch_array($query3);
				}
			}
			echo '
			<div class="row">
			<div class="col-md-2">
					<a href="admin.php" class="btn btn-info">&larr;Back</a>
			</div>
				<div class="col-md-4">
					<h4>Personal Information</h4>
			<ul class="list-inlinef">
				<li class="text-success">FullName: <b class="pull-right">'.$row3['Fullname'].'</b></li>
				<li class="text-success">Contact: <b class="pull-right">'.$row3['Number'].'</b></li>
				<li class="text-success">RefID: <b class="pull-right">'.$row3['ReFid'].'</b></li>
				<li class="text-success">Status: <b class="pull-right">';
				if($row3['Status'] == 0){
							echo '<a href="#" class="btn btn-info">Processing</a>';
							}elseif($row3['Status'] == 1){
								echo '<a href="#" class="btn btn-success">Completed</a>';
							}elseif($row3['Status'] == 2){
								echo '<a href="#" class="btn btn-default">Ready For Pickup</a>';
							}elseif($row3['Status'] == 3){
								echo '<a href="#" class="btn btn-danger">Cancelled</a>';
							}
				echo'</b></li>
			</ul>
				</div>
				<div class="col-md-4">
					<h4>ALternative Pickup</h4>
			<ul class="list-inlvine">
				<li class="text-success">FullName: <b class="pull-right">'.$row3['AlFullName'].'</b></li>
				<li class="text-success">Contact: <b class="pull-right">'.$row3['AlNumber'].'</b></li>
			</ul>
				</div>
							<div class="col-md-2"></div>

			</div>
								<hr style="color:black;background-color:black;border:2px solid black;">';
											
			while($row = mysqli_fetch_array($query)){
				    echo'
					<div class="row">
									<div class="col-md-5">
										<img src="images/'.$row['prod_image'].'" class="pull-right thumbnail" width="200" height="150">
									</div>
									<div class="col-md-7">
										<table>
											<tr>
												<td class="text-success"><b>Product Name :</b></td>
												<td>'.$row['prod_title'].'</td>
											</tr>
											<tr>
												<td class="text-success"><b>Product Price :</b></td>
												<td> GH&cent;'.$row['price'].'</td>
											</tr>
											<tr>
												<td class="text-success"><b>Quanity :</b></td>
												<td>'.$row['qty'].'</td>
											</tr>
											<tr>
												<td class="text-success"><b>Transaction ID :</b></td>
												<td>11234355545445</td>
											</tr>
										</table>
									</div>
								</div>								 
					 ';
			}
			echo '<b style="border:1px solid black;padding:10px;"class="pull-right bg-success">Total : GH&cent;'.$rows['totalpayment'].' </b>';
			
		}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong> No Results </div>';
		}
	 
	 
													 ?>
										  </div>
												<!--<div class="col-sm-4">
														<div class="panel-success">
																<div class="panel-heading">Mens Wear</div>
																<div class="panel-body">
																</div>
																<div class="panel-footer">$1000.00
																<button type="button" class="btn btn-info btn-xs pull-right">AddToCart</button>
																</div>
														</div>
												  </div>----->
										</div>
										<div class="panel-footer">&copy; 2017</div>
								</div>
						</div>
						<div class="col-md-2"></div>
				</div>
		 </div>
		 <div class="popmail"id="mespop">Mail Sent SuccessFully</div>
		  <div class="popmail"id="mesdelte">Customer Order Deleted SuccessFully</div>
		 <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('#btn1')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
 <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunctions() {
    document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('#btn2')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
 </body>
</html>