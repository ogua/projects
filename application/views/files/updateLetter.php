<table class='table table-bordered' id="">
    <tr>
        <input type="hidden" name="main_id" value="<?=$issueds['main_id'];?>">
        <th>Received By</th>
        <td><input type="text" value="<?=$issueds['received_by'];?>" name="received_by" id="emp_id<?= $issueds['main_id'] ?>" class="form-control input-medium"> </td>
    </tr>
    <tr>
        <th>Received By Contact No</th>
        <td><input name="received_contact" id="returned_contact<?= $issueds['main_id'] ?>"
                   class="form-control"></td>
    </tr>

</table>
