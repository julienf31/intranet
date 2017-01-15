<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
 
	function __construct()
	 {
		 parent::__construct();
		 

	 }

	public function index(){
		$this->load->helper('url');
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$this->load->helper('xml');
		$this->load->helper('date');
		$this->template->load('templates/admin', 'meteo', $data);
	}
	

	public function news(){

		$this->load->model('News_model','news');
		$data['news_views'] = $this->news->view_data();
		$this->load->helper('date');
		$this->template->load('templates/tv_news', 'tv_news', $data);

	}		
	
	public function bde(){

		$this->load->model('Bde_model','bde');
		$data['bde_views'] = $this->bde->view_data();
		$this->template->load('templates/tv_bde', 'tv_bde', $data);

	}
	

}
?>