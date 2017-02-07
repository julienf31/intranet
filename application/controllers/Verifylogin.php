<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('date');
 }

 function index()
 {
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
      $data['current_config'] = $this->data_model->get_config_tv("news");
      $this->template->set('title', 'Login');
      $this->template->load('templates/admin', 'login', $data);
   }
   else
   {
     redirect('admin', 'refresh');
   }

 }

 function check_database($password)
 {
   $username = $this->input->post('username');

   $result = $this->user_model->login($username, $password);
   if($result){
    $sess_array = array('id' => $result[0]->id,'username' => $result[0]->username);
    $this->session->set_userdata('logged_in', $sess_array);
    return TRUE;
  }
    else
   {
     $this->form_validation->set_message('check_database', 'Mauvais identifiant ou mot de passe');
     return false;
   }
 }
}
?>