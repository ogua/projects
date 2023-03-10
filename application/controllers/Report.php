<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
		 $this->load->model('tithe_model');
		 $this->load->model('welfare_model');
		 $this->load->model('database_model');
		 $this->load->model('pledge_model');
		 
		 

	}
	public function index()
	{
		$data['members'] = $this->database_model->allmemberactive();
		$data['title'] = 'NCWC : GENERATE REPORT FOR MEMBERS';
		$this->load->view('membersReport',$data);
	}
	
	public function reportTithe()
	{
		$data['members'] = $this->database_model->allmemberactive();
		$data['title'] = 'NCWC : GENERATE REPORT FOR TITHE';
		$data['Tithedata'] = $this->tithe_model->alltithes();
		$this->load->view('reportTithe',$data);
	}
	
	public function pledge()
	{
		$data['title'] = 'NCWC : GENERATE REPORT FOR PLEDGE';
		$data['tables'] = $this->pledge_model->showtables();
		$this->load->view('reportPledge',$data);
	}
	
	
	
	
	public function reportWelfare(){
		$data['members'] = $this->database_model->allmemberactive();
		$data['title'] = 'NCWC : GENERATE REPORT FOR WELFARE';
		$data['welfaredata'] = $this->welfare_model->allwelfare();
		$this->load->view('reportWelfare',$data);
	}
	
	public function attendance(){
		$data['title'] = 'NCWC : GENERATE REPORT FOR ATTENDANCE';
		$data['attendance'] = $this->attendance_model->fetchattendance();
		$this->load->view('reportAttendance',$data);
	}
	
	
	
	public function reportwelfares(){
		$this->form_validation->set_rules('yrs','Year Cant Be Empty','required');
		
		if($this->form_validation->run()){
			$month =  $this->input->post('fdate');
			$year =  $this->input->post('tdate');
			$data['title'] = 'NCWC : GENERATE REPORT FOR WELFARE';
			$data['welfaredata'] = $this->welfare_model->getreport($month,$year);
			$this->load->view('reportWelfare',$data);
		}else{
			$this->reportWelfare();
		}
	}
	
	
	
	
	
	
	
	public function table(){
		$this->load->library('table');
		$template = array(
        'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">'
);

$this->table->set_template($template);
		$query = $this->db->query('SELECT * FROM tithe');

		echo $this->table->generate($query);
		
		
		$this->session->set_tempdata('message','This is marked as temp', 300);
		
		echo $this->session->tempdata('message');
		echo'<br>';
		$this->load->helper('captcha');
		
		$vals = array(
        'word'          => 'Random word',
        'img_path'      => './uploads/hostel.png',
        'img_url'       => 'http://localhost/projectWork/ncwcdatabasev2/uploads/hostel.png',
        'font_path'     => './path/to/fonts/texb.ttf',
        'img_width'     => '150',
        'img_height'    => 30,
        'expiration'    => 7200,
        'word_length'   => 8,
        'font_size'     => 16,
        'img_id'        => 'Imageid',
        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

        // White background and border, black text and red grid
        'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
        )
);

$cap = create_captcha($vals);
echo $cap['image'];
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
