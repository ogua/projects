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

  <title>Admin|UPSA FOOD HUB</title>

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
            <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Pages</li>
              <li><i class="fa fa-square-o"></i>Tanee food Report</li>
            </ol>
          </div>
        </div>
        <!-- Page content goes here-->
        
<div class="clearfix"></div>
    <!-- //w3_agileits_top_nav-->
    <!-- /inner_content-->
        <div class="inner_content">
            <!-- /inner_content_w3_agile_info-->
          <div class="inner_content_w3_agile_info">
             <img class="img-rounded"src="images/logo.jpg" height="100" width="100"alt="upsa image" >
            <div class="container back22">
              <div class="col-sm-8 col-sm-offset-2">        
                      <!--- MEMBER SEARCH ----->
                
                      <h2 class="text-center">Generate Report For Tanee Food</h2>
                      <form method="post" action="taneer.php">
           <div class="form-group">
                <div class="col-sm-5">
                     <label class="form-control">FROM</label>
                    <input type="date" style="border-top-right-radius:25px;border-top-left-radius:25px;" id="kwame" name="kwame"class="form-control" />
            </div>
            <div class="col-sm-5">
                     <label class="form-control">TO</label>
                 <input type="date" style="border-top-right-radius:25px;border-top-left-radius:25px;" id="kwames" name="kwames" class="form-control"/>
            </div><BR>
            <button type="submit"  style="border-bottom-left-radius:25px;" id="sdates" name="sdates" class="btn btn-success">Generate</button>  
         </div>
        </form>
                      </div>
                        <div class="clearfix"></div>

                      <!--- END MEMBER SEARCH ----->
      <div class="container" style="margin-top:20px;">                        
      <div class="col-sm-8 col-sm-offset-2 well">                   <?php
     
   $servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodhub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['sdatesss'])){
    $sql = "SELECT * FROM `tanee` WHERE `date_time` BETWEEN '".$_POST['kwame']."' AND '".$_POST['kwames']."' ";
        $query = mysqli_query($conn,$sql);
      $result = mysqli_num_rows($query);
      if($result > 0){
        echo '
        <div class="card card-contact-list">
              <div class="agileinfo-cdr">
                                <div class="card-header">
                                    <h3 style="color:blue;">Generated Report</h3>
                                </div>
                                <div class="card-body p-b-20">
                    <table class="table table-striped">
            <thead class="bg-danger">
              <tr>
                <th style="color:red;"><b>Title</b></th>
                <th style="color:red;"><b>Name</b></th>
                <th style="color:red;"><b>Type of food</b></th>
                <th style="color:red;"><b>Packaging</b></th>
                <th style="color:red;"><b>Quantity</b></th>
                <th style="color:red;"><b>Date and Time</b></th>
              </tr>
            </thead>
            <tbody>
        ';
        while($row = mysqli_fetch_array($query)){
          echo'
          <tr>
              <td><b>'.$row['title'].'</b></td>
              <td><b>'.$row['name'].'</b></td>
              <td><b>'.$row['type_food'].'</b></td>      
              <td><b>'.$row['packaging'].'</b></td>
              <td><b>'.$row['quantity'].'</b></td>
              <td><b>'.$row['date_time'].'</b></td>
            </tr>
          ';
        }
        echo '
        </tbody>
        </table>
                                    </div>
                                </div>
                            </div>
                            <a href="#"  onclick="print()" class="btn btn-xs btn-success pull-right">Print</a>
        ';
      }else{
        echo '<h1 style="color:red">No Results</h1>';
      }
  }     
?>
          
  </div>
          
    </div>         
              
            
          
          
            </div>
          <!-- //inner_content_w3_agile_info-->
        </div>
    <!-- //inner_content-->
  </div>

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


</body>

</html>
