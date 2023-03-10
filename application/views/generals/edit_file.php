<div class="row">

    <div class="col-lg-4">
        <div class="box box-default">
            <div class="box-heading">
                <h4 class="box-title">Edit File</h4>
            </div>
            <?php echo form_open('Generals/update_file') ?>
            <div class="box-body">

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group"><label>File Number</label>
                            <input type="hidden" name="file_id" value="<?=$edits->file_id;?>" class="form-control">
                            <input type="text" name="file_no" value="<?=$edits->file_no;?>" class="form-control">
                        </div>
                        <div class="form-group"><label>File Name</label>
                            <input type="text" name="file_name" class="form-control" value="<?=$edits->file_name;?>">
                        </div>
                    </div>            <!-- /.col -->
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" name="Submit" class="btn btn-info">Submit</button>
            </div>

            <?php echo form_close(); ?>
        </div>

    </div>


</div>