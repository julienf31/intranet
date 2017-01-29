<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
			$data['current_config'] = $this->data_model->get_config_tv("news");
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

				$data['liste_items']= $this->data_model->list_data($item_type);
				$data['current_config'] = $this->data_model->get_config_tv($item_type);
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
			$data['current_config'] = $this->data_model->get_config_tv($item_type);
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
    		$data['current_data']= $this->data_model->get_data($item_type,$id);
			$data['current_config'] = $this->data_model->get_config_tv($item_type);
   			if($data['current_data']['text_type'] == 'JSON'){
   				$video_datas = $data['current_data']['texte'];
   				$video_id = json_decode($video_datas)->videoId;
   				$data['current_data']['texte'] = 'https://www.youtube.com/watch?v='.$video_id;
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
			$data['current_config'] = $this->data_model->get_config_tv("news");
	    }
		else{
			 redirect('login', 'refresh');
		}
	}

	public function tv_config($item_type)
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['item_type'] = $item_type;
    		$data['current_config'] = $this->data_model->get_config_tv($item_type);
			$data['modules'] = $this->data_model->modules();
			$this->load->helper('date');
			$this->template->set('title', 'Config');
			$this->template->load('templates/admin', 'tv_config', $data);
	    }
		else{
			 redirect('login', 'refresh');
		}
	}
}
?>