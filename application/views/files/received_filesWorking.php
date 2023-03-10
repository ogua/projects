<?php if($this->session->flashdata('success')){?>

<div class="alert alert-success"><?=$this->session->flashdata('success');?></div>
<?php } ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Received Files</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="row">
           <?php foreach ($receiveds as $received) { ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
               <?php $color = ''; if($received['receive_files'] > 0 ){?>
                <a href="<?=base_url()?>index.php/Letter/received_detail/<?=$received['idfiletype'];?>">
                    <?php $color = '#efeded'; } ?>
                <div class="info-box" style="background: <?=$color?>;">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><?=$received['filetype'];?></span>
                        <span class="info-box-number"><?=$received['receive_files'];?></span>
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

