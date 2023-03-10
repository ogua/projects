<?php
	error_reporting(0);
?>
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
	<?php
		foreach($tithe->result() as $tit){
			
		}		
		$titid = $tit->CARDID;
		
		
		foreach($welfare->result() as $wel){
			
		}
		
		$welfare = $wel->CARDID;
		
	?>
	
    <!-- Main content -->
    <section class="content">     
			<!--- Programme Write Here --->
		<div class="panel panel-info">
			<?php
				$url =  $_SERVER['HTTP_REFERER'];
			?>
			<div class="panel panel-heading"><a href="<?php echo $url; ?>" class="btn bg-navy btn-flat">&larr; &nbsp; Back</a> &nbsp; &nbsp; <a href="<?php echo base_url();?>members/editmember/<?php echo $this->uri->segment(3);?>" class="btn btn-info btn-flat"><i class="fa fa-edit"></i>Edit</a> &nbsp; &nbsp; <a href="#" class="btn btn-danger btn-flat delmember" cid="<?php echo $this->uri->segment(3);?>"><i class="fa fa-trash"></i> Delete</a> &nbsp; &nbsp;
			<?php
			
				if(!empty($titid)){
					echo'
						<a href="'.base_url().'tithe/viewtithe/'.$titid.'" class="btn btn-success btn-flat">View Tithe Information</a>
					';
				}
			?>
			
			&nbsp;
			
			<?php
				if(!empty($welfare)){
					echo'
						<a href="'.base_url().'welfare/viewwelfare/'.$welfare.'" class="btn btn-success btn-flat">View Welfare Information</a>
					';
				}
			?>
			</div>
			<?php
					foreach($memberinfo->result() as $row){
						
					}
				?>
			<div class="panle panle-body" id="printArea">
			<div class="row">
				<div class="col-md-1"></div>
					<div class="col-md-2">
						
					</div>
					<div class="col-md-6">
						<h3 class="text-center"><b>WELCOME TO NEW COVENANT WORSHIP CENTER</b></h3>
						<h4 class="text-center"><b>P.O.BOX TS 367</b></h4>
						<h4 class="text-center"><b>TESHIE - ACCRA - GHANA</b></h4>
					</div>
				</div>
					<hr>
			<div class="col-md-8 col-md-offset-2">	
				<div class="table-responsive">
					<table id="members" class="backimage table table-bordered">
						<tr>
							<td colspan="2"><h2><b><center>Membership Information Details</center></b></h2></td>
						</tr>
						<tr>
							<td colspan="2">
								<?php
									if(!empty($row->Image)){							
									echo '<img src="'.base_url().'asset/images/'.$row->Image.'" width="70" height="70" class="img-thumbnail img-rounded" style="border-radius:100px;">';
									}else{
									echo '<img src="'.base_url().'asset/dist/img/co.png" width="100" height="100" class="img-thumbnail img-rounded" alt="User Image">';
									}
								
								?>
							</td>
						</tr>
						<tr>
							<td><b>FIRST NAME</b></td>
							<td><?php echo  ucwords(strtolower($row->Firstname)); ?></td>
						</tr>
						<tr>
							<td><b>OTHER NAMES</b></td>
							<td><?php echo ucwords(strtolower($row->Othernames)); ?></td>
						</tr>
						<tr>
							<td><b>RESIDENT</b></td>
							<td><?php echo ucwords(strtolower($row->Resident)); ?></td>
						</tr>
						<tr>
							<td><b>AGE</b></td>
							<td><?php echo ucwords(strtolower($row->Age)); ?></td>
						</tr>
						<tr>
							<td><b>MARITAL STATUS</b></td>
							<td><?php echo ucwords(strtolower($row->M_Status)); ?></td>
						</tr>
						<tr>
							<td><b>OCCUPATION</b></td>
							<td><?php echo ucwords(strtolower($row->Occupation)); ?></td>
						</tr>
						<tr>
							<td><b>NAME OF SPOUSE</b></td>
							<td><?php echo ucwords(strtolower($row->nameofspouse)); ?></td>
						</tr>
						<tr>
							<td><b>NO OF CHILDREN</b></td>
							<td><?php echo ucwords(strtolower($row->noofchildren)); ?></td>
						</tr>
						<tr>
							<td><b>NATIONALITY</b></td>
							<td><?php echo ucwords(strtolower($row->nationality)); ?></td>
						</tr>
						<tr>
							<td><b>HOMETOWN</b></td>
							<td><?php echo ucwords(strtolower($row->hometown)); ?></td>
						</tr>
						<tr>
							<td><b>DATE OF BAPTISM</b></td>
							<td><?php echo ucwords(strtolower($row->dateofbaptism)); ?></td>
						</tr>
						<tr>
							<td><b>ADDRESS</b></td>
							<td><?php echo ucwords(strtolower($row->address)); ?></td>
						</tr>
						<tr>
							<td><b>TELEPHONE NUMBER</b></td>
							<td><?php echo ucwords(strtolower($row->Telno)); ?></td>
						</tr>
						<tr>
							<td><b>HOUSE NUMBER</b></td>
							<td><?php echo ucwords(strtolower($row->Houseno)); ?></td>
						</tr>
						<tr>
							<td><b>NAME OF FORMAL CHURCH</b></td>
							<td><?php echo ucwords(strtolower($row->nameoffchrch)); ?></td>
						</tr>
						<tr>
							<td><b>POSITION IN CHURCH</b></td>
							<td><?php echo ucwords(strtolower($row->posinchrch)); ?></td>
						</tr>
						<tr>
							<td><b>WELFARE ID</b></td>
							<td><?php echo ucwords(strtolower($row->Cardid)); ?></td>
						</tr>
						<tr>
							<td><b>TITHE ID</b></td>
							<td><?php echo ucwords(strtolower($row->TitheId)); ?></td>
						</tr>
						<tr>
							<td><b>DATE OF REGISTRATION</b></td>
							<td><?php echo ucwords(strtolower($row->Date)); ?></td>
						</tr>
						<tr>
							<td></td>
							<td>
							<a href="<?php echo base_url();?>members/viewmemberpdf/<?php echo $this->uri->segment(3);?>" id="pdf" class="btn btn-success">Generate Pdf Report</a>
							<a href="#" id="print" class="pull-right btn bg-navy btn-flat" style="margin-right:20px;"><i class="fa fa-print"></i>&nbsp; Print</a></td>
						</tr>
					</table>
				</div>
			</div>	
				<div class="clearfix"></div>
				<hr>
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
			$(document).on("click",".delmember", function(e){
				e.preventDefault();
				var cid = $(this).attr("cid");
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
		});
	</script>

</html>
