<style>
    ul.enlarge li {
        display: inline-block; /*places the images in a line*/
        position: relative;
        z-index: 0; /*resets the stack order of the list items - later we'll increase this*/
        margin: 0 0 0 10px;
        float: left;
    }

    ul.enlarge img {
        width: 30px;
        height: 30px;
        background-color: #eae9d4;
        padding: 6px;
        -webkit-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
        -moz-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
        box-shadow: 0 0 6px rgba(132, 132, 132, .75);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }

    ul.enlarge span {
        position: absolute;
        left: -9999px;
        background-color: #eae9d4;
        padding: 10px;
        font-family: 'Droid Sans', sans-serif;
        font-size: .9em;
        text-align: center;
        color: #495a62;
        -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, .75));
        -moz-box-shadow: 0 0 20px rgba(0, 0, 0, .75);
        box-shadow: 0 0 20px rgba(0, 0, 0, .75);
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
    }

    ul.enlarge li:hover {
        z-index: 9999999999;
        cursor: pointer;
    }

    ul.enlarge span img {
        padding: 2px;
        width: 200px;
        height: 150px;
        background: #ccc;
    }

    ul.enlarge li:hover span {
        top: -100px; /*the distance from the bottom of the thumbnail to the top of the popup image*/
        left: -20px; /*distance from the left of the thumbnail to the left of the popup image*/
    }

    ul.enlarge li:hover:nth-child(2) span {
        left: -100px;
    }

    ul.enlarge li:hover:nth-child(3) span {
        left: -100px;
    }

    /**IE Hacks - see http://css3pie.com/ for more info on how to use CS3Pie and to download the latest version**/
    ul.enlarge img, ul.enlarge span {
        behavior: url(pie/PIE.htc);
    }
</style>

