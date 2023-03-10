<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-default">
    <div class="">
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <fieldset class="signup">
            <?php echo form_open_multipart('Letter/update',array('method'=>'POST'));?>
            <div class="form-group">
                <label>Received BY</label>
                <input type="text" name="received_by" class="form-control">
                <label>Job title</label>
                <input type="text" name="received_contact" class="form-control">
                <label>Scan Copy</label>
                <input type="file" name="file_picture" class="form-control">
                <label>Print No</label>
                <input type="number" name="print_no" class="form-control">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left">Forward Selected Mails</button>
                </div>
            </div>
            <?php echo form_close();?>

            <table id="example1" class="table table-bordered table-hover">

                <thead>


                <tr>
                    <th>Received Date</th>
                    <th>Date of Letter</th>
                    <th>Registry No</th>
                    <th>Reference No</th>
                    <th width="8%">Subject</th>
                    <th>To Whom Received</th>
                    <th>Scan of Print</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                <?php
                if (!empty($issueds)) {
                    for ($i = 0; $i < count($issueds); $i++) {
                        ?>
                        <tr class="tr1">
                            <td><span
                                    class="blue"><?= date("d-m-Y", strtotime($issueds[$i]['date_of_received'])); ?></span>
                            </td>
                            <td>
                                <span
                                    class="blue"><?= date("d-m-Y", strtotime($issueds[$i]['date_on_letter'])); ?></span>
                            </td>
                            <td><span class="blue"><?= $issueds[$i]['registry_no']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['reference_no']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['subject']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['from']; ?></span></td>
                            <td>
                                <?php if(!empty($issueds[$i]['image'])){?>
                                <a href="<?=base_url().$issueds[$i]['image'];?>" target="_blank" class="btn btn-sm btn-success">Download</a>
                            <?php }else{
                                    echo "No Copy Uploaded";
                                } ?>
                            </td>
                            
                            <td>
                                <input type="hidden" id="from" value="<?php echo $from = $issueds[$i]['from']; ?>">
                                <input type="hidden" id="for" value="<?php echo $for = $issueds[$i]['for']; ?>">
                                <input type="hidden" id="des"
                                       value="<?php echo $des = $issueds[$i]['iddesignation']; ?>">
                                <?php if ($issueds[$i]['forwarded'] != 'Received Back') { ?>
                                    <a href="#modal-default<?= $issueds[$i]['main_id'] ?>" class="btn btn-info"
                                       data-toggle="modal">
                                        Return </a>
                                <?php } else {
                                    ?>

                                <?php } ?>
                                <a href="#"
                                   onclick="showAjaxModal('<?= base_url() ?>index.php/Letter/viewReceivedLetter/<?= $issueds[$i]['main_id'] ?>')"
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
<?php for ($i = 0; $i < count($issueds); $i++) { ?>
    <div class="modal fade" id="modal-default<?= $issueds[$i]['main_id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Return Mail With New Scan Copy</h4>
                </div>
                <?php echo form_open_multipart('Letter/returned_file', array('method' => 'POST')); ?>
                <div class="modal-body">
                    <input type="hidden" name="main_id" value="<?= $issueds[$i]['main_id'] ?>">
                    <input type="hidden" name="from" value="<?= $issueds[$i]['from'] ?>">
                    <input type="hidden" name="for" value="<?= $issueds[$i]['for'] ?>">
                    <input type="hidden" name="iddesignation" value="<?= $issueds[$i]['iddesignation'] ?>">
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
                            <!--<th>Department</th>
                            <td>
                                <select name="department" id="dept_id<?= $issueds[$i]['main_id'] ?>"
                                        class="form-control" onchange="getEmployees(<?= $issueds[$i]['main_id'] ?>);">
                                    <?php foreach ($departments as $department) { ?>
                                        <option
                                            value="<?= $department['iddepartment'] ?>"><?= $department['department'] ?></option>
                                    <?php } ?>
                                </select>
                            </td> -->
                        </tr>
                        <tr>
                            <th>Returning Person</th>
                            <td><input type="text" name="idemployee" id="emp_id<?= $issueds[$i]['main_id'] ?>" class="form-control"> </td>
                            <!--<td><select name="idemployee" id="emp_id<//?= $issueds[$i]['main_id'] ?>"
                                        class="form-control">
                                </select></td>-->
                        </tr>
                        <tr>
                            <th>Job title</th>
                            <td><input name="returned_contact" id="returned_contact<?= $issueds[$i]['main_id'] ?>"
                                        class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Scan</th>
                            <td><input type="file" required name="file_picture" id="scan_image" class="form-control">
                            </td>
                        </tr>
                        <input type="hidden" name="csrf_test_name"
                               value="<?php echo $this->security->get_csrf_hash(); ?>">

                    </table>
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
<!-- /.modal -->
<!-- /.box -->


<script>
    $(document).ready(function () {
        /* Get the checkboxes values based on the class attached to each check box */
        $("#buttonClass").click(function () {
            var d = getValueUsingClass();
        });

        /* Get the checkboxes values based on the parent div id */
        $("#buttonParent").click(function () {
            getValueUsingParentTag();
        });
    });

    function getValueUsingClass() {
        /* declare an checkbox array */
        var chkArray = [];

        /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
        $(".chk:checked").each(function () {
            chkArray.push($(this).val());
        });

        /* we join the array separated by the comma */
        var selected;
        selected = chkArray.join(',');

        /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
        if (selected.length > 0) {
            return selected;
            //alert("You have selected " + selected);
        } else {
            alert("Please at least check one of the checkbox");
        }
    }

    function getValueUsingParentTag() {
        var chkArray = [];

        /* look for all checkboes that have a parent id called 'checkboxlist' attached to it and check if it was checked */
        $("#checkboxlist input:checked").each(function () {
            chkArray.push($(this).val());
        });

        /* we join the array separated by the comma */
        var selected;
        selected = chkArray.join(',');

        /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
        if (selected.length > 0) {
            alert("You have selected " + selected);
        } else {
            alert("Please at least check one of the checkbox");
        }
    }
</script>

<script>
    function getEmployees(id) {

        var dept = $('#dept_id' + id).val();
        var csrf_test_name = $("input[name=csrf_test_name]").val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>index.php/Letter/getEmmDesignation',
            dataType: 'html',
            data: {
                dept: dept, csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
                $("#emp_id" + id).html(result1);
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
                from: from, to: to, des: des, main_id: main_id, csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
                if (result1 == 1) {
                    alert('File Returned Successfully');
                    window.location.href = "<?=base_url()?>index.php/Letter/receive_files";
                }
            }
        });
    }
</script>
<script>
    function printDiv(printable) {
        //alert(printable);
        var printContents = document.getElementById(printable).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
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
        <div class="modal-content" style="width: 90% !important; height: 370px !important;">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Details of Forwarded Letters</h4>
            </div>

            <div class="modal-body" id="printdiv" style="height:500px; overflow:auto;">


            </div>
        </div>
    </div>
</div>
