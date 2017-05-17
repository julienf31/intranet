<?php
Class Data_model extends CI_Model
{
    
    public function __construct(){
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
    
    public function list_data($item_type,$from,$size,$value = null){
        if ($item_type == 'bde') {
            $this->db->from('news_bde');
            $this->db->limit($size,$from);
            if($value){
                
                $this->db->like('titre',$value);
                $this->db->or_like('auteur', $value);
                $this->db->order_by('auteur');
            }
            $query = $this->db->get();
        }
        if ($item_type == 'news') {
            $this->db->from('news');
            $this->db->limit($size,$from);
            if($value){
                $this->db->limit($from,$size);
                $this->db->like('titre',$value);
                $this->db->or_like('auteur', $value);
                $this->db->order_by('auteur');
            }
            $query = $this->db->get();
        }
        if ($item_type == 'photos'){
            $query = $this->db->query("SELECT *
            FROM photos p
            ORDER BY p.id ASC");
        }
        if ($item_type == 'album'){
            $query = $this->db->query("SELECT *
            FROM album a
            ORDER BY a.id ASC");
        }
        if ($item_type == 'user'){
            $this->db->from('users');
            $this->db->limit($size,$from);
            if($value){
                $this->db->like('username',$value);
                $this->db->or_like('group', $value);
                $this->db->order_by('group');
            }
            
            $query = $this->db->get();
        }
        if ($item_type == 'birthday'){
            $this->db->from('birthday');
            $this->db->limit($size,$from);
            if($value){
                $this->db->like('Nom',$value);
                $this->db->or_like('Prénom', $value);
                $this->db->or_like('group', $value);
                $this->db->order_by('Prénom');
            }
            $query = $this->db->get();
        }
        return $query->result_array();
    }
    
    public function fetch_data($limit, $id) {
        $this->db->limit($limit);
        $this->db->where('id', $id);
        $query = $this->db->get("contact_info");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        }
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
        if ($item_type=='album') {
            $query=$this->db->query("SELECT *
            FROM album a
            WHERE a.id = $id");
        }
        if ($item_type=='user') {
            $this->db->from('users');
            $this->db->where('id',$id);
            $query = $this->db->get();
        }
        return $query->row_array();
    }
    
    public function get_config_tv($item_type){
        $this->db->select('*');
        $this->db->from('config_tv');
        $this->db->where('item_type', $item_type);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function insert_data($item_type,$data){
        if ($item_type=='bde') {
            $this->db->insert('news_bde', $data);
        }
        if ($item_type=='news') {
            $this->db->insert('news', $data);
        }
        if ($item_type == 'photos'){
            $this->db->insert('photos', $data);
        }
        if ($item_type == 'album') {
            $this->db->insert('album', $data);
        }
        if ($item_type == 'user') {
            $this->db->insert('users', $data);
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
        if ($item_type=='user') {
            $this->db->from('users');
            $this->db->where('id',$id);
            $query = $this->db->get();
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
        if ($item_type=='album') {
            $this->db->update('album', $data);
        }
        if ($item_type=='user') {
            $this->db->update('users', $data);
        }
    }
    
    public function update_config_tv($item_type, $data){
        $this->db->where('item_type', $item_type);
        $this->db->update('config_tv', $data);
    }
    
    public function update_state($item_type,$id, $state){
        $this->db->where('id', $id);
        if ($item_type == 'bde') {
            $this->db->set('visible', $state);
            $this->db->update('news_bde');
        }
        elseif ($item_type == 'news') {
            $this->db->set('visible', $state);
            $this->db->update('news');
        }
        elseif($item_type == 'photos'){
            $this->db->set('show_photo', $state);
            $this->db->update('photos');
        }
        elseif($item_type == 'album'){
            $this->db->set('show_album', $state);
            $this->db->update('album');
        }
        elseif($item_type == 'user'){
            $this->db->set('active', $state);
            $this->db->update('users');
        }
    }
    
    public function select_db($item_type){
        if($item_type == 'news'){
            $db = "news";
        }
        else if($item_type == "bde"){
            $db = "news_bde";
        }
        else if($item_type == "album"){
            $db = "album";
        }
        else if($item_type == "photos"){
            $db = "photos";
        }
        else if($item_type == "user"){
            $db = "users";
        }
        else if($item_type == "birthday"){
            $db = "birthday";
        }
        return $db;
    }
    
    public function anniversaire_etu($date){
        $this->db->from('etudiants');
        $this->db->like('anniversaire',$date);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function anniversaire_inter($date){
        $this->db->from('intervenants');
        $this->db->like('anniversaire',$date);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function fete($date){
        $this->db->from('saint');
        $this->db->like('JourMois',$date);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function get_album($id){
        $this->db->from('album');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function get_photos_from_album($value){
        $this->db->from('photos');
        $this->db->where('album_id',$value);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function afficher_photos(){
        $this->db->from('album');
        $this->db->join('photos', 'photos.album_id = album.id');
        $this->db->where('album.show_album',1);
        $this->db->where('photos.show_photo',1);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function modules(){
        $this->db->from('modules');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function animations($type){
        $this->db->from('animations');
        $this->db->like('type',$type);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function count_data($db) {
        return $this->db->count_all($db);
    }
    
    public function get_groups_list(){
        $this->db->select('name');
        $this->db->from('groups');
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function get_birthday_roups_list(){
        $this->db->from('birthday_groups');
        $this->db->order_by('id');
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    
    public function get_config(){
        $this->db->from('config');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function delete($item_type,$id){
        $this->db->where('id', $id);
        switch ($item_type) {
            case 'bde':
                $this->db->delete('news_bde');
                break;
            case 'news':
                $this->db->delete('news');
                break;
            case 'photos':
                $this->db->delete('photos');
                break;
            case 'album':
                $this->db->delete('album');
                break;
            case 'user':
                $this->db->delete('users');
                break;
            default:
                break;
    }
}

}