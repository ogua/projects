<?php

class Main_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function bps_table($table, $pr_key)
    {


        $this->_table_name = $table;
        $this->_primary_key = $pr_key;

    }

    //fetch max id
    public function fetch_maxid($tbl)
    {

        $this->db->select()->from($tbl);
        $query = $this->db->get();

        return $query->result();
    }

    //select
    public function select($table)
    {
        $this->db->select();
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();

    }

    // add record
    function add_record($table, $array_data)
    {
        $query = $this->db->insert($table, $array_data);
        if ($query == 1)
            return $query;
        else
            return false;
    }

    //update record
    function update_record($table, $update, $id)
    {
        $this->db->where($id);
        $query = $this->db->update($table, $update);
        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    //delete record
    function delete_record($table, $field_name, $id)
    {
        $query = $this->db->where($field_name, $id);
        $this->db->delete($table);
        if ($query != NULL)
            return $query;
        else
            return false;
    }

    //select where
    function select_wher($table, $where = NULL)
    {

        $this->db->select('*');
        if ($where)
            $this->db->where($where);

        $query = $this->db->get($table);


        return $query->result();
    }

    //single row record
    function single_row($table, $where = NULL, $return = 's')
    {
        $this->db->select('*');
        if ($where)
            $this->db->where($where);

        $q = $this->db->get($table);


        return $q->row_array();

    }

    //get user details
    public function getUserDetails($user_id)
    {
        $this->db->select("*");
        $this->db->from('employee as e, usr_user as u');
        $this->db->where('u.idemployee = e.idemployee');
        $this->db->where('u.USER_ID', $user_id);
        $query = $this->db->get();
        return $query->row();
    }

    // Users List
    public function users_list()
    {
        $this->db->select("uu.USER_ID, uu.logged_in, uu.CREATED_DATE,
                    uu.USER_NAME,uu.USER_ID, ug.GROUP_NAME,ug.GROUP_ID, uu.IS_ACTIVE")->from("usr_group  as ug,
                    usr_user as uu")->WHERE("ug.GROUP_ID	= uu.GROUP_ID");
        $query = $this->db->get();

        return $query->result_array();
    }

    //get same name products
    public function select_same($item_name, $color, $size, $art_no)
    {
        $this->db->select('*');
        $this->db->where('item_name', $item_name);
        $this->db->where('color', $color);
        $this->db->where('size', $size);
        $this->db->where('article_no', $art_no);
        $query = $this->db->get("item");
        //echo $this->db->last_query();
        $result = $query->result();
        if (count($result)) {
            return $result;
        } else {
            return FALSE;
        }
    }

    // get items by category
    public function item_cat()
    {
        $sql = $this->db->query("SELECT
i.item_id,
i.item_name,
i.color,
i.article_no,
i.category_id,
i.size,
i.flag,
i.purchase_rate,
c.category_name,
s.stock_no,
s.item_id,
s.stock_qty,
s.purchase_rate,
s.stock_rate,
c.category_id,
s.category_id
FROM
item AS i
INNER JOIN category AS c ON i.category_id = c.category_id
INNER JOIN stock AS s ON s.item_id = i.item_id AND c.category_id = s.category_id
where i.category_id = c.category_id");
        //      echo $this->db->last_query();
        return $sql->result();
    }

    public function get_sales_max()
    {
        $this->db->select_max('sales_no');
        $q = $this->db->get('sales');
        $data = $q->row();
        return $data;
    }

    public function get_purchased($item_id)
    {
        $sql = $this->db->query("SELECT
item.item_id,
item.item_name,
item.size,
item.flag,
item.color,
item.purchase_rate,
category.category_id,
category.category_name,
stock.stock_no,
stock.stock_qty,
stock.purchase_rate,
stock.stock_rate
FROM
item
INNER JOIN category ON item.category_id = category.category_id
INNER JOIN stock ON stock.item_id = item.item_id AND stock.category_id = category.category_id
WHERE item.item_id=$item_id");
        return $sql->row();
    }

    public function getSales_history($sales_id)
    {

        $query = $this->db->query("SELECT * FROM sales
                    join sales_detail on sales_detail.sales_no=sales.sales_no
                    join item on item.item_id = sales_detail.item_id
                    join customer on customer.customer_id= sales.customer_id
                    where sales.sales_no=$sales_id");
        return $query->result();
    }

    public function invoice($id)
    {
        $query = $this->db->query("SELECT * FROM qoutation
                    JOIN qoutation_detail ON qoutation_detail.qoutation_id=qoutation.qoutaion_id
                    WHERE qoutation.qoutaion_id=$id");
        return $query->result();

    }

    /*==== GET EMAIL SETTINGS ====*/
    public function getEmailSettings()
    {
        return $this->db->select('*')->from('email_settings')->WHERE('id', 1)->get()->row();
    }

    //For issued deatil between dates query
    public function getAllissue_twodate($idfiletype, $date, $todate)
    {

        $sql = $this->db->select("issue.idissue, issue.datetime, issue.dairyno, issue.barcode, issue.subject,
 department.department, volume.volume, filestatus.filestatus, filetype.filetype, flag.flag")->from("issue,department,filestatus,filetype,flag,source,volume")
            ->where("issue.todept = department.iddepartment")
            ->where("issue.idfilestatus = filestatus.idfilestatus")
            ->where("issue.idfiletype = filetype.idfiletype")
            ->where("issue.idflag = flag.idflag")
            ->where("issue.idsource = source.idsource")
            ->where("issue.idvolume = volume.idvolume")
            ->where("issue.idfiletype", $idfiletype)
            ->where("issue.fromdept", $this->iddepartment)
            ->where("issue.datetime BETWEEN '$date' AND '$todate'")
            ->order_by("issue.datetime", 'ASC')->get();
        //$data = $this->db->query($sql);
        //echo $this->db->last_query();
        return $sql->result_array();
    }

    public function gettrackofidissue($idissue)
    {
        $sql = "SELECT *
		  FROM issue as i, filetype as f, flag as g, department as d, filestatus as t, source as o
		  WHERE i.idfiletype = f.idfiletype
		  AND i.idflag = g.idflag
		  AND i.todept = d.iddepartment 
		  AND i.idfiletype= f.idfiletype
		  AND i.idfilestatus = t.idfilestatus
		  AND i.idsource = o.idsource
		  AND i.idissue = '$idissue'";
        $data = $this->db->query($sql);
        //echo $this->db->last_query();
        return $data->row();
    }

    public function getAllreceived($idfiletype)
    {

        $sql = "SELECT issue.idissue, issue.datetime, issue.dairyno, issue.barcode, issue.subject, 
department.department, volume.volume, filestatus.filestatus, filetype.filetype, flag.flag, receive.idreceive,receive.received
FROM
    track
    INNER JOIN issue 
        ON (track.idissue = issue.idissue)  
	INNER JOIN receive 
        ON (track.idissue = receive.idissue)    
    INNER JOIN department 
        ON (track.todept = department.iddepartment)
    INNER JOIN filestatus 
        ON (track.idfilestatus = filestatus.idfilestatus)
    INNER JOIN filetype 
        ON (issue.idfiletype = filetype.idfiletype)
    INNER JOIN flag 
        ON (issue.idflag = flag.idflag)
    INNER JOIN source 
        ON (issue.idsource = source.idsource)
    INNER JOIN volume 
        ON (issue.idvolume = volume.idvolume)
        WHERE issue.idfiletype = '$idfiletype'
		AND track.status = 1
		AND receive.received = 0
		AND receive.status = 1
	    AND track.todept = '$this->iddepartment'        
        ORDER BY issue.datetime ASC";

        $data = $this->db->query($sql)->result_array();
        //echo $this->db->last_query();
        return $data;
    }

    public function countAll_pending($idfiletype)
    {
        $iddepartment = $_SESSION['luser']['iddepartment'];
        $idsection = $_SESSION['luser']['idsection'];
        $sql = "SELECT i.datetime as datetime, i.barcode as barcode, i.subject as subject, f.filetype as filetype, g.flag as flag, d.department as department, s.section as section, r.idissue as idissue, r.idreceive as idreceive, r.received as received, i.scan as scan, t.filestatus as filestatus
		  FROM receive as r, issue as i, filetype as f, flag as g, department as d, section as s, filestatus as t
		  WHERE r.idissue = i.idissue
		  AND i.idfiletype = f.idfiletype
		  AND i.idflag = g.idflag
		  AND i.fromdept = d.iddepartment
		  AND i.fromsection = s.idsection
		  AND i.idfilestatus = t.idfilestatus
		   AND i.idfilestatus = 2
		  AND i.todept='$iddepartment'
		  AND i.tosection='$idsection'
		  ORDER BY datetime ASC";
        $data = $this->db->num_rows($sql)->row_array();
        return $data;
    }


    //For Pendinng detail between dates
    public function getAllpending_twodate($idfiletype, $date, $todate)
    {
        $sql = "SELECT  issue.barcode,issue.dairyno,issue.fileno,issue.subject , 
 track.datetime,track.fromdept,track.fromsection,track.remarks,track.todept , 
  track.tosection,flag.flag,department.department,filestatus.filestatus,filetype.filetype,source.source,volume.volume,
   receive.idissue,receive.idreceive,receive.received
FROM  receive 
INNER JOIN  track ON (  receive.idissue =  track.idissue ) 
INNER JOIN  issue ON (  track.idissue =  issue.idissue ) 
INNER JOIN  department ON (  track.fromdept =  department.iddepartment ) 
INNER JOIN  filetype ON (  issue.idfiletype =  filetype.idfiletype ) 
INNER JOIN  filestatus ON (  issue.idfilestatus =  filestatus.idfilestatus ) 
INNER JOIN  flag ON (  issue.idflag =  flag.idflag ) 
INNER JOIN  source ON (  issue.idsource =  source.idsource ) 
INNER JOIN  volume ON (  issue.idvolume =  volume.idvolume ) 
WHERE  issue.idfiletype ='$idfiletype'
AND  track.status =1
AND receive.received = 1
AND receive.status = 1
		  AND track.todept='$this->iddepartment'
		  AND track.datetime>='$date' AND track.datetime <='$todate'
		  GROUP BY track.datetime ASC";

        $data = $this->db->query($sql)->result_array();
       // echo $this->db->last_query();
        return $data;
    }

    public function getforwarddetail($idreceive)
    {
        $sql = "SELECT i.fileno as fileno,t.idfilestatus, i.barcode as barcode, i.dairyno as dairyno, i.subject as subject, f.filetype as filetype, g.flag as flag, d.department as department,
 r.idissue as idissue, r.idreceive as idreceive, r.received as received, i.scan as scan, t.filestatus as filestatus
		  FROM `receive` as r, `issue` as i, `filetype` as f, flag as g, department as d, filestatus as t
		  WHERE r.idissue = i.idissue
		  AND i.idfiletype = f.idfiletype
		  AND i.idflag = g.idflag
		  AND i.fromdept = d.iddepartment
		  AND i.idfilestatus = t.idfilestatus
		  AND r.`idreceive`='$idreceive'";

        $data = $this->db->query($sql)->row_array();
         echo $this->db->last_query();
        return $data;
    }
}


?>