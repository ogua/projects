 <html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Admin</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
</head>
<body>
 
 
	<div class="container jumbotron" style="border:1px solid blue;">

 <?php
     
   $servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodhub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
    $sql = "SELECT * FROM `mary_dee` WHERE `date_time` BETWEEN '".$_POST['kwame']."' AND '".$_POST['kwames']."' ";
        $query = mysqli_query($conn,$sql);
      $result = mysqli_num_rows($query);
      if($result > 0){ 
        echo '
        <div class="card card-contact-list">
              <div class="agileinfo-cdr">
                                <div class="card-header">
								<a href="mariedeeReport.php" class="btn btn-info">&larr; back</a>
                                    <h3 style="color:blue;">Generated Report</h3>
                                </div>
                                <div class="card-body p-b-20">
                    <table class="table table-striped">
            <thead class="bg-danger">
              <tr>
                <th style="color:red;"><b>Title</b></th>
                <th style="color:red;"><b>Name</b></th>
                <th style="color:red;"><b>Type of food</b></th>
                <th style="color:red;"><b>Packaging</b></th>
                <th style="color:red;"><b>Quantity</b></th>
                <th style="color:red;"><b>Date and Time</b></th>
              </tr>
            </thead>
            <tbody> 
        '; 
        while($row = mysqli_fetch_array($query)){
          echo'
          <tr>
              <td><b>'.$row['title'].'</b></td>
              <td><b>'.$row['name'].'</b></td>
              <td><b>'.$row['type_food'].'</b></td>      
              <td><b>'.$row['packaging'].'</b></td>
              <td><b>'.$row['quantity'].'</b></td>
              <td><b>'.$row['date_time'].'</b></td>
            </tr>
          ';
        }
        echo '
        </tbody>
        </table>
                                    </div>
                                </div>
                            </div>
                            <a href="#"  onclick="print()" class="btn btn-xs btn-success pull-right">Print</a>
        ';
      }else{
        echo '<h1 style="color:red">No Results</h1>';
      } 
?>
</div>
</body>
 </html>
