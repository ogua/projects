<?php  
 session_start();  
 if(!isset($_SESSION["user"]))  
{  
      header("location:login.php");  
 }  
 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title> UPSA FOODHUB || Admin </title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->

     <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="home.php" class="logo">UPSA FOOD <span class="lite">Admin</span></a>
      <!--logo end-->
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
 <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username">Admin</span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i> My Profile</a>
              </li>
              </li>
              <li>
                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </div>
      </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="">
            <a class="" href="#">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Orders Made</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="clubhouseorders.php">Club House Orders</a></li>
              <li><a class="" href="mamalitorders.php">Mamalit Special Orders</a></li>
              <li><a class="" href="taneorders.php">Tanee Orders</a></li>
              <li><a class="" href="mariedeeorders.php">Marie Dee Orders</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Generate Report</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="clubhousereport.php">Club House</a></li>
              <li><a class="" href="mamalitreport.php">Mamalit Special</a></li>
              <li><a class="" href="TaneeReport.php">Tanee</a></li>
              <li><a class="" href="mariedeeReport.php">Marie Dee</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> Page</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="#">Admin</a></li>
              <li><i class="fa fa-bars"></i>Orders Made</li>
              <li><i class="fa fa-square-o"></i>Tanee Orders</li>
            </ol>
          </div>
        </div>
        <!--  Page content goes here -->
       

         <?php
