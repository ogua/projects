<?php
    session_start();
	error_reporting(0);
     include("db.php");
	if(isset($_POST['getCategory'])){
		$sql = "SELECT * FROM `category`";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo'<div class="nav nav-pills nav-stacked" style="border:1px solid #ccc;background-color:#f5f5f5;">
			<li class="active"><a href="#" id="cathead">CATEGORIES</a></li>
			';
			while($row = mysqli_fetch_array($query)){
				$catid = $row['catID'];
				echo'
				<li style="border-bottom:1px solid #d9edf7;"><a href="#" cid="'.$row['catID'].'" class="getCateg">'.$row['CatTitle'].'</a></li>
				';
			}
			echo'</div>';
		}else{
			echo"failed";
		}
	}
	
	if(isset($_POST['getCategName'])){
		$id = $_POST['cid'];
		$sql = "SELECT * FROM `category` WHERE `catID` = $id";
		$query = mysqli_query($conn,$sql);
		if($query){
			while($row = mysqli_fetch_array($query)){
				  echo'Books >>'.$row['CatTitle'];
			}
		}else{
			echo "Failed";
		}
	}
	
	if(isset($_POST['getCateg'])){
		$id = $_POST['cid'];
		$sql = "SELECT * FROM `products` WHERE `prod_cat` = $id order by rand() limit 0,9";
		$query = mysqli_query($conn,$sql);
		if($query){
			while($row = mysqli_fetch_array($query)){				;
				echo'
				   <div class="col-md-4 getHov">
						<div class="panel-success">
								<div class="panel-heading">'.$row['prod_title'].'</div>
										<div class="panel-body">
										      <div class="text-center content-grid-effect slow-zoom vertical">
				                                 <div class="img-box">
										             <a href="BooksInfo.php?id='.$row['id'].'" ><img class="thumbnail" src="images/'.$row['prod_img'].'" height="200" width="150"/></a>
										         </div>
                                               </div>
										GH&cent;'.$row['prod_px'].'.00
											<button type="button" cid="'.$row['id'].'" class="insercart btn btn-info btn-xs pull-right">ADD TO CART</button>
										
										</div>	
										<div class="panel-footer"></div>
								</div>
					 </div>
				';
			}
		}else{
			echo "Failed";
		}
	}
	
	if(isset($_POST['getProd'])){
		$limit = 9;
		if(isset($_POST['setPages'])){
		    $page = $_POST['id'];
		    $pageStart = ($page * 9) - 9;
		}else{
			$pageStart = 0;
		}
		$sql = "SELECT * FROM `products` limit $pageStart,$limit";
		$query = mysqli_query($conn,$sql);
		if($query){
			while($row = mysqli_fetch_array($query)){				;
				echo'
				<div class="col-md-4 getHov">
						<div class="panel-success">
								<div class="panel-heading">'.$row['prod_title'].'</div>
										<div class="panel-body">
												<div class="text-center content-grid-effect slow-zoom vertical">
				                                 <div class="img-box">
										             <a href="BooksInfo.php?id='.$row['id'].'" ><img class="thumbnail" src="images/'.$row['prod_img'].'" height="200" width="150"/></a>
										         </div>
                                               </div>
										</div>
										<div class="panel-footer" >GH&cent;'.$row['prod_px'].'.00
											<button type="button" cid="'.$row['id'].'" class="insercart btn btn-info btn-xs pull-right">ADD TO CART</button>
										</div>
								</div>
						</div>
				';
			}
		}else{
			echo"failed";
		}
	}
	
	
	if(isset($_POST['setPageno'])){
		$sql = "SELECT * FROM `products`";
		$query = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($query);
		$pageno = ceil($count / 9);
		for($i=1; $i<=$pageno; $i++){
			echo"
		<li><a href='#' page='$i' id='Page'>$i</a></li>
			";
		}
	}
	
		if(isset($_POST['text1'])){
		$sql = "SELECT * FROM `products` WHERE `Search` like '%".$_POST['text1']."%'";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		if($result > 0){
			while($row = mysqli_fetch_array($query)){	
				echo'
				<div class="col-md-4">
						<div class="panel-success">
								<div class="panel-heading">'.$row['prod_title'].'</div>
										<div class="panel-body">
											<div class="text-center content-grid-effect slow-zoom vertical">
				                                 <div class="img-box">
										             <a href="BooksInfo.php?id='.$row['id'].'" ><img class="thumbnail" src="images/'.$row['prod_img'].'" height="200" width="150"/></a>
										         </div>
                                               </div>
										</div>
										<div class="panel-footer">$'.$row['prod_px'].'.00
											<button type="button" cid="'.$row['id'].'" class="insercart btn btn-info btn-xs pull-right">AddToCart</button>
										</div>
								</div>
						</div>
				';
			}
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong> No Results </div>';
		}
	}if(isset($_POST['Entertext'])){
		$sql = "SELECT * FROM `products` WHERE `Search` like '%".$_POST['text1']."%'";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		if($result > 0){
			while($row = mysqli_fetch_array($query)){	
				echo'
				<div class="col-md-4">
						<div class="panel-success">
								<div class="panel-heading">'.$row['prod_title'].'</div>
										<div class="panel-body">
											<div class="text-center content-grid-effect slow-zoom vertical">
				                                 <div class="img-box">
										             <a href="BooksInfo.php?id='.$row['id'].'" ><img class="thumbnail" src="images/'.$row['prod_img'].'" height="200" width="150"/></a>
										         </div>
                                               </div>
										</div>
										<div class="panel-footer">$'.$row['prod_px'].'.00
											<button type="button" cid="'.$row['id'].'" class="insercart btn btn-info btn-xs pull-right">AddToCart</button>
										</div>
								</div>
						</div>
				';
			}
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong> No Results </div>';
		}
	}
	
	if(isset($_POST['getCart'])){
		if(!isset($_SESSION['id'])){
		$genid = $_SESSION['genrateid'];	
		$usersql = "SELECT * FROM `cart` WHERE `generateid`= $genid";
		$userquery = mysqli_query($conn,$usersql);
		if($userquery){
			while($row = mysqli_fetch_array($userquery)){	
				echo'
				   <div class="row">
						 <div class="col-md-2 text-center">'.$row['id'].'</div>
						 <div class="col-md-4 text-center"><img class="thumbnail"src="images/'.$row['prod_image'].'" width="100px" height="50px"/></div>
						 <div class="col-md-4 text-center">'.$row['prod_title'].'</div>
						<div class="col-md-2 text-center">'.$row['price'].'</div>
			  </div>
				';
			}
		}else{
			echo "Something Wrong Please Try Again";
		}
		}else{
		$user = $_SESSION['id'];
		$sql = "SELECT * FROM `cart` WHERE `user_id`= $user and orders = '0' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			while($row = mysqli_fetch_array($query)){	
				echo'
				   <div class="row">
						 <div class="col-md-2 text-center">'.$row['id'].'</div>
						 <div class="col-md-4 text-center"><img class="thumbnail"src="images/'.$row['prod_image'].'" width="100px" height="50px"/></div>
						 <div class="col-md-4 text-center">'.$row['prod_title'].'</div>
						<div class="col-md-2 text-center">'.$row['price'].'</div>
			  </div>
				';
			}
		}else{
			echo "Something Wrong Please Try Again";
		}
		}		
	}
	
		if(isset($_POST['insercart'])){
		$id = $_POST['cid'];
		$user = $_SESSION['id'];
		$genid = $_POST['gemnid'];
		if($user == ""){
			$userSql = "SELECT * FROM `products` WHERE `id` = $id";
			$userquery = mysqli_query($conn,$userSql);
		    $rows = mysqli_fetch_array($userquery);
		    $prtitle = $rows['prod_title'];
		    $prdimage = $rows['prod_img'];
		    $prdpx =  $rows['prod_px'];
			if($userquery){
				$usersql2 = "SELECT * FROM `cart` WHERE `prod_id` = $id and  generateid = '".$_SESSION['genrateid']."' ";
			    $userquery2 = mysqli_query($conn,$usersql2);
			   $userresult3 = mysqli_num_rows($userquery2);
			   if($userresult3 == 1){
				   	echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong>
Item Has Already Been Added To Cart, Continue Shopping </div>';
			   }else{
				   $usersql3 = "INSERT INTO `cart`(`prod_id`, `generateid`, `prod_title`, `prod_image`, `qty`, `price`, `totalpx`,date)
				VALUES ('$id','".$_SESSION['genrateid']."' ,'$prtitle','$prdimage','1','$prdpx','$prdpx',CURRENT_DATE) ";
				$userquery3 = mysqli_query($conn,$usersql3);
				if($userquery3){
					echo' <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong></strong>Added To CART </div> ';
				}else{
					
				}
			   }
			}
		}
		else{			
		$sql = "SELECT * FROM `products` WHERE `id` = $id";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($query);
		$prtitle = $row['prod_title'];
		$prdimage = $row['prod_img'];
		$prdpx =  $row['prod_px'];
		if($query){
			$sql2 = "SELECT * FROM `cart` WHERE `prod_id` = $id and `user_id` = $user and orders = '0'";
			$query2 = mysqli_query($conn,$sql2);
			$result3 = mysqli_num_rows($query2);
			if($result3 == 1){
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong>
Item Has Already Been Added To Cart, Continue Shopping </div>';
			}else{
				$sql3 = "INSERT INTO `cart`(`prod_id`, `user_id`, `prod_title`, `prod_image`, `qty`, `price`, `totalpx`, date)
				VALUES ('$id','$user','$prtitle','$prdimage','1','$prdpx','$prdpx',CURRENT_DATE) ";
				$query3 = mysqli_query($conn,$sql3);
				if($query3){
					echo' <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong></strong>
Added To CART </div> ';
				}else{
					
				}
			}
		}
	}
}
	
	if(isset($_POST['getnumCart'])){
		$user = $_SESSION['id'];
		$genid = $_POST['genid'];
		if($user ==""){
		$genrateId = $_SESSION['genrateid'];
		$sql2 = "SELECT * FROM `cart` WHERE `generateid` = '$genrateId' ";
		$query2 = mysqli_query($conn,$sql2);
		$result3 = mysqli_num_rows($query2);
		echo $result3;
		}else{
		$sql2 = "SELECT * FROM `cart` WHERE `user_id` = $user and orders = '0' ";
		$query2 = mysqli_query($conn,$sql2);
		$result3 = mysqli_num_rows($query2);
		echo $result3;
		}
	}
	
	if(isset($_POST['CheckOut'])){
		$user = $_SESSION['id'];
		if($user ==""){
			$genrateId = $_SESSION['genrateid'];
			$sql = "SELECT * FROM `cart` WHERE `generateid` = $genrateId";
		   $query = mysqli_query($conn,$sql);
		   $result = mysqli_num_rows($query);
		if($result > 0){
			while($row = mysqli_fetch_array($query)){
				$prod_id = $row['id'];
				echo'
				<div class="row">
							<div class="col-md-2">
								<a href="#" cid="'.$row['id'].'" class="delekey btn btn-danger" ><span class="glyphicon glyphicon-trash"></span></a>
								<a href="#" cid="'.$row['id'].'" class="updakey btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
							</div>
							<div class="col-md-2"><img class="thumbnail" src="images/'.$row['prod_image'].'" height="80" width="100"/></div>
							<div class="col-md-2">'.$row['prod_title'].'</div>
							<div class="col-md-2"><input value="'.$row['qty'].'" cid="'.$prod_id.'" id="key-'.$prod_id.'" type="number" class="key form-control"></div>
							<div class="col-md-2"><input type="number" value="'.$row['price'].'"cid="'.$prod_id.'" id="key2-'.$prod_id.'"class="key2 form-control" disabled></div>
							<div class="col-md-2"><input type="number" value="'.$row['totalpx'].'" cid="'.$prod_id.'" id="key3-'.$prod_id.'"class="key3 form-control"></div>
				</div>
				';
			}
			echo '
				<b class="pull-right">Grand Total : <span id="getGrandtotal"></span></b>
												<br>
												 <li class="pull-right" style="list-style:none;"><a href="#"  class="dropdown-toggle" data-toggle="dropdown"><button class="btn btn-default">Cart CheckOut</button></a>
															<ul class="dropdown-menu">																												
																			<a href="Signup2.php"><button class="btn btn-success">Create Account</button></a>
																			<a href="save3.php"><button class="btn btn-success">Checkout As Guest</button></a>																											
															</ul>
												</li>
												<div class="clearfix"></div>
			';
			
		  echo '
		   ';
			echo '
			';
		}else{
						echo' <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>No books Added to Cart Yet</strong>
			';
		}
		}else{
			$sql = "SELECT * FROM `cart` WHERE `user_id` = $user and orders = '0' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			while($row = mysqli_fetch_array($query)){
				$prod_id = $row['id'];
				echo'
				<div class="row">
							<div class="col-md-2">
								<a href="#" cid="'.$row['id'].'" class="delekey btn btn-danger" ><span class="glyphicon glyphicon-trash"></span></a>
								<a href="#" cid="'.$row['id'].'" class="updakey btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
							</div>
							<div class="col-md-2"><img class="thumbnail" src="images/'.$row['prod_image'].'" height="80" width="100"/></div>
							<div class="col-md-2">'.$row['prod_title'].'</div>
							<div class="col-md-2"><input value="'.$row['qty'].'" cid="'.$prod_id.'" id="key-'.$prod_id.'" type="number" class="key form-control"></div>
							<div class="col-md-2"><input type="number" value="'.$row['price'].'"cid="'.$prod_id.'" id="key2-'.$prod_id.'"class="key2 form-control" disabled></div>
							<div class="col-md-2"><input type="number" value="'.$row['totalpx'].'" cid="'.$prod_id.'" id="key3-'.$prod_id.'"class="key3 form-control"></div>
				</div>
				';
			}
		
			echo'<b class="pull-right">Grand Total : <span id="getGrandtotal"></span></b>
			<div class="clearfix"></div>
			<a href="seletpaymode.php" class="pull-right" style="margin-riight:30px;"><button class="btn btn-default">Cart CheckOut</button></a></a>
			';
		}
		}		
	}
	
	if(isset($_POST['delekey'])){
		$id = $_POST['cid'];
		$sql = "DELETE FROM `cart` WHERE `id` = $id";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>SuccessFully!</strong>
Item Deleted SuccessFully </div>';
		}else{
			echo "failed";
		}
	}
	
	if(isset($_POST['updakey'])){
		$id = $_POST['cid'];
		$qty = $_POST['text'] ;
		$px = $_POST['text2'];
		$tot = $_POST['text3'];	
		$total = $qty * $px;
		$sql = "UPDATE `cart` SET `qty` = $qty, `totalPx` = $total WHERE `id` = $id";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>SuccessFully!</strong>
Item Updated SuccessFully </div>';
		}else{
			echo "failed";
		}
	}
	
	if(isset($_POST['CheckOutGrandTotal'])){
		$user = $_SESSION['id'];
		$genrateId = $_SESSION['genrateid'];
		if($user ==""){
			$sql = "SELECT sum(`totalPx`) as total from cart where `generateid` = $genrateId";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($query);
		if($query){
			$_SESSION['totals'] = $row['total'];
			echo $row['total'];
		}else{
			echo "failed";
		}
		}else{
			$sql = "SELECT sum(`totalPx`) as total from cart where `user_id` = $user and orders = '0'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($query);
		if($query){
			$_SESSION['totals'] = $row['total'];
			echo $row['total'];
		}else{
			echo "failed";
		}
		}	
	}
	
	
