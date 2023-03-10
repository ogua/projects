<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Letter extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id')) {

        } else {
            redirect(base_url() . 'index.php/users/login');
        }
    }

    public function create_file()
    {
        $this->header();
        $data['departments'] = $this->db->get('department')->result_array();
        $data['designations'] = $this->db->get('designation')->result_array();
        $data['companies'] = $this->db->get('companies')->result_array();
        $data['fileTypes'] = $this->db->get('filetype')->result_array();
        $data['fileStatuses'] = $this->db->get('filestatus')->result_array();
        $data['flags'] = $this->db->get('flag')->result_array();
        $this->load->view('files/create_file', $data);
        $this->footer();
    }

    public function new_file()
    {
        extract($_POST);

       // $check = $this->db->get_where("issue", array("barcode" => $barcode))->num_rows();
       // if ($check > 0) {
         //   $msg = "Barcode exists. Plase change it.";
          //  $this->session->set_flashdata('warning', $msg);
           // redirect(base_url() . 'index.php/Letter/create_file');
       // } else {
            $ip = getenv("REMOTE_ADDR");
            $datetime = date("Y-m-d");
            $idusers = $this->session->userdata('user_id');

            $maxFileNo = $this->db->query("SELECT ifnull(MAX( `main_id` ) , 0 ) +1 AS case_no FROM `main`")->row_array();;

            $Vno = $maxFileNo['case_no'];
            $date = date('Y-M');
            $data = array(
                'case_no' => $date . '-' . $Vno,
                'subject' => $subject,
                'remarks' => $remarks,
                'doc_id' => $file_type,
                'status' => '1',
                'flag_id' => $flag,
                'from' => $from_department,
                'for' => $department,
                'reference_no' => $reference_no,
                'registry_no' => $barcode,
                //'iddesignation' => $designation,
                'date_received' => $datetime,
                'date_on_letter' => $date_on_letter,
                'user_id' => $idusers,

            );
            //echo "<pre>";print_r($data);
            $this->db->insert('main', $data);
            //echo $this->db->last_query();
            $insert_id = $this->db->insert_id();

            $track = array(
                'main_id' => $insert_id,
                'from' => $from_department,
                'for' => $department,
                'date_of_sending' => $datetime
            );
           // print_r($track);
            $this->db->insert('main_log', $track);

            //exit;

            if ($_FILES['file_picture']['name'] != '') {


                // echo $count = count($_FILES['file_picture']['name']);
                for ($i = 0; $i < count($_FILES['file_picture']['name']); $i++) {
                    //Get the temp file path

                    $tmpFilePath = $_FILES['file_picture']['tmp_name'][$i];
                    //Make sure we have a filepath
                    if ($tmpFilePath != "") {
                        //Setup our new file path
                        $newFilePath = "./uploads/" . $_FILES['file_picture']['name'][$i];
                        //Upload the file into the temp dir
                        if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                            $sqlattachment = $this->db->query("INSERT INTO `attachment` SET `idissue`='$insert_id', `path`='$newFilePath'");

                        }
                    }
                }


                //$data['image'] = $_FILES['file_picture']['name'];

            }
            // exit;
            $this->session->set_flashdata('success', 'File Created Successfully');
            redirect(base_url() . 'index.php/Letter/create_file');

       // }

    }

    public function created_files()
    {
        $data['departments'] = $this->db->get('department')->result_array();

$data['positions'] = $this->db->get('designation')->result_array();

        $data['issueds'] = $this->db->query("SELECT e.`empname`,
  m.*,d.`doc_type`,fs.`filestatus`,f.`flag`,dp.`department`, e.`empname` 
FROM
  main AS m,
  doc_type AS d,
  filestatus AS fs,
  flag AS f,
  department AS dp,usr_user AS u,employee AS e
WHERE d.`doc_id` = m.`doc_id` 
  AND fs.`idfilestatus` = m.`status`
 AND f.`idflag` = m.`flag_id`
  AND dp.`iddepartment` = m.`for`
  AND m.`user_id` = u.`USER_ID`
  AND u.`idemployee` = e.`idemployee`")->result_array();
      $this->header('Created Files');
       $this->load->view('files/created_files',$data);
        $this->footer();
    }

    public function issued_files()
    {
        $data['date'] = "2015-10-01";
        $date = $data['date'];
        $data['todate'] = date("Y-m-d");
        $todate = $data['todate'];
        if (isset($_POST['submit'])) {
            $date = date("Y-m-d", strtotime($_POST['date']));
            $todate = date("Y-m-d", strtotime($_POST['date1']));
        }


        $data['issueds'] = $this->db->query("SELECT ft.`idfiletype`,ft.`filetype` 
,(SELECT COUNT(1) AS tot FROM `issue` AS i WHERE i.`idfiletype`=ft.`idfiletype`
-- AND i.`fromdept`= '$this->iddepartment'
 AND i.`datetime`>='$date' and i.`datetime`<='$todate') AS issue_files
FROM `filetype` AS ft
WHERE ft.`status`=1")->result_array();
        //echo $this->db->last_query();

        $this->header();
        $this->load->view('files/issued_files', $data);
        $this->footer();
    }

    public function issued_detail($idfiletype = '', $from = '', $to = '')
    {
        $date = date("Y-m-d", strtotime($from));
        $todate = date("Y-m-d", strtotime($to));
        $data['rowfiletype'] = $this->db->query("SELECT * FROM `filetype` WHERE `idfiletype`='$idfiletype'")->row_array();
        //$rowfieltype=mysql_fetch_array($sqlfiletype);

        //print_r($data);exit;

        $data['iDetails'] = $this->Main_model->getAllissue_twodate($idfiletype, $date, $todate);

        $this->header('Issued Files');

        $this->load->view('files/issued_details', $data);
        $this->footer();
    }

    public function getTrackOfIssuedFiles($id)
    {
        $data['track'] = $this->Main_model->gettrackofidissue($id);
        $data['idissue'] = $id;
        //echo "<pre>";print_r($data);exit;
        $this->header('Tracking of Files');
        $this->load->view('files/track_files', $data);
        $this->footer();
    }

    public function receive_files()
    {
        $data['issueds'] = $this->db->query("SELECT 
  m.*,d.`doc_type`,fs.`filestatus`,f.`flag`,dp.`department`,ml.`date_of_sending`,ml.ml_status 
FROM
  main AS m,
  main_log AS ml,
  doc_type AS d,
  filestatus AS fs,
  flag AS f,
  department AS dp
WHERE d.`doc_id` = m.`doc_id` 
  AND fs.`idfilestatus` = m.`status`
 AND f.`idflag` = m.`flag_id`
  AND dp.`iddepartment` = m.`for`
  AND m.`status` != 1
  AND m.`main_id` = ml.`main_id`
  AND ml.`ml_status` = 0")->result_array();
      $this->header();
        $this->load->view('files/receive_files',$data);
        $this->footer();
    }
    

    public function received_files()
    {
        $data['date'] = "2015-10-01";
        $date = $data['date'];
        $data['todate'] = date("Y-m-d");
        $todate = $data['todate'];


        $data['receiveds'] = $this->db->query("SELECT ft.`idfiletype`,ft.`filetype` ,(SELECT COUNT(1) AS tot
 FROM `track` AS t ,`issue` AS i WHERE t.`idissue`=i.`idissue` 
 AND i.`idfiletype`= ft.`idfiletype` AND t.`todept`= '$this->iddepartment' AND t.`idfilestatus` != '2' AND t.`status` = '1'
  AND t.`idissue` IN (SELECT r.`idissue` FROM `receive` AS r 
WHERE r.`received`=0 AND r.status=1) ) AS receive_files FROM `filetype` AS ft WHERE ft.`status`='1'")->result_array();
        // echo $this->db->last_query();

        $this->header();
        $this->load->view('files/received_files', $data);
        $this->footer();
    }

    public function received_detail($idfiletype = '')
    {
        $data['rowfiletype'] = $this->db->query("SELECT * FROM `filetype` WHERE `idfiletype`='$idfiletype'")->row_array();

        $data['iDetails'] = $this->Main_model->getAllreceived($idfiletype);
        // echo "<pre>";print_r($data['iDetails']);exit;
        $this->header('Received Files');

        $this->load->view('files/received_details', $data);
        $this->footer();
    }

    public function update_received($id)
    {
        $where = array(
            'idreceive' => $id
        );

        $data = array('received' => 1, 'datetime' => date('Y-m-d H:i:s'));
        $this->db->update('receive', $data, $where);
        //echo $this->db->last_query();exit;
        redirect(base_url() . 'index.php/dashboard');
    }


    public function heads_department($id)
    {
        $where = array(
            'idreceive' => $id
        );

        $this->db->insert('received_heads', array('idissue' => $id, 'minuted' => 0, 'status' => 0));

        //$data = array('received' => 1,'datetime'=>date('Y-m-d H:i:s'));
        //$this->db->update('receive', $data, $where);
        //echo $this->db->last_query();exit;
        redirect(base_url() . 'index.php/Letter/headsDepartmentFiles');
    }

    public function headsDepartmentFiles()
    {
        $data['heads'] = $this->Main_model->getFilesheadsDepartment();
        $this->header();
        $this->load->view('files/headsDepartmentFiles', $data);
        $this->footer();
    }

    public function pending_files()
    {
        $data['date'] = "2015-10-01";
        $date = $data['date'];
        $data['todate'] = date("Y-m-d");
        $todate = $data['todate'];
        if (isset($_POST['submit'])) {
            $date = date("Y-m-d", strtotime($_POST['date']));
            $todate = date("Y-m-d", strtotime($_POST['date1']));
        }


        $data['pendings'] = $this->db->query("SELECT ft.`idfiletype`,ft.`filetype` 
,(SELECT COUNT(1) AS tot 
FROM `track` AS t ,`issue` AS i
WHERE t.`idissue`=i.`idissue`
AND i.`idfiletype`= ft.`idfiletype`
AND t.`todept`= '$this->iddepartment' 
AND t.`datetime`>= '$date' AND t.`datetime`<= '$todate'
AND t.`status` = '1'
AND t.`idissue` IN (SELECT r.`idissue` FROM `receive` AS r WHERE r.`received`=1 AND r.status=1)
) AS pending_files
FROM `filetype` AS ft")->result_array();
        //echo $this->db->last_query();

        $this->header();
        $this->load->view('files/pending_files', $data);
        $this->footer();
    }

    public function pending_detail($idfiletype = '', $from = '', $to = '')
    {
        $date = date("Y-m-d", strtotime($from));
        $todate = date("Y-m-d", strtotime($to));
        $data['rowfiletype'] = $this->db->query("SELECT * FROM `filetype` WHERE `idfiletype`='$idfiletype'")->row_array();
        //$rowfieltype=mysql_fetch_array($sqlfiletype);

        //print_r($data);exit;

        $data['iDetails'] = $this->Main_model->getAllpending_twodate($idfiletype, $date, $todate);

        $this->header('Pending Files');

        $this->load->view('files/pending_details', $data);
        $this->footer();
    }

    public function forward($id)
    {
        $data['departments'] = $this->db->get('department')->result_array();
        $data['fileTypes'] = $this->db->get('filetype')->result_array();
        $data['fileStatus'] = $this->db->get('filestatus')->result_array();
        $data['flags'] = $this->db->get('flag')->result_array();
        $data['details'] = $this->Main_model->getforwarddetail($id);
        $this->header('Forward Issued File');
        //echo "<pre>";print_r($data['details']);exit;
        $this->load->view('files/forward_file', $data);

        $this->footer();
    }

    public function update_file()
    {
        extract($_POST);


        $ip = getenv("REMOTE_ADDR");
        $datetime = date("Y-m-d");
        $idusers = $this->session->userdata('user_id');

        $fromdept = $this->session->userdata('iddepartment');
        $fromsection = $this->session->userdata('idsection');

        $data = array(
            'idfilestatus' => $file_status
        );
        // echo "<pre>";print_r($data);
        //exit;
        // print_r($data);exit;
        $where = array('idissue' => $idissue);
        $this->db->update('issue', $data, $where);
        // echo $this->db->last_query();
        //exit;
        //$insert_id = $this->db->insert_id();

        $track = array(
            'status' => '0'

        );
        $where_track = array('idissue' => $idissue, 'status' => 1);
        $this->db->update('track', $track, $where_track);

        $receive = array(
            'status' => '0'
        );

        $where_receive = array('status' => 1, 'idissue' => $idissue);
        $this->db->update('receive', $receive, $where_receive);
        $date = date("Y-m-d", strtotime($date_of_sending));
        $ip = getenv("REMOTE_ADDR");
        $idusers = $this->session->userdata('user_id');
        $datetime = $date;

        $sqllog = $this->db->query("INSERT INTO track SET idissue='$idissue',
                                  fromdept='$this->iddepartment', todept='$department',
                                   remarks='$remarks', idfilestatus='$file_status', datetime='$datetime', ip='$ip', idusers='$idusers'");


        $sqlrecieved = $this->db->query("INSERT INTO receive SET idissue='$idissue', received='0', datetime='$datetime', status=1");


        if ($_FILES['file_picture']['name'] != '') {


            // echo $count = count($_FILES['file_picture']['name']);
            for ($i = 0; $i < count($_FILES['file_picture']['name']); $i++) {
                //Get the temp file path

                $tmpFilePath = $_FILES['file_picture']['tmp_name'][$i];
                //Make sure we have a filepath
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    $newFilePath = "./uploads/" . $_FILES['file_picture']['name'][$i];
                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                        $sqlattachment = $this->db->query("INSERT INTO `attachment` SET `idissue`='$insert_id', `path`='$newFilePath'");

                    }
                }
            }


            //$data['image'] = $_FILES['file_picture']['name'];

        }
        // exit;
        $this->session->set_flashdata('success', 'File Forwarded Successfully');
        redirect(base_url() . 'index.php/Letter/pending_files');


    }

    public function getEmployees()
    {
        $dept_id = $this->input->post('dept');
        $query = $this->db->query("select * from employee where iddepartment = '$dept_id'")->result_array();
       $output = '';
        foreach ($query as $item) {
           echo $output .= "<option value='".$item['idemployee']."'>".$item['empname']."</option>"; 
        }
        echo $output;
    }

    public function SendToRegional()
    {
           extract($_POST);
      //  print_r($_POST);exit;
        $data = array(
           // 'main_id'=>$main_id,
           // 'from'=>$department_id,
            //'for'=>$department,
            'date_of_sending'=>date('Y-m-d'),
            'ml_status'=>0,

        );
        $where = array('main_id'=>$main_id);
        $this->db->update('main_log',$data,$where);
        //echo $this->db->last_query();

        $data1 = array('date_issue'=>date('Y-m-d'),'status'=>5);
        $where = array('main_id'=>$main_id);
        $this->db->update('main',$data1,$where);

        $this->session->set_flashdata('success','File Forwarded Successfully');
        redirect(base_url().'index.php/Letter/created_files');
    }

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */