<?php
session_start();
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
										<div class="panel-heading"><h1>Select Payment Mode </h1></div>
								          <div class="panel-body">
												<div class="row">
														<div class="col-md-2"></div>
				
														<div class="col-md-8" style="border:1px dotted black;padding:20px;">
															<a href="#" id="payon"><button class="btn btn-success btn-lg">Pay On Delivery</button></a>
															<a href="mobilepayment.php"><button class="btn btn-success btn-lg">Pay Using Mobile Money</button></a>
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