<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?=$total_employees;?></h3>

                <p>Total Users</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-contacts"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?=$active_users->active;?></h3>

                <p>Active Users</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-stalker"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?=$inactive_users->inactive;?></h3>

                <p>Inactive Users</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?=$total_employees;?></h3>

                <p>Total Employees</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>


<div class="row">
    <div class="col-lg-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Users List</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th>UserName</th>
                            <th>Group</th>
                            <th>Status</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($users_list)){foreach ($users_list as $users) : ?>
                            <tr>
                                <td><?=$users->USER_NAME;?></td>
                                <td><?=$users->GROUP_NAME;?></td>
                                <td><?php if($users->IS_ACTIVE == 1){?>
                                        <span class="label label-success">ACTIVE</span>
                                    <?php }else{ ?>
                                        <span class="label label-default">INACTIVE</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?=date("d M,Y",strtotime($users->CREATED_DATE));?>
                                </td>
                            </tr>
                        <?php endforeach; }else{
                            echo "<tr><td>No Records Found</td></tr>";
                        } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-lg-6">
        <div class="box box-danger">
            <div class="box-header">
                <h4 class="box-title">Employee Searching</h4>
            </div>
            <div class="box-body">
                <div class="container" style="width:500px;">
                    <h2 align="center">Search Employees</h2>
                    <br /><br />
                    <div align="center">
                        <input type="text" name="search" id="search" placeholder="Search Employee Details" class="form-control input-medium" />
                    </div>
                    <ul class="list-group" id="result"></ul>
                    <br />
                </div>

            </div>
        </div>
    </div>
</div>
