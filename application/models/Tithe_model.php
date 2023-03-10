<?php
	class Tithe_model extends CI_Model{
		
	//Tithe
		public function addTithe($data){
			$this->db->insert('tithe',$data);
		}
	
	
		public function tithtmonth($month){
			$this->db->where('MON',$month);
			$query = $this->db->get('tithe');
			return $query;
		}
		
		
	
		public function alltithe(){
			$query = $this->db->get('tithe');
			return $query;
		}	
		public function alltithes(){
			$query = $this->db->query('select * from tithe order by YEAR DESC');
			return $query;
		}	
		
		  var $table = "tithe";  
		  var $select_column = array("ID", "CARDID", "OTHER_NAMES","FIRSTNAME", "MON", "AMOUNT", "YEAR", "DATE");  
		  var $order_column = array(null, "CARDID", "FIRSTNAME", null, "YEAR", "MON", null, null, null, null);  
		  function make_query()  
		  {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("CARDID", $_POST["search"]["value"]);  
                $this->db->or_like("FIRSTNAME", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'DESC');  
           }  
      }  
      function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  
		
	// end of making datatable for the time
	
		public function delectTithe($id){
			$this->db->where('ID',$id);
			$query = $this->db->delete('tithe');
			return $query;
		}
		
		public function fetchTithe($id){
			$this->db->where('CARDID',$id);
			$query = $this->db->get('tithe');
			return $query;
		}
	
	//view tithe
		public function viewthithe($id){
			$this->db->where('ID',$id);
			$query = $this->db->get('tithe');
			return $query;
		}
	
	//update tithe
		public function updateTithe($data,$id){
			$this->db->where('ID',$id);
			$query = $this->db->update('tithe',$data);
			return $query;
		}
		
		
		
	//view tithe january
		public function viewtithejan($id){
			/*$this->db->where('MON','JAN');
			$this->db->where('YEAR','2019');*/
			$this->db->where('CARDID',$id);
			$query = $this->db->get('tithe');
			return $query;
		}
	
		
		
		
		
		
		
		
		
		
	}
?>