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
                    <th>Collection Date</th>
                    <th>Department</th>
                    <th>Person</th>
                    <th>File No</th>
                    <th width="20%">File Name</th>
                    <th>Number of Letters</th>
                    <th>Remarks</th>
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
                                    class="blue"><?= date("d-m-Y H:i:s", strtotime($files[$i]['date_collected'])); ?></span>
                            </td>
                            <td><span class="blue"><?= $files[$i]['department']; ?></span></td>
                            <td><span class="blue"><?= $files[$i]['empname']; ?></span></td>
                            <td><span class="blue"><?= $files[$i]['file_no']; ?></span></td>
                            <td><span class="blue"><?= $files[$i]['name_of_file']; ?></span></td>
                            <td><?= $files[$i]['number_of_letters']; ?></td>
                            <td><span class="blue"><?= $files[$i]['remarks']; ?></span></td>
                            <td><span class="blue"><?php if ($files[$i]['status'] == 1 && $files[$i]['returned_status'] == 'Unreturned') {
                                        echo "<span class='label label-danger'>Not Returned</span>";
                                    }else{ echo "<span class='label label-primary'>Returned Back</span>";} ?></span></td>
                            <td>

                                <?php if ($files[$i]['status'] == 1 && $files[$i]['returned_status'] == 'Unreturned') {?>
                                <a href="#track<?= $files[$i]['file_m_id']; ?>"
                                   onclick="getReturned(<?= $files[$i]['file_m_id']; ?>)" class="imran"
                                   data-toggle="modal">
                                    Return </a>
                            <?php } ?>

                            </td>
 <td>
                                <?php if ($files[$i]['status'] == 1 && $files[$i]['returned_status'] == 'Unreturned') { ?>
                                   <a href="<?=base_url()?>index.php/Letter/edit_file/<?=$files[$i]['file_m_id'];?>"
                                            class="btn btn-warning"><i class="fa fa-edit"></i> </a> |  <a href="<?=base_url()?>index.php/Letter/delete_file/<?=$files[$i]['file_m_id'];?>"
                                                                                                          class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i> </a>
                                <?php } ?>
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
                        <label>Department</label>
                        <select class="form-control select2" name="iddepartment" id="iddepartment<?= $files[$i]['file_m_id']; ?>"
                                onchange="getEmployees(<?= $files[$i]['file_m_id']; ?>)" required
                                data-placeholder="Select a State"
                                style="width: 100%;">
                            <option>Select Department</option>
                            <?php foreach ($departments as $department) { ?>
                                <option
                                    value="<?= $department['iddepartment']; ?>"><?= $department['department']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Employee</label>
                        <select class="form-control select2" name="idemployee" id="idemployee<?= $files[$i]['file_m_id']; ?>" required
                                style="width: 100%;">
                            <option>Select Employee</option>
                            <?php //foreach ($employees as $employee) { ?>

                            <?php //} ?>

                        </select>
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
    function getEmployees(id) {

        var dept = $('#iddepartment'+id).val();
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
                $("#idemployee"+id).html(result1);
            }
        });
    }


</script>
