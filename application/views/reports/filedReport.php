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
                                    <h4 style="text-align: center">Filed Mails Report from: <strong><?php echo $start ?></strong> to
                                        <strong><?php echo $end ?></strong></h4>
                                    <br>
                                    <h3 style="margin-left: 38%;"><?=$received;?></h3>
                                    <hr>

                                    <table border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                        <thead>
                                        <tr align="left">
                                            <th width="10%">Filed Date</th>
                                            <th width="10%">Date On Letter</th>
                                            <th width="10%">Registry No</th>
                                            <th width="10%">Reference No</th>
                                            <th width="20%">Subject</th>
                                            <th>File Name</th>
                                            <th>File Number</th>
                                            <th>Filed By</th>
                                            <th>Filed Date</th>
                                            <!--<th width="10%">Dispatch To</th>-->

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (!empty($fileds)): foreach ($fileds as $filed) : ?>
                                            <tr class="tr1">
                                                <td><span
                                                        class="blue"><?= date("d-m-Y H:i:s", strtotime($filed['dispatch_date'])); ?></span>
                                                </td>
                                                <td>
                                <span
                                    class="blue"><?= date("d-m-Y H:i:s", strtotime($filed['date_on_letter'])); ?></span>
                                                </td>
                                                <td><span class="blue"><?= $filed['registry_no']; ?></span></td>
                                                <td><span class="blue"><?= $filed['reference_no']; ?></span></td>
                                                <td><span class="blue"><?= $filed['subject']; ?></span></td>
                                                <td><span class="blue"><?= $filed['file_name']; ?></span></td>
                                                <td><span class="blue"><?= $filed['file_no']; ?></span></td>
                                                <td><span class="blue"><?= $filed['empname']; ?></span></td>
                                                <td><span class="blue"><?= date('d-m-Y',strtotime($filed['filed_date'])); ?></span></td>
                                                <!--<td><span class="blue"><?= $filed['department']; ?></span></td>-->



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