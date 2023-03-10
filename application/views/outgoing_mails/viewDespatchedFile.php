<div class="row">
    <div class="col-lg-12">
        <table class="table">
            <?php
            if (!empty($mails)) {
                for ($i = 0; $i < count($mails); $i++) {
                    ?>
                    <tr>
                        <th>Dispatch Date</th>
                        <td><?= date("d-m-Y", strtotime($mails[$i]['dispatch_date'])); ?></td>
                        <th>Date of Letter</th>
                        <td><?= date("d-m-Y", strtotime($mails[$i]['date_of_letter'])); ?></td>
                    </tr>
                    <tr>
                       <th>Subject</th>
                        <td><?= $mails[$i]['subject']; ?></td>
                        <th>Reference No</th>
                        <td><?= $mails[$i]['reference_number']; ?></td>
                    </tr>
                    <tr>
                        <th>Position of Sender</th>
                        <td><?= $mails[$i]['position']; ?>
                        </td>
                        <th>Sending Department</th>
                        <td><?= $mails[$i]['sending_dept']; ?></td>
                    </tr>
                    <tr>
                        <th>Brought By Contact</th>
                        <td><?= $mails[$i]['cell_no']; ?></td>
                        <th>Brought By</th>
                        <td><?= $mails[$i]['brought_by']; ?> </td>
                    </tr>
                    <tr>
                        <th>Sent to</th>
<td><?=$mails[$i]['sent_to'];?></td>
                        <th>Remarks</th>
                        <td><?= $mails[$i]['remarks']; ?>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <?php
                        if ($mails[$i]['status'] == 1) {
                            echo '<td>';
                            echo '<label class="label label-warning">Dispatched</label>';
                            echo '</td>';
                        } else { ?>
                            <td><a href="<?= base_url() ?>index.php/Outgoing_mails/dispatch/<?= $mails[$i]['om_id']; ?>"
                                   class="btn btn-primary">Dispatch It</a>
                            </td>
                        <?php }
                        ?>
                    </tr>
                <?php } }?>
        </table>
    </div>
</div>
