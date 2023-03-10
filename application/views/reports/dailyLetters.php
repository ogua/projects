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
                    <h2>Daily Outgoing Mails</h2>
                </center>
                <table class="table table-hover table-responsive table-bordered" >

                    <thead>
                    <tr>
                        <th>Creation Date</th>
                    
                        <th>Reference No</th>
                        <th>Date On Letter</th>
                        <th>Subject</th>
                       h>File Type</th>
                        <th>Sending Department</th>
                        <th>position</th>
                        <th>Remarks</th>
             
                    

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
                               
                                <td><span class="blue"><?= $dailys[$i]['reference_number']; ?></span></td>
                                <td><span class="blue"><?= $dailys[$i]['date_of_letter']; ?></span></td>
                                <td><span class="blue"><?= $dailys[$i]['subject']; ?></span></td>
                     

                                <td><span class="blue"><?= $dailys[$i]['sending_dept']; ?></span></td>
                                <td><span class="blue"><?= $dailys[$i]['position']; ?></span></td>

                                <td><?=$dailys[$i]['remarks']?></td>
                              
                            

                            </tr>
                        <?php } ?>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>



        <!--<fieldset class="signup" style="background-color: white">
            <legend>Dashboard</legend>
            <div id="icons-bg" style="min-height:200px; margin:0px 10px 0 150px;">
                <div class="main-icons clear">
                    <h1 style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 35px; font-weight: bold; letter-spacing: -1px; line-height: 1;">
                        File Tracking System

                    </h1>
                    <div class="row">
                        <div class="col-sm-2 li">
                            <li><a href="<?=base_url()?>index.php/Letter/create_file"><span class="fa fa-file-text fa-5x"></span>
                                    <h3>Create New File </h3>
                                </a>
                            </li>
                        </div>

                        <div class="col-sm-2 li">
                            <li><a href="<?=base_url()?>index.php/Letter/issued_files"><span class="fa fa-file-text fa-5x"></span>
                                    <h3>Issued Files </h3>

                                </a>
                            </li>
                        </div>
                        <div class="col-sm-3 li">
                            <li><a href="<?=base_url()?>index.php/Letter/pending_files"><span class="fa fa-file-text fa-5x"></span>
                                    <h3>Pending Files</h3>

                                </a></li>
                        </div>
                        <div class="col-sm-2 li">
                            <li><a href="index.php?option=file&item=forwarded"><span
                                        class="fa fa-file-text fa-5x"></span>
                                    <h3>Forwarded Files</h3>

                                </a></li>
                        </div>
                        <div class="col-sm-2 li">
                            <li><a href="index.php?option=file&item=recievesearch"><span
                                        class="fa fa-file-text fa-5x"></span>
                                    <h3>Accept via Scanner</h3>

                                </a></li>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-2 li">
                            <li><a href="index.php?option=file&item=disposedoffdetail"><span
                                        class="fa fa-file-text fa-5x"></span>
                                    <h3>Disposed off Files</h3>

                                </a></li>
                        </div>
                        <div class="col-sm-2 li">
                            <li><a href="index.php?option=file&item=allreport"><span
                                        class="fa fa-file-text fa-5x"></span>
                                    <h3>Reports</h3>

                                </a></li>
                        </div>
                        <div class="col-sm-2 li">
                            <li><a href="doc/Manual.pdf" target="_blank"><span class="fa fa-book fa-5x"></span>
                                    <h3>Manual</h3>
                                </a></li>
                        </div>
                        <div class="col-sm-2 li">
                            <li><a href="index.php?option=file&item=changepass"><span class="fa fa-key fa-5x"></span>
                                    <h3>Change Password</h3>

                                </a></li>
                        </div>
                        <div class="col-sm-2 li">
                            <li><a href="logout.php"><span class="fa fa-sign-out fa-5x"></span>
                                    <h3>Logout</h3>
                                </a></li>
                        </div>


                    </div>

                </div>
            </div>
        </fieldset>-->

    </div>
</div>
