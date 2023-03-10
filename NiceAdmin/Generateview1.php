<html>
	<head>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
</head>
<body>
		<div class="col-md-10 col-md-offset-1 well printAlll" style="margin-top:100px;">
			<h1 class="text-center">Report Generated</h1>
<?php
		include_once("db.php");
		$sql = "SELECT * FROM `club_house` WHERE `date_time` BETWEEN '".$_POST['kwame']."' AND '".$_POST['kwames']."' ";
	      $query = mysqli_query($conn,$sql);
		  $result = mysqli_num_rows($query);
		  if($result > 0){
			  echo '
			  <div class="card card-contact-list">
							<div class="agileinfo-cdr">
                                <div class="card-header">
                                    <h3>Report Generate</h3>
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
							<a href="reportTithe.php">Back to AdminPage</a>
						<a href="#"  onclick="print()" class="btn btn-xs btn-success pull-right">Print</a>
						
			  ';
			  
		  }else{
			  echo '<h1 style="color:red">No Results</h1>';
		  }		  
?>
				
				</div>