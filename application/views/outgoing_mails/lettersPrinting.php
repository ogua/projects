<!DOCTYPE html>
<html lang="en">

<head>
    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <style>
        img {
            width: 100%
        }

        img {
            width: 100%
        }
    </style>
    <style>
        .container {
            border: 1px solid black;
            width: 100%;
        }

        header, footer {
            padding: 0em;
            color: black;
            clear: left;
            text-align: center;
        }
    </style>
    <style>
        .container1 {
            width: 100%;
            height: 341px;
            border: 1px solid black;
        }

        header, footer {
            padding: 0em;
            color: black;
            clear: left;
            text-align: left;
        }
    </style>
    <style>
        .container2 {
            width: 95%;
            margin: 10px;
            border: 1px solid black;
        }

        header, footer {
            padding: 1em;
            color: black;
            clear: left;
            text-align: left;
        }

        .container3 {
            width: 100%;
            border: 1px solid black;
        }
    </style>
    <style>
        table, th, td {

            border: 1px solid black;
        }

        th, td {

            text-align: left;
            padding: 4px !important;
        }
    </style>
    <meta charset="utf-8">
    <title>Printout</title>

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="http://webapp.school/backend/assets/printpage/paper.css">
    <link rel="stylesheet" href="http://webapp.school/backend/assets/printpage/normalize.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>@page {
            size: A4 portrait;

        }

        @media print {
            #myprint {
                display: none;

            }

        }

    </style>

</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4 portrait">
<!-- Each sheet element should have the class "sheet" -->
<!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
<section class="sheet padding-10mm" id="printdiv">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3" style="text-align: center;">
         <!--<img src="<?=base_url();?>uploads/images/logo.jpg" style="width: 235px;">-->
            <h3 style="margin-top: 15px; margin-bottom: 0;"> OUTGOING MAIL(S) FROM RECORDS DEPARTMENT </h3>
            <br/>
            <h4 style="margin-top: 0; margin-bottom: 0;">DATE:<?= date('d M,Y'); ?></h4>
            <br/>

            <div class="row">
                <div class="col-lg-8" style="text-align: left !important; margin-left: 20px;">
                    <h3>Date Of Letter : <?= date("d-m-Y", strtotime($issueds['date_of_letter'])); ?></h3>
                    <h4>Subject : <?= $issueds['subject']; ?></h4>
                    <h4>Sending Department/Institution : <?= $issueds['sending_dept']; ?></h4>
                    <h4>Reference Number : <?= $issueds['reference_number']; ?></h4>
                </div>
            </div>

        </div>
        <br>
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;

        <table class="table" style="margin-left: 22px; width: 84%;">
            <thead>
            <tr>
                <th>Dispatch/Sent to</th>
                <th>Received By</th>
                <th>Telephone No</th>
                <th>Job Title</th>
                <th>Signature</th>
            </tr>
            </thead>
            <tbody>

            <?php
            if (!empty($issueds)) {

                ?><?php
                $d = $issueds['sent_to'];
                $names = explode(',', $d);
                $c = count($names);
                //print_r($names);exit;
                for ($i = 0; $i < count($names); $i++) {
                    ?>
                    <tr class="tr1">

                        <td><span
                                class="blue"><?php echo $names[$i]; ?></span>
                        </td>
                        <td></td>
                        <td>

                        </td>

                        <td></td>
                        <td></td>


                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>


    </div>

<br>    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;

    <button type='button' class="btn btn-info" id="myprint" onclick="printDiv('printdiv');">Print Report
    </button>
</section>

<script>
    function printDiv(printable) {
        //alert(printable);
        var printContents = document.getElementById(printable).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        window.location.href = "<?=base_url()?>index.php/Outgoing_mails/outgoingMails";
    }
</script>
<script>
    function updatePrint() {
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


</body>
</html>