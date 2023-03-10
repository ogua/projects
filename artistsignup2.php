<?php
	session_start();
	include('db.php');
	$id = $_SESSION['email'];
	$sql = "SELECT * FROM `Airtest` WHERE `email` = '$id' ";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($query);
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>::Artist SignUp Cont...</title>  
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
						<li class="active">
							<a href="artistsignUp.php">Artist SignUp</a>
						</li>
						<li>
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
					<h2>Artist Signup</h2>
					<div class="row">
						<div class="col-md-2">
							<img src="images/<?php echo $row['images']; ?>" id="showImg" width="180" height="200">
						</div>
						<div class="col-md-6">
							<form method="post" action="" id="artistsignup">
								<div class="form-group">
									<label style="color:white;">Bio Graph</label>
									<textarea id="biographh" name="biographh"></textarea>
								</div>
								<div class="form-group">
									<label style="color:white;">Select Genre</label>
									<select name="genres" id="" class="form-control">
										<option value=""></option>
										<option value="Dancehall">Dancehall</option>
										<option value="Dancehall and Reggae">Dancehall and Reggae</option>
										<option value="Gospel">Gospel</option>
										<option value="HighLife">HighLife</option>
										<option value="HipPop">HipPop</option>
										<option value="AfroPop">AfroPop</option>
										<option value="Twi Pop">Twi Pop</option>
									</select>
								<div class="form-group">
									<label style="color:white;">Enter Label</label>
									<input type="text" name="label" id="label" class="form-control">
								</div>
								<div class="form-group">
									<label style="color:white;">Enter Albums</label>
									<textarea name="album"></textarea>
								</div>
								<div class="form-group">
									<label style="color:white;">Enter Your Awards Received</label>
									<textarea name="awards"></textarea>
								</div>
								<div class="form-group">
									<label style="color:white;">Country</label>
									<input type="text" name="country" id="country" class="form-control">
								</div>
								<div class="form-group">
									<input type="submit" name="send" id="send" value="Save Info" class="pull-right btn btn-info btn-sm">
								</div>
							</form>
						</div>
						<div class="col-md-3">
							
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
			$("#artistsignup").on("submit", function(e){
				e.preventDefault();
				$.ajax({
					url: "saveinfo.php",
					type: "POST",
					contentType: false,
					processData: false,
					cache: false,
					data: new FormData(this),
					success: function(data){
						if(data.match("Successfully")){
							 alert("Artist Added Successfully");
							 window.location.href="artistsignup.php";
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