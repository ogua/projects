<div class="row">

    <div class="col-lg-4">
        <div class="box box-default">
            <div class="box-heading">
                <h4 class="box-title">Add Designation</h4>
            </div>
            <?php echo form_open('Parameters/create_department') ?>
            <div class="box-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Position Name</label>
                            <input type="text" name="department" required class="form-control">
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" name="Submit" class="btn btn-info">Submit</button>
            </div>

            <?php echo form_close(); ?>
        </div>

    </div>

    <div class="col-lg-8">
        <div class="box box-default">
            <div class="box-heading">
                <h4 class="box-title">Position Records </h4>
            </div>
            <hr>
            <!-- /.box-heading -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer"
                           id="example1" aria-describedby="dataTables-example_info">
                        <thead>
                        <tr role="row">
                            <th>Position Name
                            </th>
                            <th>Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($departments as $department) {?>
                                <tr><td>
                                        <?php echo $department->designation;?>
                                    </td>
                                    <td>
                                        <a href="<?=base_url()?>Parameters/edit_designation/<?=$department->iddesignation?>"
                                           class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                        | <a href="<?=base_url()?>Parameters/delete_designation/<?=$department->iddesignation?>"
                                             class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                    </td></tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col-lg-12 -->
</div>