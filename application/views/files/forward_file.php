<?php if($this->session->flashdata('success')){?>

<div class="alert alert-success"><?=$this->session->flashdata('success');?></div>
<?php } ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Forward File</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('Letter/update_file',array('method'=>'post'));?>
         <form method="post" action="<?=base_url('Letter/new_file');?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Barcode</label>
                    <input type="text" name="barcode" value="<?=$details['barcode'];?>" required placeholder="Eg. DOIT-*****" class="form-control">
                    <input type="hidden" name="idissue" value="<?=$details['idissue'];?>" class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>File No</label>
                    <input type="text" value="<?=$details['fileno'];?>" required class="form-control" name="file_no">
                </div>
                <!-- /.form-group -->

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
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks"> </textarea>
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">


                <div class="form-group">
                    <label>Diary No</label>
                    <input type="text" value="<?=$details['dairyno'];?>" class="form-control" name="diary_no">
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label>Sending Date</label>
                    <input type="text" name="date_of_sending" required class="form-control">
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label>File Status</label>
                    <select type="text" class="form-control" name="file_status" required>
                        <option value="<?=$details['idfilestatus'];?>"><?=$details['filestatus'];?></option>
                        <?php foreach ($fileStatus as $fileStatu) {?>
                            <option value="<?=$fileStatu['idfilestatus'];?>"><?=$fileStatu['filestatus'];?></option>
                        <?php } ?>
                    </select>
                </div>


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

