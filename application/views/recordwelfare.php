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
			<div class="panel panel-heading">Record Welfare</div>
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
				<div class="col-md-8 col-md-offset-2">
					<form method="POST" action="<?php echo base_url()?>welfare/addwelfare">
							<div class="form-group">
								 	 <input list="employeeid" name="findlist" class="form-control" id="employeesearch" placeholder="Search Here....">
							 </div>
							 <div id="listmembers"></div>
					        <div class="form-group">
								<label class="control-label">Welfare ID / Page ID</label>	
								<input type="text" class="form-control" name="titheid" id="titheid" value="<?php echo set_value('titheid') ?>">
								<span class="help-block error"><?php echo form_error('titheid'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Firstname</label>	
								<input type="text" class="form-control" name="fname" id="fname" value="<?php echo set_value('fname') ?>">
								<span class="help-block error"><?php echo form_error('fname'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Othernames</label>	
								<input type="text" class="form-control" name="onames" id="onames" value="<?php echo set_value('onames') ?>">
								<span class="help-block error"><?php echo form_error('onames'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Amount (GH &cent;)</label>	
								<input type="text" class="form-control" name="amount" id="amount" value="<?php echo set_value('amount') ?>">
								<span class="help-block error"><?php echo form_error('amount'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Month Paid</label>	
								<select class="form-control"  name="mnth" id="mnth">
																<option value="<?php echo strtoupper(date('M')); ?>"><?php echo strtoupper(date('M')); ?></option>
																<option value="JAN">JAN</option>
																<option value="FEB">FEB</option>
																<option value="MAR">MAR</option>
																<option value="APR">APR</option>
																<option value="MAY">MAY</option>
																<option value="JUN">JUN</option>
																<option value="JUL">JUL</option>
																<option value="AUG">AUG</option>
																<option value="SEP">SEP</option>
																<option value="OCT">OCT</option>
																<option value="NOV">NOV</option>
																<option value="DEC">DEC</option>
														</select>

								<span class="help-block error"><?php echo form_error('mnth'); ?></span>
							</div>
							<div class="form-group">
								<label class="control-label">Year Paid</label>	
								<select class="form-control"name="yrs" id="yrs">
																<option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
																<option value="2010">2010</option>
																<option value="2011">2011</option>
																<option value="2012">2012</option>
																<option value="2013">2013</option>
																<option value="2014">2014</option>
																<option value="2016">2016</option>
																<option value="2017">2017</option>
																<option value="2018">2018</option>
																<option value="2019">2019</option>
																<option value="2020">2020</option>
																<option value="2021">2021</option>
																<option value="2022">2022</option>
														</select>
								<span class="help-block error"><?php echo form_error('yrs'); ?></span>
							</div>
							<hr>
							<input type="submit" name="add" value="Add New Welfare" class="btn bg-navy pull-right">
							<div class="clearfix"></div>
							<hr>
						</div>	
						<div class="clearfix"></div>
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
$(document).ready(function(){
  /*var sample_data = new Bloodhound({
   datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
   queryTokenizer: Bloodhound.tokenizers.whitespace,
   prefetch:'<?php echo base_url(); ?>memebers/fetch',
   remote:{
    url:'<?php echo base_url(); ?>memebers/fetch/%QUERY',
    wildcard:'%QUERY'
   }
  });
  

  $('#prefetch .typeahead').typeahead(null, {
   name: 'sample_data',
   display: 'name',
   source:sample_data,
   limit:10,
   templates:{
		'<div class="row"><div class="col-md-2" style="padding-right:5px; padding-left:5px;"><img src="asset/images/{{image}}" width="50" height="100" class="img-thumbnail" width="48"></div><div class="col-md-10" style="padding-right:5px; padding-left:5px;">{{name}}</div></div>')
   }
  });*/
  
  
  
		$(document).on("keyup","#employeesearch",function(e){
			e.preventDefault();
			var employeeids = $(this).val();
			var lenths =  employeeids.length;
			if(lenths > 1){
				$.ajax({
					url: '<?php echo base_url(); ?>members/fetchmembers',
					method: 'POST',
					data: {employeeids:employeeids},
					success: function(data){
						//alert(data);
						$("#listmembers").html(data);			
					}
			   });
				
			}
		});
		
      $("#employeesearh").keyup(function(){
			var employeeids = $(this).val();
				$.ajax({
					url: '<?php echo base_url(); ?>members/fetchmembers',
					method: 'POST',
					data: {employeeids:employeeids},
					success: function(data){
						$("#listmembers").html(data);			
					}
			   });
		});
  
  
	    $("input[name='findlist']").on("input", function(e){
			e.preventDefault();
			var seletd = $(this).val();
			var kkk = seletd.length;
			if(kkk > 7){
				$.ajax({
					url: '<?php echo base_url(); ?>members/fellinputs',
					method: 'POST',
					dataType: 'json',
					data: {seletd:seletd},
					success: function(data){
						if(data.result){
							$("#titheid").val(data.titeid);
							$("#fname").val(data.firstname);	
							$("#onames").val(data.othernames);
						}else{
							alert(data.failed);
							$("#titheid").val("");
							$("#fname").val("");	
							$("#onames").val("");
						}
						
									
					}
			   });	
			}
		});
  
});
</script>

</html>
