<?php
Class Bde_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function view_data(){
        $this->db->from('news_bde');
          $this->db->where('visible',1);          
          $query = $this->db->get();
          return $query->result_array();
    }
  
    public function list_data(){
    $query=$this->db->query("SELECT *
                             FROM news_bde n
                             ORDER BY n.id ASC");
    return $query->result_array();
}

    public function get_data($id){
        $query=$this->db->query("SELECT *
                                 FROM news_bde n
                                 WHERE n.id = $id");
        return $query->row_array();
    }

    public function insert_data($data){
        $this->db->insert('news_bde', $data); 
        return TRUE;
    }
  
    public function edit_data($id){
        $query=$this->db->query("SELECT *
                                 FROM news_bde n
                                 WHERE n.id = $id");
        return $query->result_array();
    }

    public function update_data($id, $data){
      $this->db->where('id', $id);
      $this->db->update('news_bde', $data);
    }

  public function update_state($id, $state){
    $this->db->where('id', $id);
    $this->db->set('visible', $state, FALSE);
    $this->db->update('news_bde');
    }

    public function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('news_bde');
    }

  }

