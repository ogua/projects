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
<style>
    .li {
        width: 15%;
        margin: 10px 10px 10px 10px;
        background: #e4e4e4;
    }

    .signup {
        width: 93%;
        border: 5px solid #0384B3;
        overflow: hidden;
        padding: 10px;
        height: auto;
        min-height: 475px;
        margin-top: 5px;
        margin-right: 10px;
        margin-bottom: 5px;
        margin-left: 30px;
        border-radius: 6px;
    }

    main-icons {
        margin: 0px;
        padding: 10px 0px 30px 0px;
        margin-right: 0px;
    }

    .main-icons ul li {
        width: 15%;
        margin: 10px 10px 10px 10px;
    }

    .main-icons li {
        float: left;
        width: 200px;
        height: 89px;
        text-align: center;
        list-style-type: none;
        padding-top: 10px;
        padding-right: 0px;
        padding-bottom: 10px;
        padding-left: 0px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        background-image: url(../images/icon-bg.jpg);
        background-repeat: no-repeat;
    }

    .main-icons a {
        color: #333333;
        font-weight: bold;
        text-decoration: none;
        display: block;
    }

    .main-icons a:hover {
        color: #0084FF;
        text-decoration: none;
    }

</style>
<div class="row">
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h4>Received Letters (<?= $received['received']; ?>)</h4>

                <p>Daily Basis</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=base_url()?>index.php/Dashboard/dailyReceived" class="sm
all-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h4>Dispatched Letters (<?= $dispatched['dispatch']; ?>)</h4>

                <p>Daily Basis</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?=base_url()?>index.php/Dashboard/dailyDispatched" class="
small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
 <!-- ./col -->
<div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h4>Total Issued Files (<?= $issued['issued_files']; ?>)</h4>

                <p>Daily Basis</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="<?=base_url()?>index.php/Dashboard/dailyIssued" class="smal
l-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h4>Total Unreturned Letters (<?= $unreturned['unreturned']; ?>)
</h4>

                <p>Daily Basis</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="<?=base_url()?>index.php/Dashboard/unreturnedLetters" class
="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>

<div class="row">

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h4>Total Outgoing Mails (<?= $outgoing['outgoing']; ?>)</h4>

                <p>Daily Basis</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url() ?>index.php/Dashboard/dailyLetters" class="s
mall-box-footer">More info <i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h4>Total Issued Files (<?= $issuedMonth['issued_files']; ?>)</h4>

                <p>Monthly Basis</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= base_url() ?>index.php/Dashboard/monthlyIssued" class="
small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h4>Total Outgoing Mails (<?= $outgoingMonth['outgoing']; ?>)</h4>

                <p>Monthly Basis</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?= base_url() ?>index.php/Dashboard/dispatchLetters" class="small-box-footer">More info <i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header">
                <h4 class="box-title"> Un Returned Files</h4>
                <div class="box-tools">
                    <div align='right' ><input type='button' id="myprint" onclick="printDiv('printdiv')" value='Print Report' /></div>

                </div>
            </div>
            <div class="box-body" id="printdiv">
                <center><h3>Un Returned Files</h3></center>
                <table class="table table-hover table-responsive table-bordered"id="">
                    <thead>
                    <tr align="left">
                        <th>Collection Date</th>


                        <th>File No & Name</th>
                        <th>Number of Letters</th>
                        <th>Remarks</th>
                        <th>Status</th>


                    </tr>
                    </thead>

                    <tbody>

                    <?php
                    if (!empty($datas)) {
                        for ($i = 0; $i < count($datas); $i++) {
                            ?>
                            <tr class="tr1">
                                <td><span
                                        class="blue"><?= date("d-m-Y H:i:s", strtotime($datas[$i]['date_collected'])); ?></span>
                                </td>


                                <td><span class="blue"><?= $datas[$i]['file_no']; ?> - <?= $datas[$i]['name_of_file']; ?></span></td>
                                <td><?= $datas[$i]['number_of_letters']; ?></td>

                                <td><span class="blue"><?= $datas[$i]['remarks']; ?></span></td>
                                <td><span
                                        class="blue"><?php if ($datas[$i]['status'] == 1 && $datas[$i]['returned_status'] == 'Unreturned') {
                                        echo "<span class='label label-danger'>Un Returned Letters</span>";
                                    } ?></td>

                            </tr>
                        <?php } ?>
                    <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</div>




<script>

    /*
     Live Date Script-
     © Dynamic Drive (www.dynamicdrive.com)
     For full source code, installation instructions, 100's more DHTTML scripts,
 and Terms Of Use,
     visit http://www.dynamicdrive.com
     */


    var dayarray = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday")
    var montharray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December")

    function getthedate() {
        var mydate = new Date()
        var year = mydate.getYear()
        if (year < 1000)
            year += 1900
        var day = mydate.getDay()
        var month = mydate.getMonth()
        var daym = mydate.getDate()
        if (daym < 10)
            daym = "0" + daym
        var hours = mydate.getHours()
        var minutes = mydate.getMinutes()
        var seconds = mydate.getSeconds()
        var dn = "AM"
        if (hours >= 12)
            dn = "PM"
        if (hours > 12) {
            hours = hours - 12
        }
        if (hours == 0)
            hours = 12
        if (minutes <= 9)
            minutes = "0" + minutes
        if (seconds <= 9)
            seconds = "0" + seconds
//change font size here
        var cdate = "<small><font color='000000' face='Arial'><b>" + dayarray[day] + ", " + montharray[month] + " " + daym + ", " + year + " <br> " + hours + ":" + minutes + ":" + seconds + " " + dn
            + "</b></font></small>"
        if (document.all)
            document.all.clock.innerHTML = cdate
        else if (document.getElementById)
            document.getElementById("clock").innerHTML = cdate
        else
            document.write(cdate)
    }
    if (!document.all && !document.getElementById)
        getthedate()
    function goforit() {
        if (document.all || document.getElementById)
            setInterval("getthedate()", 1000)
    }


</script>
