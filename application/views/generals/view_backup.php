<div class="row">
    <div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable" data-lobipanel-child-inner-id="wycyGX6K15">
        <div class="panel panel-bd lobidrag lobipanel lobipanel-sortable" data-inner-id="wycyGX6K15" data-index="0">
            <div class="panel-heading ui-sortable-handle">
                <div class="panel-title">
                    <h4>Backup</h4>
                </div>
                <div class="dropdown">
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a data-func="editTitle" data-tooltip="Edit title"><i
                                    class="panel-control-icon ti-pencil"></i><span
                                    class="control-title">Edit title</span></a></li>
                        <li><a data-func="unpin" data-tooltip="Unpin"><i class="panel-control-icon ti-move"></i><span
                                    class="control-title">Unpin</span></a></li>
                        <li><a data-func="reload" data-tooltip="Reload"><i
                                    class="panel-control-icon ti-reload"></i><span
                                    class="control-title">Reload</span></a></li>
                        <li><a data-func="minimize" data-tooltip="Minimize"><i
                                    class="panel-control-icon ti-minus"></i><span class="control-title">Minimize</span></a>
                        </li>
                        <li><a data-func="expand" data-tooltip="Fullscreen"><i
                                    class="panel-control-icon ti-fullscreen"></i><span
                                    class="control-title">Fullscreen</span></a></li>
                        <li><a data-func="close" data-tooltip="Close"><i class="panel-control-icon ti-close"></i><span
                                    class="control-title">Close</span></a></li>
                    </ul>
                    <div class="dropdown-toggle" data-toggle="dropdown"><span
                            class="panel-control-icon glyphicon glyphicon-cog"></span></div>
                </div>
            </div>
            <div class="panel-body">

                <div id="message" class="alert hide"></div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Database Backup</label>
                    <div class="col-sm-9">
                        <i class="fa fa-check text-success"></i> Available
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">File Information</label>
                    <div class="col-sm-9">
                        <ul class="list-unstyled">
                            <li>
                                File Name <strong>my_db_backup.sql</strong>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-4">
                        <form action="#" id="brFrm"
                              method="post" accept-charset="utf-8">
                            <input type="hidden" name="input" value="2">

                            <a href="<?=base_url()?>index.php/Generals/backup"
                               class="btn btn-success w-md m-b-5 btn-block" onclick="return confirm('Are You Sure ? ')"><i
                                    class="fa fa-download"></i> Download</a>


                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>