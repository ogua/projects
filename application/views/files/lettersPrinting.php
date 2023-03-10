<!DOCTYPE html>
<html lang="en">

<head>
    <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <style>
        img { width: 100% }
        img { width: 100% }
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
        table, th,td {

            border: 1px solid black;
        }
        th, td {

            text-align: left;
            padding: 4px !important;
        }
    </style>
    <meta charset="utf-8">
    <title>Admission Voucher</title>

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="http://webapp.school/backend/assets/printpage/paper.css">
    <link rel="stylesheet" href="http://webapp.school/backend/assets/printpage/normalize.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>@page { size: A4 portrait;
         
        }
        @media print {
            #myprint {
                display: none;
                
            }
            
        }

    </style>
    <script>
        function printDiv(printable) {
            //alert(printable);
            var printContents = document.getElementById(printable).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
 window.location.href = "<?=base_url()?>index.php/Letter/created_files";
        }
    </script>
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
          <h3 style="margin-top: 15px; margin-bottom: 0;"> INCOMING MAIL(S) FROM RECORDS DEPARTMENT   </h3>
          <br/>
          <h4 style="margin-top: 0; margin-bottom: 0;">DATE:<?=date('d M,Y');?> - Print No <?=$printNo;?></h4>
          <br/>
          <table class="table" style="margin-left: 22px;">
              <thead>
              <tr>
                  <th>Received Date</th>
                  <th>Registry Number</th>
                  <th>Reference No</th>
                  <th>Date Of Letter</th>
                  <th>Subject</th>
                  <th>Flag</th>
                  <th>Status</th>
                  <!--<th>Received By</th>
                  <th>Telephone No</th>-->
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
                          <td><span class="blue"><?= $issueds[$i]['registry_no']; ?></span></td>
                          <td><span class="blue"><?= $issueds[$i]['reference_no']; ?></span></td>
                          <td>
                                <span
                                    class="blue"><?= date("d-m-Y", strtotime($issueds[$i]['date_on_letter'])); ?></span>
                          </td>

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
                          <!--<td><?//=$issueds[$i]['received_by']?></td>
                          <td><?//=$issueds[$i]['received_contact']?></td>-->


                      </tr>
                  <?php } ?>
              <?php } ?>
              </tbody>
          </table>
      </div>

      <footer style="font-size: 12px; margin-top: 84px"><h4>Received By <span style="text-decoration: dashed; padding-left: 18%;color: #000; border-bottom: 1px solid black;"></span>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Job Title <span style="text-decoration: dashed; padding-left: 18%;color: #000; border-bottom: 1px solid black;"></span></h4></footer>
      <footer style="font-size: 12px; margin-top: 25px"><h4>Signature <span style="text-decoration: dashed; padding-left: 18%;color: #000; border-bottom: 1px solid black;"></span>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </h4></footer>

  </div>
    <button type='button' class="btn btn-info" id="myprint" onclick="printDiv('printdiv');updatePrint()">Print Report</button>
</section>
<div class="box-footer">
 <script>
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

</div>
</body>
</html>