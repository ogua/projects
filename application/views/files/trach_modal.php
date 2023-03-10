<table class='table table-bordered' id="example1">
    <tr align='left'>
        <th>Date of Received</th>
        <th>Date of Sending</th>
        <th>Registry No</th>
        <th>Reference No</th>
        <th>Subject</th>
        <th>File Type</th>
        <th>Flag</th>
        <th>From</th>
        <th>File Status</th>
        <th>Action</th>
    </tr>
    <tbody>
    <?php foreach ($sql as $item) { ?>
        <tr>
            <td> <?php if ($item->date_of_received == '' || $item->date_of_received == '0000-00-00') {
                    
                }else{echo date('d M, Y', strtotime($item->date_of_received));} ?></td>

            <td> <?php if ($item->date_of_sending == '' || $item->date_of_sending == '0000-00-00') {
                    
                }else{echo date('d M, Y', strtotime($item->date_of_sending));} ?></td>

            <td> <?php echo $item->registry_no?></td>
            <td> <?php echo $item->reference_no ?></td>
            <td> <?php echo $item->subject ?></td>
            <td><?php echo $item->filetype ?></td>
            <?php
            if ($item->flag == 'Normal') {
                echo '<td>';
                echo '<label class="label label-success">' . $item->flag . '</label>';
                echo '</td>';
            }
            if ($item->flag == 'Confidential') {
                echo '<td>';
                echo '<label class="label label-primary">' . $item->flag . '</label>';
                echo '</td>';
            }
            if ($item->flag == 'Very Confidential') {
                echo '<td>';
                echo '<label class="label label-info">' . $item->flag . '</label>';
                echo '</td>';
            }
            if ($item->flag == 'Urgent') {
                echo '<td>';
                echo '<label class="label label-warning">' . $item->flag . '</label>';
                echo '</td>';
            }
            if ($item->flag == 'Immediate') {
                echo '<td>';
                echo '<label class="label label-danger">' . $item->flag . '</label>';
                echo '</td>';
            }
            ?>
            <td><?php echo $item->from ?></td>
            <td><?php if ($item->ml_status == 1) {
                    echo "<span class='label label-warning'>Endorsed</span>";
                }
                if ($item->ml_status == 8) {
                    echo "<span class='label label-default'>Submitted</span>";
                }
                ?></td>
            <td><?php if ($item->ml_status == 1 && $item->dispatched != '1') { ?>
                    <a href="<?= base_url() ?>index.php/Letter/DispatchForm/<?= $item->main_log_id; ?>"
                       class="btn btn-success">File this Letter</a>
                <?php } elseif($item->ml_status == 1 && $item->dispatched == 1) { ?>
                <span class="label label-dark" style="background-color: #00a157">Already Filed</span>
                <?php } ?>
            </td>
        </tr>
    <?php }
    ?>
    </tbody>

</table>
