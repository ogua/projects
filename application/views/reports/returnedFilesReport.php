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
                                    <h4 style="text-align: center">Returned Files Report from: <strong><?php echo $start ?></strong> to
                                        <strong><?php echo $end ?></strong></h4>
                                    <br>
                                    <h3 style="margin-left: 38%;"><?=$received;?></h3>
                                    <hr>

                                    <table border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                        <thead>

                                        <tr align="left">
                                            <th>Collection Date</th>
                                            <th>Returned Date</th>
                                            <th>Return Person</th>
                                            <th>Job title</th>
                                            <th>File Given To</th>
                                            <th>File No</th>
                                            <th>File Name</th>
                                            <th>Number of Letters</th>
                                            <th>Returned Letters</th>
                                            <th>Remaining Letters</th>
                                            <th>Status</th>
                                            <th>Remarks</th>
                                        </tr>
                                        
                                        </thead>
                                        <tbody>
                                        <?php if (!empty($returns)): foreach ($returns as $return) : ?>
                                            <tr class="tr1">
                                                <td><span
                                                        class="blue"><?= date("d-m-Y", strtotime($return['date_collected'])); ?></span>
                                                </td>
                                                <td><span
                                                        class="blue"><?= date("d-m-Y", strtotime($return['returned_date'])); ?></span>
                                                </td>
                                                <td><span class="blue"><?= $return['returned_by']; ?></span></td>
                                                <td><span class="blue"><?= $return['returning_job_title']; ?></span></td>
                                                <td><span class="blue"><?= $return['file_given_to']; ?></span></td>
                                                <td><span class="blue"><?= $return['file_no']; ?></span></td>
                                                <td><span class="blue"><?= $return['name_of_file']; ?></span></td>
                                                <td><?= $return['number_of_letters']; ?></td>
                                                <td>
                                                    <?= $return['returned_letters']; ?></td>
                                                <td><?php if($return['returned_letters'] < $return['number_of_letters'])
                                                        echo $remaining = $return['number_of_letters'] - $return['returned_letters']; ?></td>
                                                <td><span class="blue"><?= $return['remarks']; ?></span></td>
                                                <td><span class="blue"><?php if($return['status'] == 0){echo "<span class='label label-success'>Returned</span>";}; ?></span></td>
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