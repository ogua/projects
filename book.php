<!DOCTYPE HTML>
<html>

<head>
	<title>:: Book an Event</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
</head>

<body>
	<div class="header">
		<div class="header_top">
			<div class="wrap">
				<div class="logo">
					<a href="index.php">
						<img src="images/logo2.png" alt="" />
					</a>
				</div>
				<div class="menu">
					<ul>
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="about.php">About</a>
						</li>
						<li>
							<a href="artistsignUp.php">Artist SignUp</a>
						</li>
						<li class="active">
							<a href="book.php">Book Artist</a>
						</li>
						<li>
							<a href="gallery.php">Gallery</a>
						</li>
						<li>
							<a href="contact.php">Contact Us</a>
						</li>
						<li>
							<a href="login.php">Login</a>
						</li>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="wrap">
					<h2 style="color:white;">Book An Artist</h2>
					<div class="row">
						<div class="col-md-2">
							<!----<img src="images/" id="showImg" width="180" height="200">-------------->
						</div>
						<div class="col-md-6">
							<form method="post" action="" id="artistbook" enctype="multipart/form-data">
								<div class="form-group">
									<label style="color:white;">Enter Your Fullname</label>
									<input type="text" name="fname" id="fname" class="form-control">
								</div>
								<div class="form-group">
									<label style="color:white;">Select Gender</label>
									<select name="gender" id="" class="form-control">
										<option value=""></option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
								<div class="form-group">
									<label style="color:white;">Enter Email Address</label>
									<input type="email" name="Email" id="Email" class="form-control">
								</div>
								<div class="form-group">
									<label style="color:white;">Enter Telephone Number</label>
									<input type="number" name="telep" id="telep" class="form-control">
								</div>
								<div class="form-group">
									<label style="color:white;">Kind of Event</label>
									<select name="eventkind" id="" class="form-control">
										<option value=""></option>
										<option value="Hall Week">Hall Week</option>
										<option value="Festivals">Festivals</option>
										<option value="Party">Party</option>
										<option value="Advertisement">Advertisement</option>
										<option value="Others">Others</option>
									</select>
								</div>
								<div class="form-group">
									<label style="color:white;">Date of Event</label>
									<input type="date" name="dateofevent" id="dateofevent" class="form-control">
								</div>
								<div class="form-group">
									<label style="color:white;">Start and End Time (ie. 5:00pm - 7:00pm)</label>
									<input type="text" name="startend" id="startend" class="form-control">
								</div>
								<div class="form-group">
									<label style="color:white;">Choose an Artist</label>
									<select name="artists" id="" class="form-control">
									<?php
										include_once('db.php');
										$sql = "SELECT `fullname` FROM `airtest`";
										$query = mysqli_query($conn,$sql);
										if($query){
											echo'
											<option value=""></option>';
											while($row = mysqli_fetch_array($query)){
												echo '<option value="'.$row['fullname'].'">'.$row['fullname'].'</option>';
											}
										}
									?>
										
									</select>
								</div>
								<div class="form-group">
									<label style="color:white;">Any Special Requset</label>
									<textarea id="sRequest" name="sRequest"></textarea>
								</div>
								<div class="form-group">
									<input type="submit" name="send" id="send" value="Book Artist" class="pull-right btn btn-info btn-sm">
								</div>
							</form>
						</div>
						<div class="col-md-4">
						<h4 style="color:white;">Topmost Artistes Registered with us.</h3>
							<div class="row">
								<div class="col-md-4" style="border:1px solid #cc;">
									<a href="ArtistInfo.php?id=5"><img src="images/becca - Copy.jpg" class="img-thumbnail" width="300" height="400"></a>
									<p style="color:white;margin-top:5px;">Becca</p>
								</div>
								<div class="col-md-4" style="border:1px solid #cc;">
									<a href="ArtistInfo.php?id=1"><img src="images/shata.jpg" class="img-thumbnail" width="300" height="400"></a>
									<p style="color:white;margin-top:5px;">Shattawale</p>
								</div>
								<div class="col-md-4" style="border:1px solid #cc;">
									<a href="ArtistInfo.php?id=6"><img src="images/Obibini - Copy.jpg" class="img-thumbnail" width="300" height="400"></a>
									<p style="color:white;margin-top:5px;">Obibini</p>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-4" style="border:1px solid #cc;">
									<a href="ArtistInfo.php?id=2"><img src="images/Stonebwoy-3 - Copy.jpg" class="img-thumbnail" width="300" height="400"></a>
									<p style="color:white;margin-top:5px;">Stonebwoy</p>
								</div>
								<div class="col-md-4" style="border:1px solid #cc;">
									<a href="ArtistInfo.php?id=3"><img src="images/joyce-blessing - Copy.jpg" class="img-thumbnail" width="300" height="400"></a>
									<p style="color:white;margin-top:5px;">joyce blessing</p>
								</div>
								<div class="col-md-4" style="border:1px solid #cc;">
									<a href="ArtistInfo.php?id=4"><img src="images/kumi-guitar - Copy.jpg" class="img-thumbnail" width="300" height="400"></a>
									<p style="color:white;margin-top:5px;">kumi guitar</p>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-4" style="border:1px solid #cc;">
									<a href="ArtistInfo.php?id=7"><img src="images/sark_copy.jpg" class="img-thumbnail" width="300" height="400"></a>
								<p style="color:white;margin-top:5px;">Sarkodie</p>
								</div>
								<div class="col-md-4" style="border:1px solid #cc;">
									<a href="ArtistInfo.php?id=8"><img src="images/medikal.jpg" class="img-thumbnail" width="300" height="400"></a>
									<p style="color:white;margin-top:5px;">Medikal</p>
								</div>
								<div class="col-md-4" style="border:1px solid #cc;">
									<a href="ArtistInfo.php?id=9"><img src="images/davido.jpg" class="img-thumbnail" width="300" height="400"></a>
									<p style="color:white;margin-top:5px;">Davido</p>
								</div>
							</div>
							
							<hr>
							<div class="row">
								<div class="col-md-4" style="border:1px solid #cc;">
									<a href="ArtistInfo.php?id=10"><img src="images/kwame_eugene.jpg" class="img-thumbnail" width="300" height="400"></a>
									<p style="color:white;margin-top:5px;">kwame Eugene</p>
								</div>
								<div class="col-md-4" style="border:1px solid #cc;">
									<a href="ArtistInfo.php?id=11"><img src="images/kidi.jpg" class="img-thumbnail" width="300" height="400"></a>
									<p style="color:white;margin-top:5px;">Kidi</p>
								</div>
								<div class="col-md-4" style="border:1px solid #cc;">
									<a href="ArtistInfo.php?id=12"><img src="images/yaapono.jpg" class="img-thumbnail" width="300" height="400"></a>
									<p style="color:white;margin-top:5px;">Yaa Pono</p>
								</div>
							</div>
						</div>
					</div>				
		</div>
	</div>
	<?php
		include('footer.php');
	?>
	<script>
		$("document").ready(function(){
			//alert("goooooooooooooooooooo");
			$("#artistbook").on("submit", function(e){
				e.preventDefault();
				//alert("goooooooooooooooooooo");
				//return;
				$.ajax({
					url: "bookArtist.php",
					type: "POST",
					contentType: false,
					processData: false,
					cache: false,
					data: new FormData(this),
					success: function(data){
						if(data.match("Successfully")){
							 alert("Artist Booked Successfully");
							 window.location.href="book.php";
						}else if(data.match("PhoneError")){
							alert("Phone Number is Invalid");
						}else{
							alert(data);
						}
					}
				});
			});
		});
	</script>
	 <script src="tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
</body>

</html> 