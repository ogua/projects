<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 *      @author : BEB300
 *  @support: support@beb300.com
 *      date    : 18 October, 2017
 *      Kandi User Management System
 *      http://www.beb300.com
 *  version: 1.0
 */

/**
 * Class dashboard
 *
 * @property CI_Session session
 * @property main_model main_model
 */
//Extending all Controllers from Core Controller (MY_Controller)
class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        /*
         * check sessions user data if it exists,
         * it will go to the function requested
         * otherwise it will redirect to login*/
        if ($this->session->userdata("user_id")) {

        } else {

            redirect(base_url() . 'index.php/users/login');
        }
    }

    //index function
    public function index()
    {

        //print_r($this->session->all_userdata());
        $this->header($title = 'Dashboard');
        $todate = date('Y-m-d');
      //  if ($this->session->userdata('group_id') == 1) {

            $data['datas'] = $this->db->query("SELECT fm.returned_status,fm.file
_id,fm.file_m_id,fm.`date_collected`,fm.`file_no`,fm.`name_of_file`,
fm.`number_of_letters`,fm.`remarks`,fm.`status` FROM file_movement AS fm WHERE f
m.status = 1 AND fm.returned_status = 'Unreturned'")->result_array();
            $data['issueds'] = $this->db->query("SELECT
  m.*,d.`doc_type`,fs.`filestatus`,f.`flag`,dp.`department`,ml.`date_of_sending`
,
ml.ml_status,ml.iddesignation,e.`empname`, ds.`designation`
FROM
  main AS m,
  main_log AS ml,
  doc_type AS d,
  filestatus AS fs,
  flag AS f,
  department AS dp,employee AS e,designation AS ds
WHERE d.`doc_id` = m.`doc_id`
AND m.for = dp.`iddepartment`
 AND fs.`idfilestatus` = m.`status`
 AND f.`idflag` = m.`flag_id`
 AND m.`iddesignation` = ds.`iddesignation`
 AND ml.`for` = dp.`iddepartment`
 AND ml.main_id = m.`main_id`
 AND ml.`idemployee` = e.`idemployee`
 AND m.`status` IN(9)")->result_array();
 $todate = date('Y-m-d');
$data['unreturned'] = $this->db->query("SELECT
 count(1) as unreturned

FROM
  main AS m,
  main_log AS ml,
  doc_type AS d,
  filestatus AS fs,
  flag AS f
WHERE d.`doc_id` = m.`doc_id`
  AND fs.`idfilestatus` = m.`status`
  AND f.`idflag` = m.`flag_id`
  AND ml.main_id = m.`main_id`
  AND m.`status` IN (9, 3) AND ml.r_status = 'forwarded' AND ml.date_of_received
 = '$todate'")->row_array();

            $data['issued'] = $this->db->query("SELECT
  COUNT(1) AS issued_files
FROM
  file_movement AS fm
WHERE fm.status = 1
  AND fm.`date_collected` = '$todate'")->row_array();

            $data['issuedMonth'] = $this->db->query("SELECT
  COUNT(1) AS issued_files
FROM
  file_movement AS fm
WHERE fm.status = 1
  AND MONTH(fm.`date_collected`) = MONTH('$todate')")->row_array();
            $tdate11 = date("Y-m-d");
            $data['outgoing'] = $this->db->query("SELECT
  COUNT(1) AS outgoing
FROM
  outgoing_mails AS om
  WHERE  om.`status` IN(1,0)
  AND om.`dispatch_date` = '$tdate11'")->row_array();
            //echo $this->db->last_query();
            $data['outgoingTotal'] = $this->db->query("SELECT
  COUNT(1) AS outgoing
FROM
  outgoing_mails AS om
  WHERE  om.`status` IN(1,0)
  AND om.`dispatch_date` = '$todate'")->row_array();

            $data['outgoingMonth'] = $this->db->query("SELECT
  COUNT(1) AS outgoing
FROM
  outgoing_mails AS om
  WHERE  om.`status` IN(1,0)
   AND MONTH(om.`dispatch_date`) = MONTH('$todate')")->row_array();
            $data['received'] = $this->db->query("SELECT
  COUNT(1) as received
FROM
  main AS m,
  main_log AS ml,
  doc_type AS d,
  filestatus AS fs,
  flag AS f WHERE d.`doc_id` = m.`doc_id`
 AND fs.`idfilestatus` = m.`status`
 AND f.`idflag` = m.`flag_id`
 AND ml.main_id = m.`main_id`

 AND m.`status` IN(9)

   AND m.`date_issue` = '$todate'")->row_array();
            $tdate = date('Y-m-d');
            $data['dispatched'] = $this->db->query("SELECT
COUNT(1) dispatch
FROM
  outgoing_mails AS om WHERE om.`status` IN(1,0) AND om.dispatch_date = '$tdate'
")->row_array();

            $data['department'] = $this->db->query("SELECT COUNT(1) as departmen
t FROM department")->row_array();

            $data['users'] = $this->db->query("SELECT COUNT(1) as users FROM usr
_user ")->row_array();


            //print_r($data);exit;
            $this->load->view('dashboard', $data);


       // } else {
        //    $this->load->view('dashboard');
      //  }
        $this->footer();

    }


    // Employee Searching from dashboard form via ajax
    public function getSearchData()
    {
        $sql = $this->db->query("select EMP_ID,EMP_NAME,EMP_CELL,EMP_PIC from em
ployee_profile")->result_array();
        echo json_encode($sql);

    }

    public function dailyLetters()
    {
        $today = date('Y-m-d');
        $data['dailys'] = $this->db->query("SELECT
  *
FROM
  outgoing_mails AS om
  WHERE  om.`status` IN(1,0)
  AND om.`dispatch_date` = '$today'")->result_array();
        $this->header();
        $this->load->view('reports/dailyLetters', $data);
        $this->footer();

    }

public function dispatchLetters()
    {
        $today = date('m');
        $data['dailys'] = $this->db->query("SELECT
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
WHERE om.`status` IN (0, 1) AND MONTH(om.dispatch_date) = '$today'")->result_arr
ay();
       // echo $this->db->last_query();
        $this->header();
        $this->load->view('reports/dispatchLetters', $data);
        $this->footer();

    }

    public function dailyIssued()
    {
        $today = date('Y-m-d');
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
  fm.`status`,fm.`file_given_to`,fm.`telephone_no`,fm.`returning_days`,fm.job_ti
tle
FROM
  file_movement AS fm
WHERE  fm.status IN(1) AND fm.date_collected = '$today' ")->result_array();
        $this->header();
        $this->load->view('reports/dailyIssued', $data);
        $this->footer();

    }
 public function monthlyIssued()
    {
        $today = date('m');
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
  fm.`status`,fm.`file_given_to`,fm.`telephone_no`,fm.`returning_days`,fm.job_ti
tle
FROM
  file_movement AS fm
WHERE  fm.status IN(1) AND MONTH(fm.date_collected) = '$today' ")->result_array(
);
        $this->header();
        $this->load->view('reports/monthlyIssued', $data);
        $this->footer();

    }
public function dailyReceived()
    {
        $today = date('Y-m-d');
       /*$data['issueds'] = $this->db->query("SELECT
  m.*,d.`doc_type`,fs.`filestatus`,f.`flag`
FROM
  main AS m,
  doc_type AS d,
  filestatus AS fs,
  flag AS f
WHERE d.`doc_id` = m.`doc_id`
  AND fs.`idfilestatus` = m.`status`
 AND f.`idflag` = m.`flag_id`
 AND date_received = '$today'

 ")->result_array();*/
$data['issueds']= $this->db->query("SELECT
  *
FROM
  main AS m,
  main_log AS ml,
  doc_type AS d,
  filestatus AS fs,
  flag AS f WHERE d.`doc_id` = m.`doc_id`
 AND fs.`idfilestatus` = m.`status`
 AND f.`idflag` = m.`flag_id`
 AND ml.main_id = m.`main_id`

 AND m.`status` IN(9)

   AND m.`date_issue` = '$today'")->result_array();
        //echo $this->db->last_query();
        $this->header();
        $this->load->view('reports/dailyReceived', $data);
        $this->footer();

    }
public function dailyDispatched()
    {
        $today = date('Y-m-d');
        $data['mails'] = $this->db->query("SELECT
  om.`dispatch_date`,om.om_id,om.status,om.registry_number,om.scan_copy,om.remar
ks,
  om.`date_of_letter`,om.`reference_number`,
  om.`subject`,om.`cell_no`,om.scan_copy_printed
FROM
  outgoing_mails AS om WHERE om.`status` IN(1,0) AND om.dispatch_date = '$today'
")->result_array();
        $this->header();
        $this->load->view('reports/dailyDispatched', $data);
        $this->footer();

    }

    public function unreturnedLetters(){
$todate = date('Y-m-d');
       $data['issueds'] = $this->db->query("SELECT
  m.*,
  d.`doc_type`,
  fs.`filestatus`,
  f.`flag`,
  ml.`date_of_sending`,
  ml.ml_status,ml.date_of_received,ml.received_by,ml.received_contact,
  ml.received_job_title,ml.image

FROM
  main AS m,
  main_log AS ml,
  doc_type AS d,
  filestatus AS fs,
  flag AS f
WHERE d.`doc_id` = m.`doc_id`
  AND fs.`idfilestatus` = m.`status`
  AND f.`idflag` = m.`flag_id`
  AND ml.main_id = m.`main_id`
  AND m.`status` IN (9, 3) AND ml.r_status = 'forwarded' AND ml.date_of_received
 = '$todate'")->result_array();
 $this->header();
        $this->load->view('reports/unreturnedLetters', $data);
        $this->footer();
    }

}


?>
