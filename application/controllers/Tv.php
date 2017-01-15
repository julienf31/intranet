<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tv extends CI_Controller {
 
	function __construct()
	 {
		 parent::__construct();
		 

	 }

	public function index(){

	}

		public function meteo(){
		$this->load->helper('url');
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['item_type'] = 'meteo';
		$this->load->helper('xml');
		$this->load->helper('date');
		$this->template->set('title', 'Acceuil');
		$this->template->load('templates/tv', 'meteo', $data);
	}
	

	public function news(){

		$this->load->model('News_model','news');
		$data['views'] = $this->news->view_data();
		$this->load->helper('date');
		$data['item_type'] = 'news';
		$this->template->set('title', 'News');
		$this->template->load('templates/tv', 'tv', $data);

	}		
	
	public function bde(){

		$this->load->model('Bde_model','bde');
		$data['views'] = $this->bde->view_data();
		$data['item_type'] = 'bde';
		$this->template->set('title', 'News BDE');
		$this->template->load('templates/tv', 'tv', $data);

	}
	

}
?>