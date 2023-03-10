<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-default">
   <div class="box-header" style="background-color: black !important; color: white !important">
<h3 class='box-title'>Received Files</h2>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
   
        <fieldset class="signup">

            <table id="example1" width="100%" class="table table-responsive">

                <thead>


                <tr align="left">
                     <th>Creation Date</th>
                    <th>Date On Letter</th>
                    <th>Registry No</th>
                    <th>Reference No</th>
                    <th>Subject</th>
                    <th>File Type</th>
                    <th>Flag</th>
                    <th>From</th>
                    <th>Department</th>
                    <th>To</th>
                    <th>Received By</th>
                    <th>File Status</th>
                   
                </tr>
                </thead>

                <tbody>

                <?php
                if (!empty($issueds)) {
                    for ($i = 0; $i < count($issueds); $i++) {
                        ?>
                        <tr class="tr1">
                            <td><span
                                    class="blue"><?= date("d-m-Y H:i:s", strtotime($issueds[$i]['date_received'])); ?></span> </td>
                            <td>
                                <span class="blue"><?= date("d-m-Y H:i:s", strtotime($issueds[$i]['date_on_letter'])); ?></span>
                            </td>
                            <td><span class="blue"><?= $issueds[$i]['registry_no']; ?></span></td>
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
                            <td><span class="blue"><?= $issueds[$i]['department']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['designation']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['empname']; ?></span></td>
<?php
                            if ($issueds[$i]['ml_status'] == 0) {
                                echo '<td>';
                                echo '<label class="label label-warning">Received</label>';
                                echo '</td>';
                            }
                            ?>
                            <td>
                                <input type="hidden" id="from" value="<?php echo $from = $issueds[$i]['from'];?>">
                                <input type="hidden" id="for" value="<?php echo $for = $issueds[$i]['for'];?>">
                                <input type="hidden" id="des" value="<?php echo $des = $issueds[$i]['iddesignation'];?>">
                                 <?php if($issueds[$i]['forwarded'] != 'Received Back'){?>
                                <a href="#modal-default<?= $issueds[$i]['main_id'] ?>" class="btn btn-info" data-toggle="modal">
                                    Return </a>
                            <?php }else{
                                  ?>
                                   
                                   <span class='label label-info'>Returned</span>
                             <?php  }?>
                            </td>


                        </tr>
                    <?php } ?>
                <?php } ?>
                </tbody>

            </table>

        </fieldset>


    

    </div>
</div>
<?php for ($i = 0; $i < count($issueds); $i++) { ?>
    <div class="modal fade" id="modal-default<?= $issueds[$i]['main_id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Return File With New Scan Copy</h4>
                </div>
                <?php echo form_open_multipart('Letter/returned_file',array('method'=>'POST'));?>
                <div class="modal-body">
                    <input type="hidden" name="main_id" value="<?=$issueds[$i]['main_id']?>">
                    <input type="hidden" name="from" value="<?=$issueds[$i]['from']?>">
                    <input type="hidden" name="for" value="<?=$issueds[$i]['for']?>">
                    <input type="hidden" name="iddesignation" value="<?=$issueds[$i]['iddesignation']?>">
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
                            <th>Department</th>
                            <td>
                                <select name="department" id="dept_id<?=$issueds[$i]['main_id']?>" class="form-control" onchange="getEmployees(<?=$issueds[$i]['main_id']?>);">
                                    <?php foreach ($departments as $department) { ?>
                                        <option
                                            value="<?= $department['iddepartment'] ?>"><?= $department['department'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Returning Person</th>
                            <td><select name="idemployee" id="emp_id<?=$issueds[$i]['main_id']?>" class="form-control">
                                </select></td>
                        </tr>
                        <tr>
                            <th>Scan</th>
                            <td><input type="file" required name="file_picture" id="scan_image" class="form-control">
                            </td>
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
<!-- /.box -->

<script>
    
    function getEmployees(id) {

        var dept = $('#dept_id'+id).val();
        var csrf_test_name = $("input[name=csrf_test_name]").val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>index.php/Letter/getEmmDesignation',
            dataType: 'html',
            data: {
                dept: dept,csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
if(result1 != ''){
                $("#emp_id"+id).html(result1);
}else{alert('No Employees in this department');}
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
            url: '<?=base_url()?>index.php/Letter/return_file',
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
</script>
