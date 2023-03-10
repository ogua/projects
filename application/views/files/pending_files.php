<?php if($this->session->flashdata('success')){?>

<div class="alert alert-success"><?=$this->session->flashdata('success');?></div>
<?php } ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Pending Files</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('Letter/new_file',array('method'=>'post'));?>

        <div class="row">

            <div class="col-lg-5">

                <div class="form-group">
                    <label>From:</label>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" value="<?php echo date("d-m-Y",strtotime($date)); ?>" class="form-control pull-right" id="datepicker">
                    </div>
                    <!-- /.input group -->
                </div>

                </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <label>To:</label>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" value="<?php echo date("d-m-Y",strtotime($todate)); ?>" class="form-control pull-right" id="datepicker">
                    </div>
                    <!-- /.input group -->
                </div>
            </div>
            </div>

        <div class="row">
           <?php foreach ($pendings as $pending) { ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
               <?php $color = ''; if($pending['pending_files'] > 0 ){?>
                <a href="<?=base_url()?>index.php/Letter/pending_detail/<?=$pending['idfiletype']?>/<?=$date;?>/<?=$todate;?>">
                    <?php $color = '#efeded'; } ?>
                <div class="info-box" style="background: <?=$color?>;">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><?=$pending['filetype'];?></span>
                        <span class="info-box-number"><?=$pending['pending_files'];?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                    <?php ?>
                </a>
            </div>
            <!-- /.col -->
            <?php } ?>

        </div>


    <!-- /.box-body -->
    <div class="box-footer">
       <button type="submit" name="Submit" class="btn btn-success">Submit</button>
    </div>
</div>
<!-- /.box -->

