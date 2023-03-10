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

                                    <h4 style="text-align: center">KWABRE EAST MUNICIPAL ASSEMBLY</h4>
<hr>
                                    <h4 style="text-align: center">Returned Letters Report from: <strong><?php echo $start ?></strong> to
                                        <strong><?php echo $end ?></strong></h4>
                                    <br>
                                    <h3 style="margin-left: 38%;"><?=$received;?></h3>
                                    <hr>

                                    <table border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                        <thead>
                                        <tr style="background-color: #ECECEC">

                                            <th>Returned Date</th>
                                            <th>Registry No</th>
                                            <th>Date of Letter</th>
                                            <th>Reference No</th>
                                            <th>Subject</th>
                                            <th>File Status</th>
                                            <th>Returned By</th>
                                            <th>Returned By Contact</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (!empty($returneds)): foreach ($returneds as $returned) : ?>
                                            <tr class="tr1">
                                                <td><span
                                                        class="blue"><?= date("d-m-Y", strtotime($returned['date_of_sending'])); ?></span>
                                                </td>
                                                <td><span class="blue"><?= $returned['registry_no']; ?></span></td>
                                                <td><span
                                                        class="blue"><?= date("d-m-Y", strtotime($returned['date_on_letter'])); ?></span>
                                                </td>
                                                <td><span class="blue"><?= $returned['reference_no']; ?></span></td>
                                                <td><span class="blue"><?= $returned['subject']; ?></span></td>


                                                <?php if ($returned['ml_status'] == 1) {
                                                    echo '<td>';
                                                    echo '<label class="label label-inverse" style="background-color: darkgrey">Returned</label>';
                                                    echo '</td>';
                                                }
                                                ?>
                                                <td><span class="blue"><?= $returned['returned_by']; ?></span></td>
                                                <td><span class="blue"><?= $returned['returned_contact']; ?></span></td>
                                                <td><span class="blue"><?= $returned['empname']; ?></span></td>
                                                <td><span
                                                        class="blue"><?php if($returned['returned_date'] == '' || $returned['returned_date'] == '0000-00-00'){

                                                        }else{echo date("d-m-Y", strtotime($returned['returned_date']));
                                                        } ?></span>
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