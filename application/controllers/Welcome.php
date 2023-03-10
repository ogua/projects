<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		 $this->load->library('calendar');
		 $this->load->library('form_validation');
		 $this->load->model('database_model');
		 $this->load->model('tithe_model');
		 $this->load->model('welfare_model');
	}
	public function index()
	{
		$data['totalmembers'] = $this->database_model->allmember();
		$data['totalactivemembers'] = $this->database_model->allmemberactive();	
        $data['totalstoppedmembers'] = $this->database_model->allmembernonactive();	
		$data['totalguestmembers'] = $this->database_model->allvisitors();

		$data['totalushers'] = $this->database_model->allactiveuhers();	
		$data['totalinstrument'] = $this->database_model->allactiveinstru();	
		$data['totalchoir'] = $this->database_model->allactivechoir();	
		$data['totalmedia'] = $this->database_model->allactiveMedia();			
		$month = strtoupper(strtolower(date('F')));
		$mofbirth = date('d-m');
		$data['totaltithemonth'] = $this->tithe_model->tithtmonth($month);
		$data['totalwelfaremonth'] = $this->welfare_model->welfaremonth($month);
		$data['birthday'] = $this->database_model->birthday();
		$data['title'] = 'NCWC : DASHBOARD';
		$this->load->view('dashboard',$data);
	}
	
	public function mainprog()
	{
		$data['title'] = 'NCWC : MEMBER REGISTRATION';
		$this->load->view('main', $data);
	}
	
	public function visitors()
	{
		$data['title'] = 'NCWC : VISITORS REGISTRATION';
		$this->load->view('visitors', $data);
	}
	
	
	public function updatevisitor(){
		$id = $this->uri->segment(3);
		$this->form_validation->set_rules('fname','First name','required');
		$this->form_validation->set_rules('onames','Other names','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('residence','Residence','required');
		$this->form_validation->set_rules('telnum','Mobile Number','required|numeric|max_length[10]|min_length[10]');
		$this->form_validation->set_rules('ncwy','Who Invited You','required');
		if($this->form_validation->run()){
			if($_FILES['InputFile']['name'] != ''){
			//remove previous image first
				$result = $this->database_model->delectimagevisitor($id);
				if($result->num_rows() > 0){
					foreach($result->result() as $row){
						$img = $row->Image;
					}
					if(!empty($img)){
						//if img is not empty
						$url = "./asset/images/".$img;
					  if(unlink($url)){
						$image = $_FILES['InputFile']['name'];			
							$tmpimage = $_FILES['InputFile']['tmp_name'];
							$source ="./asset/images/";
							$extg = array("jpg","png","gif","jpeg");
							$target_file = $source.basename($image);		
							$ext = strtolower(substr($image, strripos($image, '.')+1));	
							$filename = round(microtime(true)).mt_rand().'.'.$ext;
							if(!in_array($ext,$extg)){
								$this->session->set_flashdata('messages','Only This File Types are allowed JPG, PNG & GIF');
								redirect('members/editvisitor/'.$id);
							}
							if(move_uploaded_file($tmpimage,$source.$filename)){
								$data = array(
									'firstname' => $this->input->post('fname'),
									'othernames' => $this->input->post('onames'),
									'resident' => $this->input->post('residence'),
									'phone' => $this->input->post('telnum'),
									'Image' => $filename,
									'gender' => $this->input->post('gender'),
									'curchrch' => $this->input->post('fchurch'),
									'invited' => $this->input->post('ncwy')
							   );
								$this->database_model->updatevisitors($data,$id);
								$this->session->set_flashdata('message','Information Updated Successfully');
								redirect('members/editvisitor/'.$id);
							}else{
								$this->session->set_flashdata('messages','Something Went Wrong Please Try Again');
								redirect('members/editvisitor/'.$id);
							}
					}else{
						$this->session->set_flashdata('messages','Please check Image and Try again');
						redirect('members/editvisitor/'.$id);
					}	
					}else{
						$image = $_FILES['InputFile']['name'];			
							$tmpimage = $_FILES['InputFile']['tmp_name'];
							$source ="./asset/images/";
							$extg = array("jpg","png","gif","jpeg");
							$target_file = $source.basename($image);		
							$ext = strtolower(substr($image, strripos($image, '.')+1));	
							$filename = round(microtime(true)).mt_rand().'.'.$ext;
							if(!in_array($ext,$extg)){
								$this->session->set_flashdata('messages','Only This File Types are allowed JPG, PNG & GIF');
								redirect('members/editvisitor/'.$id);
							}
							if(move_uploaded_file($tmpimage,$source.$filename)){
								$data = array(
									'firstname' => $this->input->post('fname'),
									'othernames' => $this->input->post('onames'),
									'resident' => $this->input->post('residence'),
									'phone' => $this->input->post('telnum'),
									'Image' => $filename,
									'gender' => $this->input->post('gender'),
									'curchrch' => $this->input->post('fchurch'),
									'invited' => $this->input->post('ncwy')
							   );
								$this->database_model->updatevisitors($data,$id);
								$this->session->set_flashdata('message','Information Updated Successfully');
								redirect('members/editvisitor/'.$id);
							}else{
								$this->session->set_flashdata('messages','Something Went Wrong Please Try Again');
								redirect('members/editvisitor/'.$id);
							}
					}
					
				}
			}else{
				$data = array(
							'firstname' => $this->input->post('fname'),
							'othernames' => $this->input->post('onames'),
							'resident' => $this->input->post('residence'),
							'phone' => $this->input->post('telnum'),
							'gender' => $this->input->post('gender'),
							'curchrch' => $this->input->post('fchurch'),
							'invited' => $this->input->post('ncwy')
					   );
						$this->database_model->updatevisitors($data,$id);
						$this->session->set_flashdata('message','Information Updated Successfully');
						redirect('members/editvisitor/'.$id);
			}
			
			
			
			
		
		}else{
			redirect('members/editvisitor/'.$id);
		}
		
		
		//$this->database_model->registermember($data);
	}
	
	public function Regvisitor(){
		$this->form_validation->set_rules('fname','First name','required');
		$this->form_validation->set_rules('onames','Other names','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('residence','Residence','required');
		$this->form_validation->set_rules('telnum','Mobile Number','required|numeric|max_length[10]|min_length[10]');
		$this->form_validation->set_rules('ncwy','Who Invited You','required');
		if($this->form_validation->run()){
			if($_FILES['InputFile']['name'] != ''){
			$image = $_FILES['InputFile']['name'];			
			$tmpimage = $_FILES['InputFile']['tmp_name'];
			$source ="./asset/images/";
			$extg = array("jpg","png","gif","jpeg");
			$target_file = $source.basename($image);		
			$ext = strtolower(substr($image, strripos($image, '.')+1));	
			$filename = round(microtime(true)).mt_rand().'.'.$ext;
			if(!in_array($ext,$extg)){
				$this->session->set_flashdata('messages','Only This File Types are allowed JPG, PNG & GIF');
				redirect('welcome/visitors');
			}
			if(move_uploaded_file($tmpimage,$source.$filename)){
				$data = array(
					'firstname' => $this->input->post('fname'),
					'othernames' => $this->input->post('onames'),
					'resident' => $this->input->post('residence'),
					'phone' => $this->input->post('telnum'),
					'Image' => $filename,
					'gender' => $this->input->post('gender'),
					'curchrch' => $this->input->post('fchurch'),
					'invited' => $this->input->post('ncwy')
			   );
				$this->database_model->registervisitor($data);
				$this->session->set_flashdata('message','Visitor Registered Successfully');
				redirect('welcome/visitors');
			}else{
				$this->session->set_flashdata('messages','Something Went Wrong Please Try Again');
				redirect('welcome/visitors');
			}
			}else{
				$data = array(
					'firstname' => $this->input->post('fname'),
					'othernames' => $this->input->post('onames'),
					'resident' => $this->input->post('residence'),
					'phone' => $this->input->post('telnum'),
					'gender' => $this->input->post('gender'),
					'curchrch' => $this->input->post('fchurch'),
					'invited' => $this->input->post('ncwy')
			   );
				$this->database_model->registervisitor($data);
				$this->session->set_flashdata('message','Visitor Registered Successfully');
				redirect('welcome/visitors');
			}
		}else{
			$this->visitors();
		}
		
		
		//$this->database_model->registermember($data);
	}
	
	
	
	public function registermember(){
		$this->form_validation->set_rules('fname','First name','required');
		$this->form_validation->set_rules('onames','Other names','required');
		$this->form_validation->set_rules('mstatus','Marital Status','required');
		$this->form_validation->set_rules('occupation','Occupation','required');
		$this->form_validation->set_rules('age','Age','numeric');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('residence','Residence','required');
		$this->form_validation->set_rules('noofchildern','No Of Childern','numeric');
		$this->form_validation->set_rules('nation','Nationality','required');
		$this->form_validation->set_rules('hometown','Hometown','required');
		$this->form_validation->set_rules('telnum','Mobile Number','numeric|max_length[10]|min_length[10]');
		$this->form_validation->set_rules('welid','Welfare ID','numeric');
		$this->form_validation->set_rules('titleid','Tithe ID','numeric');
		/*$this->form_validation->set_rules('dateofbirth','Date Of Birth','required');
		$this->form_validation->set_rules('ncwy','Why Covenant','required');*/
		if($this->form_validation->run()){
			if($_FILES['InputFile']['name'] != ''){
			$image = $_FILES['InputFile']['name'];			
			$tmpimage = $_FILES['InputFile']['tmp_name'];
			$source ="./asset/images/";
			$extg = array("jpg","png","gif","jpeg");
			$target_file = $source.basename($image);		
			$ext = strtolower(substr($image, strripos($image, '.')+1));	
			$filename = round(microtime(true)).mt_rand().'.'.$ext;
			if(!in_array($ext,$extg)){
				$this->session->set_flashdata('messages','Only This File Types are allowed JPG, PNG & GIF');
				redirect('welcome/mainprog');
			}
			if(move_uploaded_file($tmpimage,$source.$filename)){
				$data = array(
					'Firstname' => $this->input->post('fname'),
					'Othernames' => $this->input->post('onames'),
					'Resident' => $this->input->post('residence'),
					'Age' => $this->input->post('age'),
					'M_Status' => $this->input->post('mstatus'),
					'Occupation' => $this->input->post('occupation'),
					'nameofspouse' => $this->input->post('nameofspouse'),
					'noofchildren' => $this->input->post('noofchildern'),
					'nationality' => $this->input->post('nation'),
					'hometown' => $this->input->post('hometown'),
					'dateofbaptism' => $this->input->post('dateofbat'),
					'address' => $this->input->post('address'),
					'Telno' => $this->input->post('telnum'),
					'Houseno' => $this->input->post('hsenum'),
					'nameoffchrch' => $this->input->post('fchurch'),
					'posinchrch' => $this->input->post('posc'),
					'Cardid' => $this->input->post('welid'),
					'TitheId' => $this->input->post('titleid'),
					'Image' => $filename,
					'Gender' => $this->input->post('gender'),
					'dateofbirth' => $this->input->post('dateofbirth'),
					'whyncwc' => $this->input->post('ncwy'),
					'greatestdesire' => $this->input->post('desir'),
					'posnow' => $this->input->post('denomin')
			   );
				$this->database_model->registermember($data);
				$this->session->set_flashdata('message','Member Added Successfully');
				redirect('welcome/mainprog');
			}else{
				$this->session->set_flashdata('messages','Something Went Wrong Please Try Again');
				redirect('welcome/mainprog');
			}
			}else{
				$data = array(
					'Firstname' => $this->input->post('fname'),
					'Othernames' => $this->input->post('onames'),
					'Resident' => $this->input->post('residence'),
					'Age' => $this->input->post('age'),
					'M_Status' => $this->input->post('mstatus'),
					'Occupation' => $this->input->post('occupation'),
					'nameofspouse' => $this->input->post('nameofspouse'),
					'noofchildren' => $this->input->post('noofchildern'),
					'nationality' => $this->input->post('nation'),
					'hometown' => $this->input->post('hometown'),
					'dateofbaptism' => $this->input->post('dateofbat'),
					'address' => $this->input->post('address'),
					'Telno' => $this->input->post('telnum'),
					'Houseno' => $this->input->post('hsenum'),
					'nameoffchrch' => $this->input->post('fchurch'),
					'posinchrch' => $this->input->post('posc'),
					'Cardid' => $this->input->post('welid'),
					'TitheId' => $this->input->post('titleid'),
					'Gender' => $this->input->post('gender'),
					'dateofbirth' => $this->input->post('dateofbirth'),
					'whyncwc' => $this->input->post('ncwy'),
					'greatestdesire' => $this->input->post('desir'),
					'posnow' => $this->input->post('denomin')
			   );
				$this->database_model->registermember($data);
				$this->session->set_flashdata('message','Member Added Successfully');
				redirect('welcome/mainprog');
			}
		}else{
			$this->mainprog();
		}
		
		
		//$this->database_model->registermember($data);
	}
	
	/*public function allmembers(){
		$data['title'] = 'NCWC : ALL MEMBER';
		$data['members']$this->database_model->allmember();
		$this->load->view('allmembers',$data);
	}
	*/
	
}
