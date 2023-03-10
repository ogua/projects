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
			<div class="panel panel-heading">BACKUP DATABASE</div>
			<div class="panle panle-body">
				<div class="row">
    <div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable" data-lobipanel-child-inner-id="wycyGX6K15">
        <div class="panel panel-bd lobidrag lobipanel lobipanel-sortable" data-inner-id="wycyGX6K15" data-index="0">
            <div class="panel-heading ui-sortable-handle">
                <div class="panel-title">
                    <h4>Backup</h4>
                </div>
                <div class="dropdown">
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a data-func="editTitle" data-tooltip="Edit title"><i
                                    class="panel-control-icon ti-pencil"></i><span
                                    class="control-title">Edit title</span></a></li>
                        <li><a data-func="unpin" data-tooltip="Unpin"><i class="panel-control-icon ti-move"></i><span
                                    class="control-title">Unpin</span></a></li>
                        <li><a data-func="reload" data-tooltip="Reload"><i
                                    class="panel-control-icon ti-reload"></i><span
                                    class="control-title">Reload</span></a></li>
                        <li><a data-func="minimize" data-tooltip="Minimize"><i
                                    class="panel-control-icon ti-minus"></i><span class="control-title">Minimize</span></a>
                        </li>
                        <li><a data-func="expand" data-tooltip="Fullscreen"><i
                                    class="panel-control-icon ti-fullscreen"></i><span
                                    class="control-title">Fullscreen</span></a></li>
                        <li><a data-func="close" data-tooltip="Close"><i class="panel-control-icon ti-close"></i><span
                                    class="control-title">Close</span></a></li>
                    </ul>
                    <div class="dropdown-toggle" data-toggle="dropdown"><span
                            class="panel-control-icon glyphicon glyphicon-cog"></span></div>
                </div>
            </div>
            <div class="panel-body">

                <div id="message" class="alert hide"></div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Database Backup</label>
                    <div class="col-sm-9">
                        <i class="fa fa-check text-success"></i> Available
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">File Information</label>
                    <div class="col-sm-9">
                        <ul class="list-unstyled">
                            <li>
                                File Name <strong>my_db_backup.sql</strong>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-4">
                        <form action="#" id="brFrm"
                              method="post" accept-charset="utf-8">
                            <input type="hidden" name="input" value="2">

                            <a href="<?=base_url()?>mail/backup_db"
                               class="btn btn-success w-md m-b-5 btn-block" onclick="return confirm('Are You Sure ? ')"><i
                                    class="fa fa-download"></i> Download</a>


                        </form>
                    </div>
                </div>

            </div>
        </div>
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
			
		});
	</script>

</html>
