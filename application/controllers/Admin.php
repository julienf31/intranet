<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('date');
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['user'] = $this->user_model->get_user_info($session_data['username']);
		}

	}

	// Fonction de base, vue de login
	public function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['current_config'] = $this->data_model->get_config_tv("news");
			$data['username'] = $session_data['username'];
			$data['user'] = $this->user_model->get_user_info($session_data['username']);
			$this->template->set('title', 'Administration');
			$this->template->load('templates/admin', 'admin', $data);
			
		}
		else{
			redirect('login', 'refresh');
		}
	}
	
	// Administrer les diferents items
	public function liste($item_type,$album_id = null){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['liste_items']= $this->data_model->list_data($item_type);
			$data['current_config'] = $this->data_model->get_config_tv('news');
			$data['item_type'] = $item_type;
			if($item_type == 'album'){
				$data['nb_album'] = $this->data_model->count_album();
				$data['nb_photos'] = $this->data_model->count_photos();
			}
			if($item_type == 'photos' && $album_id != ""){
				$data['album_id'] = $album_id;
				$data['content_album'] = $this->data_model->get_album($album_id);
				$data['photos'] = $this->data_model->get_photos_from_album($album_id);
			}
			$this->template->set('title', 'Liste');
			$this->template->load('templates/admin', 'liste', $data);
		}
		else{
			redirect('login', 'refresh');
		}
	}

		public function album(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['liste_items']= $this->data_model->album();
			$data['current_config'] = $this->data_model->get_config_tv('news');
			$this->template->set('title', 'Liste');
			$this->template->load('templates/admin', 'albums', $data);
		}
		else{
			redirect('login', 'refresh');
		}
	}
	
    // Ajout de news, voir le controler data pour l'insertion en DB
	public function add($item_type,$album_id = null){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['item_type'] = $item_type;
			$data['current_config'] = $this->data_model->get_config_tv('news');
			if($item_type == 'photos' && $album_id != ""){
				$data['album_id'] = $album_id;
				$data['content_album'] = $this->data_model->get_album($album_id);
			}
			if($item_type == 'user'){
				$data['groups'] = $this->data_model->get_groups_list();
			}
			$this->template->set('title', 'Ajout');
			$this->template->load('templates/admin', 'add', $data);
		}
		else{
			redirect('login', 'refresh');
		}
	}
	
    // Edition de news, voir le controler data pour l'update de la DB
	public function edit($item_type,$id){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['current_data'] = $this->data_model->get_data($item_type,$id);
			$data['current_config'] = $this->data_model->get_config_tv('news');
			if($item_type == 'news' || $item_type == 'bde'){
				if($data['current_data']['text_type'] == 'JSON'){
					$video_datas = $data['current_data']['texte'];
					$video_id = json_decode($video_datas)->videoId;
					$data['current_data']['texte'] = 'https://www.youtube.com/watch?v='.$video_id;
				}
			}
			if($item_type == 'user'){
				$data['groups'] = $this->data_model->get_groups_list();
			}
			$data['item_type'] = $item_type;
			$this->template->set('title', 'Edition');
			$this->template->load('templates/admin', 'edit', $data);
		}else{
			redirect('login', 'refresh');
		}
	}    

    // Configuration generale
	public function config(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->template->set('title', 'Config');
			$this->template->load('templates/admin', 'config', $data);
			$data['current_config'] = $this->data_model->get_config_tv("news");
		}
		else{
			redirect('login', 'refresh');
		}
	}

	// Configuration des ecrans d'affichage (news,bde,albumphoto)
	public function tv_config($item_type){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['item_type'] = $item_type;
			$data['current_config'] = $this->data_model->get_config_tv($item_type);
			$data['modules'] = $this->data_model->modules();
			$data['animationsIn'] = $this->data_model->animations('in');
			$data['animationsOut'] = $this->data_model->animations('out');
			$this->template->set('title', 'Config');
			$this->template->load('templates/admin', 'tv_config', $data);
		}
		else{
			redirect('login', 'refresh');
		}
	}

	// Affichage du changelog
	public function changelog(){
		$session_data = $this->session->userdata('logged_in');
		$data['current_config'] = $this->data_model->get_config_tv("news");
		$data['username'] = $session_data['username'];
		$this->template->set('title', 'Changelog');
		$this->template->load('templates/admin', 'changelog', $data);
	}

    // Affichage de la page de maintenance
	public function maintenance(){
		$this->load->view('maintenance');
	}

	// Affichage de la page d'erreur 404'
	public function error404(){
		$this->load->view('404');
	}

	// Fonction de deconexion
	public function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('admin', 'refresh');
	}

}
?>