<style>
    ul.enlarge li {
        display: inline-block; /*places the images in a line*/
        position: relative;
        z-index: 0; /*resets the stack order of the list items - later we'll increase this*/
        margin: 0 0 0 10px;
        float: left;
    }

    ul.enlarge img {
        width: 30px;
        height: 30px;
        background-color: #eae9d4;
        padding: 6px;
        -webkit-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
        -moz-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
        box-shadow: 0 0 6px rgba(132, 132, 132, .75);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }

    ul.enlarge span {
        position: absolute;
        left: -9999px;
        background-color: #eae9d4;
        padding: 10px;
        font-family: 'Droid Sans', sans-serif;
        font-size: .9em;
        text-align: center;
        color: #495a62;
        -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, .75));
        -moz-box-shadow: 0 0 20px rgba(0, 0, 0, .75);
        box-shadow: 0 0 20px rgba(0, 0, 0, .75);
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
    }

    ul.enlarge li:hover {
        z-index: 9999999999;
        cursor: pointer;
    }

    ul.enlarge span img {
        padding: 2px;
        width: 200px;
        height: 150px;
        background: #ccc;
    }

    ul.enlarge li:hover span {
        top: -100px; /*the distance from the bottom of the thumbnail to the top of the popup image*/
        left: -20px; /*distance from the left of the thumbnail to the left of the popup image*/
    }

    ul.enlarge li:hover:nth-child(2) span {
        left: -100px;
    }

    ul.enlarge li:hover:nth-child(3) span {
        left: -100px;
    }

    /**IE Hacks - see http://css3pie.com/ for more info on how to use CS3Pie and to download the latest version**/
    ul.enlarge img, ul.enlarge span {
        behavior: url(pie/PIE.htc);
    }
</style>

<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-default">
    <div class="box-title">
        <h3>Outgoing Mails List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">


        <table id="example1" class="table table-responsive table-bordered table-hover">

            <thead>


            <tr>
                <th>Dispatch Date</th>
                <th>Date Of Letter</th>
                <th>Reference No</th>
                <th>Subject</th>
                <th>Attachment</th>
                <th>Attachment Scanned</th>
                <th>File Status</th>
                <th>Action</th>
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
                        <td>
                            <ul>
                                <li style="display: inline-block;
position: relative;
z-index: 0;
margin: 0 0 0 10px;
float: left;">

                                    <a href="<?=base_url() . $mails[$i]['scan_copy'];?>"  target="_blank" class="btn btn-success">Attachment</a>


                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li style="display: inline-block;
position: relative;
z-index: 0;
margin: 0 0 0 10px;
float: left;">
                                     <?php if(!empty($mails[$i]['scan_copy_printed'])){?>
                                    <a href="<?=base_url() . $mails[$i]['scan_copy_printed'];?>" target="_blank" class="btn btn-primary">Attachment</a>

                        <?php }else{
                                         echo "No Scan Copy";
                                     }?>

                            </ul>
                        </td>
                        <?php
                        if ($mails[$i]['status'] == 1) {
                            echo '<td>';
                            echo '<label class="label label-warning">Dispatched</label>';
                            echo '</td>';
                        } else { ?>
                            <td><a href="<?= base_url() ?>index.php/Outgoing_mails/dispatch/<?= $mails[$i]['om_id']; ?>"
                                   class="btn btn-primary">Dispatch It</a>
                            </td>
                        <?php }
                        ?>
                        <td>
                            <?php if ($mails[$i]['status'] != 1) { ?>
                                <a href="<?= base_url() ?>index.php/Outgoing_mails/edit_file/<?= $mails[$i]['om_id']; ?>"
                                   class="btn btn-warning"><i class="fa fa-edit"></i> </a> |  <a
                                    href="<?= base_url() ?>index.php/Outgoing_mails/delete_file/<?= $mails[$i]['om_id']; ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete?');"><i
                                        class="fa fa-trash"></i> </a>
                            <?php } ?>

                            <a href="#"
                               onclick="showAjaxModal('<?= base_url() ?>index.php/Outgoing_mails/viewDispatchFile/<?= $mails[$i]['om_id'] ?>')"
                               class="btn btn-info">View </a>
                            <a href="<?=base_url()?>index.php/Outgoing_mails/receivingScanCopies/<?=$mails[$i]['om_id']?>" class="btn btn-warning">Add Scan</a>
                        </td>


                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>

        </table>


    </div>
</div>
<!-- /.modal -->
<!-- /.box -->

<script>
    function getEmployees(id) {

        var dept = $('#dept_id' + id).val();
        var csrf_test_name = $("input[name=csrf_test_name]").val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>index.php/Letter/getEmmDesignation',
            dataType: 'html',
            data: {
                dept: dept, csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
                $("#emp_id" + id).html(result1);
            }
        });
    }

    function return_file(main_id) {

        var from = $('#from').val();
        var to = $('#for').val();
        var des = $('#des').val();
        var csrf_test_name = $("input[name=csrf_test_name]").val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>index.php/Letter/return_file',
            dataType: 'html',
            data: {
                from: from, to: to, des: des, main_id: main_id, csrf: csrf_test_name
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


<script type="text/javascript">
    function showAjaxModal(url) {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="img/loader.gif" /></div>');

        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
        //var d = getValueUsingClass();
        //alert(d);
        //return false;
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            type: 'POST',
            success: function (response) {
                jQuery('#modal_ajax .modal-body').html(response);
            }
        });
    }
</script>

<!-- (Ajax Modal)-->
<div class="modal fade" id="modal_ajax">
    <div class="modal-dialog" >
        <div class="modal-content" style="width: 90% !important; height: 370px !important;">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Details of Dispatched Letters</h4>
            </div>

            <div class="modal-body" id="printdiv" style="height:500px; overflow:auto;">


            </div>
        </div>
    </div>
</div>
