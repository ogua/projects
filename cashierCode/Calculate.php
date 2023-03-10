<?php
								 include_once('db.php');
								 $sql5 = "SELECT SUM(`Total`) as total FROM sale WHERE `BillId` = '".$_POST['text2']."' ";
								 $query5 = mysqli_query($conn,$sql5);
								 $row5 = mysqli_fetch_array($query5);
								 $sumnum = $row5['total'];
								 echo $sumnum;
								 $sql8 = "
								 INSERT INTO `bill_t`(`pharmacist`, `BillId`, `total`, `dates`) VALUES ('".$_POST['text4']."','".$_POST['text2']."','$sumnum',CURRENT_DATE)";
		                         $query8 = mysqli_query($conn,$sql8);
		                         if($query8){
			                      $sql10 = "INSERT INTO `bilids_t`( `BillId`) VALUES ('".$_POST['text2']."')";
								  $query10 = mysqli_query($conn,$sql10);
                                }
							?>