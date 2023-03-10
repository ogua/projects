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
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('Letter/new_file', array('method' => 'post')); ?>


        <fieldset class="signup">
            <legend>File Track of Case No: <?= $track->case_no; ?></legend>


            <table width="100%">
                <tr>
                    <th align="left">File Type</th>
                    <td><?= $track->doc_type; ?></td>
                    <th align="left">Flag</th>
                    <?php
                    if ($track->flag == 'Normal') {
                        echo '<td>';
                        echo '<label class="label label-success">' . $track->flag . '</label>';
                        echo '</td>';
                    }
                    if ($track->flag == 'Confidential') {
                        echo '<td>';
                        echo '<label class="label label-primary">' . $track->flag . '</label>';
                        echo '</td>';
                    }
                    if ($track->flag == 'Very Confidential') {
                        echo '<td>';
                        echo '<label class="label label-info">' . $track->flag . '</label>';
                        echo '</td>';
                    }
                    if ($track->flag == 'Urgent') {
                        echo '<td>';
                        echo '<label class="label label-warning">' . $track->flag . '</label>';
                        echo '</td>';
                    }
                    if ($track->flag == 'Immediate') {
                        echo '<td>';
                        echo '<label class="label label-danger">' . $track->flag . '</label>';
                        echo '</td>';
                    }
                    ?>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th align="left">Subject</th>
                    <td><?= $track->subject; ?></td>
                    <th align="left">Reference No</th>
                    <td><?= $track->reference_no; ?></td>
                    <th align="left">Registry No</th>
                    <td><?= $track->registry_no; ?></td>

                </tr>
                <tr>
                    <th align="left">Attachment</th>
                    <td>
                        <?php
                        $idissue = $track->main_id;
                        $sqlimage = $this->db->query("SELECT * FROM `attachment` WHERE `idissue` = '$idissue'")->result_array();
                        if (!empty($sqlimage)) {
                            echo '<ul class="enlarge" style="list-style-type: none;
margin-left: 0;">';
                            foreach ($sqlimage as $sqlimage) {
                                echo '<li style="display: inline-block;
position: relative;
z-index: 0;
margin: 0 0 0 10px;
float: left;"><img src="' . base_url() . $sqlimage['path'] . '" width="50px" height="" alt="Attachment" />
                                <span><img src="' . base_url() . $sqlimage['path'] . '" alt="Attachment"><br>Attachment</span></li>';
                            }
                            echo '</ul>';
                        } else {
                            echo 'No attachment';
                        }
                        ?>
                    </td>
                </tr>

            </table>

            <br>


            <table width="100%" id="example1" class="table table-responsive">
                <thead>
                <tr align="left">
                    <th>From Department</th>
                    <th>To Department</th>
                    <th>Remarks</th>
                    <th>File Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // error_reporting(0);
                $sql = $this->db->query("SELECT * FROM `main_log` WHERE `main_id`='$idissue'")->result_array();
                foreach ($sql as $row) {
                    ?>
                    <tr>

                        <td><?php
                            $fdept = $row['from'];
                            $resultfdept = $this->db->query("SELECT * FROM `department` WHERE `iddepartment`='$fdept'")->row_array();
                            echo $resultfdept['department'];
                            echo "<br>";
                            echo '<label class="label label-success">' . date("d-m-Y H:i A", strtotime($row['date_of_sending'])) . '</label>';
                            ?></td>
                        <td><?php
                            $todept = $row['for'];
                            $sqltdept = $this->db->query("SELECT * FROM `department` WHERE `iddepartment`='$todept'")->row_array();
                            echo $sqltdept['department'];
                            ?></td>

                        <td><?= $row['remarks']; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

        </fieldset>


        <!-- /.box-body -->

        <?php echo form_close(); ?>

    </div>
</div>
<!-- /.box -->

