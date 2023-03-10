<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *	@author : BEB300
 *  @support: support@beb300.com
 *	date	: 18 October, 2017
 *	Kandi User Management System
 *	http://www.beb300.com
 *  version: 1.0
 */

/**
 * Class dashboard
 *
 * @property CI_Session session
 * @property General general
 */
//Extending all Controllers from Core Controller (MY_Controller)
class generals extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('user_id')) {
            //
        } else {


            redirect(base_url() . 'index.php/users/login');

        }
    }

    //GET PAGE/CONTROLLER/CONTROLLER-FUNCTION NAME............................
    public function getpage($page)
    {
        $this->session->set_userdata("MENU_ID", $page);
        $group_id = $this->session->userdata("group_id");
        $Page = $this->General->fetch_bysinglecol("MENU_ID", "usr_menu", $page);
        $this->create_breadcrums();

        foreach ($Page as $pagerow) {
            $getPage = $pagerow->MENU_URL;
            //SET SESSION FOR PAGE ID................................................
            $this->session->set_userdata("menu_id", $pagerow->MENU_ID);
        }
		
		//$pageid = $_SESSION['menu_id'];
		//echo $pageid;
        redirect(base_url() . 'index.php/'.$getPage);

    }

    // Creating breadcrumbs
    public function create_breadcrums()
    {

        $row = $this->General->fetch_bysinglecol("MENU_ID", "usr_menu", $this->session->userdata("MENU_ID"));

        foreach ($row as $row_r) {

            if ($row_r->PARENT_ID != 0) {

                $this->session->set_userdata("child_name", $row_r->MENU_TEXT);
                $this->session->set_userdata("child_url", base_url() . "index.php/" . $row_r->MENU_URL);

                $row2 = $this->General->fetch_bysinglecol("MENU_ID", "usr_menu", $row_r->PARENT_ID);

                foreach ($row2 as $row_r2) {

                    $this->session->set_userdata("parent_name", $row_r2->MENU_TEXT);
                }

            } else {
                $this->session->set_userdata("parent_name", $row_r->MENU_TEXT);
            }

        }

    }

    //Add Group....
    public function add_group()
    {

        $this->header();
        $data['group_list'] = $this->General->fetch_records("usr_group");
        $this->load->view('generals/add_group', $data);
        $this->footer();
    }

    // Creating new Group
    public function create_group()
    {

        $group_name = $this->input->post('group_name');

        $record = $this->General->fetch_maxid("usr_group");

        foreach ($record as $record) {

            echo $MaxGroup = $record->GROUP_ID;
        }


        $group_no = $MaxGroup + 1;

        $data = array(
            "GROUP_ID" => $group_no,
            "GROUP_NAME" => $group_name
        );
        $this->General->create_record($data, "usr_group");
        $this->session->set_flashdata('msg', 'Add Successfully');
        redirect(base_url() . 'index.php/generals/add_group');
    }


    //Edit Group....
    public function edit_group($id)
    {
        $group['groups'] = $this->General->fetch_groupbyid($id);
        $this->header();
        $this->load->view('generals/edit_group', $group);
        $this->footer();
    }

    //Update Group......
    public function update_group()
    {
        $group_name = $this->input->post('group_name');
        $group_id = $this->input->post('group_id');
        $this->General->update_group($group_name, $group_id);

        $this->add_group();
    }

    //Add menu....
    public function addmenu()
    {


        $this->header();

        $col = "PARENT_ID";
        $tbl = "usr_menu";
        $id = 0;

        $config = array();
        $config["total_rows"] = $this->General->count_all($tbl);
        $config["per_page"] = 5;

        $totalseg = $this->uri->total_segments();

        $config['uri_segment'] = $totalseg;

        $segments_arr = $this->uri->segment_array();

        foreach ($segments_arr as $segments_arrs => $value) {
            if ($value == "page") {
                break;
            } else {
                @$u .= $value . "/";
            }

        }
        $config['base_url'] = base_url() . $u . "/page/";

        $this->pagination->initialize($config);

        $page = ($this->uri->segment($totalseg)) ? $this->uri->segment($totalseg) : 0;
        $data["results"] = $this->General->fetch_countries($config["per_page"], $page, $tbl);
        $data["links"] = $this->pagination->create_links();

        $data['menus'] = $this->General->fetch_bysinglecol($col, $tbl, $id);
        $this->load->view('generals/add_menu', $data);
        $this->footer();

    }

    //Create menu....
    public function create_menu()
    {

        $menu = $this->input->post('MENU_TEXT');
        $url = $this->input->post('MENU_URL');
        $parent = $this->input->post('PARENT_ID');
        $sort = $this->input->post('SORT_ORDER');
        $admin = $this->input->post('admin');
        $userid = $this->session->userdata('user_id');
        $d = date("Y-m-d H:i:s");
        $record = $this->General->fetch_maxid("usr_menu");

        foreach ($record as $record) {

            $MaxGroup = $record->MENU_ID;
        }

        $menu_no = $MaxGroup + 1;

        $data = array(
            "MENU_ID" => $menu_no,
            "MENU_TEXT" => $menu,
            "MENU_URL" => $url,
            "PARENT_ID" => $parent,
            "SORT_ORDER" => $sort,
            "SHOW_IN_MENU" => "1",
            "CREATED_USERID" => $userid,
            "CREATED_DATE" => $d
        );
        $response = $this->General->create_record($data, "usr_menu");
    }

    //Fetch All menus.........
    public function list_menu()
    {

        $menu['menus'] = $this->General->fetch_records("usr_menu");

        $this->header();
        $this->load->view('general/list_menu', $menu);
        $this->footer();
    }

    //Edit Menu....
    public function edit_menu($id)
    {

        $menu['menus'] = $this->General->fetch_menubyid($id);
        $this->header();
        $this->load->view('general/edit_menu', $menu);
        $this->footer();

    }

    //Update Menu....
    public function update_menu()
    {


        extract($_POST);
        $this->General->update_menu();

        $this->list_menu();
    }


    //Add permission.....
    public function add_permission($id)
    {

        $data['parentnav'] = $this->Menus->fetch_parent_menu();
        $data['Generals'] = $this;
        $data['group_id'] = $id;
        $this->header();
        $this->load->view('generals/add_permission', $data);
        $this->footer();
    }

    // Creating Permissions for a specific group
    public function create_permission()
    {

        extract($_POST);
        $group_id = $this->input->post('group_id');

        $menus = $this->Menus->fetch_permission_navi();

        foreach ($menus as $menus) {

            $permission_max = $this->General->fetch_permissionmaxno();

            $permissionMax = $permission_max->PER_ID + 1;

            $d = date("Y-m-d H:i:s");

            $menuid = $menus->MENU_ID;

            if (isset($permission['view'][$menuid])) {

                $view = 1;

            }
            if (!isset($permission['view'][$menuid])) {

                $view = 0;
            }

            if (isset($permission['insert'][$menuid])) {

                $insert = 1;
            }
            if (!isset($permission['insert'][$menuid])) {

                $insert = 0;
            }

            if (isset($permission['update'][$menuid])) {

                $update = 1;
            }
            if (!isset($permission['update'][$menuid])) {
                $update = 0;
            }

            if (isset($permission['delete'][$menuid])) {

                $delete = 1;
            }
            if (!isset($permission['delete'][$menuid])) {

                $delete = 0;
            }



            //check if Menu and Group exist then update row...else insert
            $per_groupmenu = $this->General->fetch_per_groupmenu($group_id, $menus->MENU_ID);
            $permission_row = $this->General->fetch_groupmenu_id($group_id, $menus->MENU_ID);
            $userid = $this->session->userdata('user_id');
            foreach ($permission_row as $permission_row) {

                $permission_id = $permission_row->PER_ID;
            }

            if ($per_groupmenu > 0) {

                $data = array(
                    "PER_SELECT" => $view,
                    "PER_INSERT" => $insert,
                    "PER_UPDATE" => $update,
                    "PER_DELETE" => $delete,
                    "UPDATED_USERID" => $userid,
                    "UPDATED_DATE" => $d
                );

                $this->General->update_permissionrecord($data, "usr_permission", $permission_id);

                $this->session->set_flashdata('msg', 'Updated Successfully');
            } else {

                $data = array(
                    "PER_ID" => $permissionMax,
                    "GROUP_ID" => $group_id,
                    "MENU_ID" => $menus->MENU_ID,
                    "PER_SELECT" => $view,
                    "PER_INSERT" => $insert,
                    "PER_UPDATE" => $update,
                    "PER_DELETE" => $delete,
                    "CREATED_USERID" => $userid,
                    "CREATED_DATE" => $d
                );
                $this->General->create_record($data, "usr_permission");

                $this->session->set_flashdata('msg', 'Add Successfully');
            }
//}
        }


        redirect(base_url() . 'index.php/generals/add_permission/' . $group_id);
    }

   

    public function fetch_child($parentid)
    {

        $sql = $this->db->query("SELECT * FROM usr_menu WHERE MENU_ID='$parentid' ORDER BY ASC");

        return $sql;

    }


    public function checkchildMenuCount($pmenuid)
    {


        $whr = array(

            "PARENT_ID" => $pmenuid

        );

        $this->db->where($whr);
        $this->db->from('usr_menu');

        return $this->db->count_all_results();


    }


    public function fetchchildMenu($pmenuid)
    {
        return $this->General->fetch_bysinglecol("PARENT_ID", "usr_menu", $pmenuid);

    }
      public function addFilesParameters()
    {
        $data['files'] = $this->db->get('file_naming')->result_array();
        $this->header();
        $this->load->view('generals/dispatchForm',$data);
        $this->footer();
    }

    public function create_dispatch()
    {
        extract($_POST);
        $user_id = $this->session->userdata('user_id');

        $data = array(
            'file_no'=>$file_no,
            'file_name'=>$file_name
        );
        $this->db->insert('file_naming', $data);
        $this->session->set_flashdata('success','Record added Successfully');
        redirect(base_url().'index.php/Generals/addFilesParameters');

    }