/*if(isset($_POST['addbook'])){
		echo'                
					<center style="font-weight:bold;font-family:Tahoma;">ADD BOOK</center>	
<form action="upload.php" method="post">					
															<div class="col-md-12">
																	<label>Book Title</label>
																	<input type="text" class="form-control" id="lname" name="lname" placeholder="Book Title" required>
															</div>
															<div class="col-md-12">
																	<label>Image Url</label>
																	<input type="file" class="form-control" id="mobil" name="userImage" placeholder="Image Url" required>
															</div>
																<div class="col-md-12">
																<label>Select Book Category</label>
																	 <div class="form-group">
				                                                          <select class="form-control" id="cat">
				                                                               <option value="">Select Book Category</<option>
				                                                               <option value="1">Accounting</<option>
				                                                               <option value="2">Info Tech</<option>
																			   <option value="3">Law</<option>
																			   <option value="4">Marketing</<option>
																			   <option value="5">Banking & Finance</<option>
																			   <option value="6">Magazines</<option>
																			   <option value="7">Novel</<option>
				                                                        </select>
																	</div>
															</div>									
															<div class="col-md-12">
																	<label>Book ISBN</label>
																	<input type="number" class="form-control" id="pwd" name="pwd" placeholder="Book ISBN" required>
															</div>
															<div class="col-md-12">
																	<label>Author Name</label>
																	<input type="text" class="form-control" id="pwd2" name="pwd2" placeholder="Authour" required>
															</div>																									
															<div class="col-md-12">
																	<label>Price</label>
																	<input type="number" class="form-control" id="aln1" name="aln1" placeholder="Price" required>
															</div>
															<div class="col-md-12">
																	<label>Book Description</label>
																	<div class="form-group">
				                                     <textarea rows="9" class="form-control" id="drudpre"placeholder="Book Description" style="resize:none;"></textarea>
			                                                     </div>
															</div>																																																						
													<input style="margin-top:20px;"type="submit" name="add" id="add" value="Add" class="btn btn-success btn-sm pull-right"/></div>
								</form>
		';
	}*/
	
	if(isset($_POST['addbuks'])){
		$sql = "INSERT INTO `products`(`prod_cat`, `prod_title`, `prod_isbn`, `author`, `prod_px`, `prod_desc`, `prod_img`) 
		VALUES ('".$_POST['bukcat']."','".$_POST['buktitle']."','".$_POST['bukisbn']."','".$_POST['bukAut']."','".$_POST['bukpx']."','".$_POST['bukdec']."','".$_POST['bukimg']."')";
		$query = mysqli_query($conn,$sql);
	   if($query){
		 			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>SuccessFully!</strong>
  Book Added SuccessFully ' ;
	   }else{
		   			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong>
Failed to Insert Book Details Try Again Later ';
	   }	
	}
	
	
  if(isset($_POST['CusOrder'])){
	    $sql = "SELECT * FROM `customerorder` order by `id` desc";
		$query = mysqli_query($conn,$sql);
		 $sql2 = "SELECT * FROM `customerorder` order by `id` desc";
		$query2 = mysqli_query($conn,$sql2);
		if($query){
			
			echo '
			<ul class="list-inline">
					<li style="width:300px;"><input type="text" class="form-control" name="serchord" id="serchord" placeholder="Type in ReFid to delete Order"></li>
					<li><input type="submit" class="btn btn-danger" name="delorder" id="delorder" value="Delete Order"></li>
				</ul>
				
					  <div class="row">
					  <div class="col-md-3" style="font-size:15px;color:red;">Full name</div>
			          <div class="col-md-2" style="font-size:15px;color:red;">Contact</div>
					  <div class="col-md-2" style="font-size:15px;color:red;">Ref.ID</div>
					  <div class="col-md-2" style="font-size:15px;color:red;">Update Status</div>
					  <div class="col-md-1" style="font-size:15px;color:red;">view</div>
					  </div><br>
			';
			while($row = mysqli_fetch_array($query)){
				    echo'
					<div class="row">
					<div class="col-md-3">'.$row['Fullname'].'</div>
					  <div class="col-md-2">'.$row['Number'].'</div>
			          <div class="col-md-2">'.$row['ReFid'].'</div>
					  <div class="col-md-2"><select class="form-control" id="upSta" name="upSta"><option value="0">Processing</option><option value="1">Completed</option><option value="2">Ready For Pickup</option><option value="3">Cancelled</option></select></div>
					  <div class="col-md-1"><a href="customerview.php?id='.$row['ReFid'].'" class="btn btn-success">View Order</a></div>
					  </div>					 
					 ';
			}
			
		}
  }
  
   if(isset($_POST['delBooks'])){
	    $sql = "SELECT * FROM `products` order by `id` desc";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo '
					  <div class="row">
			          <div class="col-md-1">P.ID</div>
					   <div class="col-md-2">P.ISBN</div>
			          <div class="col-md-3">P.Name</div>
					  <div class="col-md-2">P.Image</div>
					  <div class="col-md-2">P.PRICE</div>
					   <div class="col-md-2">DEL</div>
					  </div>
			';
			while($row = mysqli_fetch_array($query)){
				    echo'
					<div class="row">
					<div class="col-md-1">'.$row['id'].'</div>
					   <div class="col-md-2">'.$row['prod_isbn'].'</div>
			          <div class="col-md-3">'.$row['prod_title'].'</div>
					  <div class="col-md-2"><img class="thumbnail" src="images/'.$row['prod_img'].'" height="50" width="50"/></div>
					  <div class="col-md-2">'.$row['prod_px'].'</div>
					   <div class="col-md-2"><a href="#" cid="'.$row['id'].'" class="deleBUK btn btn-danger" ><span class="glyphicon glyphicon-trash"></span></a></div>
					  </div>					 
					 ';
			}
			
		}
  }
  
   if(isset($_POST['delBooks2'])){
	    $sql = "SELECT * FROM `products` order by `id` desc";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo '
					  <div class="row">
			          <div class="col-md-1">P.ID</div>
					   <div class="col-md-2">P.ISBN</div>
			          <div class="col-md-3">P.Name</div>
					  <div class="col-md-2">P.Image</div>
					  <div class="col-md-2">P.PRICE</div>
					   <div class="col-md-2">DEL</div>
					  </div>
			';
			while($row = mysqli_fetch_array($query)){
				    echo'
					<div class="row">
					<div class="col-md-1">'.$row['id'].'</div>
					   <div class="col-md-2">'.$row['prod_isbn'].'</div>
			          <div class="col-md-3">'.$row['prod_title'].'</div>
					  <div class="col-md-2"><img class="thumbnail" src="images/'.$row['prod_img'].'" height="50" width="50"/></div>
					  <div class="col-md-2">'.$row['prod_px'].'</div>
					   <div class="col-md-2"><a href="#" cid="'.$row['id'].'" class="deleBUK btn btn-danger" ><span class="glyphicon glyphicon-trash"></span></a></div>
					  </div>					 
					 ';
			}
			
		}
  }
  
   if(isset($_POST['delBok'])){
	   $id = $_POST['cid'];
		$sql = "DELETE FROM `products` WHERE `id`= $id";
		$query = mysqli_query($conn,$sql);
		if($query){
			  
		}else{
			echo "failed";
		}   
   }
   if(isset($_POST['Addbukks'])){
	   echo '
	   <center style="font-weight:bold;font-family:Tahoma;">ADD BOOK</center>	
                                                     <form action="upload.php" method="post"  enctype="multipart/form-data">					
															<div class="col-md-12">
																	<label>Book Title</label>
																	<input type="text" class="form-control" id="lname" name="lname" placeholder="Book Title" required>
															</div>
															<div class="col-md-12">
																	<label>Image Url</label>
																	<input type="file" class="form-control" id="fileToUpload" name="fileToUpload"  required>
															</div>
																<div class="col-md-12">
																<label>Select Book Category</label>
																	 <div class="form-group">
				                                                          <select class="form-control" id="cat" name="cat">
				                                                               <option value="">Select Book Category</<option>
				                                                               <option value="1">Accounting</<option>
				                                                               <option value="2">Info Tech</<option>
																			   <option value="3">Law</<option>
																			   <option value="4">Marketing</<option>
																			   <option value="5">Banking & Finance</<option>
																			   <option value="6">Magazines</<option>
																			   <option value="7">Novel</<option>
				                                                        </select>
																	</div>
															</div>									
															<div class="col-md-12">
																	<label>Book ISBN</label>
																	<input type="number" class="form-control" id="pwd" name="pwd" placeholder="Book ISBN" required>
															</div>
															<div class="col-md-12">
																	<label>Author Name</label>
																	<input type="text" class="form-control" id="pwd2" name="pwd2" placeholder="Authour" required>
															</div>																									
															<div class="col-md-12">
																	<label>Price</label>
																	<input type="number" class="form-control" id="aln1" name="aln1" placeholder="Price" required>
															</div>
															<div class="col-md-12">
																	<label>Book Description</label>
																	<div class="form-group">
				                                     <textarea rows="9" class="form-control" id="drudpre" name="drudpre" placeholder="Book Description" style="resize:none;"></textarea>
			                                                     </div>
															</div>																																																						
													<input style="margin-top:20px;"type="submit" name="add"  value="Add" class="btn btn-success btn-sm pull-right"/></div>
								</form>'
	   ;
   }
  	 if(isset($_POST['CustmerOrder'])){
		$sql = "SELECT * FROM `customerorder` WHERE `ReFid` = '".$_POST['text2']."' ";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		//$sql2 = "SELECT * FROM `users` WHERE `id` = '".$_POST['text2']."' ";
		//$query2 = mysqli_query($conn,$sql2);
		//$rows = mysqli_fetch_array($query2);
		if($result > 0){
			$sql2 = "SELECT sum(`totalpx`) as totalpayment FROM `customerorder` WHERE `ReFid` = '".$_POST['text2']."' ";
			$query2 = mysqli_query($conn,$sql2);
			if($query2){
				$rows = mysqli_fetch_array($query2);
			}
			echo '
			<h1>Customer Order Details </h1>
								<br>';										
			while($row = mysqli_fetch_array($query)){
				    echo'
					<div class="row">
									<div class="col-md-6">
										<img src="images/'.$row['prod_image'].'" class="pull-right thumbnail" width="200" height="150">
									</div>
									<div class="col-md-6">
										<table>
											<tr>
												<td class="text-success"><b>Product Name :</b></td>
												<td>'.$row['prod_title'].'</td>
											</tr>
											<tr>
												<td class="text-success"><b>Product Price :</b></td>
												<td>'.$row['price'].'</td>
											</tr>
											<tr>
												<td class="text-success"><b>Quanity :</b></td>
												<td>'.$row['qty'].'</td>
											</tr>
											<tr>
												<td class="text-success"><b>Transaction ID :</b></td>
												<td>11234355545445</td>
											</tr>
										</table>
									</div>
								</div>								 
					 ';
			}
			echo '<b style="border:1px solid black;padding:10px;"class="pull-right bg-success">Total : '.$rows['totalpayment'].' </b>';
			
			'<ul class="list-inline">
						<li><b>FirstName: '.$rows['firstname'].'</b></li>
						<li><b>Email: '.$rows['Email'].'</b></li>
						<li><b>Mobile Number: '.$rows['mobile'].'</b></li>
			       </ul>
				   <h3 class="text-center">Send Mail</h3>
				   <div class="col-md-8 col-md-offset-2">
						<label>Email</label>
						<input type="email" class="form-control" value="'.$rows['Email'].'"id="emaile" placeholder="Email"/>
						<label>Subject</label>
						<input type="text" class="form-control" id="subj" placeholder="Subject"/>
						<label>Message</label>
						<textarea col="3" id="msg"class="form-control" rows="3" style="resize:none;">Hi, '.$rows['firstname'].'</textarea>
						<input style="margin-top:10px;"type="submit" class="btn btn-success pull-right" id="sendmail" value="SendMail"/>
						<p><br></p>
						<p><br></p>
						<input style="margin-top:10px;"type="submit" class="btn btn-danger" id="deteCusOrder" value="Delete Customer Order"/>						
				   </div>
				   ';
		}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong> No Results </div>';
		}
	 }
  
	 if(isset($_POST['Sendmailss'])){
		 $to = $_POST['temail'];
		 $subject = $_POST['tsub'];
		 $message = $_POST['tmsg'];
		 $headers = "From: asaraderrick@yahoo.com"."\r\n".
		 "Reply-TO: asaraderrick@yahoo.com"."\r\n".
		 "X-Mailer: PHP/". phpversion();
		 mail($to,$subject, $message,$headers);
	 }
  
	 if(isset($_POST['deteleCusOrder'])){
		 $sql = "DELETE FROM `customerorder` WHERE `uid` = '".$_POST['text3']."' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			
		}else{
			echo"failed";
		}
	 }
  
  if(isset($_POST['getgenrate'])){
	$sql = "SELECT MAX(`genrateId`) as maximum_num FROM idtable ";
	 $query = mysqli_query($conn,$sql);
	 if($query){
	 $row = mysqli_fetch_array($query);
	 $num = $row['maximum_num'];
	 $num3 = $num + 1;
	 $_SESSION['genrateid'] = $num3;
	 echo $num3;
	 }else{
		 echo"failed";
	 }
	}
	
	if(isset($_POST['Acountcreate'])){
		$pwd = $_POST['text3'];
		$pwd2 = $_POST['text4'];
		$hash = password_hash($pwd, PASSWORD_DEFAULT);
		 $sql = "SELECT * FROM `users` WHERE `Email` = '".$_POST['text8']."' ";
		$result = mysqli_query($conn,$sql);
		$results = mysqli_num_rows($result);
		if($results > 0){
		 	echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong>
		 Email ALready Exist, try a different Email </div>'		 
		 ;
		 exit();
	   }elseif(!PASSWORD_VERIFY($pwd2,$hash)){
		 		 	echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong>
		 Password Does not Match</div>';
		   exit();
	   }else{
			$sql2 = "INSERT INTO `users`(`firstname`, `Lastname`, `password`, `mobile`, `Email`, `addressline1`, `addressline2`,`AlName`,`AlNumber`,`Gid`) 
	 VALUES ('".$_POST['fname']."', '".$_POST['text2']."','".$_POST['text3']."','".$_POST['text7']."','".$_POST['text8']."','".$_POST['text5']."','".$_POST['text6']."','".$_POST['text9']."','".$_POST['text10']."','".$_SESSION['genrateid']."')";
		$query2 = mysqli_query($conn,$sql2);
		if($query2){	
			$sql3 = "SELECT * FROM `users` where `Email` = '".$_POST['text8']."' ";
			$query3 = mysqli_query($conn,$sql3);
			if($query3){
				$row = mysqli_fetch_array($query3);
				$_SESSION['id'] = $row['id'];
				$sql4 = "UPDATE `cart` SET `user_id` = '".$_SESSION['id']."' WHERE `generateid` = '".$_SESSION['genrateid']."' ";
				$query4 = mysqli_query($conn,$sql4);
				if($query4){
					
					echo'
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Account Created Successful!</strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "seletpaymode.php";
						function countDown(){
  							 var timer =document.getElementById("timer");
   						 if(count > 0){
     				   count--;
        				timer.innerHTML = "<B>redirecting in </b>"+count+" <b>seconds.</b><br>";
       			 setTimeout("countDown()", 1000);
   				 }
			else{
        window.location.href = redirect;
   				 }
					}
				</script>
				<span id="timer">
		<script type="text/javascript">countDown();</script>
					</span>
					</div>'
			;
				}else{
					echo "failed";
				}
			}
			
		}else{
			echo"failed to Create Account";
		}
	 }
	}
	
	 if(isset($_POST['payon'])){
	 echo' <a href="#" id="subOrder" class="btn btn-success">Submit Order</a>';
	}
	
	if(isset($_POST['subOrder'])){
	$user = $_SESSION['id'];
	$genrateId = $_SESSION['genrateid'];
	if($user ==""){
	 $sql = "SELECT MAX(`Refta`) as maximum_num FROM refTable ";
	 $query = mysqli_query($conn,$sql);
	 if($query){
	 $row = mysqli_fetch_array($query);
	 $num = $row['maximum_num'];
	 $num3 = $num + rand(0,488);
	 $num4 = 'REF'.$num3.'AF'.$num3;
	 $_SESSION['Refids'] = $num4;
	 $sql9 = "SELECT * FROM `users` WHERE `Gid` = '$genrateId' ";
			$query9 = mysqli_query($conn,$sql9);		
			$rows =  mysqli_fetch_array($query9);
			$names = $rows['firstname'].''.$rows['Lastname'];
			$nub = $rows['mobile'];
			$alnumb = $rows['AlNumber'];
			$alfulna = $rows['AlName'];
		$sql7 = "SELECT * FROM `customerorder` WHERE `generateid` = '$genrateId' ";
		$query7= mysqli_query($conn,$sql7);
		$result = mysqli_num_rows($query7);
		if($result > 0){
				echo '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Order Has Already Been Submitted Successful!</strong>';
				exit();
		}else{
			$sql9 = "SELECT * FROM `users` WHERE `Gid` = '$genrateId' ";
			$query9 = mysqli_query($conn,$sql9);
			$rows =  mysqli_fetch_array($query9);
			$names = $rows['firstname'].$rows['Lastname'];
			$nub = $rows['mobile'];
			$alnumb = $rows['AlNumber'];
			$alfulna = $rows['AlName'];	
$sql2 = "INSERT INTO customerorder(`id`,`prod_id`,`user_id`,`generateid`,`prod_title`,`prod_image`,`qty`,`price`,`totalpx`) SELECT `id`,`prod_id`,`user_id`,`generateid`,`prod_title`,`prod_image`,`qty`,`price`,`totalpx` FROM cart where `generateid` = '$genrateId' ";
	 $query2 = mysqli_query($conn,$sql2);
	 if($query2){
		 $sql3 = "INSERT INTO `idtable` (`id`, `genrateId`) VALUES (NULL, '$genrateId')";
		 $query3 = mysqli_query($conn,$sql3);
		 if($query3){
			  $sql6 = "UPDATE `customerorder` SET `ReFid` = '$num4',`Fullname` = '$names', `Number` = '$nub', `AlFullName` = '$alfulna', `AlNumber` = '$alnumb', `dates` = CURRENT_DATE WHERE `generateid` = '$genrateId' ";
			 $query5 = mysqli_query($conn,$sql6);
			 if($query5){
				 $sql33 = "INSERT INTO `reftable`(`id`, `Refta`) VALUES (null,'$num4')";
				 $query33 = mysqli_query($conn,$query33);
$number = $_SESSION['mobilenumb'];
$add = substr($number,1,9);
$results = "00233".$add;				 
$key="hCChFHkjtfPm9zKsCOjjbB7ZS"; //your unique API key;
$msgs = "WELCOME: ".$_SESSION['firstname']. $_SESSION['lastname']."Your Reference Id is ".$_SESSION['Refids'];
$phone = $results;
$message=urlencode($msgs); //encode url;
$sender_id = "CITS";
/*******************API URL FOR SENDING MESSAGES********/
$url="https://apps.mnotify.net/smsapi?key=$key&to=$phone&msg=$message&sender_id=$sender_id";


/****************API URL TO CHECK BALANCE****************/
$urls="https://apps.mnotify.net/smsapi/balance?key=$key";


$result=file_get_contents($url); //call url and store result;

switch($result){                                           
    case "1000":
	echo "Message sent SuccessFully <br>";
	break;
    case "1002":
	echo "Message not sent <br>";
	break;
    case "1003":
	echo "You don't have enough balance <br>";
	break;
    case "1004":
	echo "Invalid API Key <br>";
	break;
    case "1005":
	echo "Phone number not valid <br>";
	break;
    case "1006":
	echo "Invalid Sender ID <br>";
	break;
    case "1008":
	echo "Empty message <br>";
	break;
}
				 echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>'.$rows['AlName'].' Order Submitted Successful!</strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "pickup.php";
						function countDown(){
  							 var timer =document.getElementById("timer");
   						 if(count > 0){
     				   count--;
        				timer.innerHTML = "<B>redirecting in </b>"+count+" <b>seconds.</b><br>";
       			 setTimeout("countDown()", 1000);
   				 }
			else{
        window.location.href = redirect;
   				 }
					}
				</script>
				<span id="timer">
		<script type="text/javascript">countDown();</script>
					</span>
					</div>'
				
			;
			 }
		 }else{
			  echo "failed";
		 }
	}else{
		 echo "";
	}			
	 }
	}
	}
	
	else{
	 $sql = "SELECT MAX(`Refta`) as maximum_num FROM refTable ";
	 $query = mysqli_query($conn,$sql);
	 if($query){
	 $row = mysqli_fetch_array($query);
	 $num = $row['maximum_num'];
	 $num3 = $num + rand(0,488);
	 $num4 = 'REF'.$num3.'AF'.$num3;
	 $_SESSION['Refids'] = $num4;
	 $sql9 = "SELECT * FROM `users` WHERE `id` = '$user' ";
			$query9 = mysqli_query($conn,$sql9);		
			$rows =  mysqli_fetch_array($query9);
			$names = $rows['firstname'].''.$rows['Lastname'];
			$nub = $rows['mobile'];
			$alnumb = $rows['AlNumber'];
			$alfulna = $rows['AlName'];
	 $sql2 = "INSERT INTO customerorder(`id`,`prod_id`,`user_id`,`generateid`,`prod_title`,`prod_image`,`qty`,`price`,`totalpx`) SELECT `id`,`prod_id`,`user_id`,`generateid`,`prod_title`,`prod_image`,`qty`,`price`,`totalpx` FROM cart where `user_id` = '$user' and orders = '0' ";
	 $query2 = mysqli_query($conn,$sql2);
	 if($query2){
		 $sql3 = "UPDATE `cart` SET `orders` = '1' where `user_id` = '$user' ";
		 $query3 = mysqli_query($conn,$sql3);
		 if($query3){
			 $sql3 = "INSERT INTO `idtable` (`id`, `genrateId`) VALUES (NULL, '$genrateId')";
		 $query3 = mysqli_query($conn,$sql3);
		 if($query3){
			  $sql6 = "UPDATE `customerorder` SET `ReFid` = '$num4', `Fullname` = '$names', `Number` = '$alnumb', `AlFullName` = '$alfulna', `AlNumber` = '$alnumb', `dates` = CURRENT_DATE WHERE `user_id` = '$user' ";
			 $query5 = mysqli_query($conn,$sql6);
			 if($query5){
				 $sql33 = "INSERT INTO `reftable`(`id`, `Refta`) VALUES (null,'$num4')";
				 $query33 = mysqli_query($conn,$query33);
$key="hCChFHkjtfPm9zKsCOjjbB7ZS"; //your unique API key;
$number = $_SESSION['mobilenumb'];
$add = substr($number,1,9);
$results = "00233".$add;	
$msgs = "WELCOME: ".$_SESSION['firstname']. $_SESSION['lastname']."Your Reference Id is".$_SESSION['Refids'];
$phone = $results;
$message=urlencode($msgs); //encode url;
$sender_id = "CITS";
/*******************API URL FOR SENDING MESSAGES********/
$url="https://apps.mnotify.net/smsapi?key=$key&to=$phone&msg=$message&sender_id=$sender_id";
/****************API URL TO CHECK BALANCE****************/
$urls="https://apps.mnotify.net/smsapi/balance?key=$key";
$result=file_get_contents($url); //call url and store result;
switch($result){                                           
    case "1000":
	echo "Message sent SuccessFully <br>";
	break;
    case "1002":
	echo "Message not sent <br>";
	break;
    case "1003":
	echo "You don't have enough balance <br>";
	break;
    case "1004":
	echo "Invalid API Key <br>";
	break;
    case "1005":
	echo "Phone number not valid <br>";
	break;
    case "1006":
	echo "Invalid Sender ID <br>";
	break;
    case "1008":
	echo "Empty message <br>";
	break;
}
				 echo'
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>'.$rows['AlName'].' Order Submitted Successful!</strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "pickup2.php";
						function countDown(){
  							 var timer =document.getElementById("timer");
   						 if(count > 0){
     				   count--;
        				timer.innerHTML = "<B>redirecting in </b>"+count+" <b>seconds.</b><br>";
       			 setTimeout("countDown()", 1000);
   				 }
			else{
        window.location.href = redirect;
   				 }
					}
				</script>
				<span id="timer">
		<script type="text/javascript">countDown();</script>
					</span>
					</div>'
			;
			 }
		 }else{
			  echo "failed";
		 }
		 }else{
			 echo "Unable to update Cart Information";
		 }
	}else{
		 echo "";
	}
	 
	}
	
	}	 
	 
	}
	
	
	 if(isset($_POST['paym'])){
		 $ids = $_SESSION['id'];
		 $sql = "SELECT * FROM `users` WHERE `id` = $ids ";
		 $query=mysqli_query($conn,$sql);
		 if($query){
			 $row = mysqli_fetch_array($query);
		 }
	 echo'
		                   
	 ';
	}
	
	if(isset($_POST['subOrdermobil'])){
	$user = $_SESSION['id'];
	$genrateId = $_SESSION['genrateid'];
	if($user ==""){
	 $sql = "SELECT MAX(`Refta`) as maximum_num FROM refTable ";
	 $query = mysqli_query($conn,$sql);
	 if($query){
	 $row = mysqli_fetch_array($query);
	 $num = $row['maximum_num'];
	 $num3 = $num + rand(0,488);
	 $num4 = 'REF'.$num3.'AF'.$num3;
	 $_SESSION['Refids'] = $num4;
		$sql7 = "SELECT * FROM `customerorder` WHERE `generateid` = '$genrateId' ";
		$query7= mysqli_query($conn,$sql7);
		$result = mysqli_num_rows($query7);
		if($result > 0){
				echo '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Order Has Already Been Submitted Successful!</strong>';
				exit();
		}else{
	 $sql2 = "INSERT INTO customerorder(`id`,`prod_id`,`user_id`,`generateid`,`prod_title`,`prod_image`,`qty`,`price`,`totalpx`) SELECT `id`,`prod_id`,`user_id`,`generateid`,`prod_title`,`prod_image`,`qty`,`price`,`totalpx` FROM cart where `generateid` = '$genrateId' ";
	 $query2 = mysqli_query($conn,$sql2);
	 if($query2){
		 $sql3 = "INSERT INTO `idtable` (`id`, `genrateId`) VALUES (NULL, '$genrateId')";
		 $query3 = mysqli_query($conn,$sql3);
		 if($query3){
			  $sql6 = "UPDATE `customerorder` SET `ReFid` = '$num4' WHERE `generateid` = '$genrateId' ";
			 $query5 = mysqli_query($conn,$sql6);
			 if($query5){
				 $sql33 = "INSERT INTO `reftable`(`id`, `Refta`) VALUES (null,'$num4')";
				 $query33 = mysqli_query($conn,$query33);
				 session_destroy();
				 $key="hCChFHkjtfPm9zKsCOjjbB7ZS"; //your unique API key;
$number = $_POST['text2'];
$add = substr($number,1,9);
$results = "00233".$add;	
$msgs = "WELCOME: ".$_POST['text']."Your Reference Id is".$_SESSION['Refids'];
$phone = $results;
$message=urlencode($msgs); //encode url;
$sender_id = "CITS";
/*******************API URL FOR SENDING MESSAGES********/
$url="https://apps.mnotify.net/smsapi?key=$key&to=$phone&msg=$message&sender_id=$sender_id";
/****************API URL TO CHECK BALANCE****************/
$urls="https://apps.mnotify.net/smsapi/balance?key=$key";
$result=file_get_contents($url); //call url and store result;
switch($result){                                           
    case "1000":
	echo "TEXT Message sent SuccessFully <br> Click ok to proceed";
	break;
    case "1002":
	echo "TEXT Message not sent <br> Click ok to proceed";
	break;
    case "1003":
	echo "You don't have enough balance <br> Click ok to proceed";
	break;
    case "1004":
	echo "Invalid API Key <br> Click ok to proceed";
	break;
    case "1005":
	echo "Phone number not valid <br> Click ok to proceed";
	break;
    case "1006":
	echo "Invalid Sender ID <br> Click ok to proceed";
	break;
    case "1008":
	echo "Empty message <br> Click ok to proceed";
	break;
}
			;
			 }
		 }else{
			  echo "failed";
		 }
	}else{
		 echo "";
	}
	 }
	}
	}
	
	else{
	 $sql = "SELECT MAX(`Refta`) as maximum_num FROM refTable ";
	 $query = mysqli_query($conn,$sql);
	 if($query){
	 $row = mysqli_fetch_array($query);
	 $num = $row['maximum_num'];
	 $num3 = $num + rand(0,788);
	 $num4 = 'REF'.$num3.'AF'.$num3;
	 $_SESSION['Refids'] = $num4;
	 $sql2 = "INSERT INTO customerorder(`id`,`prod_id`,`user_id`,`generateid`,`prod_title`,`prod_image`,`qty`,`price`,`totalpx`) SELECT `id`,`prod_id`,`user_id`,`generateid`,`prod_title`,`prod_image`,`qty`,`price`,`totalpx` FROM cart where `user_id` = '$user' and orders = '0'";
	 $query2 = mysqli_query($conn,$sql2);
	 if($query2){
		 $sql3 = "UPDATE `cart` SET `orders` = '1' where `user_id` = '$user' ";
		 $query3 = mysqli_query($conn,$sql3);
		 if($query3){
			 $sql3 = "INSERT INTO `idtable` (`id`, `genrateId`) VALUES (NULL, '$genrateId')";
		 $query3 = mysqli_query($conn,$sql3);
		 if($query3){
			  $sql6 = "UPDATE `customerorder` SET `ReFid` = '$num4' WHERE `user_id` = '$user' ";
			 $query5 = mysqli_query($conn,$sql6);
			 if($query5){
				 $sql33 = "INSERT INTO `reftable`(`id`, `Refta`) VALUES (null,'$num4')";
				 $query33 = mysqli_query($conn,$query33);
$key="hCChFHkjtfPm9zKsCOjjbB7ZS"; //your unique API key;
$number = $_POST['text2'];
$add = substr($number,1,9);
$results = "00233".$add;	
$msgs = "WELCOME: ".$_POST['text']."Your Reference Id is".$_SESSION['Refids'];
$phone = $results;
$message=urlencode($msgs); //encode url;
$sender_id = "CITS";
/*******************API URL FOR SENDING MESSAGES********/
$url="https://apps.mnotify.net/smsapi?key=$key&to=$phone&msg=$message&sender_id=$sender_id";
/****************API URL TO CHECK BALANCE****************/
$urls="https://apps.mnotify.net/smsapi/balance?key=$key";
$result=file_get_contents($url); //call url and store result;
switch($result){                                           
    case "1000":
	echo "TEXT Message sent SuccessFully <br> Click ok to proceed";
	break;
    case "1002":
	echo "TEXT Message not sent <br> Click ok to proceed";
	break;
    case "1003":
	echo "You don't have enough balance <br> Click ok to proceed";
	break;
    case "1004":
	echo "Invalid API Key <br> Click ok to proceed";
	break;
    case "1005":
	echo "Phone number not valid <br> Click ok to proceed";
	break;
    case "1006":
	echo "Invalid Sender ID <br> Click ok to proceed";
	break;
    case "1008":
	echo "Empty message <br> Click ok to proceed";
	break;
}
			;
			 }
		 }else{
			  echo "failed";
		 }
		 }else{
			 echo "Unable to update Cart Information";
		 }
	}else{
		 echo "";
	}
	 
	}
	
	}	 
	 
	}
	if(isset($_POST['delcusord'])){
	   $id = $_POST['text'];
		$sql = "DELETE FROM `customerorder` WHERE `ReFid` = '$id' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Customer order Deleted Successful!</strong>';	  
		}else{
			echo '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed to delete Customer Order</strong>';
		}   
   }
   
   if(isset($_POST['editProfile'])){
	   $sql = "SELECT * FROM `users` WHERE `id` = '".$_SESSION['id']."'";
	  $query = mysqli_query($conn,$sql);
	 if($query){
	$row = mysqli_fetch_array($query);
	}
		echo'
		<div class="row">
											<div class="col-md-2"></div>
											<div class="col-md-7">
												<li><b><i class="glyphicon glyphicon-ucser"></i>&nbsp;First Name<span class="pull-right" style="color:red;"><input type="text"  value="'.$row['firstname'].'"class="form-control" id="pname" disabled></span></b></li><br>
																		<li><b><i class="glyphicon glyphicon-usecr"></i>&nbsp;Last Name<span class="pull-right" style="color:red;"><input type="text" value="'.$row['Lastname'].'"class="form-control" id="puid" disabled></span></b></li><br>
																		<li><b><i class="glyphicon glyphicon-macp-marker"></i>&nbsp;Mobile Number<span class="pull-right" style="color:red;"><input type="text" value="'.$row['mobile'].'"class="form-control" id="padress"></span></b></li><br>
																		<li><b><i class="glyphicon glyphicon-phonce-alt"></i>&nbsp;Email<span class="pull-right" style="color:red;"><input type="text"  value="'.$row['Email'].'"class="form-control" id="pcont"></span></b></li><br>										
																		<li><b><i class="glyphicon glyphicon-globce"></i>&nbsp;Address Line 1<span class="pull-right" style="color:red;"><input type="text" value="'.$row['addressline1'].'"class="form-control" id="pemail"></span></b></li><br>
						      											<li><b><i class="glyphicon glyphicon-globce"></i>&nbsp;Address Line 2<span class="pull-right" style="color:red;"><input type="text" value="'.$row['addressline1'].'"class="form-control" id="pebmail"></span></b></li><br>	
																												
											</div>
											<div class="col-md-1">
												<a href="#" id="updateProfile" class="btn btn-info">Update Profile </a>
											</div>
											<div class="col-md-1"></div>
																							
										  </div>
		';
	}
	if(isset($_POST['updateProfile'])){
	   $sql = "UPDATE `users` SET `mobile` = '".$_POST['text3']."', `Email` = '".$_POST['text4']."', `addressline1`= '".$_POST['text5']."', `addressline2` = '".$_POST['text6']."' WHERE `id` = '".$_SESSION['id']."' ";
	  $query = mysqli_query($conn,$sql);
	 if($query){
			echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Update Successful!</strong>';
		}else{
			echo '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed to Update!</strong>';
		}
	}
	
	if(isset($_POST['ADDaETR'])){
	   $sql = "UPDATE `customerorder` SET `AlFullName` = '".$_POST['text5']."',`AlNumber` = '".$_POST['text6']."' WHERE `user_id` = '".$_SESSION['id']."' ";
	  $query = mysqli_query($conn,$sql);
	 if($query){
			echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Success!</strong>';
		}else{
			echo '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed to add!</strong>';
		}
	}
	
	if(isset($_POST['GenReport'])){
	  echo '
	  <div class="col-sm-10 col-sm-offset-1">
		 <h2>Generate Report</h2>
				   <div class="form-group">
				        <div class="col-sm-5">
						         <label class="form-control">FROM</label>
										<input type="date" style="border-top-right-radius:25px;border-top-left-radius:25px;" id="kwame" name="kwame"class="form-control" />
						</div>
						<div class="col-sm-5">
						         <label class="form-control">TO</label>
								 <input type="date" style="border-top-right-radius:25px;border-top-left-radius:25px;" id="kwames" name="kwames" class="form-control"/>
						</div><BR>
						<button type="submit"  style="border-bottom-left-radius:25px;" id="sdates" name="sdates" class="btn btn-success">Generate</button>	
				 </div>
				<div id="showRep">
				
				</div>
		</div>
	  ';
	}
	
	if(isset($_POST['GenReport2'])){
	 $sql = "SELECT * FROM `customerorder` WHERE `dates` BETWEEN '".$_POST['text1']."' AND '".$_POST['text2']."' ORDER by id";
	 $query = mysqli_query($conn,$sql);
	 $result = mysqli_num_rows($query);
	 if($result > o){
		 echo '
		  <div class="row">
					  <div class="col-md-2" style="font-size:15px;color:red;">Ordered By</div>
			          <div class="col-md-2" style="font-size:15px;color:red;">Product Name</div>
					  <div class="col-md-2" style="font-size:15px;color:red;">Image</div>
					  <div class="col-md-1" style="font-size:15px;color:red;">Quantity</div>
					  <div class="col-md-2" style="font-size:15px;color:red;">Ref.ID</div>
					  <div class="col-md-1" style="font-size:15px;color:red;">Date</div>
					  </div><br>
		 ';
		 while($row = mysqli_fetch_array($query)){
			 echo'
			 <div class="row">
					<div class="col-md-2">'.$row['Fullname'].'</div>
					  <div class="col-md-2">'.$row['prod_title'].'</div>
			          <div class="col-md-2"><img class="thumbnail" src="images/'.$row['prod_image'].'" height="50" width="50"/></div>
					  <div class="col-md-1">'.$row['qty'].'</div>
					  <div class="col-md-2">'.$row['ReFid'].'</div>
					  <div class="col-md-1">'.$row['dates'].'</div>
					  </div>
			 ';
		 }
	 }else{
		echo $sql; '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong> No Transaction as at that date</strong>'; 
	 }
	 
	}
	
	
	
	
	
	
	
?>