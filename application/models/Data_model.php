<?php
Class Data_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function view_data($item_type){
      if ($item_type=='bde') {
        $this->db->from('news_bde');
          $this->db->where('visible',1);          
          $query = $this->db->get();
        }
        if ($item_type=='news') {
                  $this->db->from('news');
          $this->db->where('visible',1);          
          $query = $this->db->get();
        }
          return $query->result_array();
    }
  
    public function list_data($item_type){
      if ($item_type=='bde') {
    $query=$this->db->query("SELECT *
                             FROM news_bde n
                             ORDER BY n.id ASC");
  }
  if ($item_type=='news') {
    $query=$this->db->query("SELECT *
                             FROM news n
                             ORDER BY n.id ASC");  
  }
    return $query->result_array();
}

    public function get_data($item_type,$id){
        if ($item_type=='bde') {
        $query=$this->db->query("SELECT *
                                 FROM news_bde n
                                 WHERE n.id = $id");
      }
        if ($item_type=='news') {
        $query=$this->db->query("SELECT *
                                 FROM news n
                                 WHERE n.id = $id");
        }
        return $query->row_array();
    }

    public function insert_data($item_type,$data){
      if ($item_type=='bde') {
        $this->db->insert('news_bde', $data);
        }
        if ($item_type=='news') {
        $this->db->insert('news', $data);
        }

        return TRUE;
    }
  
    public function edit_data($item_type,$id){
    if ($item_type=='bde') {
        $query=$this->db->query("SELECT *
                                 FROM news_bde n
                                 WHERE n.id = $id");
    }
    if ($item_type=='news') {
        $query=$this->db->query("SELECT *
                                 FROM news_ n
                                 WHERE n.id = $id");
    }

        return $query->result_array();
    }

    public function update_data($item_type,$id, $data){
      $this->db->where('id', $id);
      
    if ($item_type=='bde') {
    $this->db->update('news_bde', $data);
    }
    if ($item_type=='news') {
    $this->db->update('news', $data);
    }
    }

  public function update_state($item_type,$id, $state){
    
   $this->db->where('id', $id); 
    if ($item_type=='bde') {
      $this->db->set('visible', $state, FALSE);
    $this->db->update('news_bde');
    }
    if ($item_type=='news') {
      $this->db->set('visible', $state, FALSE);
    $this->db->update('news');
    }
    }

    public function delete($item_type,$id){
    $this->db->where('id', $id);
    if ($item_type=='bde') {
    $this->db->delete('news_bde');
    }
    if ($item_type=='news') {
    $this->db->delete('news');
    }
   
    }

  }
