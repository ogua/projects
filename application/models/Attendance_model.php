<?php
	class Attendance_model extends CI_Model{
		
		
		public function recordAttendance($data){
			$this->db->insert('attendance',$data);
		}
	
		public function fetchattendance(){
			$query = $this->db->get('attendance');
			return $query;
		}	
		
		//start here
		
		 var $table = "attendance";  
		  var $select_column = array("id", "totcongregation", "totchildren","overall", "typeofservice", "datetime");  
		  var $order_column = array("id", "totcongregation", "totchildren","overall", "typeofservice", "datetime");    
		  function make_query()  
		  {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("id", $_POST["search"]["value"]);  
                $this->db->or_like("totcongregation", $_POST["search"]["value"]);
				 $this->db->or_like("totchildren", $_POST["search"]["value"]);  
				 $this->db->or_like("overall", $_POST["search"]["value"]);  
				 $this->db->or_like("typeofservice", $_POST["search"]["value"]);  
				 $this->db->or_like("datetime", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
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
		
		
		public function del_attendance($id){
			$query = $this->db->where('id',$id);
			$query = $this->db->delete('attendance');
			return $query;
		}
		
		//view tithe
		public function view_attendance($id){
			$this->db->where('id',$id);
			$query = $this->db->get('attendance');
			return $query;
		}
		
		public function updateAttendance($data,$id){
			$this->db->where('id',$id);
			$query = $this->db->update('attendance',$data);
			return $query;
		}
	}
?>