<style>
    ul.enlarge li{
        display:inline-block; /*places the images in a line*/
        position: relative;
        z-index: 0; /*resets the stack order of the list items - later we'll increase this*/
        margin:0 0 0 10px;
        float: left;
    }
    ul.enlarge img{
        width:30px;
        height:30px;
        background-color:#eae9d4;
        padding: 6px;
        -webkit-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
        -moz-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
        box-shadow: 0 0 6px rgba(132, 132, 132, .75);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }
    ul.enlarge span{
        position:absolute;
        left: -9999px;
        background-color:#eae9d4;
        padding: 10px;
        font-family: 'Droid Sans', sans-serif;
        font-size:.9em;
        text-align: center;
        color: #495a62;
        -webkit-box-shadow: 0 0 20px rgba(0,0,0, .75));
        -moz-box-shadow: 0 0 20px rgba(0,0,0, .75);
        box-shadow: 0 0 20px rgba(0,0,0, .75);
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius:8px;
    }
    ul.enlarge li:hover{
        z-index: 9999999999;
        cursor:pointer;
    }
    ul.enlarge span img{
        padding:2px;
        width:200px;
        height:150px;
        background:#ccc;
    }
    ul.enlarge li:hover span{
        top: -100px; /*the distance from the bottom of the thumbnail to the top of the popup image*/
        left: -20px; /*distance from the left of the thumbnail to the left of the popup image*/
    }
    ul.enlarge li:hover:nth-child(2) span{
        left: -100px;
    }
    ul.enlarge li:hover:nth-child(3) span{
        left: -100px;
    }
    /**IE Hacks - see http://css3pie.com/ for more info on how to use CS3Pie and to download the latest version**/
    ul.enlarge img, ul.enlarge span{
        behavior: url(pie/PIE.htc);
    }
</style>

<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-default">
    <div class="">
        <div class="box-tools pull-right">
            <a href="<?= base_url() ?>index.php/Letter/issued_files" class="btn btn-warning"><i
                    class="fa fa-backward"></i>
                Back</a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('Letter/new_file', array('method' => 'post')); ?>


        <fieldset class="signup">

            <table id="example1" width="100%" class="table table-responsive">

                <thead>


                <tr>
                    <th>Creation Date</th>
                    <th>Registry No</th>
                    <th>Date On Letter</th>
                    <th>Subject</th>
                    <th>File Type</th>
                    <th>Flag</th>
                    <th>From</th>
                    <th>To</th>
                    <th>File Status</th>
                    <th>Remarks</th>
                    <th>Created By</th>
                    <th>Attachment</th>
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
                                    class="blue"><?= date("d-m-Y H:i:s", strtotime($issueds[$i]['date_received'])); ?></span>
                            </td>
                            <td><span class="blue"><?= $issueds[$i]['main_id']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['date_on_letter']; ?></span></td>
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
                            if ($issueds[$i]['filestatus'] == 'Not Sent') {
                                echo '<td>';
                                echo '<label class="label label-primary">' . $issueds[$i]['filestatus'] . '</label>';
                                echo '</td>';
                            }
                            if ($issueds[$i]['filestatus'] == 'Sent') {
                                echo '<td>';
                                echo '<label class="label label-success">' . $issueds[$i]['filestatus'] . '</label>';
                                echo '</td>';
                            }
                            if ($issueds[$i]['filestatus'] == 'Disposed off') {
                                echo '<td>';
                                echo '<label class="label label-success">' . $issueds[$i]['filestatus'] . '</label>';
                                echo '</td>';
                            }
                            if ($issueds[$i]['filestatus'] == 'Endorsed') {
                                echo '<td>';
                                echo '<label class="label label-warning">' . $issueds[$i]['filestatus'] . '</label>';
                                echo '</td>';
                            }
                            if ($issueds[$i]['filestatus'] == 'Forwarded') {
                                echo '<td>';
                                echo '<label class="label label-success">' . $issueds[$i]['filestatus'] . '</label>';
                                echo '</td>';
                            }
                            if ($issueds[$i]['filestatus'] == 'Pending') {
                                echo '<td>';
                                echo '<label class="label label-info">' . $issueds[$i]['filestatus'] . '</label>';
                                echo '</td>';
                            }
                            ?>
                            <td><?=$issueds[$i]['remarks']?></td>
                            <td><?= $issueds[$i]['empname']; ?></td>
                            <td>
                                <?php
                                $idissue = $issueds[$i]['main_id'];
                                $sqlimage = $this->db->query("SELECT * FROM `attachment` WHERE `idissue` = '$idissue'")->result_array();
                                if (!empty($sqlimage)) {
                                    echo '<ul class="enlarge" style="list-style-type: none;
margin-left: 0;">';
                                    foreach ($sqlimage as $sqlimage) {
                                        // $img = explode('.',$sqlimage['path']);
                                        $ext = pathinfo($sqlimage['path'], PATHINFO_EXTENSION);
                                        // print_r($img); ?>
                                        <li style="display: inline-block;
position: relative;
z-index: 0;
margin: 0 0 0 10px;
float: left;">
                                            <?php if($ext == 'jpeg' || $ext  == 'jpg'){?>
                                                <img src="<?=base_url() . $sqlimage['path']?>" width="50px" height="" alt="Attachment" />
                                                <span><img src="<?=base_url() . $sqlimage['path'];?>" alt="Attachment"><br>Attachment</span>
                                            <?php }else{?>
                                                <a href="<?=base_url().$sqlimage['path'];?>" class="btn btn-sm btn-success">Download</a>
                                            <?php }?>
                                        </li>
                                    <?php } ?>
                                    </ul> <?php
                                } else {
                                    echo 'No attachment';
                                }
                                ?>
                            </td>
                            <td>
                                <?php if($issueds[$i]['filestatus'] == 'Endorsed'){?>
                                    <a href="#track<?=$issueds[$i]['main_id'];?>" onclick="getReturned(<?=$issueds[$i]['main_id'];?>)" class="imran" data-toggle="modal">
                                        Track </a> | <?php } ?> <?php if ($issueds[$i]['forwarded'] == '') { ?>
                                    <a class="btn btn-default" data-toggle="modal"
                                       data-target="#modal-default<?= $issueds[$i]['main_id']; ?>">
                                        Forward
                                    </a>
                                <?php }elseif($issueds[$i]['forwarded'] == 'Received Back'){   ?>
                                    <span class='label label-info' style="background-color: #381f00 !important"><?php echo $issueds[$i]['forwarded'];?></span>
                                <?php   }else{ ?>
                                    <span class='label label-info'><?php echo $issueds[$i]['forwarded'];?></span>
                                <?php   } ?>
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
                <?php echo form_open('Letter/SendToRegional', array('method' => 'POST')); ?>
                <div class="modal-body">
                    <input type="hidden" name="main_id" value="<?= $issueds[$i]['main_id'] ?>">
                    <input type="hidden" name="department_id" value="<?= $issueds[$i]['from'] ?>">
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
                                <select name="department" id="dept_id" class="form-control">
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
                                    <?php foreach ($positions as $position) { ?>
                                        <option
                                            value="<?= $position['iddesignation'] ?>"><?= $position['designation'] ?></option>
                                    <?php } ?>
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
    <div class="modal fade" id="track<?= $issueds[$i]['main_id'] ?>">
        <div class="modal-dialog" style="width: 90%;">
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
                dept: dept, csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
                $("#emp_id").html(result1);
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
