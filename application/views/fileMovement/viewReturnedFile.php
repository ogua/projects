<div class="row">
    <div class="col-lg-12">
        <table class="table">
            <?php
            if (!empty($files)) {
                for ($i = 0; $i < count($files); $i++) {
                    ?>
                    <tr>
                        <th>Collection Date</th>
                        <td><?= date("d-m-Y H:i:s", strtotime($files[$i]['date_collected'])); ?></td>
                       <th>Returned Date</th>
                        <td><?= date("d-m-Y H:i:s", strtotime($files[$i]['returned_date'])); ?></td>

                    </tr>
                    <tr>
                        <th>Return Person</th>
                        <td><?= $files[$i]['returned_by']; ?></td>
                        <th>Job Title</th>
                        <td><?= $files[$i]['returning_job_title']; ?></td>
                    </tr>
                    <tr>
                        <th>File Given To</th>
                        <td><?= $files[$i]['file_given_to']; ?></td>
                        <th>File No</th>
                        <td><?= $files[$i]['file_no']; ?></td>
                    </tr>
                    <tr>
                        <th>File Name</th>
                        <td><?= $files[$i]['name_of_file']; ?>
                        </td>
                        <th>Number of Letters</th>
                        <td><?= $files[$i]['number_of_letters']; ?> </td>
                    </tr>
                    <tr>
                        <th>Returned Letters</th>
                        <td><?= $files[$i]['returned_letters']; ?></td>
                        <th>Remaining Letters</th>
                        <td><?php if($files[$i]['returned_letters'] < $files[$i]['number_of_letters'])
                                echo $remaining = $files[$i]['number_of_letters'] - $files[$i]['returned_letters']; ?></td>
                    </tr>
            <tr>
                <th>Remarks</th>
                <td><?= $files[$i]['remarks']; ?></td>
                <th>Status</th>
                <td><span
                        class="blue"><?php if ($files[$i]['status'] == 1 && $files[$i]['returned_status'] == 'Unreturned') {
                            echo "<span class='label label-danger'>Issued Out</span>";
                        } else {
                            echo "<span class='label label-primary'>Returned Back</span>";
                        } ?></span></td>
                </tr>
                <?php } }?>
        </table>
    </div>
</div>
