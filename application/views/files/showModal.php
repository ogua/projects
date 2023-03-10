<table class='table table-bordered' id="example1">
    <thead>

    <tr>
        <th>Received Date</th>
        <th>Registry Number</th>
        <th>Reference No</th>
        <th>Date Of Letter</th>
        <th>To Whom Received</th>
        <th>Subject</th>
        <th>Flag</th>
        <th>Signed Date</th>
        <th>Received By</th>
        

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
                <td><span class="blue"><?= $issueds[$i]['registry_no']; ?></span></td>
                <td><span class="blue"><?= $issueds[$i]['reference_no']; ?></span></td>
                <td><span class="blue"><?= $issueds[$i]['date_on_letter']; ?></span></td>
                <td><span class="blue"><?= $issueds[$i]['from']; ?></span></td>
                <td><span class="blue"><?= $issueds[$i]['subject']; ?></span></td>
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

            
                <td>

                </td>
                <td></td>
                


            </tr>
        <?php } ?>
    <?php } ?>
    </tbody>

</table>
