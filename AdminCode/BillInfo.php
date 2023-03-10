<?php
					     include_once('db.php');
						 $sqli6 = "SELECT bill_t.pharmacist, bill_t.total, bill_t.BillId, sale.BillId, sale.name, sale.Price, sale.Quantity, sale.Total, sale.dates FROM bill_t LEFT JOIN sale
						ON sale.BillId = bill_t.BillId WHERE sale.BillId = '".$_POST['transac5']."' AND bill_t.BillId = '".$_POST['transac5']."'";
						 $query6 = mysqli_query($conn,$sqli6);
						  $sqli7 = "SELECT bill_t.pharmacist, bill_t.total, bill_t.BillId, sale.BillId, sale.name, sale.Price, sale.Quantity, sale.Total, sale.dates FROM bill_t LEFT JOIN sale
						 ON sale.BillId = bill_t.BillId WHERE sale.BillId = '".$_POST['transac5']."' AND bill_t.BillId = '".$_POST['transac5']."'";
						 $query7 = mysqli_query($conn,$sqli7);
						 echo $sqli7;
						 $row7 = mysqli_fetch_array($query7);
						 $x = 0;
						 if($query7){
							 echo'<div class="table-responsive" style="background-color: #5cb85c;">
					         <table class="table table-striped"  border="1" >
						         <thead style="background-color: #d9534f;">
								     <tr>
										 <th style="font-weight:bold;font-size:20px;"> #id</th>
										 <th style="font-weight:bold;font-size:20px;">NAME</th>
										 <th style="font-weight:bold;font-size:20px;">PRICE</th>
										 <th style="font-weight:bold;font-size:20px;">QUANTITY</th>
										 <th style="font-weight:bold;font-size:20px;">TOTAL</th>
										 <th style="font-weight:bold;font-size:20px;">DATE</th>
									 </tr>
								 </thead>
								 <tbody>';
							 while($row6 = mysqli_fetch_array($query6)){
								 echo'
								     <tr>
										 <td style="font-weight:bold;font-size:15px;">'.$x.'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['name'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['Price'].'</td>
									     <td style="font-weight:bold;font-size:15px;">'.$row6['Quantity'].'</td>
									     <td style="font-weight:bold;font-size:15px;">'.$row6['Total'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['dates'].'</td>									 
									 </tr>';
									 $x++;
							 }
							 echo'</tbody>
						     </table>
							 <p class="pull-right" style="font-weight:bold;font-size:15px;width:500px;padding:10px;border:1px solid black;color:red;background-color:#fff;margin-right:30px;">BILL ID : '.$row7['BillId'].' /CASHIER NAME: '.$row7['pharmacist'].'     / GRAND TOTAL : '.$row7['total'].'</p>							  
							  </tr>
							 </table>
						</div>
						<hr>
						';
						 }
					?>