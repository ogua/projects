<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tithe extends CI_Controller {
	public function __construct(){
		parent::__construct();
		 $this->load->model('database_model');
		 $this->load->model('tithe_model');
		 $this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['title'] = 'NCWC : RECORD TITHE';
		$data['members'] = $this->database_model->allmember();
		$this->load->view('recordtithe',$data);
	}
	
	public function addtithe()
	{
		$this->form_validation->set_rules('titheid','Tithe ID','trim|required');
		$this->form_validation->set_rules('fname','FirstName','trim|required');
		$this->form_validation->set_rules('onames','OtherNames','trim|required');
		$this->form_validation->set_rules('amount','Amount','trim|required|numeric');
		$this->form_validation->set_rules('mnth','Month','trim|required');
		$this->form_validation->set_rules('yrs','Year','trim|required');
		
		if($this->form_validation->run()){
			$data = array(
				'CARDID' => $this->input->post('titheid'),
				'FIRSTNAME' => $this->input->post('fname'),
				'OTHER_NAMES' => $this->input->post('onames'),
				'AMOUNT' => $this->input->post('amount'),
				'MON' => $this->input->post('mnth'),
				'YEAR' => $this->input->post('yrs')
			);
			
			
		$this->database_model->addTithe($data);	
		$this->session->set_flashdata('message','Tithe Added Successfully');
		redirect('tithe/');
		}else{
			$this->index();
		}
		
	}
	
	public function viewalltithe()
	{
		$data['title'] = 'NCWC : VIEW ALL TITHE';
		$data['alltithe'] = $this->database_model->alltithe();
		$this->load->view('viewalltithe',$data);
	}
	
	
	//fetch Tithe
	function fetch_user(){  
           $fetch_data = $this->tithe_model->make_datatables();  
           $data = array();  
		   $x = 0;
           foreach($fetch_data as $row)  
           {  
				$x++;
                $sub_array = array();  
				$sub_array[] = $x;
                $sub_array[] = $row->CARDID;  
                $sub_array[] = $row->FIRSTNAME .' '.$row->OTHER_NAMES;  
                $sub_array[] = $row->AMOUNT;  
                $sub_array[] = $row->YEAR;  
                $sub_array[] = $row->MON;
				$sub_array[] = $row->DATE;
				$sub_array[] = '<a class="btn bg-navy" href="'.base_url().'tithe/viewtithe/'.$row->CARDID.'">
								<i class="fa fa-eye"></i> View
							  </a>';
				$sub_array[] = '<a class="btn btn-info" href="'.base_url().'tithe/edittithe/'.$row->ID.'">
								<i class="fa fa-edit"></i> Edit
							  </a>';
				$sub_array[] = '<a class="btn btn-danger delmember" cid="'.$row->ID.'" href="#">
								<i class="fa fa-trash"></i> Delect
							  </a>'; 
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->tithe_model->get_all_data(),  
                "recordsFiltered"     =>     $this->tithe_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }  
	  
	  
	  //deltithe
	  public function deltithe()
	{
		$id = $this->uri->segment(3);
		$this->tithe_model->delectTithe($id);
		 echo '
			 Tithe Delected Successfully!
		';		 
	}
	
	public function edittithe()
	{
		$data['title'] = 'NCWC : EDIT TITHE';
		$id = $this->uri->segment(3);
		$data['titheinfo'] = $this->tithe_model->viewthithe($id);
		$this->load->view('edittithe',$data);
	}
	
	
	 public function updatetithe()
	{
		$id = $this->uri->segment(3);
		$data = array(
				'CARDID' => $this->input->post('titheid'),
				'FIRSTNAME' => $this->input->post('fname'),
				'OTHER_NAMES' => $this->input->post('onames'),
				'AMOUNT' => $this->input->post('amount'),
				'MON' => $this->input->post('mnth'),
				'YEAR' => $this->input->post('yrs')
		);		
		$this->tithe_model->updateTithe($data,$id);
		$this->session->set_flashdata('message','Tithe Updated Successfully');
		redirect('tithe/edittithe/'.$id.'');
			 
	}
	
	public function viewtithe()
	{
		$data['title'] = 'NCWC : VIEW TITHE';
		$id = $this->uri->segment(3);
		$data['tittleinfo'] = $this->tithe_model->viewtithejan($id);
		$this->load->view('viewtithe',$data);
	}
	
	
	
}

?>