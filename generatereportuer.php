<?php
	session_start();
	if(!isset($_SESSION['role'])){
	   header("location: login.php");
	}
?>
<?php
$_SESSION['frm'] = $_POST['genfrom'];
$_SESSION['to'] = $_POST['tor'];			
function fetch_data()  
 {  
	  include('db.php');
      $output = '';  
      $sqlAll = mysqli_query($conn,"SELECT count(*) as numofrows FROM `users`  WHERE `dates` BETWEEN '".$_SESSION['frm']."' AND '".$_SESSION['to']."' ");
			$row = mysqli_fetch_assoc($sqlAll);
			$allrow = $row['numofrows'];
			//get rows query
			$sql = "SELECT * FROM `users` WHERE `dates` BETWEEN '".$_SESSION['frm']."' AND '".$_SESSION['to']."' ";
			$query = mysqli_query($conn,$sql);
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			$output.='
			<div class="table-responsive" style="background-color:#abc;overflow-x:hidden;">
				<button class="btn btn-default">Total Users &nbsp;<span style="font-size:1.0em;"class="badge">'.$allrow.'</span></button>	
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Image</th>
						<th>Fullname</th>
						<th>Username</th>
						<th>Role</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>Registered</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
				$output.='
				<tr>
				<td>'.$x.'</td>
				<td><img src="images/'.$row['image'].'" width="50" height="50"></td>
				<td>'.$row['fullname'].'</td>
				<td>'.$row['username'].'</td>
				<td>'.$row['role'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['phone'].'</td>
				<td>'.$row['dates'].'</td>
				</tr>
						';
							$x++;
				}
			$output.='
				</table>
				<div class="col-md-12 text-center">
							<svg id="barcode" jsbarcode-width="1"></svg>	
						</div>
			</div>
					<div class="">
					<form method="post" action="">  
						  <a href="#" onclick="print();"class="btn btn-success pull-right" style="margin-right:10px;">Print</a>
                     </form>
				</div>
					';
			 return $output;
			}else{
				header("location:usersReport.php?err=No record Please Choose a Different Date");
			}
 }  
            ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin || Area </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body>
			<div class="container-fluid" style="margin-top:30px;">
				<h2>Report Generated for Users</h2>
					<a href="usersReport.php" class="btn btn-success">&larr; Back </a>
				 <?php  
                     echo fetch_data();  
                     ?>  
			</div>
	
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="js/JsBarcode.all.min.js"></script>
<script src="js/jquery.PrintArea.js"></script>

<script>
	$("document").ready(function(){
		JsBarcode("#barcode", "<?php echo $_SESSION['frm']."-". $_SESSION['to']; ?>");
	});
</script>
	</body>
</html>