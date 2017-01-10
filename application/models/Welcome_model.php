<?php
class Welcome_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

   /**************************  START INSERT QUERY ***************/
    public function insert_data($data){
        $this->db->insert('news', $data); 
        return TRUE;
    }
	
	public function insert_data_bde($data){
        $this->db->insert('news_bde', $data); 
        return TRUE;
    }
    /**************************  END INSERT QUERY ****************/

    
    /*************  START SELECT or VIEW ALL QUERY ***************/
    public function view_data(){
        $query=$this->db->query("SELECT *
                                 FROM news n
                                 ORDER BY n.id ASC");
        return $query->result_array();
    }
	
	public function view_data_bde(){
        $query=$this->db->query("SELECT *
                                 FROM news_bde n
                                 ORDER BY n.id ASC");
        return $query->result_array();
    }
    /***************  END SELECT or VIEW ALL QUERY ***************/

    
    /*************  START EDIT PARTICULER DATA QUERY *************/
    public function edit_data($id){
        $query=$this->db->query("SELECT *
                                 FROM news n
                                 WHERE n.id = $id");
        return $query->result_array();
    }
	public function edit_data_bde($id){
        $query=$this->db->query("SELECT *
                                 FROM news_bde n
                                 WHERE n.id = $id");
        return $query->result_array();
    }
    /*************  END EDIT PARTICULER DATA QUERY ***************/

}