<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-default">
    <div class="">
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" width="100%" class="table table-responsive">

            <thead>


            <tr align="left">
                <th width="10%">Filed Date</th>
                <th width="10%">Date On Letter</th>
                <th width="10%">Registry No</th>                
                <th width="10%">Reference No</th>
                <th width="20%">Subject</th>
                <th>File Name</th>
                <th>File Number</th>
                <th>Filed By</th>
                <th>Attachment</th>
                <!--<th width="10%">Dispatch To</th>-->
               
            </tr>
            </thead>

            <tbody>

            <?php
            if (!empty($issueds)) {
                for ($i = 0; $i < count($issueds); $i++) {
                    ?>
                    <tr class="tr1">

                        <td>
                              <span
                                class="blue"><?= date("d-m-Y", strtotime($issueds[$i]['dispatch_date'])); ?></span>
                        </td>
                        <td>
                                <span
                                    class="blue"><?= date("d-m-Y", strtotime($issueds[$i]['date_on_letter'])); ?></span>
                        </td>
<td><span class="blue"><?= $issueds[$i]['registry_no']; ?></span></td>                        
<td><span class="blue"><?= $issueds[$i]['reference_no']; ?></span></td>
                        <td><span class="blue"><?= $issueds[$i]['subject']; ?></span></td>
<td><span class="blue"><?= $issueds[$i]['file_name']; ?></span></td>
<td><span class="blue"><?= $issueds[$i]['file_no']; ?></span></td>
<td><span class="blue"><?= $issueds[$i]['empname']; ?></span></td>
                        <td>
                            <?php
                            $idissue = $issueds[$i]['main_id'];
                            $sqlimage = $this->db->query("SELECT * FROM `attachment` WHERE `idissue` = '$idissue'")->result_array();
                            if (!empty($issueds[$i]['image'])) {
                                echo '<ul class="enlarge" style="list-style-type: none;
margin-left: 0;">';
                                // foreach ($sqlimage as $sqlimage) {
                                // $img = explode('.',$sqlimage['path']);
                                $ext = pathinfo($issueds[$i]['image'], PATHINFO_EXTENSION);
                                // print_r($img); ?>
                                <li style="display: inline-block;
position: relative;
z-index: 0;
margin: 0 0 0 10px;
float: left;">
                                    <a href="<?= base_url() . $issueds[$i]['image']; ?>" target="_blank"
                                       class="btn btn-sm btn-success"><i class="fa fa-download"></i> Download</a>
                                </li>
                                <?php //} ?>
                                </ul> <?php
                            } else {
                                echo 'No attachment';
                            }
                            ?>
                        </td>

                        <!--<td><span class="blue"><?= $issueds[$i]['department']; ?></span></td>-->
                        


                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>

        </table>


    </div>
</div>
