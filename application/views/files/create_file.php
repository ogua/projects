<?php if($this->session->flashdata('success')){?>

    <div class="alert alert-success"><?=$this->session->flashdata('success');?></div>
<?php } ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Add New Incoming Mail</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('Letter/new_file',array('method'=>'post'));?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Mail Type</label>
                    <select class="form-control select2" name="file_type" required style="width: 100%;">
                        <option selected="selected">Select File Type</option>
                        <?php foreach ($fileTypes as $fileType) {?>
                            <option value="<?=$fileType['idfiletype'];?>"><?=$fileType['filetype'];?></option>
                        <?php } ?>

                    </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Date On Letter/Mail</label>
                    <input type="text" name="date_on_letter" id="datepicker" class="form-control">
                </div>
               
                <div class="form-group">
                    <label>Reference Number</label>
                    <input type="text" name="reference_no" required placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <label>Receive Date</label>
                    <input type="text" name="received_date"  class="form-control datepicker">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Subject</label>
                    <textarea class="form-control" name="subject" required></textarea>
                </div>

                <div class="form-group">
                    <label>Flag</label>
                    <select class="form-control select2" name="flag" required style="width: 100%;">
                        <option selected="selected">Select Flag</option>
                        <?php foreach ($flags as $flag) {?>
                            <option value="<?=$flag['idflag'];?>"><?=$flag['flag'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <!-- /.form-group -->
                
            </div>
            <!-- /.col -->
            <div class="col-md-6">

                <div class="form-group">
                    <label>Brought by</label>
                    <input type="text" name="person_name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Brought by Contact Number</label>
                    <input type="text" name="person_contact" class="form-control">
                </div>
                <div class="form-group">
                    <label>To Whom Received</label>
                    <input type="text" name="for" class="form-control">
                </div>
                <div class="form-group">
                    <label>To Whom Received Contact Number</label>
                    <input type="text" class="form-control" name="telephone_no">
                </div>
                <!--<div class="form-group">
                    <label>To Department</label>
                    <select class="form-control select2" name="department" required data-placeholder="Select a State"
                            style="width: 100%;">
                        <option selected="selected">Select Department</option>
                        <?php foreach ($departments as $department) {?>
                            <option value="<?=$department['iddepartment'];?>"><?=$department['department'];?></option>
                        <?php } ?>
                    </select>
                </div>-->
               <!-- <div class="form-group">
                    <label>Position</label>
                    <select class="form-control select2" name="iddesignation" required data-placeholder="Select a State"
                            style="width: 100%;">
                        <option selected="selected">Select Department</option>
                        <?php foreach ($designations as $designation) {?>
                            <option value="<?=$designation['iddesignation'];?>"><?=$designation['designation'];?></option>
                        <?php } ?>
                    </select>
                </div>-->



                <!-- /.form-group -->
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks"> </textarea>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Upload Scan Copy</label>
                    <input  type="file" multiple="multiple" required="required"  class="form-control" name="file_picture[]"> </input>
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

