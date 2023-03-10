<html>
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
</html>
	<div class="col-md-8 col-md-offset-2 well">
<?php
					     include_once('db.php');
						 $sqli2 = "SELECT `Productid`,`name`,`Price`, sum(`Quantity`), `Discount`, sum(`Total`),`Date/time` FROM `sale` where name = '".$_POST['product']."' AND date BETWEEN  '".$_POST['kwame']."' AND '".$_POST['kwames']."' GROUP by date";
						 $query2 = mysqli_query($conn,$sqli2);
						 $result2 = mysqli_num_rows($query2);
						 if($result2){
							  echo'<a href="admin.php" class="btn btn-default btn-sm">&larr;Back</a>';
							 echo'<div class="table-responsive" style="background-color: #5cb85c;">
							<h2 style="padding:5px;">Report Generated</h2>
					         <table class="table table-striped"  border="1" >
						         <thead style="background-color: #d9534f;">
								     <tr>
									     <th style="font-weight:bold;font-size:20px;">PRODUCT ID</th>
										 <th style="font-weight:bold;font-size:20px;">PRODUCT NAME</th>
										 <th style="font-weight:bold;font-size:20px;">PRICE</th>
										 <th style="font-weight:bold;font-size:20px;">QUANTITY</th>
										 <th style="font-weight:bold;font-size:20px;">DISCOUNT</th>
										 <th style="font-weight:bold;font-size:20px;">TOTAL</th>
										  <th style="font-weight:bold;font-size:20px;">DATE</th>
									 </tr>
								 </thead>
								 <tbody>';
							 while($row2 = mysqli_fetch_array($query2)){
								 echo'
								     <tr>
									     <td style="font-weight:bold;font-size:15px;">'.$row2['Productid'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row2['name'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row2['Price'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row2['sum(`Quantity`)'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row2['Discount'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row2['sum(`Total`)'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row2['Date/time'].'</td>
									 </tr>';
							 }
							 echo '</tbody>
						     </table>
						</div><br>
						<a href="#" onclick="print()" class="btn btn-info btn-sm pull-right">print</a>
						';
						 }else{
							 echo'
							 	<a href="admin.php" class="btn btn-default btn-sm">&larr;Back</a>
							 	<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>NO TRANSACTION AS AT THAT TIME. TRY A DIFFERENT DATE!</strong></div>
							 ';
						 }
					?>
	</div>