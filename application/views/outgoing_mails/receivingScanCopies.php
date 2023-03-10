<?php if($this->session->flashdata('success')){?>

    <div class="alert alert-success"><?=$this->session->flashdata('success');?></div>
<?php } ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Dispatch Letter</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('Outgoing_mails/createScanCopy',array('method'=>'post'));?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group"><label>Attach Printout/Receipt</label>

                    <input type="hidden" name="om_id" value="<?=$id;?>" class="form-control">
                    <input type="file" name="file_picture" class="form-control">

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

