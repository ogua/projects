<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Letter extends MY_Controller
{
    public function create_file()
    {
        $this->header();
        $data['departments'] = $this->db->get('department')->result_array();
        $data['fileTypes'] = $this->db->get('filetype')->result_array();
        $data['flags'] = $this->db->get('flag')->result_array();
        $this->load->view('files/create_file', $data);
        $this->footer();
    }

    public function new_file()
    {
        extract($_POST);

        $check = $this->db->get_where("issue", array("barcode" => $barcode))->num_rows();
        if ($check > 0) {
            $msg = "Barcode exists. Plase change it.";
            $this->session->set_flashdata('warning', $msg);
            redirect(base_url() . 'index.php/Letter/create_file');
        } else {
            $ip = getenv("REMOTE_ADDR");
            $datetime = date("Y-m-d");
            $idusers = $this->session->userdata('user_id');

            $fromdept = $this->session->userdata('iddepartment');
            $fromsection = $this->session->userdata('idsection');

            $data = array(
                'barcode' => $barcode,
                'fileno' => $file_no,
                'dairyno' => $diary_no,
                'subject' => $subject,
                'remarks' => $remarks,
                'idfiletype' => $file_type,
                'idfilestatus' => '1',
                'idflag' => $flag,
                'idsource' => 1,
                'idvolume' => $volume_no,
                'fromdept' => $fromdept,
                'todept' => $department,
                'datetime' => $datetime,
                'ip' => $ip,
                'idusers' => $idusers,
            );
            // echo "<pre>";print_r($data);
            //exit;
            $this->db->insert('issue', $data);
            // echo $this->db->last_query();
            //exit;
            $insert_id = $this->db->insert_id();

            $track = array(
                'idissue' => $insert_id,
                'fromdept' => $fromdept,
                'todept' => $department,
                'remarks' => $remarks,
                'idfilestatus' => '1',
                'datetime' => $datetime,
                'ip' => $ip,
                'idusers' => $idusers,
            );

            $this->db->insert('track', $track);

            $receive = array(
                'idissue' => $insert_id,
                'received' => '0',
                'status' => '1',
                'datetime' => $datetime
            );

            $this->db->insert('receive', $receive);

            if ($_FILES['file_picture']['name'] != '') {


                // echo $count = count($_FILES['file_picture']['name']);
                for ($i = 0; $i < count($_FILES['file_picture']['name']); $i++) {
                    //Get the temp file path
                   
                    //print_r($_FILES);

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

        }

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
AND i.`fromdept`= '$this->iddepartment' AND i.`datetime`>='$date' and i.`datetime`<='$todate') AS issue_files
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

        $data = array('received' => 1);
        $this->db->update('receive', $data, $where);
        //echo $this->db->last_query();exit;
        redirect(base_url() . 'index.php/dashboard');
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

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */