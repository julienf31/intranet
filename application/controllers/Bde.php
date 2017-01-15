<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); désactivé car beug boucle infinie
class Bde extends CI_Controller {
 
	function __construct()
	 {
		 parent::__construct();
		 $this->load->helper('url');
		$this->load->helper('date');
		 $config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);


	 }

	public function index()
	 {
	 	$session_data = $this->session->userdata('logged_in');
	   if($session_data){
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
	
    
    // Insert news
    public function insert_bde()
    {
    	$session_data = $this->session->userdata('logged_in');
		if($session_data){
			$data['username'] = $session_data['username'];
		
        	$this->upload->do_upload('imageup');
        	$data_upload_files = $this->upload->data();
var_dump($data_upload_files);
die();

         	$image = $data_upload_files['full_path'];
			$file = basename($image);
			if($file == 'uploads'){
				$file = 'default/white.png';
			}
			$data = array(
			'titre'=>$this->input->post('titre'),
			'auteur'=>$data['username'],
			'visible'=> $this->input->post('visible'),
			'afficher_titre'=>$this->input->post('afficher_titre'),
			'texte'=> $this->input->post('texte'),
			'date'=> date("Y-m-d h:i:s"),
			'image'=> $file
			);

			$this->bde_model->insert_data($data);
			$this->session->set_flashdata('message', 'News créée avec succés');
			redirect('liste_bde');
		}
		else{
			redirect('login', 'refresh');
		}
    }

    // Edition de news
    public function update_bde($id){

		$session_data = $this->session->userdata('logged_in');
		if($session_data){

		$session_data = $this->session->userdata('logged_in');
	    $data['username'] = $session_data['username'];


		$this->upload->do_upload('image');
		$data_upload_files = $this->upload->data();
var_dump($data_upload_files);
die();

		$data = array(
		'titre'=>$this->input->post('titre'),
		'auteur'=>$data['username'],
		'visible'=> $this->input->post('visible'),
		'afficher_titre'=>$this->input->post('afficher_titre'),
		'texte'=> $this->input->post('texte'),
		'date'=> date("Y-m-d h:i:s"),
		'image'=> $file
		);
	    $this->bde_model->update_data($id, $data);
	    $this->session->set_flashdata('message', 'News mise à jour avec succés');
	    redirect('liste_bde');

	   	}else{
			redirect('login', 'refresh');
		}
    }

	public function update_bde_state($id,$state)
    {  
    $this->bde_model->update_state($id, $state);
    $this->session->set_flashdata('message', 'News actualisée avec succés');
    redirect('liste_bde');
    }

    //Supression de news
    public function delete_bde($id)
    {  
    $this->bde_model->delete($id);
    $this->session->set_flashdata('message', 'News supprimée avec succés');
    redirect('liste_bde');
    }    
	
}
?>