<?php if($this->session->flashdata('success')){?>

<div class="alert alert-success"><?=$this->session->flashdata('success');?></div>
<?php } ?>
<div class="row">
    <div class="col-lg-4"><div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Form</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php echo form_open_multipart('Generals/create_dispatch',array('method'=>'post'));?>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group"><label>File Number</label>
                            <input type="text" name="file_no" required class="form-control">
                        </div>
                        <div class="form-group"><label>File Name</label>
                            <input type="text" name="file_name" required class="form-control">
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
    </div>
    <div class="col-lg-8"><div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover table-stripped" id="example1">
                    <thead>
                    <tr>
                        <th>File No</th>
                        <th>File Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($files as $file) {?>
                    <tr>
                        <td><?=$file['file_no'];?></td>
                        <td><?=$file['file_name'];?></td>
                        <td>
                            <a href="<?=base_url()?>Generals/edit_file/<?=$file['file_id'];?>"
                               class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                            | <a href="<?=base_url()?>Generals/delete_file/<?=$file['file_id'];?>"
                                 class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>


