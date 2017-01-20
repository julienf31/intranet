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

	public function index()
	 {

	 }

    // Insert news
    public function insert($item_type)
    {
    	$session_data = $this->session->userdata('logged_in');
		if($session_data){
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
			$data = array('titre'                   => $this->input->post('titre'),
						  'auteur'                  => $data['username'],
						  'visible'                 => $this->input->post('visible'),
						  'afficher_titre'          => $afficher_titre,
						  'texte'                   => $texte,
						  'date'              		=> date("Y-m-d h:i:s"),
						  'image'				=> $file,
						  'text_type'				=> $type);

			$this->data_model->insert_data($item_type,$data);
			$this->session->set_flashdata('message', 'News créée avec succés');
			$link='liste/'.$item_type;
			redirect($link);
		}
		else{
			redirect('login', 'refresh');
		}
    }   
	
    // Edition de news
    public function update($item_type, $id, $text_type)
    {
    $session_data = $this->session->userdata('logged_in');
	if($session_data)
   {
    $data['username'] = $session_data['username'];

        	$this->upload->do_upload('imageedit');
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

			$data = array('titre'                   => $this->input->post('titre'),
						  'visible'                 => $this->input->post('visible'),
						  'afficher_titre'          => $afficher_titre,
						  'texte'                   => $texte,
						  'image'				=> $file);

	$this->data_model->update_data($item_type,$id, $data);

    $this->session->set_flashdata('message', 'News mise à jour avec succés');
	$link='liste/'.$item_type;
	redirect($link);
	   	   	    }
		   else
		   {
			 redirect('login', 'refresh');
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
    $data = array('tps_affichage'=> $this->input->post('tps_affichage'),
    	'logo' => $file);


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
   
    $this->session->set_flashdata('message', 'News actualisée avec succés');
	$link='liste/'.$item_type;
	redirect($link);
    }

    //Supression de news
    public function delete($item_type,$id)
    {  

   	$this->data_model->delete($item_type,$id);

    $this->session->set_flashdata('message', 'News supprimée avec succés');
	$link='liste/'.$item_type;
	redirect($link);
    }    
	
}
?>