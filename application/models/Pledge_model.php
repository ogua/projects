<?php
	class Pledge_model extends CI_Model{
		
		//AUTOLOAD SECOND DATABASE
		public function __construct(){
			parent::__construct();
			$this->db2 = $this->load->database('otherdb',TRUE);
		}
		
		public function createTable($data){
			$query = $this->db2->query(
					"CREATE TABLE `".$data."`(
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `fullname` varchar(255) NOT NULL,
				  `amountpledge` varchar(255) NOT NULL,
				  `amountpaid` varchar(255) NOT NULL,
				  `amountleft` varchar(255) NOT NULL,
				  `reasons` text NOT NULL,
				  `pdate` varchar(255) NOT NULL,
				  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				   PRIMARY KEY (`id`)
				)"		
			);
            return $query;
		}
		
		
		public function showtables(){
			$query = $this->db2->query('show tables');
			return $query;
		}
		
		public function addpledge($table,$data){
			$this->db2->insert($table,$data);
		}
		
		public function plegesum($table){			
			$query = $this->db2->get($table);
			return $query;
		}
		
		public function getinfoandupdate($table){	
			$query = $this->db2->get($table);
			return $query;
		}
		
		public function paidupdate($id,$table){
			$query = $this->db2->where('id',$id);
			$query = $this->db2->get($table);
			return $query;
		}
		
		public function updatepledge($id,$table,$data){
			$query = $this->db2->where('id',$id);
			$query = $this->db2->update($table,$data);
			return $query;
		}
		
		public function delepledge($id,$table){
			$query = $this->db2->where('id',$id);
			$query = $this->db2->delete($table);
			return $query;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}
?>