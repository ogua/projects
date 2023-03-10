<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class dashboard
 *
 * @property CI_Session session
 * @property User User
 * @property General General
 * @property Menus Menus
 * @property Main_model Main_model
 */
class MY_Controller extends CI_Controller
{
    var $savePermission;

    var $editPermission;

    var $deletePermission;

    public function __construct()
    {
        parent::__construct();

        $this->iddepartment = $this->session->userdata('iddepartment');
        $this->department = $this->session->userdata('department');
        
        $this->load->database();
        //Load Models.............

        //$this->odb2 = $this->load->database('db2', TRUE);
        $this->load->model('Menus');
        $this->load->model('General');
        $this->load->model('User');
        $this->load->model('Main_model');
        $this->load->helper("url");
        $this->load->library("pagination");


    }

    //Header for Applications...................................

    public function header($title = '')
    {

        $data['parent_nav'] = $this->Menus->fetch_parent_navi();

        $data['My_Controller'] = $this;
        //echo "<pre>";print_r($data);exit;
        $data['title'] = $title;
        //print_r($data);
        $data['content'] = "";

        $data['users'] = $this->General->fetch_CoustomQuery("SELECT uu.USER_ID, uu.logged_in, uu.CREATED_DATE,
                    uu.USER_NAME,uu.USER_ID, ug.GROUP_NAME,ug.GROUP_ID, uu.IS_ACTIVE FROM usr_group  as ug,
                    usr_user as uu
                   
                    WHERE ug.GROUP_ID	= uu.GROUP_ID");

        $data['content'] .= $this->load->view('members_table_view', $data, TRUE);
        $data['ajax_url'] = base_url() . 'members_online/';
        $this->load->view('_template/header', $data);


    }

    public function usersTable()
    {
        $this->main_model->bps_table('usr_user', 'USER_ID');

    }

    public function main_content()
    {
        //$data['total_users'] = $this->General->count_all('usr_user');
        $data['active_users'] = $this->General->active_users();
        $data['total_employees'] = $this->General->count_all('employee_profile');
        $data['inactive_users'] = $this->General->inactive_users();
        $data['users_list'] = $this->User->usersList();

		$this->header();
        $this->load->view('_template/main', $data);
		$this->footer();
    }


    public function footer()
    {

        $this->load->view('_template/footer');

    }

    public function fetchsidebar_childMenuById($child_id)
    {


        if ($this->session->userdata('group_id') == 1) {

            $query = $this->db->query("SELECT * FROM usr_menu WHERE PARENT_ID =$child_id AND SHOW_IN_MENU = 1 ORDER BY SORT_ORDER ASC");

        }


        if ($this->session->userdata('group_id') != 1) {

            $group = $this->session->userdata('group_id');

            $query = $this->db->query("SELECT * FROM usr_menu AS UM , usr_permission UP

                                        WHERE

                                        UM.MENU_ID = UP.MENU_ID

                                        AND 

                                        UP.PER_SELECT =1 

                                        AND

                                        UP.GROUP_ID = $group

                                        AND

                                        UM.PARENT_ID =$child_id AND SHOW_IN_MENU = 1 ORDER BY SORT_ORDER ASC");

        }


        return $query->result();


    }

    //SET SAVE, DELETE, UPDATE, PERMISSIONS FOR PAGES.........................

    public function Getsave_up_delPermissions()
    {

        $menu_id = $this->session->userdata("MENU_ID");

        if (!empty($menu_id) && $this->session->userdata("group_id") != 1) {


            // $menu_id = $this->session->userdata("menu_id");
            $group_id = $this->session->userdata("group_id");

            $permissionResult = $this->General->fetch_CoustomQuery("SELECT * FROM `usr_permission`

												  WHERE GROUP_ID=$group_id AND 

												  MENU_ID=$menu_id");

            //print_r($permissionResult);exit;
            foreach ($permissionResult as $permissionResults) {


                //SET SAVE BUTTON PERMISSION...............................................................

                if ($permissionResults->PER_INSERT == 1) {


                    $this->savePermission = "<input type='submit' value='save' class='btn btn-success btn-large' >";


                } elseif ($permissionResults->PER_INSERT == 0) {


                    $this->savePermission = "<input type='button' value='Restricted' class='btn btn-warning' >";


                }


                //SET UPDATE BUTTON PERMISSION...............................................................

                if ($permissionResults->PER_UPDATE == 1) {


                    $this->editPermission = "";


                } elseif ($permissionResults->PER_UPDATE == 0) {


                    $this->editPermission = "style='display:none;'";


                }


                //SET DELETE BUTTON PERMISSION...............................................................

                if ($permissionResults->PER_DELETE == 1) {


                    $this->deletePermission = "";


                } elseif ($permissionResults->PER_DELETE == 0) {


                    $this->deletePermission = "style='display:none;'";


                }


            }


        } elseif ($this->session->userdata("group_id") == 1) {


            $this->savePermission = "<input type='submit' value='save' class='btn btn-success' >";

            $this->editPermission = "";

            $this->deletePermission = "";


        }//End Condition......


    }

	
	 // Permission checking
    public function checkpermission($id, $group_id)
    {

        $whr = array(

            "GROUP_ID" => $group_id,
            "MENU_ID" => $id

        );

        $this->db->where($whr);
        $this->db->order_by("PER_ID", "ASC");
        $this->db->from('usr_permission');

        return $this->db->count_all_results();

    }
	
	
	
	public function fetchRecordpermission($id, $group_id)
    {
        $sql = $this->db->query("SELECT * FROM usr_permission WHERE GROUP_ID ='$group_id' AND MENU_ID='$id' ORDER BY PER_ID asc LIMIT 1");
        $r_sql = $sql->result();

        return $r_sql;

    }
	
	
	public function getdeletepermissions(){
		
		$menyid = $this->session->userdata("MENU_ID");
		$groupid = $this->session->userdata("group_id");
		$USERID = $this->session->userdata("user_id");
		
		
		$sql = "SELECT `PER_SELECT`,`PER_INSERT`,PER_DELETE,`PER_UPDATE` FROM `usr_permission` 
		  WHERE `GROUP_ID` = '$groupid' AND `MENU_ID` = '$menyid' AND `CREATED_USERID` = '$USERID' ";
		$sqlq = $this->db->query($sql);
		
		//echo $sql;
		return $sqlq;
	
	}



	public function getinsertper(){
		$insert = $this->getdeletepermissions();
		if($insert->num_rows() > 0){
			foreach($insert->result_array() as $per){
				$inser =  $per['PER_INSERT'];
			}
			return $inser;
		}else{
			return 0;
		}
		
	}
	
	
	public function getdeleteper(){
		$insert = $this->getdeletepermissions();
		if($insert->num_rows() > 0){
			foreach($insert->result_array() as $per){
				$inser =  $per['PER_DELETE'];
			}
			return $inser;
		}else{
			return 0;
		}
		
	}
	
	
	public function getupdateper(){
		$insert = $this->getdeletepermissions();
		if($insert->num_rows() > 0){
			foreach($insert->result_array() as $per){
				$inser =  $per['PER_UPDATE'];
			}
			return $inser;
		}else{
			return 0;
		}
		
	}






}


?>