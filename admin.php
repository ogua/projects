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
						<div class="col-md-1"></div>
						<div class="col-md-2">							
								<div class="nav nav-pills nav-stacked"  style="border:1px solid #ccc;background-color:#f5f5f5;">
										<li class="active"><a href="#">Admin</a></li>
										<li><a href="#" class="addbooks" id="addbooks">Add Books</a></li>
										<li><a href="#" class="CusOrder" id="CusOrder">Customer Orders</a></li>
										<li><a href="#" class="delbuks" id="delbuks">Delete/Edit Books</a></li>
										<li><a href="#" class="genReport" id="genReport">Generate Report</a></li>
								</div>
								
								<!--<div class="nav nav-pills nav-stacked">
										<li class="active"><a href="#">Brand</a></li>
										<li><a href="#">HP</a></li>
										<li><a href="#">SUMSUND</a></li>
										<li><a href="#">PHILIPS</a></li>
										<li><a href="#">Brand</a></li>
										<li><a href="#">Brand</a></li>
								</div>-->
						</div>
						<div class="col-md-8">
						<div id="displMesage"></div>
								<div class="panel panel-info">
										<div id="getHei"class="panel-heading"id="searchBox">
											<ul class="list-inline">
												<li>Admin</li>
												<li style="width:400px;left:10px;"><input type="text" class="form-control" placeholder="SEARCH BY REFERENCE  ID"id="ordersetext"></li>
												<li style="left:20px;"><input type="submit" class="form-control btn btn-success" id="orderse" value="Search"></li>
												<li style="left:20px;"><a href="logout2.php" class="btn btn-success">Logout</a></li>
											</ul>
										</div>
										<div class="panel-body">
										  <div id="adminshow">
													<center style="font-weight:bold;font-family:Tahoma;">ADD BOOK</center>	
                                                     <form action="upload.php" method="post"  enctype="multipart/form-data">					
															<div class="col-md-12">
																	<label>Book Title</label>
																	<input type="text" class="form-control" id="lname" name="lname" placeholder="Book Title" required>
															</div>
															<div class="col-md-12">
																	<label>Image Url</label>
																	<input type="file" class="form-control" id="fileToUpload" name="fileToUpload"  required>
															</div>
																<div class="col-md-12">
																<label>Select Book Category</label>
																	 <div class="form-group">
				                                                          <select class="form-control" id="cat" name="cat">
				                                                               <option value="">Select Book Category</<option>
				                                                               <option value="1">Accounting</<option>
				                                                               <option value="2">Info Tech</<option>
																			   <option value="3">Law</<option>
																			   <option value="4">Marketing</<option>
																			   <option value="5">Banking & Finance</<option>
																			   <option value="6">Magazines</<option>
																			   <option value="7">Novel</<option>
				                                                        </select>
																	</div>
															</div>									
															<div class="col-md-12">
																	<label>Book ISBN</label>
																	<input type="number" class="form-control" id="pwd" name="pwd" placeholder="Book ISBN" required>
															</div>
															<div class="col-md-12">
																	<label>Author Name</label>
																	<input type="text" class="form-control" id="pwd2" name="pwd2" placeholder="Authour" required>
															</div>																									
															<div class="col-md-12">
																	<label>Price</label>
																	<input type="number" class="form-control" id="aln1" name="aln1" placeholder="Price" required>
															</div>
															<div class="col-md-12">
																	<label>Book Description</label>
																	<div class="form-group">
				                                     <textarea rows="9" class="form-control" id="drudpre" name="drudpre"placeholder="Book Description" style="resize:none;"></textarea>
			                                                     </div>
															</div>																																																						
													<input style="margin-top:20px;"type="submit" name="add"  value="Add" class="btn btn-success btn-sm pull-right"/></div>
								</form>
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
						<div class="col-md-1"></div>
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
<script>
	$("document").ready(function(){
		$("body").delegate(".insercart", "click", function(){
		$("#upSta").change(function(){
		var text = $(this).val();
		alert(text);
		});
	});		
	});
</script>
 </body>
</html>