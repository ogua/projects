<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">File Movement Edit</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('File_movement/updateFile', array('method' => 'post')); ?>
                <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <!-- /.form-group -->
                <div class="form-group">
                    <input type="hidden" name="file_m_id" value="<?= $edits['file_m_id']; ?>" class="form-control">
                    <label>File No & File Name</label>
                    <select class="form-control select2" name="file_no" id="file_no" required style="width: 100%;">
                        <option value="<?=$edits['file_no'];?>/<?=$edits['name_of_file'];?>"><?=$edits['file_no'];?> / <?=$edits['name_of_file'];?></option>
                        <?php foreach ($files as $file) { ?>
                            <option value="<?=$file['file_id']?>"><?=$file['file_no'];?> / <?=$file['file_name'];?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="form-group">
                    <label>To Whom Given</label>
                    <input type="text" name="file_given_to" value="<?=$edits['file_given_to'];?>"  required placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <label>Job Title</label>
                    <input type="text" name="job_title" value="<?=$edits['job_title'];?>" required placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <label>Telephone No</label>
                    <input type="text" name="telephone_no" value="<?=$edits['telephone_no'];?>" required placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <label>Number of Letters</label>
                    <input type="text" name="number_of_letters" value="<?=$edits['number_of_letters'];?>" required placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <label>Number of Days to Return</label>
                    <input type="text" name="returning_days" value="<?=$edits['returning_days'];?>" required placeholder="" class="form-control">
                </div>


                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks"><?=$edits['remarks'];?></textarea>
                </div>

            </div>
            <!-- /.col -->

        </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" name="Submit" class="btn btn-info">Submit</button>
    </div>
    <?php echo form_close(); ?>
</div>
<!-- /.box -->



<script>
    function getEmployees() {

        var dept = $('#iddepartment').val();
        var csrf_test_name = $("input[name=csrf_test_name]").val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>index.php/Letter/getEmployees',
            dataType: 'html',
            data: {
                dept: dept,csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
                $("#idemployee").html(result1);
            }
        });
    }


</script>
