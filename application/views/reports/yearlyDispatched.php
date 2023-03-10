<script>
    function myprint()
    {
        document.getElementById('myprint').style.display='none';
        window.print();
        document.getElementById('myprint').style.display='block';
    }


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
                    <div align='right' ><input type='button' id="myprint" onclick="printDiv('printable')" value='Print Report' /></div>

                </div>
            </div>
            <div class="box-body" id="printable">
                <center>
                    <h2>Dispatched Letters in <?=date('Y');?></h2>
                </center>
                <table class="table table-responsive table-bordered table-hover">

                    <thead>


                    <tr>
                        <th>Dispatch Date</th>
                        <th>Date Of Letter</th>
                        <th>Reference No</th>
                        <th>Subject</th>

                    </tr>
                    </thead>

                    <tbody>

                    <?php
                    if (!empty($mails)) {
                        for ($i = 0; $i < count($mails); $i++) {
                            ?>
                            <tr class="tr1">
                                <td><span
                                        class="blue"><?= date("d-m-Y", strtotime($mails[$i]['dispatch_date'])); ?></span>
                                </td>
                                <td>
                                    <span class="blue"><?= date("d-m-Y", strtotime($mails[$i]['date_of_letter'])); ?></span>
                                </td>
                                <td><span class="blue"><?= $mails[$i]['reference_number']; ?></span></td>
                                <td><span class="blue"><?= $mails[$i]['subject']; ?></span></td>

                            </tr>
                        <?php } ?>
                    <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>



    </div>
</div>
