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
			$this->template->load('templates/admin', 'admin', $data);
	   }
	   else
	   {
		 redirect('login', 'refresh');
	   }
	 }

	// Administrer la lite news
	public function liste_news()
    {
		   if($this->session->userdata('logged_in'))
		   {
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['liste_news']= $this->news_model->list_data();

				$this->load->view('templates/header');
				$this->load->view('liste_news', $data);
				$this->load->view('templates/footer',$data);
		   }
		   else
		   {
			 redirect('login', 'refresh');
		   }
  
	} 		
	
	// Administrer la lite bde
	public function liste_bde()
    {
		   if($this->session->userdata('logged_in'))
		   {
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['liste_bde']= $this->bde_model->list_data();
				$this->load->view('templates/header');
				$this->load->view('liste_bde', $data);
				$this->load->view('templates/footer',$data);
		   }
		   else
		   {
			 redirect('login', 'refresh');
		   }
  
	}
	
    // Ajout de news
    public function add_news()
    {
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->load->view('templates/header');
			$this->load->view('add_news');
			$this->load->view('templates/footer',$data);
	    }
		else{
			 redirect('login', 'refresh');
		}
    }
	
	public function add_bde()
    {
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->load->view('templates/header');
			$this->load->view('add_bde');
			$this->load->view('templates/footer',$data);
	    }
		else{
			 redirect('login', 'refresh');
		}
    }
    

    public function edit_news($id)
    {
		if($this->session->userdata('logged_in'))
   {
    $session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    $data['current_data']= $this->news_model->get_data($id);
	$this->load->view('templates/header');
    $this->load->view('edit_news', $data);
	$this->load->view('templates/footer',$data);
	   	    }
		   else
		   {
			 redirect('login', 'refresh');
		   }
    }    
	public function edit_bde($id)
    {
		if($this->session->userdata('logged_in'))
   {
    $session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    $data['current_data']= $this->bde_model->get_data($id);
	$this->load->view('templates/header');
    $this->load->view('edit_bde', $data);
	$this->load->view('templates/footer',$data);
	   	    }
		   else
		   {
			 redirect('login', 'refresh');
		   }
    }
	

	public function meteo()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$this->load->helper('xml');
		$this->load->helper('date');
		$this->load->view('templates/header');
		$this->load->view('meteo');
		$this->load->view('templates/footer',$data);
	}
	
	function changelog()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$this->load->helper('date');
		$this->load->view('templates/header');
		$this->load->view('changelog');
		$this->load->view('templates/footer',$data);
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
			$this->load->view('templates/header');
			$this->load->view('config');
			$this->load->view('templates/footer',$data);
	    }
		else{
			 redirect('login', 'refresh');
		}
	}
}
?>