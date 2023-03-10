<?php
					     include_once('db.php');
						 $sqli6 = "SELECT * FROM `bill_t` ORDER BY `BillId` DESC";
						 $query6 = mysqli_query($conn,$sqli6);
						 $result6 = mysqli_num_rows($query6);
						 if($result6){
							 echo'<div class="table-responsive">
					         <table class="table table-striped"  border="1" cellpadding="10">
						         <thead>
								     <tr>
									     <th style="font-weight:bold;font-size:20px;">PHARMACIST NAME</th>
										 <th style="font-weight:bold;font-size:20px;">BILL ID</th>
										 <th style="font-weight:bold;font-size:20px;">TOTAL</th>
										 	 <th style="font-weight:bold;font-size:20px;">DATE & TIME</th>
									 </tr>
								 </thead>
								 <tbody>';
							 while($row6 = mysqli_fetch_array($query6)){
								 echo'
								     <tr>
									     <td style="font-weight:bold;font-size:15px;">'.$row6['pharmacist'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['BillId'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['total'].'</td>
									     <td style="font-weight:bold;font-size:15px;">'.$row6['datetime'].'</td>
									 </tr>';
							 }
							 echo'</tbody>
						     </table>
						</div>
						<hr>
						';
						 }
					?>				