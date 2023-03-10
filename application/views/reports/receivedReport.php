<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM box-->
        <div class="box">
            <div class="box-title">
                
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
                                    <h4 style="text-align: center">Received Mails Report from: <strong><?php echo $start ?></strong> to
                                        <strong><?php echo $end ?></strong></h4>
                                    <br>
                                    <h3 style="margin-left: 38%;"><?=$received;?></h3>
                                    <hr>

                                    <table border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                        <thead>
                                        <tr style="background-color: #ECECEC">

                                            <th width="10%">Received Date</th>
                                            <th>Registry Number</th>
                                            <th>Reference No</th>
                                            <th>Date Of Letter</th>
                                            <th>To Whom Received</th>
                                            <th>Subject</th>
                                            <th>Flag</th>
                                            <th> File Status</th>
                                            <th> Created By</th>
                                            <th width="10%"> Created Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (!empty($receiveds)): foreach ($receiveds as $received) : ?>
                                            <tr>
                                                <td class="no"><?= date("d-m-Y", strtotime($received['date_received'])); ?></td>
                                                <td class="desc"><h3><?= $received['registry_no']; ?></h3>
                                                </td>
                                                <td class="unit"><?= $received['reference_no']; ?></td>
                                                <td class="unit"><?= date('d-m-Y',strtotime($received['date_on_letter'])); ?></td>

                                                <td class="qty"><?= $received['from']; ?></td>
                                                <td class="total"><?= $received['subject']; ?></td>
                                                <?php
                                                if ($received['flag'] == 'Normal') {
                                                    echo '<td>';
                                                    echo '<label class="label label-success">' . $received['flag'] . '</label>';
                                                    echo '</td>';
                                                }
                                                if ($received['flag'] == 'Confidential') {
                                                    echo '<td>';
                                                    echo '<label class="label label-primary">' . $received['flag'] . '</label>';
                                                    echo '</td>';
                                                }
                                                if ($received['flag'] == 'Very Confidential') {
                                                    echo '<td>';
                                                    echo '<label class="label label-info">' . $received['flag'] . '</label>';
                                                    echo '</td>';
                                                }
                                                if ($received['flag'] == 'Urgent') {
                                                    echo '<td>';
                                                    echo '<label class="label label-warning">' . $received['flag'] . '</label>';
                                                    echo '</td>';
                                                }
                                                if ($received['flag'] == 'Immediate') {
                                                    echo '<td>';
                                                    echo '<label class="label label-danger">' . $received['flag'] . '</label>';
                                                    echo '</td>';
                                                }
                                                ?>
                                                <?php
                                                if ($received['filestatus'] == 'Not Sent') {
                                                    echo '<td>';
                                                    echo '<label class="label label-primary">' . $received['filestatus'] . '</label>';
                                                    echo '</td>';
                                                }
                                                if ($received['filestatus'] == 'Sent') {
                                                    echo '<td>';
                                                    echo '<label class="label label-success">' . $received['filestatus'] . '</label>';
                                                    echo '</td>';
                                                }
                                                if ($received['filestatus'] == 'Disposed off') {
                                                    echo '<td>';
                                                    echo '<label class="label label-success">' . $received['filestatus'] . '</label>';
                                                    echo '</td>';
                                                }
                                                if ($received['filestatus'] == 'Endorsed') {
                                                    echo '<td>';
                                                    echo '<label class="label label-warning">' . $received['filestatus'] . '</label>';
                                                    echo '</td>';
                                                }
                                                if ($received['filestatus'] == 'Forwarded') {
                                                    echo '<td>';
                                                    echo '<label class="label label-success">' . $received['filestatus'] . '</label>';
                                                    echo '</td>';
                                                }
                                                if ($received['filestatus'] == 'Pending') {
                                                    echo '<td>';
                                                    echo '<label class="label label-info">' . $received['filestatus'] . '</label>';
                                                    echo '</td>';
                                                }
                                                ?>
                                                <?php
                                                if ($received['filestatus'] == 'Printing') {
                                                    echo '<td>';
                                                    echo '<label class="label label-info">' . $received['filestatus'] . '</label>';
                                                    echo '</td>';
                                                }
                                                ?>
                                                <td><?php echo $received['empname'];?></td>
                                                <td><span
                                                        class="blue"><?= date("d-m-Y", strtotime($received['date_received'])); ?></span>
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