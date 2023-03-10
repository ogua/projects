<div class="box box-default">
    <div class="">
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <fieldset class="signup" id="printdiv">

            <table class="table table-responsive table-bordered table-hover">

                <thead>


                <tr>
                    <th>Received Date</th>
                    <th>Date On Letter</th>
                    <th>Registry No</th>
                    <th>Reference No</th>
                    <th>Subject</th>
                    <th>Flag</th>
                    <th>File Status</th>
                    <th>Received By</th>
                    <th>Telephone No</th>

                </tr>
                </thead>

                <tbody>

                <?php
                if (!empty($issueds)) {
                    for ($i = 0; $i < count($issueds); $i++) {
                        ?>
                        <tr class="tr1">
                            <td><span
                                    class="blue"><?= date("d-m-Y", strtotime($issueds[$i]['date_of_received'])); ?></span>
                            </td>
                            <td>
                                <span
                                    class="blue"><?= date("d-m-Y", strtotime($issueds[$i]['date_on_letter'])); ?></span>
                            </td>
                            <td><span class="blue"><?= $issueds[$i]['registry_no']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['reference_no']; ?></span></td>
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

                            <?php
                            if ($issueds[$i]['ml_status'] == 0) {
                                echo '<td>';
                                echo '<label class="label label-warning">Received</label>';
                                echo '</td>';
                            }else{
                              echo "<td><span class='label label-info'>Returned</span></td>";
                            }
                            ?>
                            <td></td>
                            <td></td>


                        </tr>
                    <?php } ?>
                <?php } ?>
                </tbody>

            </table>

        </fieldset>

     <div class="box-footer">
         <button type='button' class="btn btn-info" id="myprint" onclick="printDiv('printdiv');updatePrint()">Print Report</button>

     </div>
    </div>
</div>
<!-- /.box -->


<script>
    function getEmployees(id) {

        var dept = $('#dept_id' + id).val();
        var csrf_test_name = $("input[name=csrf_test_name]").val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>index.php/Letter/getEmmDesignation',
            dataType: 'html',
            data: {
                dept: dept, csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
                $("#emp_id" + id).html(result1);
            }
        });
    }

    function return_file(main_id) {

        var from = $('#from').val();
        var to = $('#for').val();
        var des = $('#des').val();
        var csrf_test_name = $("input[name=csrf_test_name]").val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>index.php/Letter/return_file',
            dataType: 'html',
            data: {
                from: from, to: to, des: des, main_id: main_id, csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
                if (result1 == 1) {
                    alert('File Returned Successfully');
                    window.location.href = "<?=base_url()?>index.php/Letter/receive_files";
                }
            }
        });
    }
</script>
<script>
    function printDiv(printable) {
        //alert(printable);
        var printContents = document.getElementById(printable).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
function updatePrint(){
        var csrf_test_name = $("input[name=csrf_test_name]").val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>index.php/Letter/updatePrint',
            dataType: 'html',
            data: {
                csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
                if (result1 == 1) {
                    alert('File Returned Successfully');
                    window.location.href = "<?=base_url()?>index.php/Letter/receive_files";
                }
            }
        });
    }
</script>
