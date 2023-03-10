<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pledge extends CI_Controller {

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
		 $this->load->model('pledge_model');
		 $this->load->library('form_validation'); 
	}
	public function index()
	{
		$data['title'] = 'NCWC : CREATE PLEDGE';
		$this->load->view('createpleade',$data);
	}
	
	
	public function createTithe()
	{
		$data = $this->input->post('plege');
		$result = $this->pledge_model->createTable($data);
		$result = '
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Created Successfully!</strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "'.base_url().'pledge/recoredpledge";
						function countDown(){
  							 var timer =document.getElementById("timer");
   						 if(count > 0){
     				   count--;
        				timer.innerHTML = "<B>redirecting in </b>"+count+" <b>seconds.</b><br>";
       			 setTimeout("countDown()", 1000);
   				 }
			else{
        window.location.href = redirect;
   				 }
					}
				</script>
				<span id="timer">
		<script type="text/javascript">countDown();</script>
					</span>
					</div>'
			;
		$this->session->set_flashdata('message',$result);
		redirect('pledge/');
	}
	
	
	public function recoredpledge(){
		$data['title'] = 'NCWC : RECORD PLEDGE';
		$data['tables'] = $this->pledge_model->showtables();
		$this->load->view('recoredpledge',$data);
	}
	
	public function addpledge(){
		$this->form_validation->set_rules('table','Date Of Pledge Saved Earlier','required');
		$this->form_validation->set_rules('reason','Reason','required');
		$this->form_validation->set_rules('fname','Fullname','required');
		$this->form_validation->set_rules('ampledge','Amount Pledge','required|numeric');
		$this->form_validation->set_rules('ampaid','Amount Paid','required|numeric');
		
		if($this->form_validation->run()){
			
		$amount = $this->input->post('ampledge');
		$amntpaid = $this->input->post('ampaid');
		$amntleft = $amount - $amntpaid;
		$date = date('Y-M-D');
		
		$table = $this->input->post('table');
		$reasons = $this->input->post('reason');
		
		$data = array(
			'fullname' => $this->input->post('fname'),
			'amountpledge' => $this->input->post('ampledge'),
			'amountpaid' => $this->input->post('ampaid'),
			'amountleft' => $amntleft,
			'reasons' => $this->input->post('reason'),
			'pdate' => $date
		);
		$this->pledge_model->addpledge($table,$data);
		
		$this->session->set_flashdata('table',$table);
		$this->session->set_flashdata('reasons',$reasons);
		
		$this->session->set_userdata($session_data);
		
		$this->session->set_flashdata('message','Pledge Added Successfully');
		redirect('pledge/recoredpledge');
		//$this->recoredpledge();
		echo'Pledge Added Successfully';
		}else{
			//echo"Failed";
			$this->recoredpledge();
		}
	}
	
		public function getpledgeinfo(){
			$table = $_POST['table'];
			$pledge = $this->pledge_model->plegesum($table);
			
			$amntplede = 0;
			$amntpaid = 0;
			
			foreach($pledge->result() as $rows){
					$amntplede = $amntplede + $rows->amountpledge;
					$amntpaid = $amntpaid + $rows->amountpaid;					
			}
			
			$amntleft = $amntplede - $amntpaid;
			
			
			$output = '
				<div class="modal modal-info fade" id="modal-danger">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Pledge Information</h4>
					  </div>
					  <div class="modal-body">
							<ul class="list-unstyled">
									<li><b>Total Amount Pledge<i class="pull-right text-info"><input type="text" class="form-control input-sm" style="width:300px;"value="'.$amntplede.'"></i></b></li><br>
									<li><b>Total Amount Paid<i class="pull-right text-info"><input type="text" class="form-control input-sm" style="width:300px;" value="'.$amntpaid.'"></i></b></li><br>
									<li><b>Total Amount Left<i class="pull-right text-info"><input type="text" class="form-control input-sm" style="width:300px;" value="'.$amntleft.'"></i></b></li><br>							
									<li><b>Total Members Pledge<i class="pull-right text-info"><input type="text" class="form-control input-sm" style="width:300px;" value="'.$pledge->num_rows().'"></i></b></li><br>							

								</ul>
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
		
		public function getchurchprofile(){	
			$output = '
				<div class="modal modal-info fade" id="ncwc-pro">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Church Profile</h4>
					  </div>
					  <div class="modal-body">
							<h3 style="border:1px solid white;padding:10px;"><b>Profile: NCWC</b></h3>
							<p>New covenant worship center was founded in March 2003 by Rev.Stephenson Cudjoe. this was as a result of circumstance which made him left his former church (Mount Horeb Prayer Centre-Mamfe).It began as a normal family morning devotion in his sitting 
								room and gradually grew into a prayer fellowship as people in the neighborhood joined the fellowship.
							</p>
							<p>	Within two months our numbers grew and by virtue of the miracles and healings that characterized our services, we had no option than to add Sunday service in order to take care of the soul that had nowhere to worship on Sunday. My landlord, who happened to be a Muslim granted us the permission to hold service on his compound and within a
								year we moved out to a temporary, but more convenient place offered us by a friend.
							</p>
							<p>The church went through many challenges and trials but by the grace of God we railed through all and today we have acquired our own land and put up a church building. We also acquired ten plots of land at Gomoa Dominase in which it was a prayer center (Gilgal Prayer Sanctuary).It was established to cater  for the spiritual needs of not only the church members of the church but to all who come there. Indeed many people from within and outside Ghana has
								benefited tremendously from the prayer center through healing, deliverance etc.
							</p>
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
		
		
	
	public function viewpledge(){
		$data['title'] = 'NCWC : VIEW PLEDGE';
		$data['tables'] = $this->pledge_model->showtables();
		$this->load->view('viewpledge',$data);
	}
	
	public function getinfoandupdates(){
		$table = $_POST['table'];
		$pledge = $this->pledge_model->getinfoandupdate($table);
		$paid = '';
		$paid = '
				<div class="alert alert-info alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Pledge!</h4>
								Members Who Has Successfully Completed Payment
						  </div>
		
		
		';
		$paid .= '
			<table class=" backimage table table-triped"  style="padding:20px;">
																	<thead class="bg-info">
																		<tr>
																			<th style="color:red;"><b>Full NAME</b></th>
																			<th style="color:red;"><b>AMOUNT PLEDGED</b></th>
																			<th style="color:red;"><b>AMOUNT PAID</b></th>
																			<th style="color:red;"><b>AMOUNT LEFE</b></th>		
																		</tr>
																	</thead>
																	<tbody>
		';
		
		$x = 0;
		foreach($pledge->result_array() as $row){
			if($row['amountleft'] > 0){
				
			}else{
				$x++;
				$paid .= '
					<tr>
						<td><b>'.$row['fullname'].'</b></td>
						<td><b>GH &cent;'.$row['amountpledge'].'</b></td>
						<td><b>GH &cent; '.$row['amountpaid'].'</b></td>
						<td><b>GH &cent; '.$row['amountleft'].'</b></td>
					</tr>
			';
			}
			
			
		}
		
		if($x == 0){
				$paid .= '
				<tr>
					<td colspan="4">
						<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Pledge!</h4>
								No Members Has Completed Payement Yet
						  </div>
					</td>
				</tr>';
			}
		
		
		$paid .= '
			</tbody>
					</table> 
		';
		
		$owing = '';
		$owing = '
				<div class="alert alert-info alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Pledge!</h4>
								Members Who Has not Finished Payement
						  </div>
		
		
		';
		$owing .= '
			<table class=" backimage table table-triped"  style="padding:20px;">
																	<thead class="bg-info">
																		<tr>
																			<th style="color:red;"><b>Full NAME</b></th>
																			<th style="color:red;"><b>AMOUNT PLEDGED</b></th>
																			<th style="color:red;"><b>AMOUNT PAID</b></th>
																			<th style="color:red;"><b>AMOUNT LEFE</b></th>		
																		</tr>
																	</thead>
																	<tbody>
		';
		$ow = 0;
		foreach($pledge->result_array() as $row){
			if($row['amountleft'] < 1){
				
			}else{
				$ow++;
				$owing .= '
					<tr>
						<td><b>'.$row['fullname'].'</b></td>
						<td><b>GH &cent;'.$row['amountpledge'].'</b></td>
						<td><b>GH &cent; '.$row['amountpaid'].'</b></td>
						<td><b>GH &cent; '.$row['amountleft'].'</b></td>
					</tr>
			';
			}

		}
		
		$owing .= '
			</tbody>
					</table> 
		';
		
		$message = array(
		    'result' => true,
			'paid' => $paid,
			'owing' => $owing
		);
		
		echo json_encode($message);
				
	}
	
	public function getinfoandupdate(){
		$table = $_POST['table'];
		$pledge = $this->pledge_model->getinfoandupdate($table);
		
		
		$output = '';
		$output .= '
			<table class=" backimage table table-triped"  style="padding:20px;">
																	<thead class="bg-info">
																		<tr>
																			<th style="color:red;"><b>Full NAME</b></th>
																			<th style="color:red;"><b>AMOUNT PLEDGED</b></th>
																			<th style="color:red;"><b>AMOUNT PAID</b></th>
																			<th style="color:red;"><b>AMOUNT LEFE</b></th>
																			<th style="color:red;"><b>PAYING NOW</b></th>
																			<th style="color:red;"><b>UPDATE</b></th>
																			<th style="color:red;"><b>DELETE</b></th>
		
																		</tr>
																	</thead>
																	<tbody>
		';
		
		foreach($pledge->result_array() as $row){
			if($row['amountleft'] < 1){
				
			}else{
				$output .= '
					<tr>
						<td><b>'.$row['fullname'].'</b></td>
						<td><b>GH &cent;'.$row['amountpledge'].'</b></td>
						<td><b>GH &cent; '.$row['amountpaid'].'</b></td>
						<td><input type="numer" cid="'.$row['id'].'" id="amnleft-'.$row['id'].'" class="amnleft form-control" value="'.$row['amountleft'].'"></td>
						<td><input type="numer" cid="'.$row['id'].'" id="amnpay-'.$row['id'].'" class="amnpay form-control"></td>																							
						<td><a href="#" cid="'.$row['id'].'" style="background-color:ed;"class="updateplege btn btn-info" ><span class="fa fa-check-square"></span></a></td>
						<td><a href="#" cid="'.$row['id'].'" style="background-color:ed;"class="delepledge btn btn-danger" ><span class="fa fa-trash-o"></span></a></td>
					</tr>
			';
			}		
		}
		
		$output .= '
			</tbody>
					</table> 
		';
		
		echo $output;
	}
	
	
	public function updatepledge(){
		$id = $_POST['cid'];
		$table = $_POST['table'];
		$amountleft = $_POST['payleft'];
		$paynow = $_POST['paynow'];
		
		$paidupdate = $this->pledge_model->paidupdate($id,$table);
		
		foreach($paidupdate->result() as $row){
			
		}
		
		$amntupdate = $paynow +  $row->amountpaid;
		
		$amntleft = $amountleft - $paynow;
		
		$data = array(
			'amountleft' => $amntleft,			
			'amountpaid' => $amntupdate			
		);
		
		$this->pledge_model->updatepledge($id,$table,$data);
		
		echo'
			<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-ban"></i> Successfully!</h4>
							Info Updated Successfully!
			</div>
		';
		
	}
	
	
	public function delepledge(){
		$id = $_POST['cid'];
		$table = $_POST['table'];
		$this->pledge_model->delepledge($id,$table);
		echo'
			<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-ban"></i> Successfully!</h4>
							Info Delected Successfully!
			</div>
		';
	}
	
	
}
