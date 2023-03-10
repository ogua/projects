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
        $y = date('y');
        $m = date('m');
        $d = date('d');
$on = date('Y-m-d',strtotime($date_on_letter));
$received_date1= date('Y-m-d',strtotime($received_date));
        $data = array(
            //'case_no' => $date . '-' . $Vno,
            'subject' => $subject,
            'remarks' => $remarks,
            'doc_id' => $file_type,
            'status' => '1',
            'flag_id' => $flag,
            'from' => $for,
        'date_issue' => date('Y-m-d'),
            'reference_no' => $reference_no,
            'registry_no' => $d.$m.$y.$Vno,
            //'iddesignation' => $iddesignation,
            'date_received' => $received_date1,
            'date_on_letter' => $on,
            'user_id' => $idusers,
            'person_name' => $person_name,
            'person_contact' => $person_contact,
            'cell_no' => $telephone_no

        );

        $data_upload = "uploads/created_files/";
        if ($_FILES['file_picture']['name'] != '') {


            // echo $count = count($_FILES['file_picture']['name']);
            for ($i = 0; $i < count($_FILES['file_picture']['name']); $i++) {
                //Get the temp file path

                $tmpFilePath = $_FILES['file_picture']['tmp_name'][$i];
                //Make sure we have a filepath
                if ($tmpFilePath != "") {
                    $target_file = $data_upload . basename($_FILES["file_picture"]["name"][$i]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" && $imageFileType != "pdf") {
                        $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissable">
   <button type="button" class="close" data-dismiss="alert"
      aria-hidden="true">
      &times;
   </button>
   <span>Sorry, only JPG, JPEG, PNG, PDF & GIF files are allowed.</span>
</div>');
                        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                        redirect(base_url() . 'index.php/Letter/create_file');

                    }

                    //exit;


                    //Setup our new file path
                    $newFilePath = "uploads/created_files/" . $_FILES['file_picture']['name'][$i];
                    $DbFilePath = $_FILES['file_picture']['name'][$i];

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                        $data['scan_image'] = $newFilePath;
                        //$sqlattachment = $this->db->query("INSERT INTO `attachment` SET `idissue`='$insert_id', `path`='$DbFilePath'");

                    }
                }
            }


            //$data['image'] = $_FILES['file_picture']['name'];

        }
        $this->db->insert('main', $data);
