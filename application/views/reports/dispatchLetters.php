<script>
    function printDiv(printable) {
        //alert(printable);
        var printContents = document.getElementById(printable).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

</script>



<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header">
                <h4 class="box-title"></h4>
                <div class="box-tools">
                    <div align='right' ><input type='button' id="myprint" onclick="printDiv('printable1')" value='Print Report' /></div>

                </div>
            </div>
            <div class="box-body" id="printable1">
                <center>
                    <h2>Monthly Dispatched Letters</h2>
                </center>
                <table class="table table-hover table-responsive table-bordered" >

                    <thead>


                    <tr align="left">
                        <th width="10%">Dispatch Date</th>
                        <th width="10%">Date On Letter</th>
                        <th width="10%">Reference No</th>
                        <th width="20%">Subject</th>
                       
                    
                        <th width="10%">Remarks</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php
                    if (!empty($dailys)) {
                        for ($i = 0; $i < count($dailys); $i++) {
                            ?>
                            <tr class="tr1">
                                <td><span
                                        class="blue"><?= date("d-m-Y", strtotime($dailys[$i]['dispatch_date'])); ?></span>
                                </td>
                                <td>
                                <span
                                    class="blue"><?= date("d-m-Y", strtotime($dailys[$i]['date_of_letter'])); ?></span>
                                </td>
                                <td><span class="blue"><?= $dailys[$i]['reference_number']; ?></span></td>
                                <td><span class="blue"><?= $dailys[$i]['subject']; ?></span></td>
                              
                                <td><span class="blue"><?= $dailys[$i]['remarks']; ?></span></td>


                            </tr>
                        <?php } ?>
                    <?php }else{ ?>
                       <tr><td colspan="7" align="center">No Dispatch Letters for <?=date('d-m-Y');?> Date</td></tr>
                    <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
