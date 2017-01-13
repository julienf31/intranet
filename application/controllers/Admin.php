<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); désactivé car beug boucle infinie
class Admin extends CI_Controller {
 
	function __construct()
	 {
		 parent::__construct();
		 $this->load->helper('url');
		 $this->load->helper('date');
		 $this->load->model('Welcome_model','welcome');

	 }

	public function index()
	 {
	   if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->load->view('templates/header');
			$this->load->view('admin', $data);
			$this->load->view('templates/footer',$data);
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
				$this->data['view_data']= $this->welcome->view_data();
				$this->load->view('templates/header');
				$this->load->view('liste_news', $this->data, FALSE);
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
				$this->data['view_data']= $this->welcome->view_data_bde();
				$this->load->view('templates/header');
				$this->load->view('liste_bde', $this->data, FALSE);
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
    $this->data['edit_data']= $this->welcome->edit_data($id);
	$this->load->view('templates/header');
    $this->load->view('edit_news', $this->data, FALSE);
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
    $this->data['edit_data']= $this->welcome->edit_data_bde($id);
	$this->load->view('templates/header');
    $this->load->view('edit_bde', $this->data, FALSE);
	$this->load->view('templates/footer',$data);
	   	    }
		   else
		   {
			 redirect('login', 'refresh');
		   }
    }
	

	function changelog()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
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
	
	public function meteo()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$this->load->view('templates/header');
		$this->load->helper('xml');
		$this->load->view('meteo');
		$this->load->view('templates/footer',$data);
	}
	public function config()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
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