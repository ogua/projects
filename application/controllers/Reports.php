<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id')) {

        } else {
            redirect(base_url() . 'index.php/users/login');
        }
    }

    public function reporting()
    {
        $this->header();
        $this->load->view('reports/reportingPanel');
        $this->footer();
    }

    public function getReports()
    {
        extract($_POST);
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $start_date1 = date('Y-m-d', strtotime($start_date));
        $end_date1 = date('Y-m-d', strtotime($end_date));
        if ($reportingAction == 1) {

            $data['receiveds'] = $this->db->query("SELECT e.`empname`,
  m.*,d.`filetype`,fs.`filestatus`,f.`flag`, e.`empname` 
FROM
  main AS m,
  filetype AS d,
  filestatus AS fs,
  flag AS f,
  usr_user AS u,employee AS e
WHERE d.`idfiletype` = m.`doc_id` 
  AND fs.`idfilestatus` = m.`status`
 AND f.`idflag` = m.`flag_id`
  
  AND m.`user_id` = u.`USER_ID`
  AND u.`idemployee` = e.`idemployee`
  AND m.date_received BETWEEN '$start_date1' AND '$end_date1'")->result_array();
           // echo $this->db->last_query();
            $data['received'] = 'Received Letters Report';
            $data['start'] = $start_date;
            $data['end'] = $end_date;
            $this->header();
            $this->load->view('reports/reportingPanel');

            $this->load->view('reports/receivedReport', $data);
            $this->footer();
        }

        if ($reportingAction == 2) {

            $data['returneds'] = $this->db->query("SELECT 
  m.*,d.`filetype`,f.`flag`,ml.`date_of_sending`,ml.ml_status,e.`empname`,ml.image,ml.returned_by,ml.returned_contact,m.date_on_letter,ml.returned_date
FROM
  main AS m,
  main_log AS ml,
  filetype AS d,
  flag AS f,
  usr_user AS u, employee AS e
WHERE d.`idfiletype` = m.`doc_id` 
 AND f.`idflag` = m.`flag_id`
  AND m.`main_id` = ml.`main_id`
  AND ml.`ml_status` = 1
  AND u.`idemployee` = e.`idemployee`
  AND u.`USER_ID` = m.`user_id`
  AND m.date_received BETWEEN '$start_date1' AND '$end_date1'")->result_array();
            // echo $this->db->last_query();
            $data['received'] = 'Returned Letters Report';
            $data['start'] = $start_date;
            $data['end'] = $end_date;
            $this->header();
            $this->load->view('reports/reportingPanel');

            $this->load->view('reports/returnedReport', $data);
            $this->footer();
        }
        if ($reportingAction == 3) {

            $data['forwardeds'] = $this->db->query("SELECT 
  m.*,
  d.filetype,
  fs.`filestatus`,
  f.`flag`,
  ml.`date_of_sending`,
  ml.ml_status,ml.date_of_received,ml.received_by,ml.received_contact,ml.image
 
FROM
  main AS m,
  main_log AS ml,
  filetype AS d,
  filestatus AS fs,
  flag AS f 
WHERE d.`idfiletype` = m.`doc_id` 
  AND fs.`idfilestatus` = m.`status` 
  AND f.`idflag` = m.`flag_id` 
  AND ml.main_id = m.`main_id`  
  AND m.`status` IN (9, 3) AND ml.r_status = 'forwarded'
  AND m.date_received BETWEEN '$start_date1' AND '$end_date1'")->result_array();
            // echo $this->db->last_query();
            $data['received'] = 'Forwarded Letters Report';
            $data['start'] = $start_date;
            $data['end'] = $end_date;
            $this->header();
            $this->load->view('reports/reportingPanel');

            $this->load->view('reports/forwardedReport', $data);
            $this->footer();
        }
        if ($reportingAction == 4) {

            $data['fileds'] = $this->db->query("SELECT 
  m.`main_id`,
  m.`reference_no`,
  m.`date_on_letter`,
  m.`subject`,
  m.`remarks`,
  ml.main_log_id, df.`dispatch_date`,m.registry_no,df.file_name,df.file_no,df.filed_by,df.filed_date,e.`empname`
FROM
  main AS m,
  main_log AS ml, dispatch_files AS df,usr_user AS u, employee AS e
WHERE m.`main_id` = ml.`main_id` 
  AND ml.`ml_status` = 1 
 AND df.`main_id` = m.`main_id` AND df.`main_log_id` = ml.`main_log_id`
 AND ml.`dispatched` = 1
 AND u.`idemployee` = e.`idemployee`
 AND df.`filed_by` = u.`USER_ID`
  AND m.date_received BETWEEN '$start_date1' AND '$end_date1'")->result_array();
            // echo $this->db->last_query();
            $data['received'] = 'Filed Letters Report';
            $data['start'] = $start_date;
            $data['end'] = $end_date;
            $this->header();
            $this->load->view('reports/reportingPanel');

            $this->load->view('reports/filedReport', $data);
            $this->footer();
        }
        if ($reportingAction == 5) {

            $data['issueds'] = $this->db->query("SELECT 
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
WHERE  fm.status IN(1) 
  AND fm.date_collected BETWEEN '$start_date1' AND '$end_date1'")->result_array();
           // echo $this->db->last_query();
            $data['received'] = 'Issued Files Report';
            $data['start'] = $start_date;
            $data['end'] = $end_date;
            $this->header();
            $this->load->view('reports/reportingPanel');

            $this->load->view('reports/issuedReport', $data);
            $this->footer();
        }
        if ($reportingAction == 6) {

            $data['returns'] = $this->db->query("SELECT 
  fm.*
FROM
  file_movement AS fm
WHERE fm.`status` = 0
  AND fm.date_collected BETWEEN '$start_date1' AND '$end_date1'")->result_array();
            // echo $this->db->last_query();
            $data['received'] = 'Returned Files Report';
            $data['start'] = $start_date;
            $data['end'] = $end_date;
            $this->header();
            $this->load->view('reports/reportingPanel');
            $this->load->view('reports/returnedFilesReport', $data);
            $this->footer();
        }
        if ($reportingAction == 7) {

            $data['dispatcheds'] = $this->db->query("SELECT 
 * FROM
  outgoing_mails AS om 
  WHERE  om.`status` IN(1,0)
  AND om.dispatch_date BETWEEN '$start_date1' AND '$end_date1'")->result_array();
             //echo $this->db->last_query();
            $data['received'] = 'Dispatched Letters Report';
            $data['start'] = $start_date;
            $data['end'] = $end_date;
            $this->header();
            $this->load->view('reports/reportingPanel');
            $this->load->view('reports/dispatchedLetters', $data);
            $this->footer();
        }

    }
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */