<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM box-->
        <div class="box">
            <div class="box-title">
                <h4><i class="icon-reorder"></i> </h4>
						<span class="tools">
							<a href="javascript:;" class="icon-chevron-down"></a>
						</span>
            </div>
            <div class="box-body">
                <!-- BEGIN FORM-->

                
                <!-- END FORM-->
                <?php if (isset($_REQUEST['Action']) == "Search") { ?>

                    <div class="row ">
                        <div class="col-md-8 col-md-offset-2">
                            <form method="post" action="#">
                                <div class="btn-group pull-right">
                                    <a onclick="print_invoice('printableArea')" class="btn btn-primary">Print</a>
                                    <input name="start_date" value="2017-04-05" type="hidden">
                                    <input name="end_date" value="2017-04-05" type="hidden">

                                </div>
                            </form>

                        </div>
                    </div>

                    <br>
                    <br>
                    <div id="printableArea">
                        <link href="<?= base_url(); ?>assets/sales_report.css" rel="stylesheet" type="text/css">


                        <div class="row ">
                            <div class="col-md-12">


                                <main class="invoice_report">

                                    <h4 style="text-align: center">MAMPONG MUNICIPAL ASSEMBLY</h4>
<hr>
                                    <h4 style="text-align: center">Forwarded Mails Report from: <strong><?php echo $start ?></strong> to
                                        <strong><?php echo $end ?></strong></h4>
                                    <br>
                                    <h3 style="margin-left: 38%;"><?=$received;?></h3>
                                    <hr>

                                    <table border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Received Date</th>
                                            <th>Date of Letter</th>
                                            <th>Registry No</th>
                                            <th>Reference No</th>
                                            <th>Subject</th>
                                            <th>To Whom Received</th>
                                            <th>Flag</th>
                                            <th>File Status</th>
                                            <th>Received By</th>
                                            <th>Received By Contact</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (!empty($forwardeds)): foreach ($forwardeds as $forwarded) : ?>
                                            <tr class="tr1">
                                                <td><span
                                                        class="blue"><?= date("d-m-Y", strtotime($forwarded['date_of_received'])); ?></span>
                                                </td>
                                                <td>
                                <span
                                    class="blue"><?= date("d-m-Y", strtotime($forwarded['date_on_letter'])); ?></span>
                                                </td>
                                                <td><span class="blue"><?= $forwarded['registry_no']; ?></span></td>
                                                <td><span class="blue"><?= $forwarded['reference_no']; ?></span></td>
                                                <td><span class="blue"><?= $forwarded['subject']; ?></span></td>
                                                <td><span class="blue"><?= $forwarded['from']; ?></span></td>
                                                <?php
                                                if ($forwarded['flag'] == 'Normal') {
                                                    echo '<td>';
                                                    echo '<label class="label label-success">' . $forwarded['flag'] . '</label>';
                                                    echo '</td>';
                                                }
                                                if ($forwarded['flag'] == 'Confidential') {
                                                    echo '<td>';
                                                    echo '<label class="label label-primary">' . $forwarded['flag'] . '</label>';
                                                    echo '</td>';
                                                }
                                                if ($forwarded['flag'] == 'Very Confidential') {
                                                    echo '<td>';
                                                    echo '<label class="label label-info">' . $forwarded['flag'] . '</label>';
                                                    echo '</td>';
                                                }
                                                if ($forwarded['flag'] == 'Urgent') {
                                                    echo '<td>';
                                                    echo '<label class="label label-warning">' . $forwarded['flag'] . '</label>';
                                                    echo '</td>';
                                                }
                                                if ($forwarded['flag'] == 'Immediate') {
                                                    echo '<td>';
                                                    echo '<label class="label label-danger">' . $forwarded['flag'] . '</label>';
                                                    echo '</td>';
                                                }
                                                ?>

                                                <?php
                                                if ($forwarded['ml_status'] == 0) {
                                                    echo '<td>';
                                                    echo '<label class="label label-warning">Received</label>';
                                                    echo '</td>';
                                                }else{
                                                    echo "<td><span class='label label-info'>Returned</span></td>";
                                                }
                                                ?>
                                                <td>
                                                    <?=$forwarded['received_by'];?>
                                                </td>
                                                <td>
                                                    <?=$forwarded['received_contact'];?>
                                                </td>

                                            </tr>

                                            <?php
                                        endforeach;
                                        endif;
                                        ?>


                                        </tbody>

                                    </table>
                                </main>

                            </div>
                        </div>

                    </div>
                <?php } ?>

            </div>
        </div>
        <!-- END SAMPLE FORM box-->
    </div>
</div>

<script type="text/javascript">
    function print_invoice(printableArea) {

        var table = $('#dataTables-example').DataTable();
        table.destroy();

        //$('#dataTables-example').attr('id','none');
        var printContents = document.getElementById(printableArea).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        //$('table').attr('id','dataTables-example');
        location.reload(document.body.innerHTML = originalContents);
        //document.body.innerHTML = originalContents;
    }
</script>