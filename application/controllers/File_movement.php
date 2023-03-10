<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class File_movement extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id')) {

        } else {
            redirect(base_url() . 'index.php/users/login');
        }
    }

    public function file_movement_form()
    {
        $this->header();
        $data['departments'] = $this->db->get('department')->result_array();
        $data['files'] = $this->db->get('file_naming')->result_array();
        $data['employees'] = $this->db->get('employee')->result_array();
        $this->load->view('fileMovement/file_movement_form', $data);
        $this->footer();
    }

    public function create_file_movement()
    {
        extract($_POST);
        $date = date("Y-m-d");
        $idusers = $this->session->userdata('user_id');
        $issue = date("Y-m-d",strtotime($issue_date));
        $id = $this->db->get_where('file_naming',array('file_id'=>$file_no))->row_array();

        $data = array(
             'date_collected'=>$issue,
            'remarks' => $remarks,
            'status' => '1',
            'file_no' => $id['file_no'],
            'name_of_file' => $id['file_name'],
            'number_of_letters' => $number_of_letters,
            'date_collected' => $date,
            'user_id' => $idusers,
            'returned_status'=>'Unreturned',
            'telephone_no'=>$telephone_no,
            'job_title'=>$job_title,
            'file_given_to'=>$file_given_to,
            'returning_days'=>$returning_days
        );
        $this->db->insert('file_movement', $data);
//echo $this->db->last_query();exit;
        $this->session->set_flashdata('success', 'File Collected Successfully');
        redirect(base_url() . 'index.php/File_movement/file_movement_form');


    }

    public function files()
    {
        $data['departments'] = $this->db->get_where('department')->result_array();
        $data['files'] = $this->db->query("SELECT fm.* FROM file_movement AS fm
WHERE fm.status IN(1)")->result_array();
        $this->header();
        $this->load->view('fileMovement/listFiles', $data);
        $this->footer();
    }

    public function return_files()
    {
        extract($_POST);
        // print_r($_POST);exit;
        //$id = $this->input->post('main_id');
        $data = array(
            'status' => 1,
            'returned_status' => 'Returned'
        );

 $u_where = array('file_m_id' => $file_m_id);
        $this->db->update('file_movement', $data, $u_where);
        $user_id = $this->session->userdata('user_id');

        $exist = $this->db->get_where('file_movement', array('file_m_id' => $file_m_id))->row();

        $max = $this->db->query("SELECT IFNULL(MAX( `file_id` ) , 0 ) AS VNO FROM `file_movement` WHERE file_m_id = '$file_m_id'")->row();
        $data = array(
            'file_id' => $max->VNO,
            //'iddepartment' => $exist->iddepartment,
            //'idemployee' => $exist->idemployee,
            'file_no' => $exist->file_no,
            'name_of_file' => $exist->name_of_file,
            'number_of_letters' => $exist->number_of_letters,
            'returned_date' => date('Y-m-d'),
            'returned_by' => $idemployee,
            'returned_letters' => $returned_letters,
            'returned_department' => $iddepartment,
            'returned_letters' => $returned_letters,
            'user_id' => $user_id,
            'status' => 0,

        );

        $this->db->insert('file_movement', $data);
        $this->session->set_flashdata('success', 'File Returned Successfully.');
        redirect(base_url() . 'index.php/File_movement/files');
    }

    public function returned_files()
    {
        $data['returns']=$this->db->query("SELECT 
  fm.*
FROM
  file_movement AS fm
WHERE fm.`status` = 0")->result_array();
        $this->header('Returned Files');
        $this->load->view('fileMovement/returned_files',$data);
        $this->footer();
    }
    public function return_letters()
    {
        $id = $this->input->post('file_m_id');
        $name = $this->input->post('returned');
        $this->db->query("UPDATE file_movement SET returned_letters = returned_letters + $name WHERE file_m_id = '$id'");
        $this->session->set_flashdata('success','Remaining letters Returned Successfully.');
        redirect(base_url().'index.php/File_movement/returned_files');
    }

    public function edit_file($id)
    {
        $data['departments'] = $this->db->get('department')->result_array();
        $data['employees'] = $this->db->get('employee')->result_array();
               $data['files'] = $this->db->get('file_naming')->result_array();

        $data['edits'] = $this->db->query("SELECT 
  fm.iddepartment,
  fm.idemployee,
  fm.returned_status,
  fm.file_id,
  fm.file_m_id,
  fm.`date_collected`,
  fm.`file_no`,
  fm.`name_of_file`,
  fm.`number_of_letters`,fm.file_given_to,
  fm.`remarks`,
  fm.`status`,fm.job_title,fm.telephone_no,fm.returning_days
FROM
  file_movement AS fm 
WHERE fm.status = 1 
  AND fm.file_m_id = '$id'")->row_array();
        $this->header('Edit File');
        $this->load->view('fileMovement/edit_file', $data);
        $this->footer();

    }


    public function updateFile()
    {
        extract($_POST);
        $date = date("Y-m-d");
        $idusers = $this->session->userdata('user_id');

        $data = array(
            
            'remarks' => $remarks,
            'status' => '1',
            'number_of_letters' => $number_of_letters,
            'date_collected' => $date,
            'user_id' => $idusers
        );
         if ($file_no > 0) {
            $exist = $this->db->get_where('file_naming', array('file_id' => $file_no))->row();

            $data['file_no'] = $exist->file_no;
            $data['name_of_file'] = $exist->file_name;
        } else {

        }
        $where = array('file_m_id'=>$file_m_id);
        $this->db->update('file_movement',$data,$where);
       // echo $this->db->last_query();
       // exit;
        $this->session->set_flashdata('success','File Updated Successfully');
        redirect(base_url().'index.php/File_movement/files');
    }

    public function delete_file($id)
    {
        $this->db->delete('file_movement',array('file_m_id'=>$id));
        $this->session->set_flashdata('success','File Deleted Successfully');
        redirect(base_url().'index.php/File_movement/files');
    }

    public function viewIssuedFIle($id)
    {
        $data['files'] = $this->db->query("SELECT 
  fm.returned_status,
  fm.file_id,
  fm.file_m_id,
  fm.`date_collected`,
  fm.`file_no`,
  fm.`name_of_file`,
  fm.`number_of_letters`,
  fm.returned_letters,
  fm.`remarks`,
  fm.`status`,fm.`file_given_to`,fm.`telephone_no`,fm.`returning_days`,fm.job_title 
FROM
  file_movement AS fm
WHERE  fm.status IN(1) AND fm.file_m_id = '$id'")->result_array();
        //echo $this->db->last_query();

        $this->load->view('fileMovement/viewIssuedFile', $data);
    }


public function viewReturnedFile($id)
    {
        $data['files'] = $this->db->query("SELECT 
  fm.*
FROM
  file_movement AS fm
WHERE fm.`status` = 0 AND fm.file_m_id = '$id'")->result_array();
        //echo $this->db->last_query();

        $this->load->view('fileMovement/viewReturnedFile', $data);
    }


}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */