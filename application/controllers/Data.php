<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Data extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);
	}

	public function index(){

	}

    // Insert news
	public function insert($item_type){
		$data['current_config'] = $this->data_model->get_config_tv($item_type);
		
		// insert action
		if (isset($_POST['send-btn'])){
			$session_data = $this->session->userdata('logged_in');
			if($session_data){
				if($item_type == 'photos'){
					$data['username'] = $session_data['username'];
					$this->upload->do_upload('imageup');
					$data_upload_files = $this->upload->data();
					$image = $data_upload_files['full_path'];
					$file = basename($image);
					if ($this->input->post('img_select') == 'url') {
						$data = array(
							'nom' => $this->input->post('nom'),
							'createur' => $data['username'],
							'visible' => $this->input->post('visible'),
							'date' => date("Y-m-d h:i:s"),
							'type' => 'url',
							'url' => $this->input->post('image_url'));
					}
					elseif ($this->input->post('img_select') == 'upload'){
						$data = array(
							'nom' => $this->input->post('nom'),
							'createur' => $data['username'],
							'visible' => $this->input->post('visible'),
							'date' => date("Y-m-d h:i:s"),
							'type' => 'file',
							'url' => $file
						);
					}
					$this->data_model->insert_data($item_type,$data);
					$this->session->set_flashdata('message_success', 'Photo ajoutée à l\'album avec succés');
					$link='liste/'.$item_type;
					redirect($link);
				}
				$data['username'] = $session_data['username'];
				$this->upload->do_upload('imageup');
				$data_upload_files = $this->upload->data();
				$image = $data_upload_files['full_path'];
				$file = basename($image);
				if($file == 'uploads'){
					$file = 'default/white.png';
				}
				$afficher_titre=$this->input->post('afficher_titre');
				if($afficher_titre == null){
					$afficher_titre='0';
				}
				if ($this->input->post('type_select') == 'News') {
					$type = 'TEXT';
					$texte = $this->input->post('texte');
				}
				if ($this->input->post('type_select') == 'Video') {
					$type = 'JSON';
					$video_url = $this->input->post('video_url');
					parse_str( parse_url( $video_url, PHP_URL_QUERY ), $video_url_params );   
					$videoId = $video_url_params['v'];
					$texte= array("type"=>"video", "plateform"=>"youtube", "videoId"=>$videoId);
					$texte = json_encode($texte);
				}
				$data = array(
					'titre' => $this->input->post('titre'),
					'auteur' => $data['username'],
					'visible' => $this->input->post('visible'),
					'afficher_titre' => $afficher_titre,
					'texte' => $texte,
					'date' => date("Y-m-d h:i:s"),
					'image' => $file,
					'text_type'	=> $type
				);
				$this->data_model->insert_data($item_type,$data);
				$this->session->set_flashdata('message_success', 'News créée avec succés');
				$link='liste/'.$item_type;
				redirect($link);
			}
			else{
				redirect('login', 'refresh');
			}

		// Preview action
		} else if (isset($_POST['preview-btn'])) {
			if($this->session->userdata('logged_in'))
			{
				$this->load->helper('date');
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$this->upload->do_upload('imageup');
				$data_upload_files = $this->upload->data();
				$image = $data_upload_files['full_path'];
				$file = basename($image);
				if($file == 'uploads'){
					$file = 'default/white.png';
				}
				$afficher_titre=$this->input->post('afficher_titre');
				if($afficher_titre == null){
					$afficher_titre='0';
				}
				if ($this->input->post('type_select') == 'News') {
					$type = 'TEXT';
					$texte = $this->input->post('texte');
				}
				if ($this->input->post('type_select') == 'Video') {
					$type = 'JSON';
					$video_url = $this->input->post('video_url');
					parse_str( parse_url( $video_url, PHP_URL_QUERY ), $video_url_params );   
					$videoId = $video_url_params['v'];
					$texte= array("type"=>"video", "plateform"=>"youtube", "videoId"=>$videoId);
					$texte = json_encode($texte);
				}

				$preview_data = array(
					'titre' => $this->input->post('titre'),
					'auteur' => $data['username'],
					'visible' => $this->input->post('visible'),
					'afficher_titre' => $afficher_titre,
					'texte' => $texte,
					'date' => date("Y-m-d h:i:s"),
					'image'	=> $file,
					'text_type'	=> $type);
				$data['view'] = $preview_data;
				$data['item_type'] = $item_type;
				$this->template->set('title', 'Apercu');
				$this->template->load('templates/tv', 'preview', $data);
			}
			else{
				redirect('login', 'refresh');
			}
		}else{
        //no button pressed
		}
	}   
	
    // Edition de news
	public function update($item_type, $id, $text_type)
	{
		$data['current_config'] = $this->data_model->get_config_tv($item_type);
		if (isset($_POST['send-btn'])) {

			$session_data = $this->session->userdata('logged_in');
			if($session_data)
			{
				$data['username'] = $session_data['username'];

				$this->upload->do_upload('imageedit');
				$data_upload_files = $this->upload->data();

				$image = $data_upload_files['full_path'];
				$file = basename($image);


				$afficher_titre=$this->input->post('afficher_titre');
				if($afficher_titre == null){
					$afficher_titre='0';
				}

				if($text_type == 'TEXT'){
					$texte = $this->input->post('texte');
				}

				if($text_type == 'JSON'){
					$video_url = $this->input->post('video_url');
					parse_str( parse_url( $video_url, PHP_URL_QUERY ), $video_url_params );   
					$videoId = $video_url_params['v'];
					$texte= array("type"=>"video", "plateform"=>"youtube", "videoId"=>$videoId);
					$texte = json_encode($texte);
				}
				if($file == 'uploads'){
					$data = array('titre'                   => $this->input->post('titre'),
						'visible'                 => $this->input->post('visible'),
						'afficher_titre'          => $afficher_titre,
						'texte'                   => $texte);
				}else{
					$data = array('titre'                   => $this->input->post('titre'),
						'visible'                 => $this->input->post('visible'),
						'afficher_titre'          => $afficher_titre,
						'texte'                   => $texte,
						'image'				=> $file);
				}
				$this->data_model->update_data($item_type,$id, $data);

				$this->session->set_flashdata('message_success', 'News mise à jour avec succés');
				$link='liste/'.$item_type;
				redirect($link);
			}
			else
			{
				redirect('login', 'refresh');
			}
		}elseif (isset($_POST['preview-btn'])) {

			if($this->session->userdata('logged_in'))
			{


				$this->load->helper('date');
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$this->upload->do_upload('imageup');
				$data_upload_files = $this->upload->data();
				$image = $data_upload_files['full_path'];
				$file = $this->input->post('imagesave');
				if($file == 'uploads'){
					$file = 'default/white.png';
				}
				$afficher_titre=$this->input->post('afficher_titre');
				if($afficher_titre == null){
					$afficher_titre='0';
				}
				if ($text_type == 'TEXT') {
					$type = 'TEXT';
					$texte = $this->input->post('texte');
				}
				if ($text_type == 'JSON') {
					$type = 'JSON';
					$video_url = $this->input->post('video_url');
					parse_str( parse_url( $video_url, PHP_URL_QUERY ), $video_url_params );   
					$videoId = $video_url_params['v'];
					$texte= array("type"=>"video", "plateform"=>"youtube", "videoId"=>$videoId);
					$texte = json_encode($texte);
				}

				$preview_data = array('titre'                   => $this->input->post('titre'),
					'auteur'                  => $data['username'],
					'visible'                 => $this->input->post('visible'),
					'afficher_titre'          => $afficher_titre,
					'texte'                   => $texte,
					'date'              		=> date("Y-m-d h:i:s"),
					'image'				=> $file,
					'text_type'				=> $type);
				$data['view'] = $preview_data;
				$data['item_type'] = $item_type;
				$this->template->set('title', 'Apercu');
				$this->template->load('templates/tv', 'preview', $data);
			}
			else
			{
				redirect('login', 'refresh');
			}

		}else{

		}

	}

	public function update_config_tv($item_type)
	{
		$session_data = $this->session->userdata('logged_in');
		if($session_data)
		{
			$data['username'] = $session_data['username'];
			$this->upload->do_upload('logoup');
			$data_upload_files = $this->upload->data();
			$image = $data_upload_files['full_path'];
			$file = basename($image);
			if($file == 'uploads'){
				$data = array(	'tps_affichage'=> $this->input->post('tps_affichage'),
					'moduleGauche' => $this->input->post('moduleGauche'),
					'moduleCentre' => $this->input->post('moduleCentre'),
					'moduleDroite' => $this->input->post('moduleDroite'),
					'animationIn' => $this->input->post('animationIn'),
					'animationOut' => $this->input->post('animationOut'));

			}else{
				$data = array('tps_affichage'=> $this->input->post('tps_affichage'),
					'logo' => $file,
					'moduleGauche' => $this->input->post('moduleGauche'),
					'moduleCentre' => $this->input->post('moduleCentre'),
					'moduleDroite' => $this->input->post('moduleDroite'),
					'animationIn' => $this->input->post('animationIn'),
					'animationOut' => $this->input->post('animationOut'));

			}		

			$this->data_model->update_config_tv($item_type, $data);

			$this->session->set_flashdata('message', 'Configuration mise à jour avec succés');
			$link='liste/'.$item_type;
			redirect('admin');
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	public function update_state($item_type,$id,$state)
	{  
		$this->data_model->update_state($item_type,$id,$state);
		if($item_type == 'photos'){
			$this->session->set_flashdata('message_success', 'Photo actualisée avec succés');
		}
		elseif($item_type == 'news' || $item_type == 'bde'){
			$this->session->set_flashdata('message_success', 'News actualisée avec succés');
		}
		$link='liste/'.$item_type;
		redirect($link);
	}

    //Supression de news
	public function delete($item_type,$id)
	{  

		$this->data_model->delete($item_type,$id);
		if($item_type == 'photos'){
			$this->session->set_flashdata('message_danger', 'Photo supprimée avec succés');
		}
		else{
			$this->session->set_flashdata('message_danger', 'News supprimée avec succés');
		}

		$link='liste/'.$item_type;
		redirect($link);
	}    
	
}
?>