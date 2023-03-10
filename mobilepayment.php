<?php
session_start();
error_reporting(0);
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
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/action.js"></script>
<script type="text/javascript" src="js/action2.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/npm.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">

</head>
 <body>
		 <div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-header">
						<a href="index.php" class="navbar-brand">OguaStore</a>
				</div>
				<ul class="nav navbar-nav">
						<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
						<li><a href="index.php"><span class="glyphicon glyphicon-model-home"></span>Products</a></li>
						</ul>
				<ul class="nav navbar-nav navbar-right">
						<!--<li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge" id="bage">0</span></a>
								<ul class="dropdown-menu" >
										<div style="width:500px;">
											<div class="panel-success">
														<div class="panel-heading">Cart</div>
														<div class="panel-body">
															<div class="row">
																		<div class="col-md-3">S.NO</div>
																		<div class="col-md-3">P.Image</div>
																		<div class="col-md-3">P.Name</div>
																		<div class="col-md-3">P.Px</div>
																</div>
																<div id="getcart" style="height:300px; overflow-x: hidden;">
																
																</div>
																<!--		<div class="row">
																		<div class="col-md-3">S.NO</div>
																		<div class="col-md-3">P.Image</div>
																		<div class="col-md-3">P.Name</div>
																		<div class="col-md-3">P.Px</div>
																</div>
														</div>
														<div class="panel-footer"></div>
												</div>
										</div>
								</ul>
						</li>---->
						<li></li>
							</ul>
		 </div>
		 <p><br></p>
		 <p><br></p>
		 <p><br></p>
		 <div class="contaner-fluid">
				<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
						   <div id="deleupmsg"></div>
								<div class="panel-default">
										<div class="panel-heading"><h1>Mobile Money Payment</h1></div>
								          <div class="panel-body">
												<div class="row">
														<div class="col-md-2"></div>
							
							<script>
								$(document).ready(function(){
									$("#submit").click(function(){
										var text1 = $("#extra_name").val();
										var text2 = $("#extra_mobile").val();
									$.ajax({
									url : "action.php",
									 method : "post",
									 data: {subOrdermobil: 1,text1: text1, text2: text2},
									 success: function(data){
										alert(data);
									 }
									});
								});
								});
							</script>
							<div class="col-md-8" style="border:1px dotted black;padding:20px;">
							 <form class="form-horizontal" action="https://community.ipaygh.com/gateway" id="ipay_checkout" method="post" name="ipay_checkout">
						    <input name="merchant_key" type="hidden" value="5c841bf2-d29b-11e7-aebc-f23c9170642f">
		                    <input id="merchant_code" name="merchant_code" type="hidden" value="TST000000000950">
		                    <input id="invoice_id" name="invoice_id" type="hidden" value="">
						<input type="hidden" name="success_url" value="http:127.0.0.1/projectWork/Ecommerce%20Books/payment_succes.php" />
						<!---<input type="hidden" name="cancelled_url" value="http:127.0.0.1/projectWork/Ecommerce%20Books/cancel.php" />-->
							<h4 class="text-info">Full Name</h4>
							<div class="form-group">               
								     <input name="extra_name" id="extra_name" type="text" value="<?php echo' '.$_SESSION['firstname'].' '.$_SESSION['lastname'].'';?>"class="form-control">
						    </div>
							<h4 class="text-info">Mobile Number</h4>
							 <div class="form-group">               
								      <input name="extra_mobile" id="extra_mobile" type="text" value="<?php echo ''.$_SESSION['num'].'';?>"class="form-control">
						    </div>
							<h4 class="text-info">Email Address</h4>
							<div class="form-group">               
								<input name="extra_email" type="text" value="<?php echo''.$_SESSION['emailAdd'].'';?>" class="form-control" >
						    </div>
							<h4 class="text-info">Payment Description</h4>
							<div class="form-group">               
								<input name="description" type="text" value="BOOKS PAYMENT" class="form-control" >
						    </div>
							<h4 class="text-info">Payment Amount</h4>
							<div class="form-group">               
								<input name="total" value="<?php echo''.$_SESSION['totals'].'';?>" type="text" class="form-control" >
						    </div>
							<div class="form-group">
                                <div class="col-sm-4">
							            <button type="submit" id="submit" name="submit" class="btn btn-info">Pay Now</button>
                                </div>
                                <div class="col-sm-8">
										<img class="img-responsive" src="https://payments.ipaygh.com/app/webroot/img/iPay_payments.png" alt="iPay">
                                </div>                        
                            </div>
							
						</form>
															
														</div>

														<div class="col-md-2"></div>
												</div>
												<div class="row">
														<div class="col-md-2"></div>
				
														<div class="col-md-8" id="disply" style="border:1px dotted black;padding:20px;background-color:#fff;">
															
														</div>
		<script type="text/javascript">
		(function(){
			Date.prototype.today = function () { return  this.getFullYear()+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) +((this.getDate() < 10)?"0":"") + this.getDate();};
			Date.prototype.timeNow = function () { return ((this.getHours() < 10)?"0":"") + this.getHours() +((this.getMinutes() < 10)?"0":"") + this.getMinutes() +((this.getSeconds() < 10)?"0":"") + this.getSeconds();};
			document.getElementById("invoice_id").value = document.getElementById("merchant_code").value+ new Date().today() + new Date().timeNow();
		})();
	    </script>

														<div class="col-md-2"></div>
												 </div>
												 <div class="row">
														<div class="col-md-2"></div>
				
														<div class="col-md-8" id="displyS">
															
														</div>

														<div class="col-md-2"></div>
												 </div>
												
												
												
												<!--<div class="row">
														<div class="col-md-2">Action</div>
														<div class="col-md-2"><img src="images/g3.jpg" width="100" height="80"></div>
														<div class="col-md-2">Loose Top</div>
														<div class="col-md-2"><input type="text" class="form-control"></div>
														<div class="col-md-2"><input type="text" class="form-control" disabled></div>
														<div class="col-md-2"><input type="text" class="form-control"></div>
												</div>-->
										  </div>
								</div>	
						</div>
						<div class="col-md-1"></div>
				</div>
		 </div>
		<script>
	$(windowe).unload(function(){
		alert("go");
	});
</script>

<script type="text/javascript">
var areYouReallySuree = false;
function areYouSure() {
    if(allowPrompt){
        if (!areYouReallySure && true) {
            areYouReallySure = true;
            var confMessage = "***************************************\n\n W A I T !!! \n\nBefore leaving our site, follow CodexWorld for getting regular updates on Programming and Web Development.\n\n\nCLICK THE *CANCEL* BUTTON RIGHT NOW\n\n***************************************";
            return confMessage;
        }
    }else{
        allowPrompt = true;
    }
}

var allowPrompt = true;
window.onbeforeunload = areYouSure;
</script>
 </body>
</html>