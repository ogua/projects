<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Outgoing_mails extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id')) {

        } else {
            redirect(base_url() . 'index.php/users/login');
        }
    }

    public function new_file()
    {
        $data['departments'] = $this->db->get('department')->result_array();
        $data['designations'] = $this->db->get('designation')->result_array();
        $this->header('Outgoing Mails Entry Form');
        $this->load->view('outgoing_mails/create_file', $data);
        $this->footer();
    }

    public function getEmployees()
    {
        $dept_id = $this->input->post('dept');
        $desg_id = $this->input->post('desg');
        $query = $this->db->query("select * from employee where iddepartment = '$dept_id' AND iddesignation = '$desg_id'")->result_array();

        $output = '';
        foreach ($query as $item) {
            echo $output .= "<option value='" . $item['idemployee'] . "'>" . $item['empname'] . "</option>";
        }
        echo $output;
    }

    public function createOutgoingMail()
    {
        extract($_POST);
$sent = implode(',',$sent_to);
        $data_upload = "uploads/outgoing_mails/";
         $data = array(
            'dispatch_date' => date('Y-m-d'),
            'sent_to' => $sent,
            'date_of_letter' => date('Y-m-d', strtotime($date_of_letter)),
            'reference_number' => $reference_number,
            'registry_number' => $registry_no,
            'subject' => $subject,
            'sending_dept' => $iddepartment,
            'position' => $iddesignation,
            'brought_by' => $idemployee,
            'cell_no' => $cell_no,
            'remarks' => $remarks,
            'status' => 0,
        );
        if ($_FILES['file_picture']['name'] != '') {

            //Get the temp file path

            $tmpFilePath = $_FILES['file_picture']['tmp_name'];
            //Make sure we have a filepath
            if ($tmpFilePath != "") {
                $target_file = $data_upload . basename($_FILES["file_picture"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                //Setup our new file path
                $newFilePath = "uploads/outgoing_mails/" . $_FILES['file_picture']['name'];
                $DbFilePath = $_FILES['file_picture']['name'];

                //Upload the file into the temp dir
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                    $data['scan_copy'] = $newFilePath;
                    //$sqlattachment = $this->db->query("INSERT INTO `attachment` SET `idissue`='$insert_id', `path`='$DbFilePath'");

                }
            }

        }

        // echo "<pre>";print_r($data);exit;
        $this->db->insert('outgoing_mails', $data);
        $this->session->set_flashdata('success', 'Outgoing Mail Successfully Dispatched');
        redirect(base_url() . 'index.php/Outgoing_mails/new_file');
    }

    public function outgoingMails()
    {
        $data['mails'] = $this->db->query("SELECT 
  om.`dispatch_date`,
  om.om_id,
  om.status,
  om.remarks,
  om.sent_to,
  om.registry_number,
  om.scan_copy,
  om.`date_of_letter`,
  om.`reference_number`,
  om.`subject`,
  om.`cell_no`,om.scan_copy_printed 
FROM
  outgoing_mails AS om 
WHERE om.`status` IN (0, 1)")->result_array();
        $this->header('List of Outgoing Mails');
        $this->load->view('outgoing_mails/listMails', $data);
        $this->footer();
    }

    public function edit_file($id)
    {
        $data['departments'] = $this->db->get('department')->result_array();
        $data['designations'] = $this->db->get('designation')->result_array();
        $data['employees'] = $this->db->get('employee')->result_array();

       $data['edits'] = $this->db->query("SELECT om.* FROM
  outgoing_mails AS om
  WHERE om.`status` = 0 AND om.om_id = '$id'")->row_array();
        $this->header('Edit File');
        $this->load->view('outgoing_mails/edit_file', $data);
        $this->footer();

    }

    public function updateFile()
    {
        extract($_POST);
        $date = date("Y-m-d");
        $idusers = $this->session->userdata('user_id');

        $data = array(
            'dispatch_date' => date('Y-m-d'),
            'sent_to' => $sent_to,
            'date_of_letter' => date('Y-m-d', strtotime($date_of_letter)),
            'reference_number' => $reference_number,
            'registry_number' => $registry_no,
            'subject' => $subject,
            'sending_dept' => $iddepartment,
            'position' => $iddesignation,
            'brought_by' => $idemployee,
            'cell_no' => $cell_no,
            'remarks' => $remarks,
            'status' => 0,
        );
        $where = array('om_id'=>$om_id);
        $this->db->update('outgoing_mails',$data,$where);
        // echo $this->db->last_query();
         //exit;
        $this->session->set_flashdata('success','File Updated Successfully');
        redirect(base_url().'index.php/Outgoing_mails/outgoingMails');
    }
    public function dispatch($id)
    {
        $where = array('om_id' => $id);
        $data = array('status' => 1);
        $this->db->update('outgoing_mails', $data, $where);
       // echo $this->db->last_query();
       // exit;
       $data['issueds'] = $this->db->get_where('outgoing_mails',array('om_id'=>$id))->row_array(); 
        
        $this->load->view('outgoing_mails/lettersPrinting',$data); 
        
        //$this->session->set_flashdata('success', 'File Dispatched Successfully');
        //redirect(base_url() . 'index.php/Outgoing_mails/outgoingMails');
    }

 public function delete_file($id)
    {
        $this->db->delete('outgoing_mails',array('om_id'=>$id));
        $this->session->set_flashdata('success','File Deleted Successfully');
        redirect(base_url().'index.php/Outgoing_mails/outgoingMails');
    }

 public function viewDispatchFile($id)
    {
        $data['mails'] = $this->db->query("SELECT 
 om.*
FROM
  outgoing_mails AS om where om.`status` IN(1,0) AND om.om_id = '$id'")->result_array();

        $this->load->view('outgoing_mails/viewDespatchedFile', $data);
    }
 public function receivingScanCopies($id)
    {
        $data['id'] = $id;
        $this->header();
        $this->load->view('outgoing_mails/receivingScanCopies',$data);
        $this->footer();
    }

    public function createScanCopy()
    {
        extract($_POST);
        $data_upload = "uploads/outgoing_mails/scanPrinted/";

        if ($_FILES['file_picture']['name'] != '') {

            //Get the temp file path

            $tmpFilePath = $_FILES['file_picture']['tmp_name'];
            //Make sure we have a filepath
            if ($tmpFilePath != "") {
                $target_file = $data_upload . basename($_FILES["file_picture"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                //Setup our new file path
                $newFilePath = "uploads/outgoing_mails/scanPrinted/" . $_FILES['file_picture']['name'];
                $DbFilePath = $_FILES['file_picture']['name'];

                //Upload the file into the temp dir
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                    $data['scan_copy_printed'] = $newFilePath;
                    //$sqlattachment = $this->db->query("INSERT INTO `attachment` SET `idissue`='$insert_id', `path`='$DbFilePath'");

                }
            }
            $where = array('om_id'=>$om_id);
            $this->db->update('outgoing_mails', $data,$where);
            //echo $this->db->last_query();
        }
        //exit;
        redirect(base_url() . 'index.php/Outgoing_mails/outgoingMails');
    }
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */