<div class="row">
    <div class="col-lg-12">
        <table class="table">
            <?php
            if (!empty($issueds)) {
            for ($i = 0; $i < count($issueds); $i++) {
            ?>
            <tr>
                <th>Received Date</th>
                <td><?= date("d-m-Y H:i:s", strtotime($issueds[$i]['date_of_received'])); ?></td>
                <th>Registry Number</th>
                <td><?= $issueds[$i]['registry_no']; ?></td>
            </tr>
            <tr>
                <th>Reference Number</th>
                <td><?= $issueds[$i]['reference_no']; ?></td>
                <th>Date of Letter</th>
                <td><?= date("d-m-Y",strtotime($issueds[$i]['date_on_letter'])); ?></td>
            </tr>
            <tr>
                <th>To Whom Received</th>
                <td><?= $issueds[$i]['from']; ?></td>
                <th>Subject</th>
                <td><?= $issueds[$i]['subject']; ?></td>
            </tr>
            <tr>
                <th>Flag</th>
                 <td><?php
                    if ($issueds[$i]['flag'] == 'Normal') {
                        echo '<label class="label label-success">' . $issueds[$i]['flag'] . '</label>';

                    }
                    if ($issueds[$i]['flag'] == 'Confidential') {
                        echo '<label class="label label-primary">' . $issueds[$i]['flag'] . '</label>';
                    }
                    if ($issueds[$i]['flag'] == 'Very Confidential') {

                        echo '<label class="label label-info">' . $issueds[$i]['flag'] . '</label>';
                    }
                    if ($issueds[$i]['flag'] == 'Urgent') {
                        echo '<label class="label label-warning">' . $issueds[$i]['flag'] . '</label>';
                    }
                    if ($issueds[$i]['flag'] == 'Immediate') {
                        echo '<label class="label label-danger">' . $issueds[$i]['flag'] . '</label>';
                    }
                    ?>
                </td>
                <th>Status</th>
                <?php
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
            </tr>
            
            <?php } }?>
        </table>
    </div>
</div>
