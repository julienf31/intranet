<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
 
	function __construct()
	 {
		 parent::__construct();
		 $this->load->helper('url');

	 }

	public function index(){

		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$this->load->helper('date');
		$this->load->view('templates/header');
		$this->load->view('index');
	}

	public function news(){

		$this->load->model('News_model','news');
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['news_views'] = $this->news->view_data();
		$this->load->helper('date');
		$this->load->view('templates/header');
		$this->load->view('index_news', $data);
		$this->load->view('templates/footer_tv', $data);
	}		
	
	public function bde(){

		$this->load->model('Bde_model','bde');
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['bde_views'] = $this->bde->view_data();

		$this->load->helper('date');
		$this->load->view('templates/header_bde');
		$this->load->view('index_bde', $data);
		$this->load->view('templates/footer_tv', $data);

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
	function admin()
	 {
	   if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->load->helper('date');
			$this->load->view('templates/header');
			$this->load->view('admin', $data);
			$this->load->view('templates/footer',$data);
	   }
	   else
	   {
		 redirect('login', 'refresh');
	   }
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