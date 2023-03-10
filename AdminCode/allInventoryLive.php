<?php
					     include_once('db.php');
						 $sqli = "SELECT * FROM product where ProductId like '%".$_POST['transac2']."%'";
						 $query = mysqli_query($conn,$sqli);
						 $result = mysqli_num_rows($query);
						 if($result){
							 echo'<div class="table-responsive" style="background-color: #5cb85c;">
					         <table class="table table-striped"  border="1" >
						         <thead style="background-color: #d9534f;">
								     <tr>
									     <th style="font-weight:bold;font-size:20px;">PRODUCT ID</th>
										 <th style="font-weight:bold;font-size:20px;">PRODUCT NAME</th>
										 <th style="font-weight:bold;font-size:20px;">PRICE</th>
										 <th style="font-weight:bold;font-size:20px;">QUANTITY</th>
									 </tr>
								 </thead>
								 <tbody>';
							 while($row = mysqli_fetch_array($query)){
								 echo'
								     <tr>
									     <td style="font-weight:bold;font-size:15px;">'.$row['ProductId'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row['name'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row['Amount'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row['Quantity'].'</td>
									 </tr>';
							 }
							 echo'</tbody>
						     </table>
						</div>
						<hr>
						';
						 }
					?>