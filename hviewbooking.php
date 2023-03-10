<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>:: Hotel Hub</title>
      <!--meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="" />
      <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <!--//meta tags ends here-->
      <!--booststrap-->
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	   <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
     <link rel="stylesheet" href="css/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
      <!-- //font-awesome icons -->
	  <link href="css/simpleLightbox.css" rel='stylesheet' type='text/css' />
      <!--stylesheets-->
	  <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
      <link href="css/style.css?newversion" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
  <link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
   </head>
   <body>
   <!-- Navigation -->
<header>
	<div class="top-nav">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand text-uppercase" href="index.html">Hostel Hub</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-center pr-md-4" id="navbarSupportedContent">
					
				</div>
			</nav>
		</div>
	</div>
</header>
<!-- //Navigation -->
	<!-- Appointment -->
	<div class="clearfix"></div>
<section class="appointment py-5">
	<div class="test_agile_info">
		<div class="clearfix"></div>
		<div class="container py-md-3" style="margin-top:40px;">
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel panel-heading">
					<ul class="list-inline">
						<li><i><img src="images/avatar.png"width="50" height="50" class="img-circle img-thumbnail"></i> &nbsp; Welcome:  
				<?php ?></li>
				</ul>
				<li><a href="logout.php" class="btn btn-info btn-sm pull-right">Logout</a></li>
				</div>
				<div class="panel panel-body">
					<ul class="list-inline">
						<li><a href="hostel.php" class="btn btn-success" style="width:100%;">Publish Hostel</a></li>
						<li><a href="hviewbooking.php" class="btn btn-info" style="width:100%;">View Bookings</a></li>
						<li><a href="hcustomer.php" class="btn btn-success" style="width:100%;">Customers</a></li>
						<li><a href="Editpassword.php" class="btn btn-success" style="width:100%;">Edit Password</a></li>
						<li><a href="generatereport.php" class="btn btn-success" style="width:100%;">Generate Report</a></li>
						<li></li>
					</ul>
					<hr style="border:1px solid #ccc;">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-info">
							<div class="panel panel-heading">View Booking</div>
							<div class="panel panel-body">
								 <?php
            include('db.php');
			$sqlAll = mysqli_query($conn,"SELECT count(*) as numofrows FROM `booking`  WHERE `Hostelid` = '".$_SESSION['id']."'");
			$row = mysqli_fetch_assoc($sqlAll);
			$allrow = $row['numofrows'];
			//get rows query
			$query = mysqli_query($conn, "SELECT * FROM `booking`  WHERE `Hostelid` = '".$_SESSION['id']."' ");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive">
				<a href="hostel.php" class="btn btn-default" style="margin-top:10px;margin-left:20px;margin-bottom:10px;">&larr; Back</a>
				<button class="btn btn-default">Total Booking&nbsp;<span style="font-size:1.0em;"class="badge">'.$allrow.'</span></button>
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Phone Number</th>
						<th>Hostel Booked</th>
						<th>Floor Booked</th>
						<th>Room Number</th>
						<th>Room Type</th>
						<th>Status</th>
						<th>Payment Status</th>
						<th>Cancel</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['CustomerName'].'</td>
				<td>'.$row['CustomerPhone'].'</td>
				<td>'.$row['Hostelname'].'</td>
				<td>'.$row['hostelFloor'].'</td>
				<td>'.$row['HostelroomNum'].'</td>
				<td>'.$row['hostelRoomType'].'</td>
				<td>';
						if($row['status'] == "0"){
							echo"Submitted";
						}else{
							echo"Booked";
					}
										
				echo'
				</td>
				<td>';
				if($row['PaymentStatus'] == "0"){
					echo"No";
					}else{
				echo"Yes";
				}echo'
				</td>
				<td><a href="cusdelete.php?id='.$row['id'].'" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
			</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>No Admin Registered Yet</strong></div>';
			}
            ?>
							</div>
							<div class="panel panel-footer"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-footer"></div>
			</div>
		</div>
		</div>
	</div>
