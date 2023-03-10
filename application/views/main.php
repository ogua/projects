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
			<div class="panel panel-heading">Register New Member</div>
			<div class="panle panle-body">
				<?php
					if(!empty($this->session->flashdata('message'))){
						echo '
						<div class="alert alert-info alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Success!</h4>
								'.$this->session->flashdata('message').'
						  </div>
						';					
					}if(!empty($this->session->flashdata('messages'))){
						echo '
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-ban"></i> Failed!</h4>
								'.$this->session->flashdata('messages').'
						  </div>
						';					
					}
				?>
				<form method="post" action="<?php echo base_url(); ?>welcome/registermember" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-3" style="margin-left:10px;">
							<img src="" id="imgs" height="200" width="200" class="">
						</div>
						<div class="col-md-7">
							<div class="form-group">
								<label class="control-label">Pic</label>	
								<input type="file" class="form-control" name="InputFile" id="InputFile" value="<?php echo set_value('InputFile') ?>">
								<span class="help-block error"><?php echo form_error('InputFile'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Surname</label>	
								<input type="text" class="form-control" name="fname" id="fname" value="<?php echo set_value('fname') ?>">
								<span class="help-block error"><?php echo form_error('fname'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Othernames</label>	
								<input type="text" class="form-control" name="onames" id="onames" value="<?php echo set_value('onames') ?>">
								<span class="help-block error"><?php echo form_error('onames'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Marital Status</label>	
								<select name="mstatus" class="form-control">
									<option value="<?php echo set_value('mstatus') ?>"><?php echo set_value('mstatus') ?></option>
									<option value="Widow">Widow</option>
									<option value="Married">Married</option>
									<option value="Divorced">Divorced</option>
									<option value="Single">Single</option>
								</select>
								<span class="help-block error"><?php echo form_error('mstatus'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Occupation</label>	
								<input type="text" class="form-control" name="occupation" id="occupation" value="<?php echo set_value('occupation') ?>">
								<span class="help-block error"><?php echo form_error('occupation'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Date of Birth</label>	
								<input type="date" class="form-control" name="dateofbirth" id="dateofbirth" value="<?php echo set_value('dateofbat') ?>">
								<span class="help-block error"><?php echo form_error('dateofbirth'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Age</label>	
								<input type="text" class="form-control" name="age" id="" value="<?php echo set_value('age') ?>">
								<span class="help-block error"><?php echo form_error('age'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Gender</label>	
								<select name="gender" class="form-control">
									<option value="<?php echo set_value('gender') ?>"><?php echo set_value('gender') ?></option>
									<option value="Male">Male</option>
									<option value="FeMale">FeMale</option>
								</select>
								<span class="help-block error"><?php echo form_error('gender'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Residence</label>	
								<input type="text" class="form-control" name="residence" id="residence" value="<?php echo set_value('residence') ?>">
								<span class="help-block error"><?php echo form_error('residence'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Name Of Spouce</label>	
								<input type="text" class="form-control" name="nameofspouse" id="nameofspouse" value="<?php echo set_value('nameofspouse') ?>">
								<span class="help-block error"><?php echo form_error('nameofspouse'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Number Of Children</label>	
								<input type="text" class="form-control" name="noofchildern" id="noofchildern" value="<?php echo set_value('noofchildern') ?>">
								<span class="help-block error"><?php echo form_error('noofchildern'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Nationality</label>	
								<input type="text" class="form-control" name="nation" id="nation" value="GHANAIAN">
								<span class="help-block error"><?php echo form_error('nation'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">HomeTown</label>	
								<input type="text" class="form-control" name="hometown" id="hometown" value="<?php echo set_value('hometown') ?>">
								<span class="help-block error"><?php echo form_error('hometown'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Date of Baptism</label>	
								<input type="date" class="form-control" name="dateofbat" id="dateofbat" value="<?php echo set_value('dateofbat') ?>">
								<span class="help-block error"><?php echo form_error('dateofbat'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Address</label>	
								<textarea rows="4" cols="4" class="form-control" name="address"><?php echo set_value('address') ?></textarea>
								<span class="help-block error"><?php echo form_error('address'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Mobile Number</label>	
								<input type="text" class="form-control" name="telnum" id="telnum" value="<?php echo set_value('telnum') ?>">
								<span class="help-block error"><?php echo form_error('telnum'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">House Number</label>	
								<input type="text" class="form-control" name="hsenum" id="hsenum" value="<?php echo set_value('hsenum') ?>">
								<span class="help-block error"><?php echo form_error('hsenum'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Formal Church</label>	
								<input type="text" class="form-control" name="fchurch" id="fchurch" value="<?php echo set_value('fchurch') ?>">
								<span class="help-block error"><?php echo form_error('fchurch'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Position in Formal Church</label>	
								<input type="text" class="form-control" name="posc" id="posc" value="<?php echo set_value('posc') ?>">
								<span class="help-block error"><?php echo form_error('posc'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Join Any Denomination</label>	
								<select name="denomin" class="form-control">
									<option value="<?php echo set_value('denomin') ?>"><?php echo set_value('denomin') ?></option>
									<option value="Not Now">Not Now</option>
									<option value="Usher">Usher</option>
									<option value="Choristers">Choristers</option>
									<option value="Instrumentalist">Instrumentalist</option>
									<option value="Media">Media</option>
								</select>
								<span class="help-block error"><?php echo form_error('denomin'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Welfare ID</label>	
								<input type="text" class="form-control" name="welid" id="welid" value="<?php echo set_value('welid') ?>">
								<span class="help-block error"><?php echo form_error('welid'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Tithe ID</label>	
								<input type="text" class="form-control" name="titleid" id="titleid" value="<?php echo set_value('titleid') ?>">
								<span class="help-block error"><?php echo form_error('titleid'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Why NCWC ?</label>	
								<input type="text" class="form-control" name="ncwy" id="ncwy" value="<?php echo set_value('ncwy') ?>">
								<span class="help-block error"><?php echo form_error('ncwy'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Greatest Desire</label>	
								<input type="text" class="form-control" name="desir" id="desir" value="<?php echo set_value('desir') ?>">
								<span class="help-block error"><?php echo form_error('desir'); ?></span>
							</div>
							<hr>
							<input type="submit" name="add" value="Add New Member" class="btn bg-navy pull-right">
							<div class="clearfix"></div>
							<hr>
							
						</div>
						
					</div>
				</form>
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
			
		});
	</script>

</html>
