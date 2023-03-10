<?php 
session_start(); 
if(isset($_POST['logout'])){
		session_destroy();
		header("location:index.php");
	}
	
?>
<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=" />
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<style>
.back{
  background-image: url("images/nurse.jpg");
background-size:cover;
background-image: no-repeat;
}

</style>
</head> 
<body class="back">
       <h1 class="text-center" style="background-color:#ccc;border:1px solid #fff;padding:20px;">Nurse Department &rarr; O.P.D Unit</h1>
	   	 <img class="img-rounded"src="images/UPSA.png" height="100" width="100"alt="upsa image" style="border-radius:100px;position:absolute;margin-left:20px;">

	   <form method="post" action="" >
	   
	    <div class="form-group pull-right" style="margin-right:20px;">
		      <div class="col-sm-9">
					 <label style="font-size:20px;color:white;">Welcome: <?php echo $_SESSION['name']; ?></label>
			  </div>
			  <div class="col-sm-3">
				<input type="submit" style="background-color: #d8bc35;border-color: #d8bc35;" name="logout" id="logout" class="btn btn-success"value="logout" />
				</div>
	   </div><br>
	   </form>
	        <div class="col-sm-5 col-sm-offset-2" style="margin-top:20px;margin-bottom:20px;">

	   <form method="post" action="">
			        <div class="form-group">
                                <div class="col-sm-5">
                                    <input type="text" id="prefs" name="prefs" placeholder="REFERENCE NUMBER TO SEARCH" class="form-control">
                                </div>
                                <div class="col-sm-2">
			         	         <input type="submit" style="background-color: #42327a;border-color: #42327a;" name="searchs" id="searchs" class="btn btn-success pull-right"value="search" />			
                                </div>	
								<div class="col-md-2">
									<input type="button" class="btn btn-danger" value="Clear" id="clear">
								</div>
								<div class="col-md-2">
									<input type="button" class="btn btn-danger" value="Delete" id="delect">
								</div>
						    </div>
			   </form>
			   </div>
     <div class="col-sm-6 col-sm-offset-3" style="margin-top:20px;margin-bottom:20px;">
	  
		<form method="post" action="" id="submitNurse">
		  <div class="form-group">
				<input class="form-control" style="color: red;" type="text" name="Studpref" id="Studpref" placeholder="Patient's RefID" required />
			</div>
			<div class="form-group">
				<input class="form-control" style="color: red;" type="text" name="precardid" value="REG" id="precardid" placeholder="Patient's CARDID" required />
			</div>
			
			<div class="form-group">
				<input class="form-control" type="text" name="prefname" id="prefname" placeholder="Patient's FirstName"  />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="prefoname"id="prefoname" placeholder="Patient's OtherNames"  />
			</div>
			
			<div class="form-group">
				<input class="form-control" type="number" name="prefcnumb" id="prefcnumb" placeholder="Patient's Contact Number"  />
			</div>
			<div class="form-group">
				<input class="form-control" type="number" name="preftmpe" id="preftmpe" placeholder="Patient's Temperature"  />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="prefheig" id="prefheig" placeholder="Patient's height"  />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="prefweig" id="prefweig" placeholder="Patient's Weight"  />
			</div>
			<div class="form-group">
				<input class="form-control" type="number" name="prefbp" id="prefbp" placeholder="Patient's BP"  />
			</div>
			<div class="form-group">
				<input class="form-control" type="number" name="prefage" id="prefage" placeholder="Patient's Age"  />
			</div>
			<label style="color:;">Patient's Date of Birth</label>
			<div class="form-group">
				<input class="form-control" type="date" name="prefwei" id="prefwei"  />
			</div>
				
						<div class="form-group">
							<select class="form-control" name="opt" id="opt" style="width:200px" >
							<option value="">Room Number</<option>
							<option value="ROOM 1">Room 1</<option>
							<option value="ROOM 2">Room 2 </<option>
							<option value="ROOM 3">Room 3 </<option>
							</select>
						</div>

			<div class="form-group">
				<textarea class="form-control" id="prefpissue" name="prefpissue"placeholder="Enter Patient's issue" style="resize:none;"></textarea>
			</div>
			<input type="submit" style="background-color: #d8bc35;border-color: #d8bc35;" name="send" id="send" class="btn btn-sm btn-success pull-right"value="Submit" />
		</form>
	 </div>
	 <script>
		$('document').ready(function(){
			function getReferenceID(){
				$.ajax({
					url: 'action.php',
					type: 'POST',
					data:{getReferenceID: 1},
					success: function(data){
						$("#Studpref").val(data);
					}
				});
			}getReferenceID();
			
					function clearFormFields(){
						$("#prefname").val("");
						$("#prefoname").val("");
						$("#prefcnumb").val("");
						$("#preftmpe").val("");
						$("#prefheig").val("");
						$("#prefweig").val("");
						$("#prefbp").val("");
						$("#prefage").val("");
						$("#prefwei").val("");
						$("#prefpissue").val("");
						$("#opt").val("");
					}
			
					$("#clear").click(function(e){
						e.preventDefault();
						$("#prefname").val("");
						$("#prefoname").val("");
						$("#prefcnumb").val("");
						$("#preftmpe").val("");
						$("#prefheig").val("");
						$("#prefweig").val("");
						$("#prefbp").val("");
						$("#prefage").val("");
						$("#prefwei").val("");
						$("#prefpissue").val("");
						$("#opt").val("");
					});
					
			$("#submitNurse").on("submit",function(e){
				e.preventDefault();
				$.ajax({
					url: 'actions.php',
					type: 'POST',
					contentType: false,
					processData: false,
					cache: false,
					data: new FormData(this),
					success: function(data){
						alert(data);
						getReferenceID();
						clearFormFields();
					}
				});
			});
			
			$("#searchs").click(function(e){
				e.preventDefault();
				var searchText = $("#prefs").val();
				if(searchText ==""){
					alert("Reference ID Cant be Empty");
				}
				$.ajax({
					url: 'action.php',
					type: 'POST',
					dataType: 'json',
					data: {getSearchData: 1, searchText: searchText},
					success: function(data){
						$("#prefname").val(data.firstname);
						$("#prefoname").val(data.othernames);
						$("#prefcnumb").val(data.contact);
						$("#preftmpe").val(data.temperature);
						$("#prefheig").val(data.height);
						$("#prefweig").val(data.PWeight);
						$("#prefbp").val(data.Bp);
						$("#prefage").val(data.Age);
						$("#prefwei").val(data.dateofBirth);
						$("#prefpissue").val(data.Reason);
						$("#opt").val(data.room);
					}
				});
			});
			
			$("#delect").click(function(e){
				e.preventDefault();
				var delect = $("#prefs").val();
				if(delect == ""){
					alert("Reference ID Cant be Empty");
					return;
				}
				$.ajax({
					url: 'action.php',
					type: 'POST',
					data:{delRecord: 1, delect: delect},
					success: function(data){
						alert(data);
					}
				});
			});
		});
	 </script>
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
</body>
</html>