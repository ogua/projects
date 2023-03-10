<html>
	<head><link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
</head>
</html>
<?php
session_start();
include_once("db.php");
		$sql = "SELECT * FROM `bill_t` ORDER BY BillId DESC";
		$query = mysqli_query($conn,$sql);
		if($query){
			$output .='<div class="table-responsive" style="background-color: #5cb85c;">
					         <table class="table table-striped"  border="1" >
						         <thead style="background-color: #d9534f;">
								     <tr>
									     <th style="font-weight:bold;font-size:20px;">CASHIER ID</th>
										 <th style="font-weight:bold;font-size:20px;">BILL ID</th>
										 <th style="font-weight:bold;font-size:20px;">TOTAL</th>
										 <th style="font-weight:bold;font-size:20px;">DATE</th>
										 <th style="font-weight:bold;font-size:20px;">DATE & TIME</th>
									 </tr>
								 </thead>
								 <tbody>';
			while($row = mysqli_fetch_array($query)){
				$output .='
								     <tr>
									     <td style="font-weight:bold;font-size:15px;">'.$row['CashierID'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row['BillId'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row['total'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row['date'].'</td>
									     <td style="font-weight:bold;font-size:15px;">'.$row['datetime'].'</td>
									 </tr>';
			}
			$output .='
				</tbody>
																				</table> 
																				</div>
							';	
							header("Content-Type: application/xls");
							header("Content-Disposition: attachment; filename=transaction.xls");
							echo $output;
		}
		else{
			echo '
				<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
					Failed Wrong Table Seleted
				</strong></div>
		';		
		}
	?>