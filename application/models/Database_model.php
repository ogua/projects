<?php
	class Database_model extends CI_Model{
		
	//make tabledata for the first time
	  var $table = "members";  
      var $select_column = array("ID", "Firstname", "Othernames", "Gender","Resident","Age","M_Status","Date","Image");  
      var $order_column = array("Firstname", "Othernames", "Gender", "Age" ,"Date");  
      function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);		   	 		   
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("Firstname", $_POST["search"]["value"]); 
				$this->db->or_like("Othernames", $_POST["search"]["value"]);
                $this->db->or_like("Gender", $_POST["search"]["value"]);
				$this->db->or_like("Cardid", $_POST["search"]["value"]); 
				$this->db->or_like("TitheId", $_POST["search"]["value"]); 				
                $this->db->or_like("M_Status", $_POST["search"]["value"]); 				
				$this->db->or_like("Date", $_POST["search"]["value"]);  
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
		   $query = $this->db->where('status',0);
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


	
		public function registermember($data){
			$this->db->insert('members',$data);
		}
		
		public function registervisitor($data){
			$this->db->insert('Visitors',$data);
		}
		
		public function allmember(){
			$query = $this->db->get('members');
			return $query;
		}
		
		public function allmemberactive(){
			$query = $this->db->get_where('members',array('status'=> '1'));
			return $query;
		}
		
		public function allmemberactiveserach(){
			$wild = $_POST['employeeids'];
			$this->db->like('Firstname', $wild);
			$this->db->or_like('Othernames', $wild);
			$this->db->or_like('Cardid', $wild);
			$this->db->or_like('TitheId', $wild);
			$query = $this->db->get('members');
			return $query;
		}
		
		public function allmembernonactive(){
			$query = $this->db->get_where('members',array('status'=> '0'));
			return $query;
		}
		
		public function allyouthmembers(){
			$query = $this->db->get_where('members',array('status'=> '1', 'Age < '=> '41', 'Age > '=> '17'));
			return $query;
		}
		
		
		public function allactiveuhers(){
			$query = $this->db->get_where('members',array('status'=> '1', 'posnow '=> 'Usher'));
			return $query;
		}
		
		public function allactiveinstru(){
			$query = $this->db->get_where('members',array('status'=> '1', 'posnow'=> 'Instrumentalist'));
			return $query;
		}
		
		
		public function allactivechoir(){
			$query = $this->db->get_where('members',array('status'=> '1', 'posnow'=> 'Choristers'));
			return $query;
		}
		
		public function allactiveMedia(){
			$query = $this->db->get_where('members',array('status'=> '1', 'posnow'=> 'Media'));
			return $query;
		}
		
		
		
		
		public function allvisitors(){
			$query = $this->db->get('Visitors');
			return $query;
		}
		
		public function delectmember($id){
			$this->db->where('ID',$id);
			$query = $this->db->get('members');
			if($query->num_rows() > 0){
				foreach($query->result() as $rows){
					$image = $rows->Image;
				}
				if(!empty($image)){
					$url = "./asset/images/".$image;
					if(unlink($url)){
						$query = $this->db->query('DELETE FROM `members` WHERE `ID` = '.$id.'');
						return $query;
					}
				}else{
					$query = $this->db->query('DELETE FROM `members` WHERE `ID` = '.$id.'');
					return $query;
				}
			}
		}
		
		public function delvisitor($id){
			$this->db->where('id',$id);
			$query = $this->db->get('visitors');
			if($query->num_rows() > 0){
				foreach($query->result() as $rows){
					$image = $rows->Image;
				}
				if(!empty($image)){
					$url = "./asset/images/".$image;
					if(unlink($url)){
						$query = $this->db->query('DELETE FROM `visitors` WHERE `id` = '.$id.'');
						return $query;
					}
				}else{
					$query = $this->db->query('DELETE FROM `visitors` WHERE `id` = '.$id.'');
					return $query;
				}
			}
		}
		
		
		
		
		
		public function delectimage($id){
			$this->db->where('ID',$id);
			$query = $this->db->get('members');
			return $query;
		}
		
		public function delectimagevisitor($id){
			$this->db->where('id',$id);
			$query = $this->db->get('visitors');
			return $query;
		}
		
		public function editvisitor($id){
			$this->db->where('id',$id);
			$query = $this->db->get('visitors');
			return $query;
		}
		
		
		public function editmember($id){
			$this->db->where('ID',$id);
			$query = $this->db->get('members');
			return $query;
		}
		
		
		public function updatemember($data,$id){
			$this->db->where('ID',$id);
			$query = $this->db->update('members',$data);
			return $query;
		}
		
		public function updatevisitors($data,$id){
			$this->db->where('id',$id);
			$query = $this->db->update('visitors',$data);
			return $query;
		}
		
		
		public function updatestaus($data,$id){
			$this->db->where('ID',$id);
			$query = $this->db->update('members',$data);
			return $query;
		}
		
		
		public function updategroup($data,$id){
			$this->db->where('ID',$id);
			$query = $this->db->update('members',$data);
			return $query;
		}
		
		public function updatestaus2($data,$id){
			$this->db->where('ID',$id);
			$query = $this->db->update('members',$data);
			return $query;
		}
				
	//Tithe
		public function addTithe($data){
			$this->db->insert('tithe',$data);
		}
	
		public function alltithe(){
			$query = $this->db->get('tithe');
			return $query;
		}	
		
			
	//make tabledata for the first time
	  var $tithetable = "tithe";  
      var $select_tithecolumn = array("ID", "CARDID", "FIRSTNAME", "OTHER_NAMES","MON","AMOUNT","YEAR","DATE");  
      var $order_tithecolumn = array(null, "CARDID", "FIRSTNAME", "OTHER_NAMES", "MON","YEAR", "DATE");  
      function make_tithequery()  
      {  
           $this->db->select($this->select_tithecolumn);  
           $this->db->from($this->tithetable);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("CARDID", $_POST["search"]["value"]);  
                $this->db->or_like("FIRSTNAME", $_POST["search"]["value"]); 
				$this->db->or_like("MON", $_POST["search"]["value"]);
                $this->db->or_like("YEAR", $_POST["search"]["value"]); 				
				$this->db->or_like("DATE", $_POST["search"]["value"]);  
			}  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_tithecolumn[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'DESC');  
           }  
      }  
      function make_tithedatatables(){  
           $this->make_tithequery();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_tithe_data(){  
           $this->make_tithequery();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_tithe_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->tithetable);  
           return $this->db->count_all_results();  
      }  
		
	
	public function birthday(){
		$query = $this->db->get('members');
		$count = 0;
		foreach($query->result_array() as $row){
			$dateofbirth = $row['dateofbirth'];
			$dates = substr($dateofbirth,5,2);
			$thismonth = date('m');
			if($dates == $thismonth){
				$count++;
			}
		}
		
		$result = array('result' => $count);
		return $result;
	}
	
	
	
public function fetch_data($query)
 {
  $this->db->like('Firstname', $query);
  $query = $this->db->get('members');
  if($query->num_rows() > 0)
  {
   foreach($query->result_array() as $row)
   {
    $output[] = array(
     'name'  => $row["Firstname"].' '.$row["Othernames"],
     'image'  => $row["Image"]
    );
   }
   echo json_encode($output);
  }
 }
	
	
	
	
public function getinputs($fvalue){
	$this->db->where('Cardid',$fvalue);
	$query = $this->db->get('members');
	return $query;
}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// end of making datatable for the time
		
		
	}
?>