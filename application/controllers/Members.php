<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

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
		 $this->load->library('pdf');
	}
	public function index()
	{
		$data['title'] = 'NCWC : ALL MEMBER';
		$data['members'] = $this->database_model->allmemberactive();
		$this->load->view('allmembers',$data);
	}
	
	public function viewmember()
	{
		$id  = $this->uri->segment(3);
		$data['title'] = 'NCWC : VIEW MEMBER';
		$data['tithe'] = $this->tithe_model->viewthithe($id);
		$data['welfare'] = $this->welfare_model->view_welfare($id);
		$data['memberinfo'] = $this->database_model->editmember($id);
		$this->load->view('viewmember',$data);
	}
	
	public function nonmembers()
	{
		$data['title'] = 'NCWC : ALL NON MEMBER';
		$data['members'] = $this->database_model->allmembernonactive();
		$this->load->view('nonmembers',$data);
	}
	
	public function editmember()
	{
		$id  = $this->uri->segment(3);
		$data['title'] = 'NCWC : VIEW MEMBER';
		$data['tithe'] = $this->tithe_model->viewthithe($id);
		$data['welfare'] = $this->welfare_model->view_welfare($id);
		$data['memberinfo'] = $this->database_model->editmember($id);
		$this->load->view('editmember',$data);
	}
	
	public function editvisitor()
	{
		$id  = $this->uri->segment(3);
		$data['title'] = 'NCWC : EDIT VISITOR INFO';
		$data['tithe'] = $this->tithe_model->viewthithe($id);
		$data['welfare'] = $this->welfare_model->view_welfare($id);
		$data['visitorinfo'] = $this->database_model->editvisitor($id);
		$this->load->view('editvisitor',$data);
	}
	
	
	public function delmember()
	{
		$id = $this->uri->segment(3);
		$this->database_model->delectmember($id);
		 echo '
			 Member Delected Successfully!
		';
		
		
	}
	
	public function delvisitor()
	{
		$id = $this->uri->segment(3);
		$this->database_model->delvisitor($id);
		 echo '
			 Member Delected Successfully!
		';
		
		
	}
	
	
	public function statusupdate()
	{
		$id = $_POST['cid'];
		$status =$_POST['statu'];
		$data = array('status'=> $status);
		$this->database_model->updatestaus($data,$id);
	}
	
	
	
	public function groupupdate()
	{
		$id = $_POST['cid'];
		$status =$_POST['statu'];
		$data = array('posinchrch'=> $status);
		$this->database_model->updategroup($data,$id);
	}
	public function statusupdate2()
	{
		$id = $_POST['cid'];
		$status =$_POST['statu'];
		$data = array('posnow'=> $status);
		$this->database_model->updatestaus2($data,$id);
	}
	
	
	
	public function ushers()
	{
		$data['title'] = 'NCWC : ALL USHERS';
		$data['members'] = $this->database_model->allactiveuhers();
		$this->load->view('ushers',$data);
	}
	
	public function instrumentalist()
	{
		$data['title'] = 'NCWC : ALL INSTRUMENTALISTS';
		$data['members'] = $this->database_model->allactiveinstru();
		$this->load->view('instrumentalist',$data);
	}
	
	public function choir()
	{
		$data['title'] = 'NCWC : ALL CHORISTERS';
		$data['members'] = $this->database_model->allactivechoir();
		$this->load->view('choir',$data);
	}
	
	public function media()
	{
		$data['title'] = 'NCWC : ALL USHERS';
		$data['members'] = $this->database_model->allactiveMedia();
		$this->load->view('media',$data);
	}
	
	public function allvisitors()
	{
		$data['title'] = 'NCWC : ALL VISITORS';
		$data['allvisitors'] = $this->database_model->allvisitors();
		$this->load->view('allvisitors', $data);
	}
	
	public function updatemember(){
		$id = $this->uri->segment(3);
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
				//if image exist null check if image is available
				$result = $this->database_model->editmember($id);
				foreach($result->result_array() as $row){
					$image = $row['Image'];
				}
				if(!empty($image)){
					$url = "./asset/images/".$image;
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
							redirect('members/editmember/'.$id);
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
							$this->database_model->updatemember($data,$id);
							$this->session->set_flashdata('message','Member info Updated Successfully');
							redirect('members/editmember/'.$id);
						}else{
							$this->session->set_flashdata('messages','Something Went Wrong Please Try Again');
							redirect('members/editmember/'.$id);
						}
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
							redirect('members/editmember/'.$id);
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
							$this->database_model->updatemember($data,$id);
							$this->session->set_flashdata('message','Member info Updated Successfully');
							redirect('members/editmember/'.$id);
						}else{
							$this->session->set_flashdata('messages','Something Went Wrong Please Try Again');
							redirect('members/editmember/'.$id);
						}
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
				$this->database_model->updatemember($data,$id);
				$this->session->set_flashdata('message','Member info Updated Successfully');
				redirect('members/editmember/'.$id);
			}
		}else{
			redirect('members/editmember/'.$id);
		}
	}
	
	
	public function viewmemberpdf(){
		$id  = $this->uri->segment(3);
		$data['title'] = 'NCWC : VIEW MEMBER';
		$data['tithe'] = $this->tithe_model->viewthithe($id);
		$data['welfare'] = $this->welfare_model->view_welfare($id);
		$records = $this->database_model->editmember($id);
		$html = '';			
		foreach($records->result() as $row){
			
		}				
		$html .='<div class="panle panle-body" id="printArea" >
			<div class="row">
				<div class="col-md-1"></div>
					<div class="col-md-2">
						
					</div>
					<div class="col-md-6">
						<h3 style="text-align:center;"class="text-center"><b>WELCOME TO NEW COVENANT WORSHIP CENTER</b></h3>
						<h4 style="text-align:center;" class="text-center"><b>P.O.BOX TS 367</b></h4>
						<h4 style="text-align:center;" class="text-center"><b>TESHIE - ACCRA - GHANA</b></h4>
					</div>
				</div>
					<hr>
				<div class="table-responsive">
					<table id="members" border="2" width="100%" background="./images/sample.jpg" class="backimage table table-bordered">
						<tr>
							<td colspan="2"><h2><b><centerMEMBERSHIP INFORMATION DETAILS</center></b></h2></td>
						</tr>
						<tr>
							<td colspan="2">';								
									if(!empty($row->Image)){							
									$html .= '<img src="asset/images/'.$row->Image.'" width="70" height="70" class="img-thumbnail img-rounded">';
									}else{
									$html .= '<img src="asset/dist/img/co.png" width="100" height="100" class="img-thumbnail img-rounded" alt="User Image">';
									}								
						$html .='		
							</td>
						</tr>
						<tr>
							<td><b>FIRST NAME</b></td>
							<td> '.
							ucwords(strtolower($row->Firstname)) 
							 .'</td>
						</tr>
						<tr>
							<td><b>OTHER NAMES</b></td>
							<td>'.ucwords(strtolower($row->Othernames)).'</td>
						</tr>
						<tr>
							<td><b>RESIDENT</b></td>
							<td>'.ucwords(strtolower($row->Resident)).'</td>
						</tr>
						<tr>
							<td><b>AGE</b></td>
							<td>'.ucwords(strtolower($row->Age)).'</td>
						</tr>
						<tr>
							<td><b>MARITAL STATUS</b></td>
							<td>'.ucwords(strtolower($row->M_Status)).'</td>
						</tr>
						<tr>
							<td><b>OCCUPATION</b></td>
							<td>'.ucwords(strtolower($row->Occupation)).'</td>
						</tr>
						<tr>
							<td><b>NAME OF SPOUSE</b></td>
							<td>'.ucwords(strtolower($row->nameofspouse)).'</td>
						</tr>
						<tr>
							<td><b>NO OF CHILDREN</b></td>
							<td>'.ucwords(strtolower($row->noofchildren)).'</td>
						</tr>
						<tr>
							<td><b>NATIONALITY</b></td>
							<td>'.ucwords(strtolower($row->nationality)).'</td>
						</tr>
						<tr>
							<td><b>HOMETOWN</b></td>
							<td>'.ucwords(strtolower($row->hometown)).'</td>
						</tr>
						<tr>
							<td><b>DATE OF BAPTISM</b></td>
							<td>'.ucwords(strtolower($row->dateofbaptism)).'</td>
						</tr>
						<tr>
							<td><b>ADDRESS</b></td>
							<td>'.ucwords(strtolower($row->address)).'</td>
						</tr>
						<tr>
							<td><b>TELEPHONE NUMBER</b></td>
							<td>'.ucwords(strtolower($row->Telno)).'</td>
						</tr>
						<tr>
							<td><b>HOUSE NUMBER</b></td>
							<td>'.ucwords(strtolower($row->Houseno)).'</td>
						</tr>
						<tr>
							<td><b>NAME OF FORMAL CHURCH</b></td>
							<td>'.ucwords(strtolower($row->nameoffchrch)).'</td>
						</tr>
						<tr>
							<td><b>POSITION IN CHURCH</b></td>
							<td>'.ucwords(strtolower($row->posinchrch)).'</td>
						</tr>
						<tr>
							<td><b>WELFARE ID</b></td>
							<td>'.ucwords(strtolower($row->Cardid)).'</td>
						</tr>
						<tr>
							<td><b>TITHE ID</b></td>
							<td>'.ucwords(strtolower($row->TitheId)).'</td>
						</tr>
						<tr>
							<td><b>DATE OF REGISTRATION</b></td>
							<td>'.ucwords(strtolower($row->Date)).'</td>
						</tr>
					</table>
				</div>
				
				<div class="clearfix"></div>
				<hr>
			</div>';				
		$this->pdf->loadHtml($html);
	    $this->pdf->render();
	    $this->pdf->stream("MemberShipInfo.pdf", array("Attachment"=>1));
	}
	
	
		
	public function pdfallmembers(){
		$records = $this->database_model->allmemberactive();
		$html = '';
		$html .= '<div id="printArea" class="panel panel-info">
			<div class="panel panel-heading"></div>
			<div class="panle panle-body">
			<div id="displaymsg"></div>
			 <div class="table-responsive">
				<table id="member" border="2" width="100%" spacing="20" padding="10" class="table table-striped table-bordered">
					<tr style="background:bue;padding:20px;">
						<td colspan="1"><img style="align:center;" src="asset/images/logo.jpg" width="50" height="100" class="img-thumbnail" alt="User Image"></td>
						<td colspan="8">ALL MEMBERS OF NCWC</td>
					</tr>
					<thead style="padding:10px;">
						<tr>
							<th>Pic</th>
							<th>Full name</th>
							<th>Gender</th>
							<th>Resident</th>
							<th>Age</th>
							<th>Marital Status</th>
							<th>Occupation</th>
							<th>Tel Number</th>
							<th>Page No.</th>
						</tr>
					</thead>
					<tbody>';
					$count = 0;
				foreach($records->result_array() as $row){
					$count++;
		$html .= '
					 <tr>
						<td>';
							if(!empty($row['Image'])){							
							$html .=  '<img style="align:center;" src="asset/images/'.$row['Image'].'" width="50" height="100" class="img-thumbnail">';
							}else{
							$html .= '<img style="align:center;" src="asset/dist/img/co.png" width="50" height="100" class="img-thumbnail" alt="User Image">';
							}
						$html .= '</td>
						<td>'.$row['Firstname'] .' '.$row['Othernames'].'</td>
						<td>'.$row['Gender'].'</td>
						<td>'.$row['Resident'].'</td>
						<td>'.$row['Age'].'</td>
						<td>'.$row['M_Status'].'</td>
						<td>'.$row['Occupation'].'</td>
						<td>'.$row['Telno'].'</td>
						<td>'.$row['TitheId'].'</td>
					</tr>';
				 }	
					$html .='	<tr>
					<td colspan="2"></td>
					<td colspan="7"><b>TOTAL</b>&nbsp;&nbsp;<b>'.$count.'</b></td>
				</tr>';		
				$html .= ' <tbody>
				</table>
			 </div>
			 </div>
			</div>';
		$this->pdf->loadHtml($html);
	    $this->pdf->render();
	    $this->pdf->stream("NonMembers.pdf", array("Attachment"=>1));
	}
	
	
	
	
	public function pdfallnonmembers(){
		$records = $this->database_model->allmembernonactive();
		$html = '';
		$html .= '<div id="printArea" class="panel panel-info">
			<div class="panel panel-heading"></div>
			<div class="panle panle-body">
			<div id="displaymsg"></div>
			 <div class="table-responsive">
				<table id="member" border="2" width="100%" spacing="20" padding="10" class="table table-striped table-bordered">
					<tr style="background:bue;padding:20px;">
						<td colspan="1"><img style="align:center;" src="asset/images/logo.jpg" width="50" height="100" class="img-thumbnail" alt="User Image"></td>
						<td colspan="8">ALL STOPPED MEMBERS OF NCWC/td>
					</tr>
					<thead style="padding:10px;">
						<tr>
							<th>Pic</th>
							<th>Full name</th>
							<th>Gender</th>
							<th>Resident</th>
							<th>Age</th>
							<th>Marital Status</th>
							<th>Occupation</th>
							<th>Tel Number</th>
							<th>Page No.</th>
						</tr>
					</thead>
					<tbody>';
					$count = 0;
				foreach($records->result_array() as $row){
					$count++;
		$html .= '
					 <tr>
						<td>';
							if(!empty($row['Image'])){							
							$html .=  '<img style="align:center;" src="asset/images/'.$row['Image'].'" width="50" height="100" class="img-thumbnail">';
							}else{
							$html .= '<img style="align:center;" src="asset/dist/img/co.png" width="50" height="100" class="img-thumbnail" alt="User Image">';
							}
						$html .= '</td>
						<td>'.$row['Firstname'] .' '.$row['Othernames'].'</td>
						<td>'.$row['Gender'].'</td>
						<td>'.$row['Resident'].'</td>
						<td>'.$row['Age'].'</td>
						<td>'.$row['M_Status'].'</td>
						<td>'.$row['Occupation'].'</td>
						<td>'.$row['Telno'].'</td>
						<td>'.$row['TitheId'].'</td>
					</tr>';
				 }	
				$html .='	<tr>
					<td colspan="2"></td>
					<td colspan="7"><b>TOTAL</b>&nbsp;&nbsp;<b>'.$count.'</b></td>
				</tr>';		
				 
				$html .= ' <tbody>
				</table>
			 </div>
			 </div>
			</div>';
		$this->pdf->loadHtml($html);
	    $this->pdf->render();
	    $this->pdf->stream("NonMembers.pdf", array("Attachment"=>1));
	}
	
	public function pdfallvisitors(){
		$records = $this->database_model->allvisitors();
		$html = '';	
		$html .=' <div class="table-responsive">
				<table id="members" border="2" width="100%" spacing="20" class="table table-striped table-bordered">
					<tr style="background:bue;padding:20px;">
						<td colspan="1"><img style="align:center;" src="asset/images/logo.jpg" width="50" height="100" class="img-thumbnail" alt="User Image"></td>
						<td colspan="6">All VISITORS OF NCWC</td>
					</tr>
					<thead style="padding:10px;">
						<tr>
							<th>Pic</th>
							<th>Full name</th>
							<th>Gender</th>
							<th>Resident</th>
							<th>Current Church</th>
							<th>Invited By</th>
							<th>Mobile Number</th>
						</tr>
					</thead>
					<tbody>';
				$count = 0;
				 foreach($records->result_array() as $row){
					 $count++;
		$html .='
					 <tr>
						<td>';
							if(!empty($row['Image'])){							
							$html .= '<img src="asset/images/'.$row['Image'].'" width="50" height="100" class="img-thumbnail">';
							}else{
							$html .= 	'<img src="asset/dist/img/co.png" width="50" height="100" class="img-thumbnail" alt="User Image">';
							}
		$html .='		</td>
						<td>'.$row['firstname'].' '.$row['othernames'].'</td>
						<td>'.$row['gender'].'</td>
						<td>'.$row['resident'].'</td>
						<td>'.$row['curchrch'].'</td>
						<td>'.$row['invited'].'</td>
						<td>'.$row['phone'].'</td>
					</tr>';
					 
				 }
				$html .='	<tr>
					<td colspan="2"></td>
					<td colspan="5"><b>TOTAL</b>&nbsp;&nbsp;<b>'.$count.'</b></td>
				</tr>';	
		$html .=' <tbody>
				</table>
				<hr>
			 </div>';
		
		
		$this->pdf->loadHtml($html);
	    $this->pdf->render();
	    $this->pdf->stream("allvisitors.pdf", array("Attachment"=>1));
	}
	
	
	
	public function pdfUshers(){
		$records = $this->database_model->allactiveuhers();
		$html = '';	
		$html .=' <div class="table-responsive">
				<table id="members" border="2" width="100%" spacing="20" class="table table-striped table-bordered">
					<tr style="background:bue;padding:20px;">
						<td colspan="1"><img style="align:center;" src="asset/images/logo.jpg" width="50" height="100" class="img-thumbnail" alt="User Image"></td>
						<td colspan="6">All USHERS OF NCWC</td>
					</tr>
					<thead style="padding:10px;">
						<tr>
							<th>Pic</th>
							<th>Full name</th>
							<th>Gender</th>
							<th>Resident</th>
							<th>Age</th>
							<th>Marital Status</th>
							<th>Denomination</th>
						</tr>
					</thead>
					<tbody>';
				  $count = 0;
				 foreach($records->result_array() as $row){
					 $count++;
		$html .='
					 <tr>
						<td>';
							if(!empty($row['Image'])){							
							$html .= '<img src="asset/images/'.$row['Image'].'" width="50" height="100" class="img-thumbnail">';
							}else{
							$html .= 	'<img src="asset/dist/img/co.png" width="50" height="100" class="img-thumbnail" alt="User Image">';
							}
		$html .='		</td>
						<td>'.$row['Firstname'].' '.$row['Othernames'].'</td>
						<td>'.$row['Gender'].'</td>
						<td>'.$row['Resident'].'</td>
						<td>'.$row['Age'].'</td>
						<td>'.$row['M_Status'].'</td>
						<td>'.$row['posnow'].'</td>
					</tr>';
					 
				 }
				$html .='	<tr>
					<td colspan="2"></td>
					<td colspan="5"><b>TOTAL</b>&nbsp;&nbsp;<b>'.$count.'</b></td>
				</tr>';
		$html .=' <tbody>
				</table>
				<hr>
			 </div>';
		
		
		$this->pdf->loadHtml($html);
	    $this->pdf->render();
	    $this->pdf->stream("allushers.pdf", array("Attachment"=>1));
	}
	
	
	public function pddindtrumentalist(){
		$records = $this->database_model->allactiveinstru();
		$html = '';	
		$html .=' <div class="table-responsive">
				<table id="members" border="2" width="100%" spacing="20" class="table table-striped table-bordered">
					<tr style="background:bue;padding:20px;">
						<td colspan="1"><img style="align:center;" src="asset/images/logo.jpg" width="50" height="100" class="img-thumbnail" alt="User Image"></td>
						<td colspan="6">All INSTRUMENTALISTS OF NCWC</td>
					</tr>
					<thead style="padding:10px;">
						<tr>
							<th>Pic</th>
							<th>Full name</th>
							<th>Gender</th>
							<th>Resident</th>
							<th>Age</th>
							<th>Marital Status</th>
							<th>Denomination</th>
						</tr>
					</thead>
					<tbody>';
				  $count = 0;
				 foreach($records->result_array() as $row){
					 $count++;
		$html .='
					 <tr>
						<td>';
							if(!empty($row['Image'])){							
							$html .= '<img src="asset/images/'.$row['Image'].'" width="50" height="100" class="img-thumbnail">';
							}else{
							$html .= 	'<img src="asset/dist/img/co.png" width="50" height="100" class="img-thumbnail" alt="User Image">';
							}
		$html .='		</td>
						<td>'.$row['Firstname'].' '.$row['Othernames'].'</td>
						<td>'.$row['Gender'].'</td>
						<td>'.$row['Resident'].'</td>
						<td>'.$row['Age'].'</td>
						<td>'.$row['M_Status'].'</td>
						<td>'.$row['posnow'].'</td>
					</tr>';
					 
				 }
				$html .='	<tr>
					<td colspan="2"></td>
					<td colspan="5"><b>TOTAL</b>&nbsp;&nbsp;<b>'.$count.'</b></td>
				</tr>';
		$html .=' <tbody>
				</table>
				<hr>
			 </div>';
		
		
		$this->pdf->loadHtml($html);
	    $this->pdf->render();
	    $this->pdf->stream("allinstrumentalists.pdf", array("Attachment"=>1));
	}
	
	public function pdfchoir(){
		$records = $this->database_model->allactivechoir();
		$html = '';	
		$html .=' <div class="table-responsive">
				<table id="members" border="2" width="100%" spacing="20" class="table table-striped table-bordered">
					<tr style="background:bue;padding:20px;">
						<td colspan="1"><img style="align:center;" src="asset/images/logo.jpg" width="50" height="100" class="img-thumbnail" alt="User Image"></td>
						<td colspan="6">All CHORISTERS OF NCWC</td>
					</tr>
					<thead style="padding:10px;">
						<tr>
							<th>Pic</th>
							<th>Full name</th>
							<th>Gender</th>
							<th>Resident</th>
							<th>Age</th>
							<th>Marital Status</th>
							<th>Denomination</th>
						</tr>
					</thead>
					<tbody>';
				  $count = 0;
				 foreach($records->result_array() as $row){
					 $count++;
		$html .='
					 <tr>
						<td>';
							if(!empty($row['Image'])){							
							$html .= '<img src="asset/images/'.$row['Image'].'" width="50" height="100" class="img-thumbnail">';
							}else{
							$html .= 	'<img src="asset/dist/img/co.png" width="50" height="100" class="img-thumbnail" alt="User Image">';
							}
		$html .='		</td>
						<td>'.$row['Firstname'].' '.$row['Othernames'].'</td>
						<td>'.$row['Gender'].'</td>
						<td>'.$row['Resident'].'</td>
						<td>'.$row['Age'].'</td>
						<td>'.$row['M_Status'].'</td>
						<td>'.$row['posnow'].'</td>
					</tr>';
					 
				 }
				$html .='	<tr>
					<td colspan="2"></td>
					<td colspan="5"><b>TOTAL</b>&nbsp;&nbsp;<b>'.$count.'</b></td>
				</tr>';
		$html .=' <tbody>
				</table>
				<hr>
			 </div>';
		
		
		$this->pdf->loadHtml($html);
	    $this->pdf->render();
	    $this->pdf->stream("allchoiresters.pdf", array("Attachment"=>1));
	}
	
	public function pdfmedia(){
		$records = $this->database_model->allactiveMedia();
		$html = '';	
		$html .=' <div class="table-responsive">
				<table id="members" border="2" width="100%" spacing="20" class="table table-striped table-bordered">
					<tr style="background:bue;padding:20px;">
						<td colspan="1"><img style="align:center;" src="asset/images/logo.jpg" width="50" height="100" class="img-thumbnail" alt="User Image"></td>
						<td colspan="6">All MEDIA MEN OF NCWC</td>
					</tr>
					<thead style="padding:10px;">
						<tr>
							<th>Pic</th>
							<th>Full name</th>
							<th>Gender</th>
							<th>Resident</th>
							<th>Age</th>
							<th>Marital Status</th>
							<th>Denomination</th>
						</tr>
					</thead>
					<tbody>';
				  $count = 0;
				 foreach($records->result_array() as $row){
					 $count++;
		$html .='
					 <tr>
						<td>';
							if(!empty($row['Image'])){							
							$html .= '<img src="asset/images/'.$row['Image'].'" width="50" height="100" class="img-thumbnail">';
							}else{
							$html .= 	'<img src="asset/dist/img/co.png" width="50" height="100" class="img-thumbnail" alt="User Image">';
							}
		$html .='		</td>
						<td>'.$row['Firstname'].' '.$row['Othernames'].'</td>
						<td>'.$row['Gender'].'</td>
						<td>'.$row['Resident'].'</td>
						<td>'.$row['Age'].'</td>
						<td>'.$row['M_Status'].'</td>
						<td>'.$row['posnow'].'</td>
					</tr>';
					 
				 }
				$html .='	<tr>
					<td colspan="2"></td>
					<td colspan="5"><b>TOTAL</b>&nbsp;&nbsp;<b>'.$count.'</b></td>
				</tr>';
		$html .=' <tbody>
				</table>
				<hr>
			 </div>';
		
		
		$this->pdf->loadHtml($html);
	    $this->pdf->render();
	    $this->pdf->stream("allmediamen.pdf", array("Attachment"=>1));
	}
	
	
	
 public function fetch()
 {
  echo $this->database_model->fetch_data($this->uri->segment(3));
 }
	
	
	
public function fetchmembers(){
	$records = $this->database_model->allmemberactiveserach();
	$html = '<datalist id="employeeid">';
	 foreach($records->result_array() as $row){
		 $html .='<option value="'.$row['Cardid'].'-'.$row['Firstname'].'-'.$row['Othernames'].'">'.$row['Firstname'].' '.$row['Othernames'].'</option>';
	 }
	 $html .='</datalist>';
	 
	 echo $html;
}		
	
	
	
  public function fellinputs(){
	$value = $_POST['seletd'];
	$fvalue = explode("-",$value);
	$cardid = $fvalue[0];
	 $results = $this->database_model->getinputs($cardid);
	foreach($results->result_array() as $rows){
		
	}
	
	if(!empty($rows['Cardid'])){
		$data = array(
			'result' => TRUE,
			'titeid' => $rows['Cardid'],
			'firstname' => $rows['Firstname'],
			'othernames' => $rows['Othernames']
		);
	}else{
		$data = array(
			'failed' => "Member Hasn't been assigned a Card id Or Page id"
		);
	}
	
	
	
	echo json_encode($data);
}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>