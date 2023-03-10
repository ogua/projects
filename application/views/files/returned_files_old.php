<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-default">
    <div class="">
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('Letter/new_file', array('method' => 'post')); ?>


        <fieldset class="signup">

            <table id="example1" width="100%" class="table table-responsive">

                <thead>


                <tr align="left">
                    <th width="10%">Creation Date</th>
                    <th width="10%">Registry No</th>
                    <th width="10%">Reference No</th>
                    <th width="20%">Subject</th>
                    <th width="10%">File Type</th>
                    <th width="10%">Flag</th>
                    <th width="10%">From</th>
                    <th width="10%">To</th>
                    <th width="10%">File Status</th>
                    <th width="10%">Remarks</th>
                    <th width="10%">Created By</th>
 <th width="10%">Action</th>
                </tr>
                </thead>

                <tbody>

                <?php
                if (!empty($issueds)) {
                    for ($i = 0; $i < count($issueds); $i++) {
                        ?>
                        <tr class="tr1">
                            <td><span
                                    class="blue"><?= date("d-m-Y H:i:s", strtotime($issueds[$i]['date_received'])); ?></span>
                            </td>
                            <td><span class="blue"><?= $issueds[$i]['main_id']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['reference_no']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['subject']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['doc_type']; ?></span></td>
                            <?php
                            if ($issueds[$i]['flag'] == 'Normal') {
                                echo '<td>';
                                echo '<label class="label label-success">' . $issueds[$i]['flag'] . '</label>';
                                echo '</td>';
                            }
                            if ($issueds[$i]['flag'] == 'Confidential') {
                                echo '<td>';
                                echo '<label class="label label-primary">' . $issueds[$i]['flag'] . '</label>';
                                echo '</td>';
                            }
                            if ($issueds[$i]['flag'] == 'Very Confidential') {
                                echo '<td>';
                                echo '<label class="label label-info">' . $issueds[$i]['flag'] . '</label>';
                                echo '</td>';
                            }
                            if ($issueds[$i]['flag'] == 'Urgent') {
                                echo '<td>';
                                echo '<label class="label label-warning">' . $issueds[$i]['flag'] . '</label>';
                                echo '</td>';
                            }
                            if ($issueds[$i]['flag'] == 'Immediate') {
                                echo '<td>';
                                echo '<label class="label label-danger">' . $issueds[$i]['flag'] . '</label>';
                                echo '</td>';
                            }
                            ?>
                            <td><span class="blue"><?= $issueds[$i]['from']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['department']; ?></span></td><?php
                            if ($issueds[$i]['ml_status'] == 1) {
                                echo '<td>';
                                echo '<label class="label label-inverse" style="background-color: darkgrey">Returned</label>';
                                echo '</td>';
                            }
                            ?>
                            <td><span class="blue"><?= $issueds[$i]['remarks']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['empname']; ?></span></td>
 <td>

                                    <a href="#track<?=$issueds[$i]['main_id'];?>" onclick="getReturned(<?=$issueds[$i]['main_id'];?>)" class="imran" data-toggle="modal">
                                        Track </a>
                            </td>

                        </tr>
                    <?php } ?>
                <?php } ?>
                </tbody>

            </table>

        </fieldset>


        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" name="Submit" class="btn btn-info">Submit</button>
        </div>

        <?php echo form_close(); ?>

    </div>
</div>
<?php for ($i = 0; $i < count($issueds); $i++) { ?>
    <div class="modal fade" id="modal-default<?= $issueds[$i]['main_id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Default Modal</h4>
                </div>
                <?php echo form_open('Letter/SendToRegional',array('method'=>'POST'));?>
                <div class="modal-body">
                    <input type="hidden" name="main_id" value="<?=$issueds[$i]['main_id']?>">
                    <input type="hidden" name="department_id" value="<?=$issueds[$i]['iddepartment']?>">
                    <table class="table table-bordered">
                        <tr>
                            <th>Subject</th>
                            <td><?= $issueds[$i]['subject'] ?></td>
                        </tr>
                        <tr>
                            <th>Date Of Received</th>
                            <td><?= date("d-M-Y", strtotime($issueds[$i]['date_received'])); ?></td>
                        </tr>
                        <tr>
                            <th>Forward To</th>
                            <td>
                                <select name="department" id="dept_id" class="form-control" onchange="getEmployees();">
                                    <?php foreach ($departments as $department) { ?>
                                        <option
                                            value="<?= $department['iddepartment'] ?>"><?= $department['department'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Position</th>
                            <td><select name="employee" id="emp_id" class="form-control">
                                </select></td>
                        </tr>
                        <input type="hidden" name="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>">

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                   <?php echo form_close();?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->

<?php for ($i = 0; $i < count($issueds); $i++) { ?>
    <div class="modal fade" id="track<?= $issueds[$i]['main_id'] ?>">
        <div class="modal-dialog" style="width: 90% !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Default Modal</h4>
                </div>
                <?php echo form_open('Letter/SendToRegional', array('method' => 'POST')); ?>
                <div class="modal-body" id="datareturned<?=$issueds[$i]['main_id'];?>">


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
<!-- /.box -->

<script>
    function getEmployees() {

        var dept = $('#dept_id').val();
        var csrf_test_name = $("input[name=csrf_test_name]").val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>Letter/getEmployees',
            dataType: 'html',
            data: {
                dept: dept,csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
                $("#emp_id").html(result1);
            }
        });
    }

    function return_file(main_id) {

        var from = $('#from').val();
        var to = $('#for').val();
        var des = $('#des').val();
        var csrf_test_name = $("input[name=csrf_test_name]").val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>Letter/return_file',
            dataType: 'html',
            data: {
                from: from,to: to, des: des,main_id: main_id,csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
                if(result1 == 1){
                    alert('File Returned Successfully');
                    window.location.href = "<?=base_url()?>index.php/Letter/receive_files";
                }
            }
        });
    }
 function getReturned(id) {

        var csrf_test_name = $("input[name=csrf_test_name]").val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>index.php/Letter/getreturned',
            dataType: 'html',
            data: {
                dept: id, csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
                $("#datareturned"+id).html(result1);
            }
        });
    }
</script>
