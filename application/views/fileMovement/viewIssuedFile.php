<div class="row">
    <div class="col-lg-12">
        <table class="table">
            <?php
            if (!empty($files)) {
                for ($i = 0; $i < count($files); $i++) {
                    ?>
                    <tr>
                        <th>Date of Issue</th>
                        <td><?= date("d-m-Y H:i:s", strtotime($files[$i]['date_collected'])); ?></td>
                        <th>FIle No</th>
                        <td><?= $files[$i]['file_no']; ?></td>
                    </tr>
                    <tr>
                        <th>File Name</th>
                        <td><?= $files[$i]['name_of_file']; ?></td>
                        <th>File Given To</th>
                        <td><?= $files[$i]['file_given_to']; ?></td>
                    </tr>
                    <tr>
                        <th>Job Title</th>
                        <td><?= $files[$i]['job_title']; ?></td>
                        <th>Telephone No</th>
                        <td><?= $files[$i]['telephone_no']; ?></td>
                    </tr>
                    <tr>
                        <th>Number of Letters</th>
                        <td><?= $files[$i]['number_of_letters']; ?>
                        </td>
                        <th>Number of Days to Return</th>
                        <td><?= $files[$i]['returning_days']; ?> </td>
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
