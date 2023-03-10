<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM box-->
        <div class="box">
            <div class="box-title">
               
						<span class="tools">
							<a href="javascript:;" class="icon-chevron-down"></a>
						</span>
            </div>
            <div class="box-body">
                <!-- BEGIN FORM-->

                <?php echo form_open('reports/getReports', array('class' => "form-horizontal form-bordered form-validate", 'method' => 'post')) ?>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label">START DATE</label>
                        <input type="text" data-ad-format="" class="form-control datepicker" autocomplete="off"
                               name="start_date">
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label">END DATE</label>
                        <input type="text" class="form-control datepicker" name="end_date" autocomplete="off">
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label">ACTION</label>
                        <select class="form-control" name="reportingAction">
                            <option>SELECT OPTION</option>
                            <option value="1">RECEIVED MAILS</option>
                            <option value="2">RETURNED MAILS</option>
                            <option value="3">FORWARDED MAILS</option>
                            <option value="4">FILED LETTERS</option>
                            <option value="5">ISSUED FILES</option>
                            <option value="6">RETURNED FILES</option>
                            <option value="7">DISPATCHED LETTERS</option>

                        </select>
                    </div>
                </div>
                <br>
                <div class="form-actions">
                    <input type="hidden" name="Action" value="Search">
                    <button type="submit" class="btn btn-success">Show Report</button>
                    <button type="reset" class="btn">Cancel</button>
                </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END SAMPLE FORM box-->
    </div>
</div>

<script type="text/javascript">
    function print_invoice(printableArea) {

        var table = $('#dataTables-example').DataTable();
        table.destroy();

        //$('#dataTables-example').attr('id','none');
        var printContents = document.getElementById(printableArea).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        //$('table').attr('id','dataTables-example');
        location.reload(document.body.innerHTML = originalContents);
        //document.body.innerHTML = originalContents;
    }
</script>