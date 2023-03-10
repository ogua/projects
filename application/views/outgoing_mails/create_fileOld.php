<?php if($this->session->flashdata('success')){?>

    <div class="alert alert-success"><?=$this->session->flashdata('success');?></div>
<?php } ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Outgoing Mail Form</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('Outgoing_mails/createOutgoingMail',array('method'=>'post'));?>
        <div class="row">
            <div class="col-md-6">
 <div class="form-group">
                    <label>Date Received for Dispatch</label>
                    <input type="text" name="date_received" required class="form-control datepicker">
                </div>
                <div class="form-group">
                    <label>Sent To</label>
                    <input type="text" name="sent_to" required placeholder="" class="form-control">
                </div>


                <div class="form-group">
                    <label>Date of Letter</label>
                    <input type="text" name="date_of_letter" id="datepicker" class="form-control">
                </div>
                <div class="form-group">
                    <label>Reference No</label>
                    <input type="text" name="reference_number" class="form-control">
                </div>
                <div class="form-group">
                    <label>Subject</label>
                    <textarea class="form-control" name="subject" required></textarea>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Brought By Contact #</label>
                    <input type="text" class="form-control" name="cell_no">
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Sending Department</label>
                    <input class="form-control" name="iddepartment" id="iddepartment" required
                            style="width: 100%;">

                </div>
                <div class="form-group">
                    <label>Position of Sender</label>
                    <input class="form-control" name="iddesignation" id="iddesignation" name="iddesignation" required                           style="width: 100%;">

                </div>

                <div class="form-group">
                    <label>Brought By</label>
                    <input class="form-control" name="idemployee" id="idemployee" required
                            style="width: 100%;">
                </div>

  <div class="form-group">
                    <label>Registry No</label>
                    <input class="form-control" name="registry_no" id="registry_no" required
                           style="width: 100%;">
                </div>

                <!-- /.form-group -->
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks"> </textarea>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Scan Copy</label>
                    <input  type="file" class="form-control" name="file_picture">
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" name="Submit" class="btn btn-info">Submit</button>
    </div>
    <?php echo form_close();?>
</div>
<!-- /.box -->

<script>
    function getEmployees() {

        var dept = $('#iddepartment').val();
        var desg = $('#iddesignation').val();
        var csrf_test_name = $("input[name=csrf_test_name]").val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>index.php/Outgoing_mails/getEmployees',
            dataType: 'html',
            data: {
                dept: dept, desg: desg,csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
                $("#idemployee").html(result1);
            }
        });
    }
    </script>
