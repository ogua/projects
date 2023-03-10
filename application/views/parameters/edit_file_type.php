<div class="row">

    <div class="col-lg-4">
        <div class="box box-default">
            <div class="box-heading">
                <h4 class="box-title">Edit File Type</h4>
            </div>
            <?php echo form_open('Parameters/update_file_type') ?>
            <div class="box-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>File Type Name</label>
                            <input type="hidden" name="department_id" value="<?=$edits->idfiletype;?>" required class="form-control">
                            <input type="text" name="department" value="<?=$edits->filetype;?>" required class="form-control">
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