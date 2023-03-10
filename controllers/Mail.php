<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {

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
		 $this->load->model('database_model');
		 $this->load->model('pledge_model');
		 $this->load->model('tithe_model');
		 $this->load->model('welfare_model');
		 $this->load->library('form_validation');
	}
	public function index()
	{
		$data['title'] = 'NCWC : SEND MESSAGE';
		$data['members'] = $this->database_model->allmember();
		$this->load->view('mail',$data);
	}
	
	public function sendmail(){
		$from = $this->input->post('mfrm');
		$to = $this->input->post('email');
		$subject = $this->input->post('subject');
		$msgs = $this->input->post('msg');
	    $file =  $this->input->post('files');
		$files = count($this->input->post('files'));
		$allfiles = implode(",",$file);
		$efiles = explode(",",$allfiles);
		$msg = '
				<div class="col-md-9 col-md-offset-2" style="border:2px solid #ccc;">
					<div style="border:2px solid #cc;">
						<h1 align="center">New Covenant Worship Center</h1>
						<h3 align="center">P.0.BOX ts 367</h3>
						<h3 align="center">Teshie - Accra - Ghana</h3>
					</div>
					<hr>
					<div style="margin-left:30px;">
					  '.$msgs.'
					</div>
				  <hr>
				  <div style="border:2px solid #cc;">
					<p>Follow Us Every Where</p>
						<ul>
							<li><a href="#"><i class="wxp"> </i>whatsapp# 0272185090</a></li>
							<li><a href="https://web.facebook.com/New-covenant-worship-center-635933793211050/" target="_blank"><i class="fb"> </i>Facebook</a></li>
							<li><a href="https://www.twitter.com/Newcovenant9/" target="_blank"><i class="twt"> </i>Twitter</a></li>
							<li><a href="https://www.youtube.com/results?search_query=NCWC12"target="_blank"><i class="yout"> </i>You Tube</a></li>	
							<li><a href="#"target="_blank"><i class="yout"> </i>Contact Number (+233) 0277-681-861) </a></li>					
						</ul>
					</div>
				</div>
			';
		
		//Load email library
				$this->load->library('email');
				//$this->load->library('encrypt');
				//SMTP & mail configuration
				$config = array(
					'protocol'  => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'ogua.ahmed18@gmail.com',
					'smtp_pass' => 'senior10019325',
					'mailtype'  => 'html',
					'charset'   => 'utf-8'
				);
				$this->email->initialize($config);
				$this->email->set_mailtype("html");
				$this->email->set_newline("\r\n");
				 
				 
				 
				 $this->email->from($from);
				 $this->email->to($to);
				 $this->email->subject($subject);
				 $this->email->message($msg);
				 
				 for($x=0; $x < $files; $x++){
					$this->email->attach($efiles[$x]); 
				 }
				 
				if($this->email->send()){
					for($x=0; $x < $files; $x++){
						unlink($efiles[$x]); 
					}
					 if($x < $files){
						 $this->session->set_flashdata('message', 'Mail Sent Successfully');
						  redirect('mail');
					 }else{
						 $this->session->set_flashdata('message', 'Mail Sent Successfully');
						  redirect('mail');
					 }
				 }else{
					 for($x=0; $x < $files; $x++){
						unlink($efiles[$x]); 
					}
					$this->session->set_flashdata('messages', 'Failed to Sent Mail');
					redirect('mail');
				 } 
				 
		
	/*
		$this->form_validation->set_rules('mfrm','Sender Email','required|valid_email');
		$this->form_validation->set_rules('email','Receiver Email','required|valid_email');
		$this->form_validation->set_rules('subject','Subject','required');
		$this->form_validation->set_rules('msg','Message','required');
		
		
		
		if($this->form_validation->run()){
			
			$from = $this->input->post('mfrm');
			$to = $this->input->post('email');
			$subject = $this->input->post('subject');
			$msgs = $this->input->post('msg');
			$file = $this->input->post('attachment');
			$msg = '
				<div class="col-md-9 col-md-offset-2" style="border:2px solid #ccc;">
					<div style="border:2px solid #cc;">
						<h1 align="center">New Covenant Worship Center</h1>
						<h3 align="center">P.0.BOX ts 367</h3>
						<h3 align="center">Teshie - Accra - Ghana</h3>
					</div>
					<hr>
					<div style="margin-left:30px;">
					  '.$msgs.'
					</div>
				  <hr>
				  <div style="border:2px solid #cc;">
					<p>Follow Us Every Where</p>
						<ul>
							<li><a href="#"><i class="wxp"> </i>whatsapp# 0272185090</a></li>
							<li><a href="https://web.facebook.com/New-covenant-worship-center-635933793211050/" target="_blank"><i class="fb"> </i>Facebook</a></li>
							<li><a href="https://www.twitter.com/Newcovenant9/" target="_blank"><i class="twt"> </i>Twitter</a></li>
							<li><a href="https://www.youtube.com/results?search_query=NCWC12"target="_blank"><i class="yout"> </i>You Tube</a></li>	
							<li><a href="#"target="_blank"><i class="yout"> </i>Contact Number (+233) 0277-681-861) </a></li>					
						</ul>
					</div>
				</div>
			';
			$file_data = $this->upload_file();
			if(is_array($file_data)){
				 //Load email library
				$this->load->library('email');
				//$this->load->library('encrypt');
				//SMTP & mail configuration
				$config = array(
					'protocol'  => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'ogua.ahmed18@gmail.com',
					'smtp_pass' => 'senior10019325',
					'mailtype'  => 'html',
					'charset'   => 'utf-8'
				);
				$this->email->initialize($config);
				$this->email->set_mailtype("html");
				$this->email->set_newline("\r\n");
				 
				 
				 
				 $this->email->from($from);
				 $this->email->to($to);
				 $this->email->subject($subject);
				 $this->email->message($msg);
				 $this->email->attach($file_data['full_path']);
				 
				 if($this->email->send()){
					 if(delete_files($file_data['file_path'])){
						  $this->session->set_flashdata('message', 'Mail Sent Successfully');
						  redirect('mail');
					 }
				 }else{
					 //$this->session->set_flashdata('messages', $this->email->print_debugger(array('headers')));
					 $this->session->set_flashdata('message', 'Unable Sent Mail');
					 redirect('mail');
				 }
				
			}else{
				 //Load email library
				$this->load->library('email');
				//$this->load->library('encrypt');
				//SMTP & mail configuration
				$config = array(
					'protocol'  => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'ogua.ahmed18@gmail.com',
					'smtp_pass' => 'senior10019325',
					'mailtype'  => 'html',
					'charset'   => 'utf-8'
				);
				$this->email->initialize($config);
				$this->email->set_mailtype("html");
				$this->email->set_newline("\r\n");
				 
				 
				 
				 $this->email->from($from);
				 $this->email->to($to);
				 $this->email->subject($subject);
				 $this->email->message($msg);
				 
				 if($this->email->send()){
						  $this->session->set_flashdata('message', 'Mail Sent Successfully');
						  redirect('mail');
				 }else{
					 //$this->session->set_flashdata('messages', $this->email->print_debugger(array('headers')));
					 $this->session->set_flashdata('message', 'Unable Sent Mail');
					 redirect('mail');
				 }
			}
			
		}else{
			$this->index();
		}
		
		*/
	}
	
	
	 public function upload_file(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'doc|docx|pdf';
		$this->load->library('upload', $config);
		 if($this->upload->do_upload('attachment')){
		   return $this->upload->data(); 	   
		}
		else{
			return $this->upload->display_errors();
		}
	  
	 }
	
	
	public function uploadimage(){
		if($_FILES['attachment']['name'] !== ''){
		  $test = explode('.',$_FILES['attachment']['name']);
		  $exitension = end($test);
		  $names = rand(100,999);
		  $name = $names.'.'.$exitension;
		  $location = './uploads/'.$name;
		  $base_url = './uploads/'.$name;
		  if(move_uploaded_file($_FILES['attachment']['tmp_name'],$location)){
			  echo '
					<div class="form-group" id="rmv_'.$names.'">
						<ul class="list-inline">
							<li><div class="btn btn-default btn-file">
									<i class="fa fa-paperclip"></i>&nbsp; Attachment
									<input type="hidden" value="'.$base_url.'" name="files[]">
								</div>
							</li>
								<li><a href="'.$base_url.'.">'.base_url().'.'.$base_url.'</a></li>
								<li><a href="#" data-id = "'.$names.'" cid="'.$base_url.'" class="btn btn-danger remove"><i class="fa fa-close"></i></a></li>
						</ul>							
					 </div>			
			  ';
		  }else{
			  echo '
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-ban"></i> Failed!</h4>
								File size exceeds Upload Limit
						  </div>
						';	
		  }
		  
			  
		}
	}
	
	
	public function removeimage(){
		$link = $_POST['cid'];
		unlink($link);
	}
	
	
	public function attachment(){
		$data['title'] = 'NCWC : SEND MESSAGE';
		$this->load->view('mail',$data);
	}
	
	public function backup(){
		$data['title'] = 'NCWC : DOWNLOAD BACKUP';
		$this->load->view('backup',$data);
	}
	
	public function backup_db(){
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
