<?php if($this->session->flashdata('success')){?>

    <div class="alert alert-success"><?=$this->session->flashdata('success');?></div>
<?php } ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Outgoing Mail Edit Form</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('Outgoing_mails/updateFile',array('method'=>'post'));?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Sent To</label>
                    <input type="hidden" name="om_id" value="<?=$edits['om_id'];?>" placeholder="" class="form-control">
                    <input type="text" name="sent_to" value="<?=$edits['sent_to'];?>" required placeholder="" class="form-control">
                </div>


                <div class="form-group">
                    <label>Date of Letter</label>
                    <input type="text" name="date_of_letter" value="<?=date('d-m-Y',strtotime($edits['date_of_letter']));?>" id="datepicker" class="form-control">
                </div>
                <div class="form-group">
                    <label>Reference No</label>
                    <input type="text" name="reference_number" class="form-control" value="<?=$edits['reference_number'];?>">
                </div>
                <div class="form-group">
                    <label>Subject</label>
                    <textarea class="form-control" name="subject" required><?=$edits['subject'];?></textarea>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Brought By Contact #</label>
                    <input type="text" class="form-control" value="<?=$edits['cell_no'];?>" name="cell_no">
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Sending Department</label>
                    <input class="form-control" value="<?=$edits['sending_dept'];?>" name="iddepartment" id="iddepartment" required
                           style="width: 100%;">

                </div>
                <div class="form-group">
                    <label>Position of Sender</label>
                    <input class="form-control" value="<?=$edits['position'];?>" name="iddesignation" id="iddesignation" name="iddesignation" required                           style="width: 100%;">

                </div>

                <div class="form-group">
                    <label>Brought By</label>
                    <input class="form-control" value="<?=$edits['brought_by'];?>" name="idemployee" id="idemployee" required
                           style="width: 100%;">
                </div>
 
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks"><?=$edits['remarks'];?> </textarea>
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
