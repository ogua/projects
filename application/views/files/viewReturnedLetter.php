<div class="row">
    <div class="col-lg-12">
        <table class="table">
            <?php
            if (!empty($issueds)) {
            for ($i = 0; $i < count($issueds); $i++) {
            ?>
            <tr>
                <th>Returned Date</th>
                <td><?= date("d-m-Y", strtotime($issueds[$i]['date_of_sending'])); ?></td>
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
                <th>Subject</th>
                <td><?= $issueds[$i]['subject']; ?></td>
                <th>Status</th>
                <?php if ($issueds[$i]['ml_status'] == 1) {
                    echo '<td>';
                    echo '<label class="label label-inverse" style="background-color: darkgrey">Returned</label>';
                    echo '</td>';
                }
                ?>
            </tr>
            <tr>
                <th>Returned By</th>
                <td><?= $issueds[$i]['returned_by']; ?></td>
               <th>Created Date</th>
                <td><span
                        class="blue"><?php if($issueds[$i]['returned_date'] == '' || $issueds[$i]['returned_date'] == '0000-00-00'){

                        }else{echo date("d-m-Y", strtotime($issueds[$i]['returned_date']));
                        } ?></span>
                </td>
            </tr>
            <tr>
                <th>Created By</th>
                <td><?= $issueds[$i]['empname']; ?></td>
                
            </tr>
            <?php } }?>
        </table>
    </div>
</div>
