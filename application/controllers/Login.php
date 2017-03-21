<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('date');
   $this->load->helper(array('form'));
 }

 function index()
 {
	if($this->session->userdata('logged_in')){
		$session_data = $this->session->userdata('logged_in');
		redirect('admin', 'refresh');
	} else {
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['current_config'] = $this->data_model->get_config_tv("news");
		$this->template->set('title', 'Login');
		$this->template->load('templates/admin', 'login', $data);
 	}
}

}

?>