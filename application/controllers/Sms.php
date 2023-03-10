<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends CI_Controller {

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
		 $this->load->model('tithe_model');
		 $this->load->model('welfare_model');
		 $this->load->library('form_validation');
	}
	public function index()
	{
		$data['title'] = 'NCWC : SEND MESSAGE';
		$data['group'] = $this->database_model->allmember();
		$data['members'] = $this->database_model->allmember();
		$this->load->view('sms',$data);
	}
	
	public function sendmessage(){
		
		if(!$sock = @fsockopen('www.google.com',80,$num,$error,5)){
			$this->session->set_flashdata('messages', 'No Internet Connectivity');
			redirect('sms/');
		}else{
			$this->form_validation->set_rules('phone','Phone Number','required|numeric|max_length[10]|min_length[10]');
		    $this->form_validation->set_rules('msg','Text Message','required');		
		if($this->form_validation->run()){
			$phone = $this->input->post('phone');
			$message = $this->input->post('msg');
			$sender_id = $this->input->post('title');
			//$key = "xIzPqqjQjxA5Pk5qyLzUqsOZ9";
			$key = "9869b6f295ac68450b7b";
			//substract the first zero
			$add = substr($phone,1,9);
			$codeadded = "00233".$add;
			$msg = urlencode($message); //encode url;
			//$sender_id = "NCWC";
			//$sender_id = "BOOKSHOP";
			$url = "https://apps.mnotify.net/smsapi?key=$key&to=$codeadded&msg=$msg&sender_id=$sender_id";
			//$urls="https://apps.mnotify.net/smsapi/balance?key=$key";
		    $result = file_get_contents($url);
			switch($result){                                           
			case "1000":
			$this->session->set_flashdata('message', 'Message sent SuccessFully');
			redirect('sms/');
			break;
			case "1002":
			$this->session->set_flashdata('messages', 'Message not sent');
			redirect('sms/');
			break;
			case "1003":
			$this->session->set_flashdata('message', 'You dont have enough balance');
			redirect('sms/');
			break;
			case "1004":
			$this->session->set_flashdata('message', 'Invalid API Key');
			redirect('sms/');
			break;
			case "1005":
			$this->session->set_flashdata('message', 'Phone number not valid');
			redirect('sms/');
			break;
			case "1006":
			$this->session->set_flashdata('message', 'valid Sender ID');
			redirect('sms/');
			break;
			case "1008":
			$this->session->set_flashdata('message', 'Empty message');
			redirect('sms/');
			break;
		}

		}else{
			$this->index();
		}
		}
	}
	
	public function birthdaymsg(){
		
		
		$this->form_validation->set_rules('phone','Phone Number','required|numeric|max_length[10]|min_length[10]');
		$this->form_validation->set_rules('msg','Text Message','required');		
		if($this->form_validation->run()){
			$phone = $this->input->post('phone');
			$message = $this->input->post('msg');
			$sender_id = $this->input->post('title');
			//$key = "xIzPqqjQjxA5Pk5qyLzUqsOZ9";
			$key = "9869b6f295ac68450b7b";
			//substract the first zero
			$add = substr($phone,1,9);
			$codeadded = "00233".$add;
			$msg = urlencode($message); //encode url;
			//$sender_id = "NCWC";
			//$sender_id = "BOOKSHOP";
			$url = "https://apps.mnotify.net/smsapi?key=$key&to=$codeadded&msg=$msg&sender_id=$sender_id";
			//$urls="https://apps.mnotify.net/smsapi/balance?key=$key";
		    $result = file_get_contents($url);
			switch($result){                                           
			case "1000":
			$data = array(
					'messages' => '
				<div class="alert alert-info alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Pledge!</h4>
								Message sent SuccessFully
						  </div>		
		          '		);
			echo json_encode($data);
			break;
			case "1002":
			$data = array(
					'messages' => '
				<div class="alert alert-info danger-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Pledge!</h4>
								Message not sent
						  </div>		
		          '		);
				echo json_encode($data);
			break;
			case "1003":
			$data = array(
					'messages' => '
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Pledge!</h4>
								You dont have enough balance
						  </div>		
		          '		);
					echo json_encode($data);
			break;
			case "1004":
			$data = array(
					'messages' => '
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Pledge!</h4>
								Invalid API Key
						  </div>		
		          '		);
					echo json_encode($data);
			break;
			case "1005":
			$data = array(
					'messages' => '
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Pledge!</h4>
								Phone number not valid
						  </div>		
		          '		);
					echo json_encode($data);
			break;
			case "1006":
			$data = array(
					'messages' => '
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Pledge!</h4>
								valid Sender ID
						  </div>		
		          '		);
			echo json_encode($data);
			break;
			case "1008":
			$data = array(
					'messages' => '
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Pledge!</h4>
								Empty message
						  </div>		
		          '		);
				echo json_encode($data);
			break;
		}

		}else{		
			$error = array(
				'error' => true,
				'phone' => form_error('phone')
			);
			
			echo json_encode($error);
		}
		
	}
	
	public function sendgroup(){
		$data['title'] = 'NCWC : SEND MESSAGE TO ALL MEMBERS IN THE CHURCH';
		$data['group'] = $this->database_model->allmemberactive();
		$this->load->view('smsgroup',$data);
	}
	
	public function smsyouth(){
		$data['title'] = 'NCWC : SEND MESSAGE TO ALL YOUTH IN THE CHURCH';
		$data['group'] = $this->database_model->allyouthmembers();
		$this->load->view('smsyouth',$data);
	}
	
	
	
	
	public function send_to_youth(){
		if(!$sock = @fsockopen('www.google.com',80,$num,$error,5)){
			$this->session->set_flashdata('messages', 'No Internet Connectivity');
			redirect('sms/smsyouth');
		}else{
			$this->form_validation->set_rules('phone[]','Phone Number','required');
		    $this->form_validation->set_rules('msg','Text Message','required');
		if($this->form_validation->run()){
			$phone = $this->input->post('phone');
			$message = $this->input->post('msg');
			$sender_id = $this->input->post('title');
			$key = "xIzPqqjQjxA5Pk5qyLzUqsOZ9";
			$msg = urlencode($message); //encode url;
			//$sender_id = "NCWC";
			//$sender_id = "BOOKSHOP";
			
			//put numbers in an array
			$numbers = implode(',',$phone);
			
			//count the values in the array
			$count = count($phone);

			//now use forloop for send the sms
			for($x = 0; $x<$count; $x++){
				$add = substr($phone[$x],1,9);
			    $codeadded = "00233".$add;$phone[$x];
				$url = "https://apps.mnotify.net/smsapi?key=$key&to=$codeadded&msg=$msg&sender_id=$sender_id";
				//$urls="https://apps.mnotify.net/smsapi/balance?key=$key";
				$result = file_get_contents($url);
				switch($result){                                           
					case "1000":
					$this->session->set_flashdata('message', 'Message sent SuccessFully');
					break;
					case "1002":
					$this->session->set_flashdata('messages', 'Message not sent');
					break;
					case "1003":
					$this->session->set_flashdata('message', 'You dont have enough balance');
					break;
					case "1004":
					$this->session->set_flashdata('message', 'Invalid API Key');
					break;
					case "1005":
					$this->session->set_flashdata('message', 'Phone number not valid');
					break;
					case "1006":
					$this->session->set_flashdata('message', 'valid Sender ID');
					break;
					case "1008":
					$this->session->set_flashdata('message', 'Empty message');
					break;
				}
				
				if($x == $count - 1){
					redirect('sms/smsyouth');
				}
			
			}
		}else{
			$this->smsyouth();
		}
		}
	}
	
	public function smsvisitors(){
		$data['title'] = 'NCWC : SEND MESSAGE TO ALL VISITORS';
		$data['group'] = $this->database_model->allvisitors();
		$this->load->view('smsvisitors',$data);
	}
	
	
	
	public function send_to_visitor(){
		if(!$sock = @fsockopen('www.google.com',80,$num,$error,5)){
			$this->session->set_flashdata('messages', 'No Internet Connectivity');
			redirect('sms/smsvisitors');
		}else{
			$this->form_validation->set_rules('phone[]','Phone Number','required');
		    $this->form_validation->set_rules('msg','Text Message','required');
		if($this->form_validation->run()){
			$phone = $this->input->post('phone');
			$message = $this->input->post('msg');
			$sender_id = $this->input->post('title');
			$key = "xIzPqqjQjxA5Pk5qyLzUqsOZ9";
			$msg = urlencode($message); //encode url;
			//$sender_id = "NCWC";
			//$sender_id = "BOOKSHOP";
			
			//put numbers in an array
			$numbers = implode(',',$phone);
			
			//count the values in the array
			$count = count($phone);

			//now use forloop for send the sms
			for($x = 0; $x<$count; $x++){
				$add = substr($phone[$x],1,9);
			    $codeadded = "00233".$add;$phone[$x];
				$url = "https://apps.mnotify.net/smsapi?key=$key&to=$codeadded&msg=$msg&sender_id=$sender_id";
				//$urls="https://apps.mnotify.net/smsapi/balance?key=$key";
				$result = file_get_contents($url);
				switch($result){                                           
					case "1000":
					$this->session->set_flashdata('message', 'Message sent SuccessFully');
					break;
					case "1002":
					$this->session->set_flashdata('messages', 'Message not sent');
					break;
					case "1003":
					$this->session->set_flashdata('message', 'You dont have enough balance');
					break;
					case "1004":
					$this->session->set_flashdata('message', 'Invalid API Key');
					break;
					case "1005":
					$this->session->set_flashdata('message', 'Phone number not valid');
					break;
					case "1006":
					$this->session->set_flashdata('message', 'valid Sender ID');
					break;
					case "1008":
					$this->session->set_flashdata('message', 'Empty message');
					break;
				}
				
				if($x == $count - 1){
					redirect('sms/smsvisitors');
				}
			
			}
		}else{
			$this->smsvisitors();
		}
		}
	}
	
	
	
	
	public function send_to_group(){
		if(!$sock = @fsockopen('www.google.com',80,$num,$error,5)){
			$this->session->set_flashdata('messages', 'No Internet Connectivity');
			redirect('sms/sendgroup');
		}else{
			$this->form_validation->set_rules('phone[]','Phone Number','required');
		    $this->form_validation->set_rules('msg','Text Message','required');
		if($this->form_validation->run()){
			$phone = $this->input->post('phone');
			$message = $this->input->post('msg');
			$sender_id = $this->input->post('title');
			$key = "xIzPqqjQjxA5Pk5qyLzUqsOZ9";
			$msg = urlencode($message); //encode url;
			//$sender_id = "NCWC";
			//$sender_id = "BOOKSHOP";
			
			//put numbers in an array
			$numbers = implode(',',$phone);
			
			//count the values in the array
			$count = count($phone);

			//now use forloop for send the sms
			for($x = 0; $x<$count; $x++){
				$add = substr($phone[$x],1,9);
			    $codeadded = "00233".$add;$phone[$x];
				$url = "https://apps.mnotify.net/smsapi?key=$key&to=$codeadded&msg=$msg&sender_id=$sender_id";
				//$urls="https://apps.mnotify.net/smsapi/balance?key=$key";
				$result = file_get_contents($url);
				switch($result){                                           
					case "1000":
					$this->session->set_flashdata('message', 'Message sent SuccessFully');
					break;
					case "1002":
					$this->session->set_flashdata('messages', 'Message not sent');
					break;
					case "1003":
					$this->session->set_flashdata('message', 'You dont have enough balance');
					break;
					case "1004":
					$this->session->set_flashdata('message', 'Invalid API Key');
					break;
					case "1005":
					$this->session->set_flashdata('message', 'Phone number not valid');
					break;
					case "1006":
					$this->session->set_flashdata('message', 'valid Sender ID');
					break;
					case "1008":
					$this->session->set_flashdata('message', 'Empty message');
					break;
				}
				
				if($x == $count - 1){
					redirect('sms/sendgroup');
				}
			
			}
		}else{
			$this->sendgroup();
		}
		}
	}
	
	
	public function checkbalance(){
		if(!$sock = @fsockopen('www.google.com',80,$num,$error,5)){
			echo"connection";
		}else{
			$key = "9869b6f295ac68450b7b";
			$url = "https://apps.mnotify.net/smsapi/balance?key=$key";
			$result = file_get_contents($url);
			echo $result;
		}
	}
	
	public function typecontact(){
		echo'
			<div id="chnge">
				<div class="col-md-9">
					<div class="form-group">
						<input type="text" name="phone" class="form-control" placeholder="Type The Phone Number" required>														
					</div>
				</div>
				<div class="col-md-3">
					<a href="#" id="change2" class="btn btn-success">Select From Contacts</a>
				</div>
			</div>
		';
	}
	
	public function birthdaySms(){
		$number = $_POST['cid'];
		$name = $_POST['name'];
		$image = $_POST['imgs'];
		$other = $_POST['other'];
		$output = '
				<div class="modal modal-info fade" id="modal-birthday">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Send Birthday Message</h4>
					  </div>
					  <div class="modal-body">
						'.form_open('', array('id'=>'birthdaysend')).'
					  <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Compose New Message to '.$name.' '.$other.'</h3>
						</div>
						<div class="box-header with-border">
						  ';
						  if(!empty($image)){							
							$output .='<img src="'.base_url().'asset/images/'.$image.'" width="70" height="70" class="img-thumbnail img-rounded" style="border-radius:100px;">';
							}else{
							 $output .=' <img src="'.base_url().'asset/dist/img/co.png" width="100" height="100" class="img-thumbnail img-rounded" alt="User Image">';
							}
						  $output .='
						</div>
						<!-- /.box-header -->
						<div class="box-body">						
							<div class="form-group">
								<input type="text" name="phone" value="'.$number.'" class="form-control" required>	
								<span class="error" id="phone_error"></span>
							</div>

						  <div class="form-group">
							<select name="title" class="form-control" required>
								<option value="NCWC">NCWC</option>
								<option value="NCWC YOUTH">NCWC YOUTH</option>
								<option value="NCWC-GILGALS">NCWC-GILGALS</OPTION>														</option>
							</select>
							<span class="error">'.form_error('title').'</span>
						  </div>
						  <div class="form-group">
								<textarea id="compose-textarea" name="msg" placeholder="Compose Text Message" class="form-control" style="height: 120px">Happy Birthday '.$name.', We Wish For You, What you wish for yourself. we have a surprise package for you on sunday after church, please make it a point to come to church</textarea>
								<span class="error">'.form_error('msg').'</span>
						 </div>
						 
						</div>
						<div class="box-footer">
						  <div class="pull-right">
							<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
						  </div>
						</div>
					  </div>
					</form>
					  </div>
					  <div class="modal-footer">
						<p>New Covenant Worship Center</p>
					  </div>
					</div>
				  </div>
				</div>
			';
			
			echo $output;
	}
	
}
