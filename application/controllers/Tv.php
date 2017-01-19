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
	

	public function news($key = null){
		if(!$key) $key = 0;
		$this->load->model('Data_model','news');
		$news = $this->news->view_data('news');
		if(count($news)){
			$data['nextview'] = (isset($news[$key + 1 ])) ? $key + 1 : 0;
			$data['view'] = $news[$key];
		}
		$this->load->helper('date');
		$data['item_type'] = 'news';
		$data['config'] = $this->data_model->get_config_tv('news');
		$this->template->set('title', 'News');
		$this->template->load('templates/tv', 'tv', $data);

	}		
	
	public function bde($key = null){
		if(!$key) $key = 0;
		$this->load->model('Data_model','bde');
		$news = $this->bde->view_data('bde');
		if(count($news)){
			$data['nextview'] = (isset($news[$key + 1 ])) ? $key + 1 : 0;
			$data['view'] = $news[$key];
		}
		$data['item_type'] = 'bde';
		$this->template->set('title', 'News BDE');
		$data['config'] = $this->data_model->get_config_tv('bde');
		$this->template->set('title', 'BDE');
		$this->template->load('templates/tv', 'tv', $data);

	}
	

}
?>