<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-primary">
    <div class="box-header">
        <h2 class='box-title'>Received Mails</h2>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open('Letter/sendToRegional', array('method' => 'post')); ?>

        <div class="col-md-12">
            <div class="form-group">
                <label>Select Mail(s) to Forward</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select Letters"
                        style="width: 100%;" name="letters[]">
                    <?php foreach ($letters as $letter): ?>
                        <option value="<?= $letter['main_id']; ?>"><?= $letter['registry_no']; ?></option>
                    <?php endforeach; ?>
                </select>
             </div>
              <div class="box-footer">
                    <button type='submit' class="btn btn-success">Print Selected Mails</button>

                </div>


            <fieldset class="signup">
                <table id="example1" width="100%" class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Received Date</th>
                        <th>Registry Number</th>
                        <th>Reference No</th>
                      
                        <th>To Whom Received</th>
                       
                        <th>Subject</th>
                  
                     
                      <th> Attachment </th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($issueds)) {
                        foreach ($issueds as $issueds) {
                           // print_r($issueds);
                            ?>
                            <tr class="tr1">
                                <td><span
                                        class="blue"><?= date("d-m-Y", strtotime($issueds['date_received'])); ?></span>
                                </td>
                                <td><span class="blue"><?= $issueds['registry_no']; ?></span></td>
                                <td><span class="blue"><?= $issueds['reference_no']; ?></span></td>
                               
                                <td><span class="blue"><?= $issueds['from']; ?></span></td>
                                <td><span class="blue"><?= $issueds['subject']; ?></span></td>
                              
                                                            <td>
                                    <?php
                                    $idissue = $issueds['main_id'];
                                    $sqlimage = $this->db->query("SELECT * FROM `attachment` WHERE `idissue` = '$idissue'")->result_array();
                                    if (!empty($issueds['scan_image'])) {
                                        echo '<ul class="enlarge" style="list-style-type: none;
margin-left: 0;">';
                                       // foreach ($sqlimage as $sqlimage) {
                                            // $img = explode('.',$sqlimage['path']);
                                            $ext = pathinfo($issueds['scan_image'], PATHINFO_EXTENSION);
                                            // print_r($img); ?>
                                            <li style="display: inline-block;
position: relative;
z-index: 0;
margin: 0 0 0 10px;
float: left;">
                                                <a href="<?= base_url() . $issueds['scan_image']; ?>" target="_blank"
                                                   class="btn btn-sm btn-success"><i class="fa fa-download"></i> Download</a>
                                            </li>
                                        <?php //} ?>
                                        </ul> <?php
                                    } else {
                                        echo 'No attachment';
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php if ($issueds['forwarded'] == '') { ?>
                                        |    <a
                                            href="<?= base_url() ?>index.php/Letter/edit_file/<?= $issueds['main_id']; ?>"
                                            class="btn btn-warning"><i class="fa fa-edit"></i> </a> |  <a
                                            href="<?= base_url() ?>index.php/Letter/delete_file/<?= $issueds['main_id']; ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete?');"><i
                                                class="fa fa-trash"></i> </a>
                                        |
                                    <?php } ?>
                                    <a href="#"
                                       onclick="showAjaxModal('<?= base_url() ?>index.php/Letter/viewSpecificLetter/<?= $issueds['main_id'] ?>')"
                                       class="btn btn-info">View </a>
                                </td>


                            </tr>
                        <?php } ?>
                    <?php } ?>
                    </tbody>

                </table>
               

            </fieldset>
            <?php echo form_close(); ?>
        </div>
    </div>
    <?php for ($i = 0; $i < count($issueds); $i++) { ?>
        <div class="modal fade" id="modal-default<?= $issueds['main_id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Default Modal</h4>
                    </div>
                    <?php echo form_open('Letter/SendToRegional', array('method' => 'POST')); ?>
                    <div class="modal-body">
                        <input type="hidden" name="main_id" value="<?= $issueds['main_id'] ?>">
                        <input type="hidden" name="department_id" value="<?= $issueds['from'] ?>">
                        <table class="table table-bordered">
                            <tr>
                                <th>Subject</th>
                                <td><?= $issueds['subject'] ?></td>
                            </tr>
                            <tr>
                                <th>Date Of Received</th>
                                <td><?= date("d-M-Y", strtotime($issueds['date_received'])); ?></td>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td>
                                    <select name="department" id="dept_id_<?= $issueds['main_id']; ?>"
                                            class="form-control">
                                        <?php foreach ($departments as $department) { ?>
                                            <option
                                                value="<?= $department['iddepartment'] ?>"><?= $department['department'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Position</th>
                                <td><select name="employee" id="emp_id<?= $issueds['main_id']; ?>"
                                            onchange="getEmployees(<?= $issueds['main_id'] ?>)"
                                            class="form-control">
                                        <?php foreach ($positions as $position) { ?>
                                            <option
                                                value="<?= $position['iddesignation'] ?>"><?= $position['designation'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>To</th>
                                <td><select name="person_name" id="person_name_<?= $issueds['main_id'] ?>"
                                            class="form-control">

                                    </select>
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
    <?php for ($i = 0; $i < count($issueds); $i++) { ?>
        <div class="modal fade" id="track<?= $issueds['main_id'] ?>">
            <div class="modal-dialog" style="width: 90% !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Default Modal</h4>
                    </div>
                    <?php echo form_open('Letter/SendToRegional', array('method' => 'POST')); ?>
                    <div class="modal-body" id="datareturned<?= $issueds['main_id']; ?>">


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
        function getEmployees(id) {

            var dept = $('#dept_id_' + id).val();
            var des = $('#emp_id' + id).val();
            var csrf_test_name = $("input[name=csrf_test_name]").val();
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/Letter/getEmployees',
                dataType: 'html',
                data: {
                    dept: dept, des: des, csrf: csrf_test_name
                },
                cache: false,
                success: function (result) {
                    if (result != '') {
                        $("#person_name_" + id).html(result);
                    } else {
                        alert('No employees for this department');
                    }
                }
            });
        }

        function getDesignation(id) {

            var dept = $('#emp_id' + id).val();
            var csrf_test_name = $("input[name=csrf_test_name]").val();
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/Letter/getEmpDesignation',
                dataType: 'html',
                data: {
                    dept: dept, csrf: csrf_test_name
                },
                cache: false,
                success: function (result) {
                    if (result != '') {
                        $("#person_name_" + id).html(result);
                    } else {
                        alert('No employees for this department');
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
                    $("#datareturned" + id).html(result1);
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
            <div class="modal-content" style="width: 90% !important; height: 451px !important;">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Details of Selected Letters</h4>
                </div>

                <div class="modal-body" id="printdiv" style="height:500px; overflow:auto;">


                </div>
            </div>
        </div>
    </div>


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
        function printDiv(printable) {
            //alert(printable);
            var printContents = document.getElementById(printable).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

        function sendToRegional(id) {
            id++;
            var csrf_test_name = $("input[name=csrf_test_name]").val();
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/Letter/sendToRegional',
                dataType: 'html',
                data: {
                    dept: id, csrf: csrf_test_name
                },
                cache: false,
                success: function (result1) {
                    $("#datareturned" + id).html(result1);
                }
            });
        }
    </script>
