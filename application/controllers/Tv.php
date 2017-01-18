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
		$this->load->helper('date');
		$this->load->helper('xml');

		$data['item_type'] = 'meteo';

		$date = date('d/m');		// date du jour
		//$this->load->model('Data_model','anniversaire');		// chargement du modele
		$data['anniversaire_etu'] = $this->data_model->anniversaire_etu($date);	// chargement donnee du modele
		$data['anniversaire_inter'] = $this->data_model->anniversaire_inter($date);	// chargement donnee du modele
		$data['fete'] = $this->data_model->fete($date);
		//var_dump($data['anniversaire_etu']);
		//die();
		$this->template->set('title', 'Acceuil');
		$this->template->load('templates/tv', 'meteo', $data);
	}
	

	public function news(){

		$this->load->model('News_model','news');
		$data['views'] = $this->news->view_data();
		$this->load->helper('date');
		$data['item_type'] = 'news';
		$data['taille_carousel'] = '410px';
		$this->template->set('title', 'News');
		$this->template->load('templates/tv', 'tv', $data);

	}		
	
	public function bde(){

		$this->load->model('Bde_model','bde');
		$data['views'] = $this->bde->view_data();
		$data['item_type'] = 'bde';
		$this->template->set('title', 'News BDE');
		$data['taille_carousel'] = '410px';
		$this->template->set('title', 'BDE');
		$this->template->load('templates/tv', 'tv', $data);

	}
	

}
?>