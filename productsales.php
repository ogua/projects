<?php
					     include_once('db.php');
						 $sqli2 = "SELECT BillId, `name`,`Price`,SUM(`Quantity`),SUM(`Total`),`datetime` FROM sale WHERE dates BETWEEN '".$_POST['results']."'AND '".$_POST['resultss']."' and name = '".$_POST['prname']."' GROUP BY `dates`";
						 $query2 = mysqli_query($conn,$sqli2);
						 $result2 = mysqli_num_rows($query2);
						 $x = 0;
						 if($result2 > 0){
							 echo'<div class="table-responsive">
					         <table class="table table-striped"  border="1" >
						         <thead>
								     <tr>
									     <th style="font-weight:bold;font-size:20px;"># ID</th>
										 <th style="font-weight:bold;font-size:20px;">PRODUCT NAME</th>
										 <th style="font-weight:bold;font-size:20px;">PRICE</th>
										 <th style="font-weight:bold;font-size:20px;">QUANTITY</th>
										 <th style="font-weight:bold;font-size:20px;">TOTAL</th>
										  <th style="font-weight:bold;font-size:20px;">DATE</th>
									 </tr>
								 </thead>
								 <tbody>';
							 while($row2 = mysqli_fetch_array($query2)){
								 echo'
								     <tr>
									     <td style="font-weight:bold;font-size:15px;">'.$x.'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row2['name'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row2['Price'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row2['SUM(`Quantity`)'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row2['SUM(`Total`)'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row2['datetime'].'</td>
									 </tr>';
									 $x++;
							 }
							 echo'</tbody>
						     </table>
							 <a href="#" id="print" class="btn btn-info">Print Report</a>
						</div>
						<hr>
						';
						 }else{
							 echo'<div class="alert alert-danger text=-center"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>No Sales Made As at this Date For Product Selected</strong>';
						 }
					?>