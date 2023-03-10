<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
   <?php
	include('includes/header.php');
   ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!----- Start of header  ----->
	<?php
	 include('includes/header2.php');
    ?>
  
  <!----- End of header 2 ----->
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
	<?php
	 include('includes/menu.php');
   ?>
    <!-- /.sidebar -->
  </aside>
   
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
           NEW COVENANT WORSHIP CENTER
        <small> <b></b> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>welcome/index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">     
			<!--- Programme Write Here --->
		<div id="printArea" class="panel panel-info">
			<div class="panel panel-heading">All Members Of Ncwc</div>
			<div class="panle panle-body">
			<div id="displaymsg"></div>
			 <div class="table-responsive">
				<table id="member" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Pic</th>
							<th>Full name</th>
							<th>Gender</th>
							<th>Resident</th>
							<th>Age</th>
							<th>Marital Status</th>
							<th>Active Status</th>
							<th>Group Status</th>
							<th>View</th>
							<th>Edit</th>
							<th>Delect</th>
						</tr>
					</thead>
					<tbody>
				<?php
				 foreach($members->result_array() as $row){
					 ?>
					 <tr>
						<td><?php
							if(!empty($row['Image'])){							
							echo '<img src="'.base_url().'asset/images/'.$row['Image'].'" width="50" height="100" class="img-thumbnail">';
							}else{
							echo 	'<img src="'.base_url().'asset/dist/img/co.png" width="50" height="100" class="img-thumbnail" alt="User Image">';
							}
						?></td>
						<td><?php echo $row['Firstname'] .' '.$row['Othernames']; ?></td>
						<td><?php echo $row['Gender']; ?></td>
						<td><?php echo $row['Resident']; ?></td>
						<td><?php echo $row['Age']; ?></td>
						<td><?php echo $row['M_Status']; ?></td>
						<td><?php
							echo'<select class="form-control" data-cid="'.$row['ID'].'" id="status">
							
					<option value="">Update Status</option>	
					<option value="1">Active Member</option>
					<option value="0">Non Active Member Now</option>
				</select>';
						?>
						</td>
						<td><?php
							echo'
							<div class="form-group">
								<select name="denomin" data-cid="'.$row['ID'].'" class="form-control" id="group_status">
									<option value="'.$row['posnow'].'">'.$row['posnow'].'</option>
									<option value="Usher">Usher</option>
									<option value="Choristers">Choristers</option>
									<option value="Instrumentalist">Instrumentalist</option>
									<option value="Media">Media</option>
								</select>
							</div>														
						 ';
						?>
						</td>
						<td><?php
							echo '<a class="btn bg-navy" href="'.base_url().'members/viewmember/'.$row['ID'].'">
								<i class="fa fa-eye"></i> View
							  </a>';
						?>
						</td>
						<td><?php
							echo '<a class="btn btn-info" href="'.base_url().'members/editmember/'.$row['ID'].'">
								<i class="fa fa-edit"></i> Edit
							  </a>';
						?>
						</td>
						<td><?php
							echo'<a class="btn btn-danger delmember" cid="'.$row['ID'].'" href="#">
								<i class="fa fa-trash"></i> Delect
							  </a>'; 
						?>
						</td>
					</tr>
					 <?php
				 }
					
				?>
				<tbody>
				</table>
				<hr>
				<a href="<?php echo base_url();?>members/pdfallmembers" id="pdf" class="btn btn-success">Generate Report</a>
			 </div>
			 </div>
			</div>
		</div>
			<div class="clearfix"></div>
			
			<!--- End Programme Write Here --->          
          <!-- /.box -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php
	include('includes/footerjs.php');
?>
<!-- jQuery Script-->

	<script>
		$('document').ready(function(){			
			var dataTable = $('#members').DataTable({  
				   "processing":true,  
				   "serverSide":true,  
				   "order":[],  
				   "ajax":{  
						url:"<?php echo base_url() . 'members/fetch_user'; ?>",  
						type:"POST"  
				   },  
				   "columnDefs":[  
						{  
							 "targets":[0, 3, 4],  
							 "orderable":false,  
						},  
				   ],  
			  }); 

				var dataTable = $('#member').DataTable(); 	
			
			
			$(document).on("click",".delmember", function(e){
				e.preventDefault();
				var cid = $(this).attr("cid");
				//alert(cid);
				if(confirm("Are You Sure You Want To Delete This Information")){
					$.ajax({
						url: '<?php echo base_url() ?>members/delmember/'+cid,
						success: function(data){
							alert(data);
							window.location.href="<?php echo base_url() ?>members/";
							//dataTable.ajax.reload();
						}						
					});
				}
			})
			
			
			$(document).on("change","#status", function(e){
				e.preventDefault();
				var cid = $(this).data("cid");
				var statu = $(this).val();
				//alert(cid + statu);
				//return;
				if(confirm("Are You Sure You Want To Update This Information")){
					$.ajax({
						url: '<?php echo base_url() ?>members/statusupdate',
						method: 'POST',
						data: {cid: cid, statu: statu},
						success: function(data){
							alert("Status Updated Successfully");
							//alert(data);
							window.location.href="<?php echo base_url() ?>members/";
							//dataTable.ajax.reload();
						}						
					});
				}
			});
			
			$(document).on("change","#statuses", function(e){
				e.preventDefault();
				var cid = $(this).data("cid");
				var statu = $(this).val();
				//alert(cid + statu);
				//return;
				if(confirm("Are You Sure You Want To Update This Information")){
					$.ajax({
						url: '<?php echo base_url() ?>members/statusupdate2',
						method: 'POST',
						data: {cid: cid, statu: statu},
						success: function(data){
							alert("Status Updated Successfully");
							//alert(data);
							window.location.href="<?php echo base_url() ?>members/";
							//dataTable.ajax.reload();
						}						
					});
				}
			});
			
			
			
		});
	</script>

</html>