</section>
<!-- //Appointment -->

	<!--//main-->
      <!-- //Contact-form -->
	  <!-- Vertically centered Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase text-center" id="exampleModalLongTitle"> Hotel zone</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<img src="images/ban5.jpg" class="img-fluid mb-3" alt="Modal Image" />
        Vivamus eget est in odio tempor interdum. Mauris maximus fermentum arcu, ac finibus ante. Sed mattis risus at ipsum elementum, ut auctor turpis cursus. Sed sed odio pharetra, aliquet velit cursus, vehicula enim. Mauris porta aliquet magna, eget laoreet ligula.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- //Vertically centered Modal -->
      <script src='js/jquery-2.2.3.min.js'></script>
      <!-- //js  working-->
     
	<!-- Banner Responsive slider -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider4").responsiveSlides({
				auto: true,
				pager: false,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<!-- // Banner Responsive slider -->

      <!--// banner-->
	  <!-- simpleLightbox -->
	<script src="js/simpleLightbox.js"></script>
	<script>
		$('.proj_gallery_grid a').simpleLightbox();
	</script>
	<!-- //simpleLightbox -->
<!-- flexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script>
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>

	<!-- //flexSlider -->
<!-- Calendar -->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
				  </script>
			<!-- //Calendar -->
			<!-- odometer-script -->
	<script src="js/odometer.js"></script>
	<script>
		window.odometerOptions = {
			format: '(ddd).dd'
		};
	</script>
	<script>
		setTimeout(function () {
			jQuery('#w3l_stats1').html(25);
		}, 1500);
	</script>
	<script>
		setTimeout(function () {
			jQuery('#w3l_stats2').html(330);
		}, 1500);
	</script>
	<script>
		setTimeout(function () {
			jQuery('#w3l_stats3').html(542);
		}, 1500);
	</script>
	<script>
		setTimeout(function () {
			jQuery('#w3l_stats4').html(222);
		}, 1500);
	</script>
	<!-- //odometer-script -->

      <!-- start-smoth-scrolling -->
      <script  src="js/move-top.js"></script>
      <script  src="js/easing.js"></script>
      <script >
         jQuery(document).ready(function ($) {
         	$(".scroll").click(function (event) {
         		event.preventDefault();
         		$('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
         	});
         });
      </script>
      <!-- start-smoth-scrolling -->
      <!-- here stars scrolling icon -->
      <script>
         $(document).ready(function () {
         	/*
         		var defaults = {
         		containerID: 'toTop', // fading element id
         		containerHoverID: 'toTopHover', // fading element hover id
         		scrollSpeed: 1200,
         		easingType: 'linear' 
         		};
         	*/
         
         	$().UItoTop({ easingType: 'easeOutQuart' });
         
         });
      </script>
      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
      <script src="js/bootstrap.js"></script>
      <!-- //bootstrap working-->
	  <script src="js/action.js"></script>
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
	<script>
		$('document').ready(function(){
			$("#UploadHostel").on("submit",function(e){
				e.preventDefault();
			$.ajax({
				url: 'upload.php',
				type: 'POST',
				contentType: false,
				processData: false,
				cache: false,
				data: new FormData(this),
				success: function(data){
					if(data.match("success")){
						window.location.href="hostel.php?suc=Hostel Details Submitted Successfully!";
					}else{
						$("#showFailed").html(data);
					}
				}
			});
	});
			$("#InputFile").change(function(){
						showImages(this);
					});
					function showImages(input){
						if(input.files && input.files[0]){
							var imagetype = input.files[0].type;
							var imageExt = ["image/jpeg","image/png","image/gif"];
							if(!((imagetype==imageExt[0]) || (imagetype==imageExt[1]) || (imagetype==imageExt[2]) )){
								alert("File is not a valid Image");
							}else{
								var reader = new FileReader();
								reader.onload = function(e){
									$("#imgs").attr("src",e.target.result);
								}
								reader.readAsDataURL(input.files[0]);
							}
							
						}
						
					}
			$("#mortype").on("change",function(e){
				e.preventDefault();
				var values = $(this).val();
				if(values.match("1")){
					$("#single").val(1500);
				}if(values.match("2")){
					$("#single").val(1500);
				}if(values.match("3")){
					$("#single").val(1700);
				}if(values.match("4")){
					$("#single").val(2500);
				}if(values.match("4")){
					$("#single").val(2500);
				}
			});
		});
	</script>
   </body>
</html>