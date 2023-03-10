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
                    <h2>Received Letters on <?=date('d M,Y');?></h2>
                </center>
                <table id="" width="100%" class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Received Date</th>
                        <th>Registry Number</th>
                        <th>Reference No</th>
                        <th>Date Of Letter</th>
                        <th>To Whom Received</th>
                        <th>Subject</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($issueds)) {
                        foreach ($issueds as $issueds) {
                            // print_r($issueds);
                            ?>
                            <tr class="tr1">
                                <td><span
                                        class="blue"><?= date("d-m-Y", strtotime($issueds['date_received'])); ?></span>
                                </td>
                                <td><span class="blue"><?= $issueds['registry_no']; ?></span></td>
                                <td><span class="blue"><?= $issueds['reference_no']; ?></span></td>
                                <td><span class="blue"><?= date('d-m-Y',strtotime($issueds['date_on_letter'])); ?></span></td>
                                <td><span class="blue"><?= $issueds['from']; ?></span></td>
                                <td><span class="blue"><?= $issueds['subject']; ?></span></td>




                            </tr>
                        <?php } ?>
                    <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>



    </div>
</div>
