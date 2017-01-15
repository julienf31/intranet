<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); désactivé car beug boucle infinie
class Admin extends CI_Controller {
 
	function __construct()
	 {
		 parent::__construct();
		 $this->load->helper('url');
		 $this->load->helper('date');

	 }

	public function index()
	 {
	   if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->template->set('title', 'Administration');
			$this->template->load('templates/admin', 'admin', $data);
	   }
	   else
	   {
		 redirect('login', 'refresh');
	   }
	 }	
	
	// Administrer les diferents items
	public function liste($item_type)
    {
		   if($this->session->userdata('logged_in'))
		   {
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				if($item_type=='bde'){
				$data['liste_items']= $this->bde_model->list_data();
				}
				if($item_type=='news'){
				$data['liste_items']= $this->news_model->list_data();
				}
				$data['item_type'] = $item_type;
				$this->template->set('title', 'Liste');
				$this->template->load('templates/admin', 'liste', $data);
		   }
		   else
		   {
			 redirect('login', 'refresh');
		   }
  
	}
	
    // Ajout de news
    public function add($item_type)
    {
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['item_type'] = $item_type;
			$this->template->set('title', 'Ajout');
			$this->template->load('templates/admin', 'add', $data);
	    }
		else{
			 redirect('login', 'refresh');
		}
    }
	
    
    public function edit($item_type,$id)
    {
		if($this->session->userdata('logged_in')){
    		$session_data = $this->session->userdata('logged_in');
    		$data['username'] = $session_data['username'];
    		if ($item_type=='bde') {
    			$data['current_data']= $this->bde_model->get_data($id);
    		}
    		if ($item_type=='news') {
    			$data['current_data']= $this->news_model->get_data($id);
    		}
    		$data['item_type'] = $item_type;
    		$this->template->set('title', 'Edition');
			$this->template->load('templates/admin', 'edit', $data);
	   	}else{
			redirect('login', 'refresh');
		}
    }    

	
	function changelog()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$this->load->helper('date');
		$this->template->set('title', 'Changelog');
		$this->template->load('templates/admin', 'changelog', $data);
	}
 
	function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('admin', 'refresh');
	 }

	
	public function config()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->load->helper('date');
			$this->template->set('title', 'Config');
			$this->template->load('templates/admin', 'config', $data);
	    }
		else{
			 redirect('login', 'refresh');
		}
	}
}
?>