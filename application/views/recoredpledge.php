<?php error_reporting(0); ?>
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
			<div class="panel panel-heading">RECORD A NEW PLEDGE</div>
			<div class="panle panle-body">
				<div class="col-md-10 col-md-offset-1">
				<?php
					if(!empty($this->session->flashdata('message'))){
						echo '
						<div class="alert alert-info alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Success!</h4>
								'.$this->session->flashdata('message').'
						  </div>
						';	
					}
				?>
					<form method="post" id="recordplege" action="<?php echo base_url(); ?>pledge/addpledge">
						<div class="form-group">
							<label class="control-label">Select Date of Pledge Saved Earlier</label>	
							<select class="form-control"  name="table" id="table">
							<option value="<?php 
												if(!empty($this->session->flashdata('table'))){
													echo $this->session->flashdata('table');
												}else{
													echo set_value('table');
												}
							 ?>"><?php
								if(!empty($this->session->flashdata('table'))){
													echo $this->session->flashdata('table');
												}else{
													echo set_value('table');
												}
							 ?></option>
								<?php
									foreach($tables->result_array() as $row){
										echo'<option value="'.$row['Tables_in_ncwc_pledge'].'">'.$row['Tables_in_ncwc_pledge'].'</option>';
									}
								?>
							</select>
							<span class="help-block error"><?php echo form_error('table'); ?></span>
						</div>
						<div class="form-group">
							<label class="control-label">Reason For The Pledge</label>
							<textarea cols="4" rows="4" name="reason" class="form-control"><?php if(!empty($this->session->flashdata('reasons'))){echo $this->session->flashdata('reasons');}else{echo set_value('reason');}?></textarea>
							<span class="help-block error"><?php echo form_error('reason'); ?></span>
						</div>
						<div class="form-group">
							<label class="control-label">Fullname</label>
							<input type="text" class="form-control" name="fname" value="<?php echo set_value('fname') ?>">
							<span class="help-block error"><?php echo form_error('fname'); ?></span>
						</div>
						<div class="form-group">
							<label class="control-label">Amount Pledge (GH &cent;)</label>
							<input type="text" class="form-control" name="ampledge" value="<?php echo set_value('ampledge') ?>">
							<span class="help-block error"><?php echo form_error('ampledge'); ?></span>
						</div>
						<div class="form-group">
							<label class="control-label">Amount Paid (GH &cent;)</label>
							<input type="text" class="form-control" name="ampaid" value="<?php echo set_value('ampaid') ?>">
							<span class="help-block error"><?php echo form_error('ampaid'); ?></span>
						</div>
						<hr>
							<ul class="list-inline pull-right">
								<li><input type="submit" name="add" value="Record Pledge" class="btn bg-navy"></li>
								<!--<li> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
									View Pledge Information
								  </button>
								</li>-->
								<li> <a href="#" id="getplede" class="btn btn-info">
									View Pledge Information
								  </a>
								</li>
							</ul>							
							<div class="clearfix"></div>
						<hr>
					</form>
				</div>
				<div class="clearfix"></div>			
			</div>
		</div>
			<div class="clearfix"></div>
			
		<div id="modelhere"></div>
			
			
			
			
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
			$(document).on("click","#getplede", function(e){
				e.preventDefault();
				var table = $("#table").val();
				if(table == ""){
					alert("Table Cant Be Empty");
					return;
				}				
				//alert(table);
				$.ajax({
					url: '<?php echo base_url(); ?>pledge/getpledgeinfo',
					type: 'POST',
					data: {table: table},					
					success: function(data){
						//alert(data);
						//return;
					   $("#modelhere").html(data);
					   $("#modal-danger").modal('show');
					}
				});
			});
	
		});
	</script>

</html>
