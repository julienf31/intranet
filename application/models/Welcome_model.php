<?php
class Welcome_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_data($data){
        $this->db->insert('news', $data); 
        return TRUE;
    }
	
	public function insert_data_bde($data){
        $this->db->insert('news_bde', $data); 
        return TRUE;
    }

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

}