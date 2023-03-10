<?php
	include('db.php');
	$id = $_GET['id'];
	$sql = "SELECT * FROM `airtest` WHERE `id` = '$id'";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($query);
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>:: Airtest Information</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
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
			<div class="content_top">
				<div class="blog">
					<h2>Artist Information</h2>
					<div class="blog-leftgrids">
						<a class="btn btn-info btn-sm" href="book.php" style="margin-left:20px;">&larr; </a>
						<div class="image group">
							<div class="grid images_3_of_1">
								<a href="#">
									<img src="images/<?php echo $row['images']; ?>" height="400" alt="">
								</a>
							</div>
							<div class="grid blog-desc">
								<h4>
									<span><?php echo $row['fullname']; ?></span> 
								</h4>
								<p>
									<?php echo $row['biograph']; ?>
								</p>
								<ul class="list-inline">
									<li><p>Gender: <?php echo $row['gender']; ?></p></li>
									<li><p>Date Of Birth: <?php echo $row['dateofbirth']; ?></p></li>
									<li><p>Email: <?php echo $row['email']; ?></p></li>
									<li><p>Management Contact: <?php echo $row['telephone']; ?></p></li>
									<li><p>Genre: <?php echo $row['genre']; ?></p></li>
								</ul>
								
								<ul class="list-inline">
									<li><p>Label: <?php echo $row['label']; ?></p></li>
									<li><p>Country: <?php echo $row['country']; ?></p></li>
								</ul>
								<ul>
									<li><p>Album: <?php echo trim($row['albums']); ?></p></li>
									<li><p>Awards: <?php echo trim($row['awards']); ?></p></li>
								</li>
								
								<h4>Joined <?php echo $row['dates']; ?>,&nbsp;&nbsp;
									
								</h4>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		include('footer.php');
	?>
</body>

</html>