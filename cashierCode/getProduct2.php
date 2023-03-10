<?php
	session_start();
	error_reporting(0);
					     include_once('db.php');
						 $sqli6 = "SELECT Productid,`name`,SUM(`Quantity`),`Price`,SUM(`Total`) FROM sale WHERE `BillId` = '".$_SESSION['billid']."' GROUP BY `Productid`";
						 $query6 = mysqli_query($conn,$sqli6);
						 $result6 = mysqli_num_rows($query6);
						 $x = 0;
						 if($result6 > 0){
							 echo'<div class="table-responsive">
					         <table class="table table-striped"  border="1" cellpadding="10">
						         <thead>
								     <tr>
										 <th style="font-weight:bold;font-size:5px;">P.N</th>
										 <th style="font-weight:bold;font-size:5px;">QTY</th>
										 <th style="font-weight:bold;font-size:5px;">Px</th>
										 <th style="font-weight:bold;font-size:5px;">TOT</th>
									 </tr>
								 </thead>
								 <tbody>';
							 while($row6 = mysqli_fetch_array($query6)){
								 echo'
								     <tr>
										 <td style="font-weight:bold;font-size:5px;">'.$row6['name'].'</td>
										 <td style="font-weight:bold;font-size:5px;">'.$row6['SUM(`Quantity`)'].'</td>
										 <td style="font-weight:bold;font-size:5px;">'.$row6['Price'].'</td>
									     <td style="font-weight:bold;font-size:5px;">'.$row6['SUM(`Total`)'].'</td>
									 </tr>';
							 }
							 echo'</tbody>
						     </table>
									<div class="panel-heading">Total: &nbsp; GH&cent;<b id="distot"></b></div>
									<div class="panel-footer">
									<p class="text-center" style="font:size:5px;">
										Goods Sold Are Not Returnable
									</p>
									
									</div>
							 
						</div>
						<hr>
						';
						 }else{
							 echo '
							  <div class="table-responsive" style="height:370px;overflow:scroll;">
										 <table class="table table-striped"  border="1" cellpadding="10">
						         <thead>
								    <tr>
										 <th style="font-weight:bold;font-size:5px;">P.N</th>
										 <th style="font-weight:bold;font-size:5px;">QTY</th>
										 <th style="font-weight:bold;font-size:5px;">Px</th>
										 <th style="font-weight:bold;font-size:5px;">TOT</th>
									 </tr>
								 </thead>
								 <tbody>
								 
								  </tbody>
						     </table>
								  </div>
							 ';
						 }
					?>					