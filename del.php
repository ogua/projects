  <?php
			  include('db.php');
			  $sqli3 = "SELECT * FROM `employee`";
			  $query3 = mysqli_query($conn,$sqli3);
			  if($query3){
				  echo'
				  <div class="table-responsive" >
				 <table class="table table-striped"  cellpadding="10" border="1" style="margin-left:10px; ">
	            <tr>
			   <th style="color:#5cb85c;font-weight:bold;">FIRSTNAME</th>
			   <th style="color:#5cb85c;font-weight:bold;">OTHER NAMES</th>
				<th style="color:#5cb85c;font-weight:bold;">DEPARTMENT</th>
				<th style="color:#5cb85c;font-weight:bold;">DEL</th>
		   <tr>
		   <tbody>
				  ';
				  while($row = mysqli_fetch_array($query3)){
					  echo'
					   <tr>
				    <td style="color:#42327a;">'.$row['firstname'].'</td> 
					 <td style="color:#d8bc35;">'.$row['Lastname'].'</td>
                     <td style="color:#42327a;">'.$row['Department'].'</td> 
					 <td style="color:#d8bc35;"><a href="#" cid="'.$row['id'].'" class="delekey btn btn-danger" ><span class="glyphicon glyphicon-trash"></span></a></td> 					 
				<tr>
					  ';
				  }
				  echo'
				     </tbody>
	   </table>		  
    </div>
				  ';
			  }else{
				  
			  }
	         
			   
		   
	          ?>