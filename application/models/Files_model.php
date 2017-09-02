<?php
Class Files_model extends CI_Model
{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('directory');
    }
    
    public function listFiles(){
        $map = directory_map('./uploads/',1,FALSE);
        return $map;    
    }

    public function listImg(){

    }
}