//echo $this->db->last_query();exit;
        $insert_id = $this->db->insert_id();
        $this->session->set_flashdata('success', 'Mail Created Successfully');
        redirect(base_url() . 'index.php/Letter/create_file');

        // }

    }


    public function created_files()
    {
        $data['departments'] = $this->db->get('department')->result_array();

$data['positions'] = $this->db->get('designation')->result_array();
        $where = array('forwarded'=>'');
        $data['letters'] = $this->db->get_where('main',$where)->result_array();


        $data['issueds'] = $this->db->query("SELECT 
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
  order by m.main_id DESC")->result_array();
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
 $data['departments'] = $this->db->get('department')->result_array();
        $data['designations'] = $this->db->get('designation')->result_array();

               $data['issueds'] = $this->db->query("SELECT 
  m.*,
  d.`filetype`,
  fs.`filestatus`,
  f.`flag`,
  ml.`date_of_sending`,
  ml.ml_status,ml.date_of_received,ml.received_by,ml.received_contact,
  ml.received_job_title,ml.image
 
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
  AND m.`status` IN (9, 3) AND ml.r_status = 'forwarded'")->result_array();

      $this->header();
        $this->load->view('files/receive_files',$data);
        $this->footer();
    }


        public function returned_files()
    {
         $data['issueds'] = $this->db->query("SELECT 
  m.*,d.`filetype`,f.`flag`,ml.`date_of_sending`,ml.ml_status,e.`empname`,ml.image,ml.returned_by,ml.returned_job_title,m.date_on_letter,ml.returned_date
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
  AND u.`USER_ID` = m.`user_id`")->result_array();
        $this->header();
        $this->load->view('files/returned_files',$data);
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
  $dateMax = $this->db->query("SELECT ifnull(MAX( `p_id` ) , 0 ) +1 AS p_id FROM `main_log`")->result();

        foreach ($dateMax as $dateMaxNo) {

            $Vno = $dateMaxNo->p_id;

        }

       
               for ($i = 0; $i < count($letters); $i++) {
            $data = array(
                    'main_id' => $letters[$i],
                    //'from' => $department_id,
                    //'for' => $department,
                    //'iddesignation' => $employee,
                    //'idemployee' => $person_name,
                    'date_of_received' => date('Y-m-d'),
                    'ml_status' => 0,'print'=>1,'p_id' => $Vno
                );
                //echo "<pre>";print_r($data);

                $where = array('main_id' => $letters[$i]);
                $this->db->insert('main_log', $data, $where);
                //echo $this->db->last_query();

                $data1 = array('date_issue' => date('Y-m-d'), 'forwarded' => 'Forwarded', 'status' => 9);

                $where = array('main_id' => $letters[$i]);
                $this->db->update('main', $data1, $where);

           
        }
     //   
      //  exit;

       
        $this->session->set_flashdata('success', 'File Forwarded Successfully');
        redirect(base_url() . 'index.php/Letter/printLetters/'.$Vno);
    }


        public function returned_file()
    {
        extract($_POST);
        // print_r($_POST);exit;
        $id = $this->input->post('main_id');
        $this->db->update('main', array('status' => 3, 'forwarded' => 'Received Back'), array('main_id' => $id));
        $user_id = $this->session->userdata('user_id');
       $date = date('Y-m-d');
       $data = array(
            'main_id' => $id,
            'from' => $from,
            //'for' => $for,
            //'iddesignation' => $iddesignation,
            'date_of_sending' => date('Y-m-d'),
            'ml_status' => 1,
            'user_id' => $user_id,
            'returned_by' => $idemployee,
            'returned_job_title' => $returned_contact,
            'returned_date' => $date

        );

        if ($_FILES['file_picture']['name'] != '') {


            // echo $count = count($_FILES['file_picture']['name']);
            //for ($i = 0; $i < count($_FILES['file_picture']['name']); $i++) {
            //Get the temp file path

            $tmpFilePath = $_FILES['file_picture']['tmp_name'];
            //Make sure we have a filepath

            //Setup our new file path
            $newFilePath = "uploads/returned_files/" . $_FILES['file_picture']['name'];
            $DbFilePath = $_FILES['file_picture']['name'];
            //Upload the file into the temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                 $data['image'] = $newFilePath;
                //$sqlattachment = $this->db->query("INSERT INTO `attachment` SET `idissue`='$id', `path`='$newFilePath'");

            }
        }


       
        $where = array('main_id' => $id);
        $this->db->update('main_log', array('ml_status' => 8), $where);
        $this->db->insert('main_log', $data);
         //echo $this->db->last_query();exit; 
$this->session->set_flashdata('success', 'File Returned Successfully.');
        //echo 1;
        redirect(base_url() . 'index.php/Letter/receive_files');
    }

     public function getreturned()
    {
        $id = $this->input->post('dept');
        $data['sql'] = $this->db->query("SELECT 
  m.*,d.`filetype`,f.`flag`,ml.`date_of_sending`,ml.ml_status,ml.main_log_id,e.`empname`,ml.date_of_sending,ml.date_of_received,ml.dispatched
FROM
  main AS m,
  main_log AS ml,
  filetype AS d,
  flag AS f,
  usr_user AS u, employee AS e
WHERE d.`idfiletype` = m.`doc_id` 
 AND f.`idflag` = m.`flag_id`
  AND m.`main_id` = ml.`main_id`
  AND ml.`ml_status` IN(1,8)
  AND u.`idemployee` = e.`idemployee`
  AND u.`USER_ID` = m.`user_id` AND m.main_id = '$id'")->result();
        
        $this->load->view('files/trach_modal',$data);
    }

public function DispatchForm($log_id)
    {
        $data['departments'] = $this->db->get('department')->result_array();
        $data['returns'] = $this->db->query("SELECT m.`main_id`,m.`reference_no`,ml.main_log_id,m.`date_on_letter`,m.`subject`,m.`remarks`,
 ml.main_log_id FROM main AS m, main_log AS ml
WHERE m.`main_id` = ml.`main_id`
AND ml.`ml_status` = 1
AND ml.`main_log_id` = '$log_id'")->row_array();
        $data['parameters'] = $this->db->get('file_naming')->result_array();

        $this->header('Dispatched Form');
        $this->load->view('files/dispatchForm', $data);
        $this->footer();
    }

       public function create_dispatch()
    {
        extract($_POST);
        $user_id = $this->session->userdata('user_id');
        $id = $this->db->get_where('file_naming',array('file_id'=>$file_no))->row_array();
        $data = array(
            'dispatch_date' => date('Y-m-d'),
            'iddepartment' => $department,
            'user_id' => $user_id,
            'main_id' => $main_id,
            'main_log_id' => $main_log_id,
            'file_no'=>$id['file_no'],
            'file_name'=>$id['file_name'],
            'filed_by'=>$user_id,'filed_date'=>date('Y-m-d')
        );
        $this->db->insert('dispatch_files', $data);

        $where = array('main_log_id'=>$main_log_id);
        $this->db->update('main_log',array('dispatched'=>1),$where);
        $this->session->set_flashdata('success','Letter Filed Successfully');
        redirect(base_url().'index.php/Letter/dispatched_files');

    }


 public function dispatched_files()
    {
        $data['issueds'] = $this->db->query("SELECT 
  m.`main_id`,
  m.`reference_no`,
  m.`date_on_letter`,
  m.`subject`,
  m.`remarks`,
  ml.main_log_id, df.`dispatch_date`,ml.image,m.registry_no,df.file_name,df.file_no,df.filed_by,df.filed_date,e.`empname`
FROM
  main AS m,
  main_log AS ml, dispatch_files AS df,usr_user AS u, employee AS e
WHERE m.`main_id` = ml.`main_id` 
  AND ml.`ml_status` = 1 
 AND df.`main_id` = m.`main_id` AND df.`main_log_id` = ml.`main_log_id`
 AND ml.`dispatched` = 1
 AND u.`idemployee` = e.`idemployee`
 AND df.`filed_by` = u.`USER_ID`")->result_array();
        $this->header();
        $this->load->view('files/dispatched_files',$data);
        $this->footer();
    }

    public function getEmmDesignation()
    {
        $dept_id = $this->input->post('dept');
        $query = $this->db->query("select * from employee where iddepartment = '$dept_id'")->result_array();

        $output = '';
        foreach ($query as $item) {
            echo $output .= "<option value='".$item['idemployee']."'>".$item['empname']."</option>";
        }
        echo $output;
    }
 public function edit_file($id)
    {
        $data['departments'] = $this->db->get('department')->result_array();
        $data['designations'] = $this->db->get('designation')->result_array();
        $data['fileTypes'] = $this->db->get('filetype')->result_array();
        $data['fileStatuses'] = $this->db->get('filestatus')->result_array();
        $data['flags'] = $this->db->get('flag')->result_array();
        $data['edits'] = $this->db->query("SELECT
  m.*,d.`filetype`,fs.`filestatus`,f.`flag`
FROM
  main AS m,
  filetype AS d,
  filestatus AS fs,
  flag AS f
WHERE d.`idfiletype` = m.`doc_id` 
  AND fs.`idfilestatus` = m.`status`
 AND f.`idflag` = m.`flag_id`
AND m.main_id = '$id'")->row_array();
        $this->header('Edit File');
        $this->load->view('files/edit_file', $data);
        $this->footer();

    }

    public function updateFile()
    {
        extract($_POST);
        $datetime = date("Y-m-d");
        $idusers = $this->session->userdata('user_id');
        $id = $this->input->post('main_id');
               $date_on_letter = $this->input->post('date_on_letter');
        $onLetter = date('Y-m-d',strtotime($date_on_letter));
        $data = array(
            'subject' => $subject,
            'remarks' => $remarks,
            'doc_id' => $file_type,
            'status' => '1',
            'flag_id' => $flag,
            'from' => $for,
            //'for' => $department,
            'reference_no' => $reference_no,
            //'iddesignation' => $iddesignation,
            'date_received' => $datetime,
            'date_on_letter' => $onLetter,
            'user_id' => $idusers,
            'person_name' => $person_name,
            'person_contact' => $person_contact,
            'cell_no' => $telephone_no

        );

 $img = $this->db->get_where('main',array('main_id'=>$id))->row_array();
        $u = $img['scan_image'];
        unlink($u);
       // exit;
        if ($_FILES['file_picture']['name'] != '') {


            // echo $count = count($_FILES['file_picture']['name']);
            //for ($i = 0; $i < count($_FILES['file_picture']['name']); $i++) {
            //Get the temp file path

            $tmpFilePath = $_FILES['file_picture']['tmp_name'];
            //Make sure we have a filepath

            //Setup our new file path
            $newFilePath = "uploads/created_files/" . $_FILES['file_picture']['name'];
            $DbFilePath = $_FILES['file_picture']['name'];
            //Upload the file into the temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                $data['scan_image'] = $newFilePath;
                //$sqlattachment = $this->db->query("INSERT INTO `attachment` SET `idissue`='$id', `path`='$newFilePath'");

            }
        }

        //echo "<pre>";print_r($data);exit;
        $where = array('main_id'=>$id);
        $this->db->update('main',$data,$where);
        $this->session->set_flashdata('success','File Updated Successfully');
        redirect(base_url().'index.php/Letter/created_files');
    }

    public function delete_file($id)
    {
       $this->db->delete('main',array('main_id'=>$id));
        $this->session->set_flashdata('success','File Deleted Successfully');
        redirect(base_url().'index.php/Letter/created_files');
    }

 public function getSelectedValues()
    {
        $id = $this->input->post('selected');
       // $d =explode(',',$id);
        //print_r($_POST);
         $data['issueds'] = $this->db->query("SELECT e.`empname`,
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
  AND m.main_id IN($id)")->result_array();
        //print_r($data);
        $this->load->view('files/showModal',$data);

    }

    public function printLetters($id)
    {
 $data['printNo'] = $id;
        $data['issueds'] = $this->db->query("SELECT 
  m.*,
  d.`filetype`,
  fs.`filestatus`,
  f.`flag`,
  ml.`date_of_sending`,
  ml.ml_status,ml.date_of_received,ml.received_by,received_contact
 
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
  AND m.`status` IN (9, 3) AND ml.print = 1")->result_array();
          //$this->header();
        $this->load->view('files/lettersPrinting',$data);
        //$this->footer();
    }
 public function viewSpecificLetter($id)
    {
        $data['issueds'] = $this->db->query("SELECT e.`empname`,
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
AND m.main_id = '$id'")->result_array();
//echo $this->db->last_query();

        $this->load->view('files/viewSpecificLetter', $data);

    }

 public function updateLetter($id)
    {
       $data['issueds'] = $this->db->query("SELECT 
  * 
FROM
  main AS m, main_log AS ml
WHERE m.main_id = '$id' 
AND m.main_id = ml.main_id")->row_array();
        $this->load->view('files/updateLetter',$data);
    }


    public function update()
    {
        extract($_POST);
        //print_r($data);
        //exit;
        $where = array('p_id' => $print_no);
        $data = array('received_by' => $received_by,
            'received_job_title' => $received_contact);

        $where1 = array('p_id' => $print_no);
         $mld = array('print' => 0,'r_status'=>'forwarded');
        $this->db->update('main_log', $mld, $where1);
        //echo $this->db->last_query();
        $mw = array('status' => 11);
        $mdata = array('status' => 9);
        $this->db->update('main', $mdata, $mw);
       // echo $this->db->last_query();exit;
        if ($_FILES['file_picture']['name'] != '') {

            $tmpFilePath = $_FILES['file_picture']['tmp_name'];
            //Make sure we have a file path

            //Setup our new file path
            $newFilePath = "uploads/printLetters/" . $_FILES['file_picture']['name'];
            $DbFilePath = $_FILES['file_picture']['name'];
            //Upload the file into the temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $data['image'] = $newFilePath;
            }
        }
        $this->db->update('main_log', $data, $where);
        // echo $this->db->last_query();
        // exit;
        redirect(base_url() . 'index.php/Letter/receive_files');
    }



       public function update_old()
    {
        extract($_POST);
          //print_r($data);
        //exit;
        $where = array('print' => 0);
        $data = array('received_by' => $received_by,
            'received_contact' => $received_contact);

        if ($_FILES['file_picture']['name'] != '') {

            $tmpFilePath = $_FILES['file_picture']['tmp_name'];
            //Make sure we have a filepath

            //Setup our new file path
            $newFilePath = "uploads/printLetters/" . $_FILES['file_picture']['name'];
            $DbFilePath = $_FILES['file_picture']['name'];
            //Upload the file into the temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                $data['image'] = $newFilePath;
                //$sqlattachment = $this->db->query("INSERT INTO `attachment` SET `idissue`='$id', `path`='$newFilePath'");

            }
        }
        $this->db->update('main_log', $data, $where);
        // echo $this->db->last_query();
       // exit;
        redirect(base_url() . 'index.php/Letter/receive_files');
    }

 function updatePrint(){
        $update = array('print'=>0);
        $this->db->update('main_log',$update);
    }
    public function viewReceivedLetter($id)
    {
        $data['issueds'] = $this->db->query("SELECT 
  m.*,
  d.`filetype`,
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
  AND m.`status` IN (9, 3) AND ml.r_status = 'forwarded' AND m.main_id = '$id'")->result_array();

        $this->load->view('files/viewReceivedLetter', $data);
    }
    public function viewReturnedLetter($id)
    {
        $data['issueds'] = $this->db->query("SELECT 
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
  AND u.`USER_ID` = m.`user_id` AND m.main_id = '$id'")->result_array();

        $this->load->view('files/viewReturnedLetter', $data);
    }



}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */