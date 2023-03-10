<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct(){
		parent::__construct();
		 $this->load->library('form_validation');
		 $this->load->model('attendance_model');
	}
	public function index()
	{
		$data['title'] = 'NCWC : RECORD ATTENDANCE';
		$this->load->view('recordattendance',$data);
	}
	
	public function addattendance(){
		$this->form_validation->set_rules('tocongr','Total Congregation','required|numeric');
		$this->form_validation->set_rules('onofchild','No Of Children','required|numeric');
		$this->form_validation->set_rules('overall','Over all Total','required|numeric');
		$this->form_validation->set_rules('tyofser','Type Of Service','required');
		
		
		if($this->form_validation->run()){
			
			$data = array(
				'totcongregation' => $this->input->post('tocongr'),
				'totchildren' => $this->input->post('onofchild'),
				'overall' => $this->input->post('overall'),
				'typeofservice' => $this->input->post('tyofser')
			);
			
			$this->attendance_model->recordAttendance($data);
			$this->session->set_flashdata('message','Attendance Recorded Successfully');
			redirect('attendance/index');
			
		}else{
			$this->index();
		}
		
		
		
	}
	
	
	public function viewattendance(){
		//$data['attendance'] = $this->attendance_model->fetchattendance();
		$data['title'] = 'NCWC : VIEW ATTENDANCE';
		$this->load->view('viewttendance',$data);
	}
	
	
	//fetch Tithe
	function fetch_user(){  
           $fetch_data = $this->attendance_model->make_datatables();  
           $data = array();  
		   $x = 0;
           foreach($fetch_data as $row)  
           {  
				$x++;
                $sub_array = array();  
				$sub_array[] = $x;
                $sub_array[] = $row->totcongregation;  
                $sub_array[] = $row->totchildren;  
                $sub_array[] = $row->overall;  
                $sub_array[] = $row->typeofservice;  
                $sub_array[] = $row->datetime;
				$sub_array[] = '<a class="btn btn-info" href="'.base_url().'attendance/edit_attendance/'.$row->id.'">
								<i class="fa fa-edit"></i> Edit
							  </a>';
				$sub_array[] = '<a class="btn btn-danger delmember" cid="'.$row->id.'" href="#">
								<i class="fa fa-trash"></i> Delect
							  </a>'; 
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->attendance_model->get_all_data(),  
                "recordsFiltered"     =>     $this->attendance_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }  
	
	
	
	//del attendance
	public function del_attendance(){
		$id = $this->uri->segment(3);
		$this->attendance_model->del_attendance($id);
		 echo '
			 Attendance Delected Successfully!
		';	
	}
	
	public function edit_attendance(){
		$data['title'] = 'NCWC : EDIT ATTENDANCE';
		$id = $this->uri->segment(3);
		$data['attendanceinfo'] = $this->attendance_model->view_attendance($id);
		$this->load->view('edit_attendance',$data);
	}
	
	public function update_attendance(){
		$id = $this->uri->segment(3);
		$data = array(
				'totcongregation' => $this->input->post('tocongr'),
				'totchildren' => $this->input->post('onofchild'),
				'overall' => $this->input->post('overall'),
				'typeofservice' => $this->input->post('tyofser')
			);
			
		$this->attendance_model->updateAttendance($data,$id);
		$this->session->set_flashdata('message','Attendance Updated Successfully');
		redirect('attendance/edit_attendance/'.$id.'');
	}
}
