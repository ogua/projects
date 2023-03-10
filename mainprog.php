<?php
   session_start();
   error_reporting(0);
   include_once("db.php");
  if(!isset($_SESSION['name'])){
	 session_destroy();
	 header("location:index.php");
 }
 if(isset($_POST['legout'])){
	 $sql = "UPDATE `logintime` SET `LogoutTime` = CURRENT_TIME where id = '".$_SESSION['lastinsert']."' ";
	 $query = mysqli_query($conn,$sql);
	 if($query){
		 session_destroy();
	     header("location:index.php");
	 }	
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
<meta Http-Equiv="Cache-Control" Content="no-cache">
<meta Http-Equiv="Pragma" Content="no-cache">
<meta Http-Equiv="Expires" Content="0">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--mobile apps-->
<!--Custom Theme files-->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
<link href="css/bootstrap-theme.css" type="text/css" rel="stylesheet" media="all">
<link href="css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" media="all">
<!--//Custom Theme files-->
<!--//js-->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/action.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
 <script type="text/javascript" src="js/npm.js"></script>
 <script src="jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>
    
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<style>
 .back{
	 background-image: url("images/images.jpg");
	 background-repeat: no-repeat;
	 background-size:cover;
 }
 .msgDis{
	 top:0;
	 left:0;
	 bottom:0;
	 right:0;
	 text-align:center;
	 margin-top:260px;
	 position:absolute;
	 display:none;
	 z-index: -1;
 }
 .msgDis p{
	 color:red;
	 font-size:25px;
	 font-weight:bold;
	 font-family:Roboto;
 }
 .msgDiss{
	 top:0;
	 left:0;
	 bottom:0;
	 right:0;
	 text-align:center;
	 margin-top:260px;
	 position:absolute;
	 display:none;
   z-index: -1;
 }
 .msgDiss p{
	 color:red;
	 font-size:25px;
	 font-weight:bold;
	 font-family:Roboto;
	 
 }
 #displit{
	 border:1px solid red;
	 background-color:#fff;
	 display:none;
 }
