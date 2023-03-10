<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">File Movement</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('File_movement/create_file_movement', array('method' => 'post')); ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label>Department</label>
                    <select class="form-control select2" name="iddepartment" id="iddepartment" onchange="getEmployees()" required
                            data-placeholder="Select a State"
                            style="width: 100%;">
                        <option selected="selected">Select Department</option>
                        <?php foreach ($departments as $department) { ?>
                            <option
                                value="<?= $department['iddepartment']; ?>"><?= $department['department']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Employee</label>
                    <select class="form-control select2" name="idemployee" id="idemployee" required style="width: 100%;">
                        <option selected="selected">Select Employee</option>
                        <?php //foreach ($employees as $employee) { ?>

                        <?php //} ?>

                    </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>File No</label>
                    <input type="text" name="file_no" class="form-control">
                </div>
                <div class="form-group">
                    <label>Name Of FIle</label>
                    <input type="text" name="name_of_file" class="form-control">
                </div>
                <div class="form-group">
                    <label>Number of Letters</label>
                    <input type="text" name="number_of_letters" required placeholder="" class="form-control">
                </div>


                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks" required></textarea>
                </div>

            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->

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
