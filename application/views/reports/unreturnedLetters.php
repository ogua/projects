<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-default">
    <div class="">
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <fieldset class="signup">

            <table id="example1" class="table table-bordered table-hover">

                <thead>


                <tr>
                    <th>Received Date</th>
                    <th>Date of Letter</th>
                    <th>Registry No</th>
                    <th>Reference No</th>
                    <th width="8%">Subject</th>
                    <th>To Whom Received</th>
                    
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
                            <td>
                                <span
                                    class="blue"><?= date("d-m-Y", strtotime($issueds[$i]['date_on_letter'])); ?></span>
                            </td>
                            <td><span class="blue"><?= $issueds[$i]['registry_no']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['reference_no']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['subject']; ?></span></td>
                            <td><span class="blue"><?= $issueds[$i]['from']; ?></span></td>
                         


                        </tr>
                    <?php } ?>
                <?php } ?>
                </tbody>

            </table>

        </fieldset>


    </div>
</div>


<script>
    $(document).ready(function () {
        /* Get the checkboxes values based on the class attached to each check box */
        $("#buttonClass").click(function () {
            var d = getValueUsingClass();
        });

        /* Get the checkboxes values based on the parent div id */
        $("#buttonParent").click(function () {
            getValueUsingParentTag();
        });
    });

    function getValueUsingClass() {
        /* declare an checkbox array */
        var chkArray = [];

        /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
        $(".chk:checked").each(function () {
            chkArray.push($(this).val());
        });

        /* we join the array separated by the comma */
        var selected;
        selected = chkArray.join(',');

        /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
        if (selected.length > 0) {
            return selected;
            //alert("You have selected " + selected);
        } else {
            alert("Please at least check one of the checkbox");
        }
    }

    function getValueUsingParentTag() {
        var chkArray = [];

        /* look for all checkboes that have a parent id called 'checkboxlist' attached to it and check if it was checked */
        $("#checkboxlist input:checked").each(function () {
            chkArray.push($(this).val());
        });

        /* we join the array separated by the comma */
        var selected;
        selected = chkArray.join(',');

        /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
        if (selected.length > 0) {
            alert("You have selected " + selected);
        } else {
            alert("Please at least check one of the checkbox");
        }
    }
</script>

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
                <h4 class="modal-title">Details of Forwarded Letters</h4>
            </div>

            <div class="modal-body" id="printdiv" style="height:500px; overflow:auto;">


            </div>
        </div>
    </div>
</div>
