<section class="content">


    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">

                        <img class="profile-user-img img-responsive img-circle" src='
						<?= base_url() . '/' . $empDetail['EMP_PIC'] ?>'>
                    <h3 class="profile-username text-center"><?php echo $empDetail['EMP_NAME']; ?></h3>

                    <p class="text-muted text-center"><?php echo $empDetail['EMP_EMAIL']; ?></p>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-9">
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                    <div class="text-right">
                        <a href="<?=base_url()?>index.php/employees/employee_list" class="btn btn-warning">Back</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

</section>
