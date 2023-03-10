<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welfare extends CI_Controller {
	public function __construct(){
		parent::__construct();
		 $this->load->model('database_model');
		 $this->load->model('welfare_model');
		 $this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['title'] = 'NCWC : RECORD WELFARE';
		$this->load->view('recordwelfare',$data);
	}
	
	public function addwelfare()
	{
		$this->form_validation->set_rules('titheid','Welfare ID','trim|required');
		$this->form_validation->set_rules('fname','FirstName','trim|required');
		$this->form_validation->set_rules('onames','OtherNames','trim|required');
		$this->form_validation->set_rules('amount','Amount','trim|required|numeric');
		$this->form_validation->set_rules('mnth','Month','trim|required');
		$this->form_validation->set_rules('yrs','Year','trim|required');
		
		if($this->form_validation->run()){
			$data = array(
				'CARDID' => $this->input->post('titheid'),
				'FIRSTNAME' => $this->input->post('fname'),
				'OTHERNAMES' => $this->input->post('onames'),
				'AMOUNT' => $this->input->post('amount'),
				'MON' => $this->input->post('mnth'),
				'YEAR' => $this->input->post('yrs')
			);
			
			
		$this->welfare_model->addwelfare($data);	
		$this->session->set_flashdata('message','Welfare Added Successfully');
		redirect('welfare/');
		}else{
			$this->index();
		}
		
	}
	
	public function viewallwelfare()
	{
		$data['title'] = 'NCWC : VIEW ALL WELFARE';
		$data['alltithe'] = $this->welfare_model->allwelfare();
		$this->load->view('viewallwelfare',$data);
	}
	
	
	//fetch Tithe
	function fetch_user(){  
           $fetch_data = $this->welfare_model->make_datatables();  
           $data = array();  
		   $x = 0;
           foreach($fetch_data as $row)  
           {  
				$x++;
                $sub_array = array();  
				$sub_array[] = $x;
                $sub_array[] = $row->CARDID;  
                $sub_array[] = $row->FIRSTNAME .' '.$row->OTHERNAMES;  
                $sub_array[] = $row->AMOUNT;  
                $sub_array[] = $row->YEAR;  
                $sub_array[] = $row->MON;
				$sub_array[] = $row->DATE;
				$sub_array[] = '<a class="btn bg-navy" href="'.base_url().'welfare/viewwelfare/'.$row->CARDID.'">
								<i class="fa fa-eye"></i> View
							  </a>';
				$sub_array[] = '<a class="btn btn-info" href="'.base_url().'welfare/editwelfare/'.$row->ID.'">
								<i class="fa fa-edit"></i> Edit
							  </a>';
				$sub_array[] = '<a class="btn btn-danger delmember" cid="'.$row->ID.'" href="#">
								<i class="fa fa-trash"></i> Delect
							  </a>'; 
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->welfare_model->get_all_data(),  
                "recordsFiltered"     =>     $this->welfare_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }  
	  
	  
	  //deltithe
	  public function delwelfare()
	{
		$id = $this->uri->segment(3);
		$this->welfare_model->delwelfare($id);
		 echo '
			 Welfare Delected Successfully!
		';		 
	}
	
	public function editwelfare()
	{
		$data['title'] = 'NCWC : EDIT WELFARE';
		$id = $this->uri->segment(3);
		$data['titheinfo'] = $this->welfare_model->view_welfare($id);
		$this->load->view('editwelfare',$data);
	}
	
	
	 public function updatewelfare()
	{
		$id = $this->uri->segment(3);
		$data = array(
				'CARDID' => $this->input->post('titheid'),
				'FIRSTNAME' => $this->input->post('fname'),
				'OTHERNAMES' => $this->input->post('onames'),
				'AMOUNT' => $this->input->post('amount'),
				'MON' => $this->input->post('mnth'),
				'YEAR' => $this->input->post('yrs')
		);		
		$this->welfare_model->updatewelfare($data,$id);
		$this->session->set_flashdata('message','Welfare Updated Successfully');
		redirect('welfare/editwelfare/'.$id.'');
			 
	}
	
	public function viewwelfare()
	{
		$data['title'] = 'NCWC : VIEW WELFARE';
		$id = $this->uri->segment(3);
		$data['tittleinfo'] = $this->welfare_model->viewwelfare($id);
		$this->load->view('viewwelfare',$data);
	}
	
	
	
}

?>