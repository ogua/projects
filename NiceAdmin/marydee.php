<?php
include('db.php')
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Admin|UPSA FOOD HUB</title>

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
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="../index.php"><i class="fa fa-home"></i> Homepage</a>
                    </li>
                    
					</ul>

            </div>

        </nav>
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            ONLINE ORDER || MARIE DEE <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-sm-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            FOOD AND PERSONAL INFORMATION
                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
                            <div class="form-group">
                                            <label>Who are you*</label>
                                            
                                            <select name="title" class="form-control" required >
												<option value selected ></option>
                                                <option value="Student">Student</option>
                                                <option value="Staff">Staff</option>
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>Full Name</label>
                                            <input name="name" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Your Phone Number</label>
                                            <input name="phone" class="form-control" required>
                                            
                               </div>
								<?php

								$countries = array("Rice and Stew", "Tuo Zaafi with Ayoyo soup", "Waakye", "Kenkey and Fish", "Fufu and Soup", "Banku and Okro Stew", "Red Red Beans stew with fried plantains", "Ghana style Jollof rice", "Fufu and goat light soup");

								?>
								<div class="form-group">
                                            <label>Type of food*</label>
                                            <select name="type_food" class="form-control" required>
												<option value selected ></option>
                                                <?php
												foreach($countries as $key => $value):
												echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
												endforeach;
												?>
                                            </select>
								</div>
		
                               <div class="form-group">
                                            <label>How do  you want it packaged</label>
                                            <select name="packaging" class="form-control" required>
                                                <option value selected ></option>
                                                <option value="In a platee">In a plate</option>
                                                <option value="In a take away">In a take away</option>
                                                <option value="Decide for me">Decide for me</option>
                                            </select>
                             <!--  <div class="form-group">
                                            <label>Where do you want it delivered*</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="delivery_location"  value="Campus">Campus
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="School Hostel"  value="School Hostel">School Hostel 
                                            </label>
                         
                                </div> -->
                                <div class="form-group">
                                            <label>Quantity</label>
                                            <input name="quantity" type ="text" class="form-control" required>
                                            
                               </div>
                               <div class="form-group">
                                            <label>Any Specific thing you want us to know?</label>
                                            <input name="message" type ="text" class="form-control">
                                            
                               </div>
							   
                        </div>
                        
                    </div>  
               </select>
                            
                        <div class="input-field col s12">
                            <button class="btn btn-info pull-right" type="submit" name="submit">Submit Order
                              <i class="mdi-content-send right"></i>
                            </button>
                          </div>
						  <div class="clearfix"></div>
                </div>
				
				
            
						<?php
                        /*
							if(isset($_POST['submit']))
							{
							$code1=$_POST['code1'];
							$code=$_POST['code']; 
							if($code1!="$code")
							{
							$msg="Invalide code"; 
							}
							else
							{
							
									$con=mysqli_connect("localhost","root","","hotel");
									$check="SELECT * FROM roombook WHERE email = '$_POST[email]'";
									$rs = mysqli_query($con,$check);
									$data = mysqli_fetch_array($rs, MYSQLI_NUM);
									if($data[0] > 1) {
										echo "<script type='text/javascript'> alert('User Already in Exists')</script>";
										
									}

									else
									{
										$new ="Not Conform";
										$newUser="INSERT INTO `roombook`(`Title`, `FName`, `LName`, `Email`, `National`, `Country`, `Phone`, `TRoom`, `Bed`, `NRoom`, `Meal`, `cin`, `cout`,`stat`,`nodays`) VALUES ('$_POST[title]','$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[nation]','$_POST[country]','$_POST[phone]','$_POST[troom]','$_POST[bed]','$_POST[nroom]','$_POST[meal]','$_POST[cin]','$_POST[cout]','$new',datediff('$_POST[cout]','$_POST[cin]'))";
										if (mysqli_query($con,$newUser))
										{
											echo "<script type='text/javascript'> alert('Your Booking application has been sent')</script>";
											
										}
										else
										{
											echo "<script type='text/javascript'> alert('Error adding user in database')</script>";
											
										}
									}

							$msg="Your code is correct";
							}
							}
                            2nd insertion 
                                

                             if(isset($_POST['submit'])){
        $sql = "INSERT INTO club_house (title, name, phone, type_food, packaging, quantity, message)
        VALUES ('".$_POST["title"]."','".$_POST["name"]."','".$_POST["phone"]."','".$_POST["type_food"]."','".$_POST["packaging"]."','".$_POST["quantity"]."','".$_POST["message"]."')";
    }
*/

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
if(isset($_POST['submit'])){
$sql = "INSERT INTO mary_dee (title, name, phone, type_food, packaging, quantity, message)
VALUES ('".$_POST["title"]."','".$_POST["name"]."','".$_POST["phone"]."','".$_POST["type_food"]."','".$_POST["packaging"]."','".$_POST["quantity"]."','".$_POST["message"]."')";

if ($conn->query($sql) === TRUE) {
echo "<script type= 'text/javascript'>
alert('Order Submitted successfully');
window.location.href='payment.php?id=2';
</script>";} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}
}
$conn->close();

							?>
						</form>
							
                    </div>
                </div>
            </div>
           
                
                </div>
                    
            
				
					</div>
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
