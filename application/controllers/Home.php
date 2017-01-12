<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); désactivé car beug boucle infinie
class Home extends CI_Controller {
 
	function __construct()
	 {
		 parent::__construct();
		 $this->load->helper('url');
		 $this->load->model('Welcome_model','welcome');

	 }

	public function index(){

		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$this->load->helper('date');
		$this->load->view('templates/header');
		$this->load->view('index');
	}	
	
	public function bde(){

		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$this->load->helper('date');
		$this->load->view('templates/header_bde');
		$this->load->view('index_bde');
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
	   redirect('home/admin', 'refresh');
	 }

	//  Affichage liste news
    public function liste()
    {
		   if($this->session->userdata('logged_in'))
		   {
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$this->data['view_data']= $this->welcome->view_data();
				$this->load->helper('date');
				$this->load->view('templates/header');
				$this->load->view('liste_news', $this->data, FALSE);
				$this->load->view('templates/footer',$data);
		   }
		   else
		   {
			 redirect('login', 'refresh');
		   }
  
	} 
	
	public function liste_bde()
    {
		   if($this->session->userdata('logged_in'))
		   {
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$this->data['view_data']= $this->welcome->view_data_bde();
				$this->load->helper('date');
				$this->load->view('templates/header');
				$this->load->view('liste_news_bde', $this->data, FALSE);
				$this->load->view('templates/footer',$data);
		   }
		   else
		   {
			 redirect('login', 'refresh');
		   }
  
	}
	
    // Ajout de news
    public function add_data()
    {
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->load->helper('date');
			$this->load->view('templates/header');
			$this->load->view('add');
			$this->load->view('templates/footer',$data);
	    }
		else{
			 redirect('login', 'refresh');
		}
    }
	
	public function add_data_bde()
    {
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->load->helper('date');
			$this->load->view('templates/header');
			$this->load->view('add_bde');
			$this->load->view('templates/footer',$data);
	    }
		else{
			 redirect('login', 'refresh');
		}
    }
    
    // Insert news
    public function submit_data()
    {
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			
			$config['upload_path'] = 'uploads/';
        	$config['allowed_types'] = 'gif|jpg|png|jpeg';
        	$this->load->library('upload', $config);
        	$this->upload->do_upload('imageup');
        	$data_upload_files = $this->upload->data();

         	$image = $data_upload_files[full_path];
			$file = basename($image);
			if($file == 'uploads'){
				$file = 'default/white.png';
			}
			
			$data = array('titre'                   => $this->input->post('titre'),
						  'auteur'                  => $data['username'],
						  'visible'                 => $this->input->post('visible'),
						  'afficher_titre'                 => $this->input->post('afficher_titre'),
						  'texte'                   => $this->input->post('texte'),
						  'date'              		=> date("Y-m-d h:i:s"),
						  'image'				=> $file);

			$insert = $this->welcome->insert_data($data);
			$this->session->set_flashdata('message', 'News créée avec succés');
			redirect('home/liste');
		}
		else{
			redirect('login', 'refresh');
		}
    }
	
	public function submit_data_bde()
    {
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			
			$config['upload_path'] = 'uploads/';
        	$config['allowed_types'] = 'gif|jpg|png|jpeg';
        	$this->load->library('upload', $config);
        	$this->upload->do_upload('imageup');
        	$data_upload_files = $this->upload->data();

         	$image = $data_upload_files[full_path];
			$file = basename($image);
			if($file == 'uploads'){
				$file = 'default/white.png';
			}
			
			$data = array('titre'                   => $this->input->post('titre'),
						  'auteur'                  => $data['username'],
						  'visible'                 => $this->input->post('visible'),
						  'afficher_titre'                 => $this->input->post('afficher_titre'),
						  'texte'                   => $this->input->post('texte'),
						  'date'              		=> date("Y-m-d h:i:s"),
						  'image'				=> $file);

			$insert = $this->welcome->insert_data_bde($data);
			$this->session->set_flashdata('message', 'News créée avec succés');
			redirect('home/liste_bde');
		}
		else{
			redirect('login', 'refresh');
		}
    }
	
    // liste news

    public function edit_data($id)
    {
		if($this->session->userdata('logged_in'))
   {
    $session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    $this->data['edit_data']= $this->welcome->edit_data($id);
	$this->load->helper('date');
	$this->load->view('templates/header');
    $this->load->view('edit', $this->data, FALSE);
	$this->load->view('templates/footer',$data);
	   	    }
		   else
		   {
			 redirect('login', 'refresh');
		   }
    }    
	public function edit_data_bde($id)
    {
		if($this->session->userdata('logged_in'))
   {
    $session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    $this->data['edit_data']= $this->welcome->edit_data_bde($id);
	$this->load->helper('date');
	$this->load->view('templates/header');
    $this->load->view('edit_bde', $this->data, FALSE);
	$this->load->view('templates/footer',$data);
	   	    }
		   else
		   {
			 redirect('login', 'refresh');
		   }
    }
	
    // Edition de news
    public function update_data($id)
    {
				if($this->session->userdata('logged_in'))
   {
	$session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    $data = array('titre'                    => $this->input->post('titre'),
                  'visible'                  => $this->input->post('visible'),
                  'afficher_titre'                 => $this->input->post('afficher_titre'),
                  'texte'                    => $this->input->post('texte'));
    $this->db->where('id', $id);
    $this->db->update('news', $data);
    $this->session->set_flashdata('message', 'News mise à jour avec succés');
    redirect('home/liste');
	   	   	    }
		   else
		   {
			 redirect('login', 'refresh');
		   }
    }    
	public function update_data_bde($id)
    {
				if($this->session->userdata('logged_in'))
   {
	$session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    $data = array('titre'                    => $this->input->post('titre'),
                  'visible'                  => $this->input->post('visible'),
                  'afficher_titre'                 => $this->input->post('afficher_titre'),
                  'texte'                    => $this->input->post('texte'));
    $this->db->where('id', $id);
    $this->db->update('news_bde', $data);
    $this->session->set_flashdata('message', 'News mise à jour avec succés');
    redirect('home/liste_bde');
	   	   	    }
		   else
		   {
			 redirect('login', 'refresh');
		   }
    }

    //Supression de news
    public function delete_data($id)
    {  
    $this->db->where('id', $id);
    $this->db->delete('news');
    $this->session->set_flashdata('message', 'News supprimée avec succés');
    redirect('home/liste');
    }    
	public function delete_data_bde($id)
    {  
    $this->db->where('id', $id);
    $this->db->delete('news_bde');
    $this->session->set_flashdata('message', 'News supprimée avec succés');
    redirect('home/liste_bde');
    }	
	public function update_state($id,$state)
    {  
    $this->db->where('id', $id);
    $this->db->set('visible', $state, FALSE);
	$this->db->update('news');
    $this->session->set_flashdata('message', 'News actualisée avec succés');
    redirect('home/liste');
    }	
	public function update_state_bde($id,$state)
    {  
    $this->db->where('id', $id);
    $this->db->set('visible', $state, FALSE);
	$this->db->update('news_bde');
    $this->session->set_flashdata('message', 'News actualisée avec succés');
    redirect('home/liste_bde');
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