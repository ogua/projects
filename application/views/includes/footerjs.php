<div class="row" id="loading">
	<div id="spinh">
	<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="box box-danger">
				<div class="box-header">
				  <h3 class="box-title">Balance Checking</h3>
				</div>
				<div class="box-body msgs">
				  Loading.. Please Wait
				</div>
				<!-- /.box-body -->
				<!-- Loading (remove the following to stop the loading)-->
				<div class="overlay">
				  <i class="fa fa-refresh fa-spin"></i>
				</div>
				<!-- end loading -->
          </div>
		</div>
	<div class="col-md-4"></div>
	</div>
</div>
<div id="messagehere"></div>

<script src="<?php echo base_url()?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>asset/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript">
var baseurl = '<?php echo base_url();?>';
</script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url()?>asset/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url()?>asset/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()?>asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>asset/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>asset/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()?>asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url()?>asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url()?>asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()?>asset/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>asset/dist/js/demo.js"></script>
<!-- Page Print -->
<script src="<?php echo base_url()?>asset/js/jquery.PrintArea.js"></script>
<script src="<?php echo base_url()?>asset/js/action.js?newversion"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- typehead -->
<script src="<?php echo base_url()?>asset/js/bootstrap3-typeahead.min.js"></script>
<script src="<?php echo base_url()?>asset/js/handlebars.js"></script>
<script src="<?php echo base_url()?>asset/js/typeahead.bundle.js"></script>

<!----pace --->
 <link rel="stylesheet" href="<?php echo base_url()?>asset/bower_components/PACE/pace.js">

<script>
	$("#example").DataTable({
			'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': false,
            'autoWidth': true
	});
	
	    paceOptions = {
        ajax: true,
        document: true,
        eventLag: false
        };
</script>
</body>