</style>
</head>
<body class="back" style="height:100%;">
		      <h1 class="text-center" style="color:white;">PHARMACY MANAGEMENT SYSTEM</a></h1>		  
						<a href="logout.php" class="btn btn-info pull-right" style="margin-right:20px;">Logout</a>
						<a href="#" id="report" class="btn btn-info pull-right" style="margin-right:20px;">Generate Report</a>
			  <br>
			  <ul class="list-inline pull-right">
				<!---------<li><a href="" class="btn btn-info">Rrquest Leave</a></li>
				<li><input type="text" style="border-top-right-radius:25px;border-top-left-radius:25px;" id="tsc6" name="tsc6" class="form-control" placeholder="SEARCH BY BILL ID"/></li>
			  ------>
			  </ul>

			  <div class="form-group">
			         <div class="col-sm-2">
			                 <label style="color:white;font-weight:Bolder;background-color: #d9534f;border-bottom-right-radius:25px;" class="form-control text-capitalize">Pharmacist Name</label>
						</div>
					<div class="col-sm-2">
					         <input type="text" style="color:white;font-weight:Bolder;background-color: #d9534f;border-bottom-left-radius:25px;" value="<?php echo $_SESSION['name'];?>"name="cashie" id="cashie" class="form-control text-capitalize" placeholder="Name" disabled=""/>
					</div>
			 </div>
			 <div class="clearfix"></div>
									 <div class="row" style="margin:20px;">
					<div class="col-sm-3" id="fhi">
					         <div class="form-group">
						<input type="hidden"  style="color:white;font-weight:Bolder;background-color: #d9534f;border-top-right-radius:25px;border-top-left-radius:25px;"  name="cashid" id="cashid" value="<?php echo $_SESSION['id'];?>" class="form-control " placeholder="CASHIER ID" disabled=""/>
							 </div>
									 <div class="form-group">
												<input type="text"   style="color:white;font-weight:Bolder;background-color: #d9534f;border-top-right-radius:25px;border-top-left-radius:25px;" name="bills" id="bills" class="form-control billid" placeholder="BILLID" disabled=""/>
									 </div>
									 <div class="form-group">
										<label style="color:white;">Enter Product Name</label>
												<input type="text"  style="font-weight:Bolder;border-top-right-radius:25px;border-top-left-radius:25px;" list="productList" name="findlist" id="searhpr" class="form-control "/>
									 </div>
									 <div id="listProducts"></div>
									<div class="form-group">
									<label style="color:white;">Enter Product Price</label>
												<input type="number" style="border-top-right-radius:25px;border-top-left-radius:25px;" id="Pprice" name="Pprice"class="form-control"disabled>
									</div>
									<div class="form-group">
												<input type="hidden"  id="pid" name="pid"class="form-control" placeholder=" PRODUCT ID"/>
									</div>
									<div class="form-group">
									<label style="color:white;">Enter Product Quantity</label>
												<input type="number" style="border-top-right-radius:25px;border-top-left-radius:25px;" id="pqty" name="pqty"class="form-control"/> 
									</div>
									<div class="form-group">
									<button type="submit" style="border-bottom-right-radius:25px;"name="send" id="send" class="btn btn-success">ADD</button>
									<button type="submit" style="border-bottom-left-radius:25px;"name="refreT" id="refreT" class="btn btn-danger">Refresh</button>
									<button type="submit" style="border-bottom-left-radius:25px;"name="clearT" id="clearT" class="btn btn-success">Clear</button>
									</div>
					</div>
					<div class="col-sm-9" id="displayReport">
							<div id="addP"></div>
							<div class="col-sm-8 col-sm-offset-2"  id="dipresult"></div>
							<div id="addP2">
							      <div class="table-responsive" style="height:370px;overflow:scroll;">
										 <table class="table table-striped"  border="1" cellpadding="10">
						         <thead>
								     <tr>
									     <th style="font-weight:bold;font-size:5px;">PRODUCTID</th>
										 <th style="font-weight:bold;font-size:5px;">NAME</th>
										 <th style="font-weight:bold;font-size:5px;">QUANTITY</th>
										 <th style="font-weight:bold;font-size:5px;">PRICE</th>
										 <th style="font-weight:bold;font-size:5px;">DISCOUNT</th>
										 <th style="font-weight:bold;font-size:5px;">TOTAL</th>
										  <th style="font-weight:bold;font-size:5px;">Del</th>
									 </tr>
								 </thead>
								 <tbody>
								 
								  </tbody>
						     </table>
								  </div>
								  <br>
							</div>
	
							<dIv class="col-sm-8 col-sm-offset-3">
						<ul class="list-inline">
								<li><button type="submit"  style="border-radius:25px;" id="Bsend" name="Bsend" class="btn btn-success">CALCULATE</button></li>
								<li><input type="button" id="print_button2" style="color:white;font-weight:Bolder;background-color: #d9534f;border-bottom-right-radius:25px;" class="btn btn-success" value="Print Bill" /></li>

						</ul>
						</div>
						<div class="col-sm-3" id="printRec">
								<div id="displit">
										<p class="text-center">PHARMACY MANAGEMENT SYSTEM</p>
									<ul class="list-inline">
										<li><b style="font:size:5px";>#: <b id="disre" style="font:size:5px";></b></b> &nbsp;<b class="pull-right" style="font:size:5px";>Pharmacist: <?php echo $_SESSION['name'];?></b></li>
									</ul>
									<div id="disher"></div>	
								</div>
						</div>
					</div>
			  </div>
			  <div class="msgDis">
			       <p>Refresh SuccessFully</p>
			  </div>
			   <div class="msgDiss">
			       <p id="msgsh">Product Added SuccessFully</p>
			  </div>
			   <!-----------  Generate Bill ID and Cashier ID ---------------->									
				
			   <!----------- INSERT DETAILS INTO TABLE AND FETCH FROM THE Table ---------------->   
			   
			   <!-----------  Refresh Table ---------------->
			   <script>
			      $(document).ready(function(){				
						function getBillId(){
							$.ajax({
							url: "./cashierCode/getBillID.php",
							method: "post",
							success: function(result){
							  var res = $("#bills").val(result);
							  $("#disre").html(result);
							}
						});
						}
						getBillId();
					  });
			   </script>
			      <!-----------  Calculate Total Price  and Generate New Bill ID ---------------->
				
				
				
				  <!-----------  GET DETAILS ONCE PRODUCT ID HAS BEEN ENTERED  ---------------->
				<script>
				 $(document).ready(function(){
					 $("#prducts").keyup(function(event ){
						 if(event.which==13){
							  var prductss = $("#prducts").val();
							  $.ajax({
								url: "./cashierCode/outofStock.php",
								method: "post",
								data: {prductss: prductss},
								success: function(data){
									if(data.match("shout")){						
										alert("Shortage of product");
										return false;
									}else if(data.match("out")){
										alert("product Is out of stock or dont exist");
										return false;
									}else if(data.match("go")){
										$.ajax({
								url: "./cashierCode/getProductEnter.php",
								method: "post",
								dataType: "json",
								data: {prductss: prductss},
								success: function(response){
									$("#pname").val(response["name"]);
									$("#Pprice").val(response["Amount"]);
									$("#pqty").val(1);
									$("#pdcnt").val(response["Discount"]);
									
								$("#addP2").hide();
							    var bills = $("#bills").val();
							    var prducts = $("#prducts").val();
								var pname = $("#pname").val();
								var Pprice = $("#Pprice").val();
								var pqty = $("#pqty").val();
								var pdcnt = $("#pdcnt").val();
								 $.ajax({
									url: "./cashierCode/insertProduct.php",
									method: "post",
									data:{bills: bills, prducts: prducts, pname: pname, Pprice: Pprice, pqty: pqty, pdcnt:pdcnt},
									dataType: "text",
									success: function(result2){
										var text1 = $("#bills").val();
							$.ajax({
							url: "./cashierCode/getProduct.php",
							method: "post",
							data:{text1: text1},
							success: function(result1){
								$.ajax({
							url: "./cashierCode/getProduct2.php",
							method: "post",
							success: function(result){
							  $("#disher").html(result);	
							}
						});
								$("#addP").html(result1);
								$("#addP").scrollTop($("#addP").prop("scrollHeight"));
								$("#prducts").val("");
						 $("#pname").val("");
						 $("#Pprice").val("");
						 $("#pqty").val("");
						  $("#pdcnt").val(0);
						  $("#msgsh").text();
						 $(".msgDiss").fadeIn(3000);
								setTimeout(function(){
								  $(".msgDiss").fadeOut(3000);	
						},4000);	
							}
						});						
                                   									
									}
								});		
								}
							});
									}
								}
							});							
						 }
					 });
				 });
				</script>
				<script>
				 $(document).ready(function(){
					 $("#productss").keyup(function(event ){
						 if(event.which==13){
							  var prductss = $("#productss").val();
							  $.ajax({
								url: "./cashierCode/outofStock.php",
								method: "post",
								data: {prductss: prductss},
								success: function(data){
									if(data.match("shout")){						
										alert("Shortage of product");
										return false;
									}else if(data.match("out")){
										alert("product Is out of stock or dont exist");
										return false;
									}else if(data.match("go")){
										$.ajax({
								url: "./cashierCode/getProductEnter.php",
								method: "post",
								dataType: "json",
								data: {prductss: prductss},
								success: function(response){
									$("#pname").val(response["name"]);
									$("#Pprice").val(response["Amount"]);
									$("#pqty").val(1);
									$("#pdcnt").val(response["Discount"]);											
								}
							});
									}
								}
							});							
						 }
					 });
				 });
				</script>
				
				<script>
				 $(document).ready(function(){
					 $("#searhpr").keyup(function(e){
						 e.preventDefault();
						 var name = $(this).val();
						 $.ajax({
							url: 'searchproduct.php',
							method: 'POST',
							data: {name:name},
							success: function(data){
								$("#listProducts").html(data);			
							}
							});
					 });
					 
					 $("input[name='findlist']").on("input", function(){
						var seletd = $(this).val();
						if(seletd.length > 0){
							$.ajax({
								url: 'InsertToField.php',
								method: 'POST',
								dataType: 'json',
								data: {seletd:seletd},
								success: function(data){
								 //alert(data);
								 $("#Pprice").val(data.price);
								  $("#pid").val(data.id);
								 $("#pqty").val("1");
								}
							});		
						}
					 });
				 });
				</script>
				
		<!-----------  clear form field  ---------------->
		<script>
				 $(document).ready(function(){
					
				 });
				</script>
				<!--------- delete product from list bought ---------------->
				<script>
					$(document).ready(function(){
						
					});
				</script>
				 <script src="js/bootstrap.js"></script>
		<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
