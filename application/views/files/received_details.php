<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-default">
    <div class="">
        <div class="box-tools pull-right">
            <a href="<?= base_url() ?>index.php/Letter/issued_files" class="btn btn-warning"><i class="fa fa-backward"></i>
                Back</a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('Letter/new_file', array('method' => 'post')); ?>


        <fieldset class="signup">
            <legend>Received <?= $rowfiletype['filetype']; ?> of <?= $this->department ?> Department</legend>


            <table id="example1" width="100%" class="table table-responsive table-bordered table-hover">

                <thead>


                <tr align="left">
                    <th width="10%">Date</th>
                    <th width="10%">Barcode</th>
                    <th width="20%">Subject</th>
                    <th width="10%">File Type</th>
                    <th width="10%">Flag</th>
                    <th width="10%">To Department</th>
                    <th width="10%">File Status</th>
                    <th width="10%">Action</th>
                </tr>
                </thead>

                <tbody>

                <?php


                ?>
                <?php
                if(!empty($iDetails)){
                for ($i = 0; $i < count($iDetails); $i++) {
                    ?>
                    <tr>
                        <td><?= date("d-m-Y H:i:s", strtotime($iDetails[$i]['datetime'])); ?>
                        </td>
                        <td><?= $iDetails[$i]['barcode']; ?></td>
                        <td><?= $iDetails[$i]['subject']; ?></td>
                        <td><?= $iDetails[$i]['filetype']; ?></td>
                        <?php
                        if ($iDetails[$i]['flag'] == 'Normal') {
                            echo '<td>';
                            echo '<label class="label label-success">' . $iDetails[$i]['flag'] . '</label>';
                            echo '</td>';
                        }
                        if ($iDetails[$i]['flag'] == 'Confidential') {
                            echo '<td>';
                            echo '<label class="label label-primary">' . $iDetails[$i]['flag'] . '</label>';
                            echo '</td>';
                        }
                        if ($iDetails[$i]['flag'] == 'Very Confidential') {
                            echo '<td>';
                            echo '<label class="label label-info">' . $iDetails[$i]['flag'] . '</label>';
                            echo '</td>';
                        }
                        if ($iDetails[$i]['flag'] == 'Urgent') {
                            echo '<td>';
                            echo '<label class="label label-warning">' . $iDetails[$i]['flag'] . '</label>';
                            echo '</td>';
                        }
                        if ($iDetails[$i]['flag'] == 'Immediate') {
                            echo '<td>';
                            echo '<label class="label label-danger">' . $iDetails[$i]['flag'] . '</label>';
                            echo '</td>';
                        }
                        ?>

                        <td><?= $iDetails[$i]['department']; ?></td>
                        <?php
                        if ($iDetails[$i]['filestatus'] == 'Paper Under Consideration (PUC)') {
                            echo '<td>';
                            echo '<label class="label label-danger">' . $iDetails[$i]['filestatus'] . '</label>';
                            echo '</td>';
                        }
                        if ($iDetails[$i]['filestatus'] == 'Disposed off') {
                            echo '<td>';
                            echo '<label class="label label-success">' . $iDetails[$i]['filestatus'] . '</label>';
                            echo '</td>';
                        }
                        ?>

                        <td><?php
                            if ($iDetails[$i]['received'] == 1){
                                echo "Accepted <img src='images/good.icon.png'>";
                            }else{
                            ?>
                            <a href="<?=base_url()?>index.php/Letter/getTrackOfIssuedFiles/<?php echo $iDetails[$i]['idissue']; ?>"
                            class="label label-success">
                                Track </a> |
                            <a onClick="return confirm('Are You Sure?')" class="label label-info"
                               href="<?= base_url() ?>index.php/Letter/update_received/<?php echo $iDetails[$i]['idreceive']; ?>">
                                Accept </a></td>
                        <?php
                        }
                        ?></td>


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
<!-- /.box -->

