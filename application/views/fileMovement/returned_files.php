
<?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php } ?>
<div class="box box-default">
    <div class="">
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <fieldset class="signup">

            <table id="example1" width="100%" class="table table-responsive">

                <thead>


                <tr align="left">
                    <th>Collection Date</th>
                    <th>Returned Date</th>
                    <th>File No</th>
                    <th>File Name</th>
                    <th>Number of Letters</th>
                    <th>Returned Letters</th>
                    <th>Remaining Letters</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                <?php
                if (!empty($returns)) {
                    for ($i = 0; $i < count($returns); $i++) {
                        ?>
                        <tr class="tr1">
                            <td><span
                                    class="blue"><?= date("d-m-Y", strtotime($returns[$i]['date_collected'])); ?></span>
                            </td>
                            <td><span
                                    class="blue"><?= date("d-m-Y", strtotime($returns[$i]['returned_date'])); ?></span>
                            </td>
                            <td><span class="blue"><?= $returns[$i]['file_no']; ?></span></td>
                            <td><span class="blue"><?= $returns[$i]['name_of_file']; ?></span></td>
                            <td><?= $returns[$i]['number_of_letters']; ?></td>
                            <td>
                                <?= $returns[$i]['returned_letters']; ?></td>
                            <td><?php if($returns[$i]['returned_letters'] < $returns[$i]['number_of_letters'])
                                    echo $remaining = $returns[$i]['number_of_letters'] - $returns[$i]['returned_letters']; ?></td>
                            <td><span class="blue"><?php if($returns[$i]['status'] == 0){echo "<span class='label label-success'>Returned</span>";}; ?></span></td>
                             <td>
                                 <?php
                        $remainings = $returns[$i]['number_of_letters'] - $returns[$i]['returned_letters'];
                        if($remainings > 0){?>
                              <a href="#remaining<?=$returns[$i]['file_m_id']?>" data-toggle="modal" class="btn btn-info"> Return Remaining Letters</a>
                            <?php } ?>
                                 <a href="#"
                                    onclick="showAjaxModal('<?= base_url() ?>index.php/File_movement/viewReturnedFile/<?= $returns[$i]['file_m_id'] ?>')"
                                    class="btn btn-info">View </a>

                             </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
                </tbody>

            </table>

        </fieldset>
        
    </div>
</div>
<?php for ($i = 0; $i < count($returns); $i++) { ?>
    <div class="modal fade" id="remaining<?= $returns[$i]['file_m_id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Return File With New Scan Copy</h4>
                </div>
                <?php echo form_open_multipart('File_movement/return_letters',array('method'=>'POST'));?>
                <div class="modal-body">
                    <input type="hidden" name="file_m_id" value="<?=$returns[$i]['file_m_id']?>">
                    <table class="table table-bordered">
                        <tr>
                            <th>Return Remaining Letters</th>
                            <td>
                                <?php $remainings = $returns[$i]['number_of_letters'] - $returns[$i]['returned_letters'];?>
                                <input type="number" name="returned" class="form-control" min="0" max="<?php echo $remainings?>" >
                            </td>
                        </tr>
                        <input type="hidden" name="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>">

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?php echo form_close();?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?php } ?>


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
        <div class="modal-content" style="width: 100% !important; height: 320px !important;">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Details of Returned Files</h4>
            </div>

            <div class="modal-body" id="printdiv" style="height:500px; overflow:auto;">


            </div>
        </div>
    </div>
</div>