/* Attempt MySQL server connection.you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "foodhub");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM tanee";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo '
        <div class="card card-contact-list">
              <div class="agileinfo-cdr">
                                <div class="card-header">
                                    <h3 style="color:blue;">Orders made</h3>
                                </div>
                                <div class="card-body p-b-20">
                    <table class="table table-striped">
            <thead class="bg-danger">
              <tr>
                <th style="color:red;"><b>Title</b></th>
                <th style="color:red;"><b>Name</b></th>
                <th style="color:red;"><b>Contact</b></th>
                <th style="color:red;"><b>Type of ordered</b></th>
                <th style="color:red;"><b>Packaging</b></th>
                <th style="color:red;"><b>Quantity</b></th>
                <th style="color:red;"><b>Status</b></th>
                <th style="color:red;"><b>DateTime</b></th>
				<th style="color:red;"><b>Update</b></th>
              </tr>
            </thead>
            <tbody> 
        '; 
        while($row = mysqli_fetch_array($result)){
          echo'
          <tr>
              <td><b>'.$row['title'].'</b></td>
              <td><b>'.$row['name'].'</b></td>
              <td><b>'.$row['phone'].'</b></td>      
              <td><b>'.$row['type_food'].'</b></td>
              <td><b>'.$row['packaging'].'</b></td>
              <td><b>'.$row['quantity'].'</b></td>
              <td>';
				if($row['status'] =="0"){
					echo '<b class="text-danger">Processing &nbsp;<i class="fa fa-refresh fa-spin"></i>';
				}else if($row['status'] =="1"){
					echo '<b class="text-success">Delivery &nbsp;<i class="fa fa-check"></i>';
				}else if($row['status'] =="2"){
					echo '<b class="text-info">Pending &nbsp;<i class="fa fa-cog"></i>';
				}
				echo'
			  </b></td>
              <td><b>'.$row['date_time'].'</b></td>
			  <td>
				<select id="update" class="update form-control" cid="'.$row['id'].'">
					<option value="">Update Status</option>
					<option value="1">Delivery</option>
					<option value="2">UnDelivery</option>
				</select>
			  </td>
            </tr>
          ';
        }
        echo '
        </tbody>
        </table>
                                    </div>
                                </div>
                            </div>
        ';
      }else{
        echo '<h1 style="color:red">No Results</h1>';
      } 
  }  
?>
<br>
 <?php
/* Attempt MySQL server connection.you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "foodhub");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM tanee WHERE status = '1'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo '
        <div class="card card-contact-list">
              <div class="agileinfo-cdr">
                                <div class="card-header">
                                    <h3 style="color:blue;">Deliveried Orders</h3>
									<hr style="border:2px solid #ccc;">
                                </div>
                                <div class="card-body p-b-20">
                    <table class="table table-striped">
            <thead class="bg-danger">
              <tr>
                <th style="color:red;"><b>Title</b></th>
                <th style="color:red;"><b>Name</b></th>
                <th style="color:red;"><b>Contact</b></th>
                <th style="color:red;"><b>Type of ordered</b></th>
                <th style="color:red;"><b>Packaging</b></th>
                <th style="color:red;"><b>Quantity</b></th>
                <th style="color:red;"><b>Status</b></th>
                <th style="color:red;"><b>DateTime</b></th>
				<th style="color:red;"><b>Update</b></th>
              </tr>
            </thead>
            <tbody> 
        '; 
        while($row = mysqli_fetch_array($result)){
          echo'
          <tr>
              <td><b>'.$row['title'].'</b></td>
              <td><b>'.$row['name'].'</b></td>
              <td><b>'.$row['phone'].'</b></td>      
              <td><b>'.$row['type_food'].'</b></td>
              <td><b>'.$row['packaging'].'</b></td>
              <td><b>'.$row['quantity'].'</b></td>
              <td>';
				if($row['status'] =="0"){
					echo '<b class="text-danger">Processing &nbsp;<i class="fa fa-refresh fa-spin"></i>';
				}else if($row['status'] =="1"){
					echo '<b class="text-success">Delivery &nbsp;<i class="fa fa-check"></i>';
				}else if($row['status'] =="2"){
					echo '<b class="text-info">Pending &nbsp;<i class="fa fa-cog"></i>';
				}
				echo'
			  </b></td>
              <td><b>'.$row['date_time'].'</b></td>
			  <td>
				<select id="update" class="update form-control" cid="'.$row['id'].'">
					<option value="">Update Status</option>
					<option value="1">Delivery</option>
					<option value="2">UnDelivery</option>
				</select>
			  </td>
            </tr>
          ';
        }
        echo '
        </tbody>
        </table>
                                    </div>
                                </div>
                            </div>
        ';
      }else{
        echo '<h1 style="color:red">No Results</h1>';
      } 
  }  
?>
<br>
 <?php
/* Attempt MySQL server connection.you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "foodhub");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM tanee WHERE status = '2' or status = '0'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo '
        <div class="card card-contact-list">
              <div class="agileinfo-cdr">
                                <div class="card-header">
                                    <h3 style="color:blue;">Pending / Processing Orders</h3>
									<hr style="border:2px solid #ccc;">
                                </div>
                                <div class="card-body p-b-20">
                    <table class="table table-striped">
            <thead class="bg-danger">
              <tr>
                <th style="color:red;"><b>Title</b></th>
                <th style="color:red;"><b>Name</b></th>
                <th style="color:red;"><b>Contact</b></th>
                <th style="color:red;"><b>Type of ordered</b></th>
                <th style="color:red;"><b>Packaging</b></th>
                <th style="color:red;"><b>Quantity</b></th>
                <th style="color:red;"><b>Status</b></th>
                <th style="color:red;"><b>DateTime</b></th>
				<th style="color:red;"><b>Update</b></th>
              </tr>
            </thead>
            <tbody> 
        '; 
        while($row = mysqli_fetch_array($result)){
          echo'
          <tr>
              <td><b>'.$row['title'].'</b></td>
              <td><b>'.$row['name'].'</b></td>
              <td><b>'.$row['phone'].'</b></td>      
              <td><b>'.$row['type_food'].'</b></td>
              <td><b>'.$row['packaging'].'</b></td>
              <td><b>'.$row['quantity'].'</b></td>
              <td>';
				if($row['status'] =="0"){
					echo '<b class="text-danger">Processing &nbsp;<i class="fa fa-refresh fa-spin"></i>';
				}else if($row['status'] =="1"){
					echo '<b class="text-success">Delivery &nbsp;<i class="fa fa-check"></i>';
				}else if($row['status'] =="2"){
					echo '<b class="text-info">Pending &nbsp;<i class="fa fa-cog"></i>';
				}
				echo'
			  </b></td>
              <td><b>'.$row['date_time'].'</b></td>
			  <td>
				<select id="update" class="update form-control" cid="'.$row['id'].'">
					<option value="">Update Status</option>
					<option value="1">Delivery</option>
					<option value="2">UnDelivery</option>
				</select>
			  </td>
            </tr>
          ';
        }
        echo '
        </tbody>
        </table>
                                    </div>
                                </div>
                            </div>
        ';
      }else{
        echo '<h1 style="color:red">No Results</h1>';
      } 
  }  
?>


        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <div class="text-center">
      <div class="credits">
          
          Designed by <a href="#">Sesali</a>
        </div>
    </div>
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>
<script>
	$("document").ready(function(){
		
		$(document).on("change",".update", function(){
			var cid = $(this).attr("cid");
			var stat = $(this).val();
			//alert(cid + stat);
			//return;
			$.ajax({
				url: 'action.php',
				type: 'post',
				data: {Updatestatus3: 1, cid: cid, stat: stat},
				success: function(data){
					if(data.match("success")){
						alert("Status Updated Successfully");
						window.location.href="taneorders.php";
					}else{
						//alert("Failed to update info");
						alert(data);
					}
				}
			});
		});
	});
</script>

</body>

</html>