<!--------------- print ------------>
<script>
    $(document).ready(function(){
		
		$(document).on("click", "#sdates", function(e){
			 e.preventDefault();
		   var results = $("#kwame").val();
			var resultss = $("#kwames").val();
			if(results ==""){
				alert("All dates must be Selected");
				return;
			}if(resultss ==""){
				alert("All dates must be Selected");
				return;
			}
					$.ajax({
						url: "reportSales.php",
						method: "post",
						data: {results: results, resultss: resultss},
						success: function(response){
							$("#getTran3").html(response);
						}
					});
		});
         
	   
	   $(document).delegate("#print","click",function(){
				var mode = 'iframe'; // popup
				var close = mode == "popup";
				var options = { mode : mode, popClose : close};
				$("#getTran3").printArea(options);
			});
	   
	   $("#report").click(function(e){
		   e.preventDefault();
			//alert('gooo');
			$("#addP2").show();		
		   var output = '';
		   output += '<h2 style="color:white;">Generate Report </h2>';
		   output += '<div class="form-group">';
		   output += '<div class="col-sm-5">';
		   output += '<label class="form-control">FROM</label>';
		   output += '<input type="date" style="border-top-right-radius:25px;border-top-left-radius:25px;" id="kwame" name="kwame"class="form-control" />';
		   output += '</div>';
		   output += '<div class="col-sm-5">';
		   output += ' <label class="form-control">TO</label>';
		   output += '<input type="date" style="border-top-right-radius:25px;border-top-left-radius:25px;" id="kwames" name="kwames" class="form-control"/>';
		   output += '</div><BR>';
		   output += '<button type="submit"  style="border-bottom-left-radius:25px;" id="sdates" name="sdates" class="btn btn-success">SEARCH</button>	';
		   output += ' </div>';
		   output += '<hr>';
		   output += ' <div class="clearfix"></div>';
		   output += '<div id="getTran3" style="background-color:#fff;"></div>';

		 $("#addP2").html(output);
		 $("#addP").hide();
		 //alert(output);
	   });
    });

  </script>
		
</body>
</html>