//Edit File....
    public function edit_file($id)
    {
        $group['edits'] = $this->db->get_where('file_naming',array('file_id'=>$id))->row();
        $this->header();
        $this->load->view('generals/edit_file', $group);
        $this->footer();
    }

    //Update File......
    public function update_file()
    {
        $f_id = $this->input->post('file_id');
        $f_no = $this->input->post('file_no');
        $f_name = $this->input->post('file_name');
        $data = array('file_no'=>$f_no,'file_name'=>$f_name);
        $where = array('file_id'=>$f_id);
        $this->db->update('file_naming',$data, $where);

        redirect(base_url().'index.php/Generals/addFilesParameters');
    }

    public function delete_file($id)
    {
        $this->db->delete('file_naming',array('file_id'=>$id));
        redirect(base_url().'index.php/Generals/addFilesParameters');
    }
public function db_backup()
    {
        $this->header();
        $this->load->view('generals/view_backup');
        $this->footer();
    }

    public function backup()
    {
        $this->load->dbutil();

        $prefs = array(
            'format'      => 'zip',
            'filename'    => 'my_db_backup.sql'
        );


        $backup =& $this->dbutil->backup($prefs);

        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $save = 'uploads/'.$db_name;

        $this->load->helper('file');
        write_file($save, $backup);


        $this->load->helper('download');
        force_download($db_name, $backup);
    }
}

?>