<?php
include('db.php')
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="../index.php"><i class="fa fa-home"></i> Homepage</a>
                    </li>
                    
					</ul>

            </div>

        </nav>
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
				<div class="col-md-2"></div>
                <div class="col-md-8 col-sm-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Mobile Money Payment
                        </div>
                        <div class="panel-body">
							<ul class="list-inline">
								<li><a href="#" class="btn btn-success" data-toggle="modal" data-target="#ipayModal" style="border-radius:30px;">Pay Using Mobile Money</a></li>
							</ul>					
                       </div>
                </div>
            </div>
           
                
                </div>
                    
            
				
					</div>
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
 
    <!-- Metis Menu Js
    <script src="js/jquery.metisMenu.js"></script>  -->
      <!-- Custom Js 
    <script src="js/custom-scripts.js"></script> -->
    
   <div id="ipayModal" class="modal fade m-auto" role="dialog" data-keyboard="true" data-backdrop="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<img src="https://payments.ipaygh.com/app/webroot/img/LOGO-MER01095.jpeg" class="mx-auto d-block logo">
							</div>
							<form action="https://community.ipaygh.com/gateway" id="ipay_checkout" method="post" name="ipay_checkout" target="_blank">
								<div class="modal-body">
									<legend class="text-center mt-1">Make Payment</legend>
									<input name="merchant_key" type="hidden" value="5c841bf2-d29b-11e7-aebc-f23c9170642f">
									<input id="merchant_code" type="hidden" value="TST000000000950">
									<input name="success_url" type="hidden" value="">
									<input name="cancelled_url" type="hidden" value="">
									<input id="invoice_id" name="invoice_id" type="hidden" value="">
									<div class="row">
										<div class="col-lg">
											<div class="form-group">
												<input type="text" title="Name" name="extra_name" id="name" class="form-control" placeholder="First & Last Name">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group">
												<input type="tel" title="Mobile Number" name="extra_mobile" id="number" class="form-control" maxlength="10" placeholder="Contact Number">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group">
												<input type="email" name="email" id="extra_email" class="form-control" placeholder="Email">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group">
												<input type="text" name="total" class="form-control" value="10"  id="total" placeholder="Amount(GH₵)">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group">
												<input class="form-control" type="text" value="<?php $id = $_GET['id'];
												if($id == "1"){echo"MamaLit Food Payment";}
												else if($id == "2"){echo"MaryDee Food Payment";}
												else if($id == "3"){echo"Tanee Food Payment";}
												else if($id == "4"){echo"Club HOuse Food Payment";}?>
												" name="description" id="description" placeholder="Description of Payment">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<button type="submit" class="btn btn-primary ipay-btn btn-block" style="padding: 8px 11px;"><strong>Pay</strong></button>
										</div>
									</div>
									<div class="row">
										<div class="col-lg text-center mt-2">
											<a href="" data-dismiss="modal" id="close">Cancel</a>
										</div>
									</div>
								</div>
								<div class="modal-footer justify-content-center ">
									<div class="row">
										<div class="col-lg">
											<img src="https://payments.ipaygh.com/app/webroot/img/iPay_payments.png" style="width: 100%;" class="img-fluid mr-auto" alt="Powered by iPay">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				
<script src="js/jquery-2.2.3.min.js"></script>
      <!-- Bootstrap Js -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.js"></script>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script type="text/javascript">(function(){Date.prototype.today = function () { return  this.getFullYear()+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) +((this.getDate() < 10)?"0":"") + this.getDate();};Date.prototype.timeNow = function () { return ((this.getHours() < 10)?"0":"") + this.getHours() +((this.getMinutes() < 10)?"0":"") + this.getMinutes() +((this.getSeconds() < 10)?"0":"") + this.getSeconds();};document.getElementById("invoice_id").value = document.getElementById("merchant_code").value+ new Date().today() + new Date().timeNow();})();</script>	
</body>
</html>
