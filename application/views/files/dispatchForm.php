<?php if($this->session->flashdata('success')){?>

<div class="alert alert-success"><?=$this->session->flashdata('success');?></div>
<?php } ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">FILE THIS MAIL OR LETTER</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('Letter/create_dispatch',array('method'=>'post'));?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <input type="hidden" name="main_id" value="<?php echo $returns['main_id'];?>" class="form-control">
                <input type="hidden" name="main_log_id" value="<?php echo $returns['main_log_id'];?>" class="form-control">
                <div class="form-group"><label>File No & FIle Name</label>
                    <select name="file_no" class="form-control">
                        <option>PLEASE SELECT OPTION</option>
                        <?php foreach ($parameters as $parameter) {?>
                        <option value="<?php echo $parameter['file_id']?>"><?php echo $parameter['file_no']?> / <?php echo $parameter['file_name']?></option>
                        <?php } ?>

                    </select>
                </div>
            </div>            <!-- /.col -->
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

