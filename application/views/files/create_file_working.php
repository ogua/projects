<?php if($this->session->flashdata('success')){?>

<div class="alert alert-success"><?=$this->session->flashdata('success');?></div>
<?php } ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">New File</h3>

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
                    <label>File Type</label>
                    <select class="form-control select2" name="file_type" required style="width: 100%;">
                        <option selected="selected">Select File Type</option>
                        <?php foreach ($fileTypes as $fileType) {?>
                        <option value="<?=$fileType['idfiletype'];?>"><?=$fileType['filetype'];?></option>
                        <?php } ?>

                    </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Date Of Letter</label>
                    <input type="text" name="date_on_letter" class="form-control">
                </div>
                <div class="form-group">
                    <label>Reference Number</label>
                    <input type="text" name="reference_no" required placeholder="" class="form-control">
                </div>
                

                <!--<div class="form-group">
                    <label>File Status</label>
                    <select class="form-control select2" name="flag" required style="width: 100%;">
                        <option selected="selected">Select File Status</option>
                        <?php foreach ($fileStatuses as $fileStatuse) {?>
                            <option value="<?=$fileStatuse['idfilestatus'];?>"><?=$fileStatuse['filestatus'];?></option>
                        <?php } ?>
                    </select>
                </div>-->
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
<div class="form-group">
                    <label>Telephone No</label>
                    <input type="text" class="form-control" name="telephone_no">
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">

               <div class="form-group">
                    <label>Person name</label>
                    <input type="text" name="person_name" class="form-control">
                </div>
 <div class="form-group">
                    <label>From</label>
                    <input type="text" name="from_department" class="form-control">
                </div>
                <div class="form-group">
                    <label>To Department</label>
                    <select class="form-control select2" name="department" required data-placeholder="Select a State"
                            style="width: 100%;">
                        <option selected="selected">Select Department</option>
                        <?php foreach ($departments as $department) {?>
                            <option value="<?=$department['iddepartment'];?>"><?=$department['department'];?></option>
                        <?php } ?>
                    </select>
                </div>
<div class="form-group">
                    <label>Position</label>
                    <select class="form-control select2" name="iddesignation" required data-placeholder="Select a State"
                            style="width: 100%;">
                        <option selected="selected">Select Department</option>
                        <?php foreach ($designations as $designation) {?>
                            <option value="<?=$designation['iddesignation'];?>"><?=$designation['designation'];?></option>
                        <?php } ?>
                    </select>
                </div>



                <!-- /.form-group -->
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks"> </textarea>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Scan Copy</label>
                    <input  type="file" multiple="multiple"  class="form-control" name="file_picture[]"> </input>
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

