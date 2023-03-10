<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Edit File</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('Letter/updateFile', array('method' => 'post')); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="hidden" value="<?=$edits['main_id'];?>" name="main_id">
                    <label>File Type</label>
                    <select class="form-control select2" name="file_type" required style="width: 100%;">
                        <option selected="selected">Select File Type</option>
                        <?php foreach ($fileTypes as $fileType) { ?>
                            <option <?php echo $edits['doc_id'] == $fileType['idfiletype'] ? 'selected' : 'OK'; ?>
                                value="<?= $fileType['idfiletype']; ?>"><?= $fileType['filetype']; ?></option>
                        <?php } ?>

                    </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Date On Letter</label>
                    <input type="text" name="date_on_letter" id="datepicker"
                           value="<?= date("d-m-Y", strtotime($edits['date_on_letter'])); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Reference No</label>
                    <input type="text" name="reference_no" value="<?= $edits['reference_no']; ?>" required
                           placeholder="" class="form-control">
                </div>


                <!-- /.form-group -->
                <div class="form-group">
                    <label>Subject</label>
                    <textarea class="form-control" name="subject" required> <?= $edits['subject']; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Flag</label>
                    <select class="form-control select2" name="flag" required style="width: 100%;">
                        <option selected="selected">Select Flag</option>
                        <?php foreach ($flags as $flag) { ?>
                            <option <?php echo $edits['flag_id'] == $flag['idflag'] ? 'selected' : 'OK'; ?>
                                value="<?= $flag['idflag']; ?>"><?= $flag['flag']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Contact No of Organization</label>
                    <input type="text" class="form-control" value="<?= $edits['cell_no']; ?>" name="telephone_no">
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">

                <div class="form-group">
                    <label>Brought By</label>
                    <input type="text" name="person_name" value="<?= $edits['person_name']; ?>" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Brought by Contact Number</label>
                    <input type="text" name="person_contact" value="<?=$edits['person_contact'];?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>To Whom Received</label>
                    <input type="text" name="for" class="form-control" value="<?=$edits['from'];?>">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks"><?= $edits['remarks']; ?></textarea>
                </div>
                <!-- /.form-group -->
 <div class="form-group">
                    <label>Scan Copy</label>
                    <input  type="file" class="form-control" name="file_picture">
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

