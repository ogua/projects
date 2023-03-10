<div class="row">

    <div class="col-lg-4">
        <div class="box box-default">
            <div class="box-heading">
                <h4 class="box-title">Edit File Status</h4>
            </div>
            <?php echo form_open('Parameters/update_file_status') ?>
            <div class="box-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>File Status Name</label>
                            <input type="hidden" name="department_id" value="<?=$edits->idfilestatus;?>" required class="form-control">
                            <input type="text" name="department" value="<?=$edits->filestatus;?>" required class="form-control">
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" name="Submit" class="btn btn-info">Submit</button>
            </div>

            <?php echo form_close(); ?>
        </div>

    </div>


</div>