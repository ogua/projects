<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-default">
    <div class="">
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <fieldset class="signup">

            <table id="example1" width="100%" class="table table-responsive">

                <thead>


                <tr align="left">
                    <th>Date of Issue</th>
                    <th>File No</th>
                    <th width="20%">File Name</th>
                    <th>File Given To</th>
                    <th>Number of Letters</th>
                    <th>Number of Days to Return</th>
                    <th>Status</th>
                    <th>Operation</th>
                    <th>Action</th>

                </tr>
                </thead>

                <tbody>

                <?php
                if (!empty($files)) {
                    for ($i = 0; $i < count($files); $i++) {
                        ?>
                        <tr class="tr1">
                            <td><span
                                    class="blue"><?= date("d-m-Y", strtotime($files[$i]['date_collected'])); ?></span>
                            </td>
                            <td><span class="blue"><?= $files[$i]['file_no']; ?></span></td>
                            <td><span class="blue"><?= $files[$i]['name_of_file']; ?></span></td>
                            <td><span class="blue"><?= $files[$i]['file_given_to']; ?></span></td>
                            <td><?= $files[$i]['number_of_letters']; ?></td>
                            <td><?= $files[$i]['returning_days']; ?></td>
                            <td><span
                                    class="blue"><?php if ($files[$i]['status'] == 1 && $files[$i]['returned_status'] == 'Unreturned') {
                                        echo "<span class='label label-danger'>Issued Out</span>";
                                    } else {
                                        echo "<span class='label label-primary'>Returned Back</span>";
                                    } ?></span></td>
                            <td>

                                <?php if ($files[$i]['status'] == 1 && $files[$i]['returned_status'] == 'Unreturned') { ?>
                                    <a href="#track<?= $files[$i]['file_m_id']; ?>"
                                       onclick="getReturned(<?= $files[$i]['file_m_id']; ?>)" class="imran"
                                       data-toggle="modal">
                                        Return </a>
                                <?php } ?>

                            </td>
                            <td>
                                <?php if ($files[$i]['status'] == 1 && $files[$i]['returned_status'] == 'Unreturned') { ?>
                                    <a href="<?= base_url() ?>index.php/File_movement/edit_file/<?= $files[$i]['file_m_id']; ?>"
                                       class="btn btn-warning"><i class="fa fa-edit"></i> </a> |  <a
                                        href="<?= base_url() ?>index.php/File_movement/delete_file/<?= $files[$i]['file_m_id']; ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete?');"><i
                                            class="fa fa-trash"></i> </a>
                                <?php } ?>
                                <a href="#"
                                   onclick="showAjaxModal('<?= base_url() ?>index.php/File_movement/viewIssuedFIle/<?= $files[$i]['file_m_id'] ?>')"
                                   class="btn btn-info">View </a>
                            </td>

                        </tr>
                    <?php } ?>
                <?php } ?>
                </tbody>

            </table>

        </fieldset>

    </div>
</div>
<?php for ($i = 0; $i < count($files); $i++) { ?>
    <div class="modal fade" id="track<?= $files[$i]['file_m_id'] ?>">
        <div class="modal-dialog" style="width: 90% !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> Returning Files</h4>
                </div>
                <?php echo form_open('File_movement/return_files', array('method' => 'POST')); ?>
                <div class="modal-body">
                    <input type="hidden" name="file_m_id" value="<?= $files[$i]['file_m_id']; ?>">
                    <input type="hidden" name="file_id" value="<?= $files[$i]['file_id']; ?>">
                    <div class="form-group">
                       <label>Job Title</label>
                        <input type="text" name="returning_job_title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Returned By</label>
                        <input type="text" name="returning_person" class="form-control">

                    </div>
                    <div class="form-group">
                        <label>Telephone No</label>
                        <input type="text" name="returning_tele_no" class="form-control">

                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Number of Letters Returned</label>
                        <input type="text" name="returned_letters" required placeholder="" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<script>
    function getEmployees() {

        var dept = $('#iddepartment').val();
        var csrf_test_name = $("input[name=csrf_test_name]").val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>index.php/Letter/getEmployees',
            dataType: 'html',
            data: {
                dept: dept, csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
                $("#idemployee").html(result1);
            }
        });
    }


</script>


<script type="text/javascript">
    function showAjaxModal(url) {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="img/loader.gif" /></div>');

        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
        //var d = getValueUsingClass();
        //alert(d);
        //return false;
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            type: 'POST',
            success: function (response) {
                jQuery('#modal_ajax .modal-body').html(response);
            }
        });
    }
</script>

<!-- (Ajax Modal)-->
<div class="modal fade" id="modal_ajax">
    <div class="modal-dialog" >
        <div class="modal-content" style="width: 95% !important; height: 300px !important;">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Details of Issued Files/h4>
            </div>

            <div class="modal-body" id="printdiv" style="height:500px; overflow:auto;">


            </div>
        </div>
    </div>
</div>
