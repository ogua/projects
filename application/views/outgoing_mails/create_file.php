<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Outgoing Mail Form</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php echo form_open_multipart('Outgoing_mails/createOutgoingMail', array('method' => 'post')); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Date Received for Dispatch</label>
                    <input type="text" name="date_received" required placeholder="" autocomplete="off" class="form-control datepicker">
                </div>

                <div class="form-group">
                    <label>Reference Number</label>
                    <input type="text" name="reference_number" class="form-control">
                </div>
                <div class="form-group">
                    <label>Date on Letter</label>
                    <input type="text" name="date_of_letter" id="datepicker" class="form-control">
                </div>
                <div class="form-group">
                    <label>Subject</label>
                    <textarea class="form-control" name="subject" required></textarea>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Brought By Contact Number</label>
                    <input type="text" class="form-control" name="cell_no">
                </div>

                <div class="form-group">
                    <label>Send To</label>
                    <div class="input_fields_wrap">

                        <div><input type="text" class="form-control" name="sent_to[]"></div>
                    </div>
                    <hr>
                    <button class="add_field_button">Add Another Receiver</button>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">

                <div class="form-group">
                    <label>Sending Department</label>
                    <input class="form-control" name="iddepartment" id="iddepartment" required
                           style="width: 100%;">

                </div>
                <div class="form-group">
                    <label>Position of Sender</label>
                    <input class="form-control" name="iddesignation" id="iddesignation" name="iddesignation" required
                           style="width: 100%;">

                </div>

                <div class="form-group">
                    <label>Brought By</label>
                    <input class="form-control" name="idemployee" id="idemployee" required
                           style="width: 100%;">
                </div>

                <!-- /.form-group -->
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks"> </textarea>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Upload Scan Copy</label>
                    <input type="file" class="form-control" name="file_picture">
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->


        </div>
        <!-- /.row -->

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" name="Submit" class="btn btn-info">Submit</button>
    </div>
    <?php echo form_close(); ?>
</div>
<!-- /.box -->

<script>
    function getEmployees() {

        var dept = $('#iddepartment').val();
        var desg = $('#iddesignation').val();
        var csrf_test_name = $("input[name=csrf_test_name]").val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>index.php/Outgoing_mails/getEmployees',
            dataType: 'html',
            data: {
                dept: dept, desg: desg, csrf: csrf_test_name
            },
            cache: false,
            success: function (result1) {
                $("#idemployee").html(result1);
            }
        });
    }

    function addPurchaseInputField() {
        var t = $("#sent_to").html();
        alert(t);
        $("#rowsEmbed").append("" + t + "")
    }
    $(document).ready(function () {
        var max_fields = 500; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><input type="text" name="sent_to[]" id="sent_to" class="form-control input-medium"><a href="#" class="remove_field">Remove</a></div>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });

</script>
