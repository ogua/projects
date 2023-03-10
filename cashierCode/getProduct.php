<?php
	session_start();
	error_reporting(0);
					     include_once('db.php');
						 $sqli6 = "SELECT Productid,`name`,SUM(`Quantity`),`Price`,SUM(`Total`) FROM sale WHERE `BillId` = '".$_SESSION['billid']."' GROUP BY `Productid`";
						 $query6 = mysqli_query($conn,$sqli6);
						 $result6 = mysqli_num_rows($query6);
						 $x = 0;
						 if($result6 > 0){
							 echo'<div class="table-responsive" style="background-color: #f5f5f5;">
					         <table class="table table-striped"  border="1" cellpadding="10">
						         <thead>
								     <tr>
									     <th style="font-weight:bold;color:whdite;font-size:15px;">#ID
										 </th>
										 
										 <th style="font-weight:bold;color:wdhite;font-size:15px;">NAME</th>
										 
										 <th style="font-weight:bold;color:whidte;font-size:15px;">QUANTITY</th>
										 
										 <th style="font-weight:bold;color:whidte;font-size:15px;">PRICE</th>
										 
										 <th style="font-weight:bold;color:whdite;font-size:15px;">TOTAL</th>
										 
										  <th style="font-weight:bold;color:whidte;font-size:15px;">Del</th>
									 </tr>
								 </thead>
								 <tbody>';
							 while($row6 = mysqli_fetch_array($query6)){
								 echo'
								     <tr>
									     <td style="font-weight:bold;font-size:15px;">'.$x.'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['name'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['SUM(`Quantity`)'].'</td>
										 <td style="font-weight:bold;font-size:15px;">'.$row6['Price'].'</td>
									     <td style="font-weight:bold;font-size:15px;">'.$row6['SUM(`Total`)'].'</td>
							              <td>
										  <a href="#'.$row6['Productid'].'" cid="'.$row6['Productid'].'" style="background-color:red;"class="deleProd btn btn-danger" ><span class="glyphicon glyphicon-trash"></span></a></td>
									 </tr>';
									 $x++;
							 }
							 echo'</tbody>
						     </table>
									<div class="panel-footer" style="width:600px;height:60px;">
									        <ul class="list-inline">
											<li><b style="border:1px solid black;padding:5px;background-color:#d9534f;color:white;font-weight:Bold;">GRAND TOTAL</b></li>
											<li><input type="text" style="color:white;font-weight:Bolder;background-color: #d9534f;width:150px;" id="bTOTAL" name="bTOTAL"class="form-control" placeholder="GRAND TOTAL" disabled="" /></li>
											<li><b style="border:1px solid black;padding:5px;background-color:#d9534f;color:white;font-weight:Bold;">Pharmacist :  '.$_SESSION['name'].'</b></li>
									</div>
							 
						</div>
						<hr>
						';
						 }else{
							 echo
							 '
								<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
										No Drug Sold Yet
								</strong></div>
							 ';
						 }
					?>					