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

	$session_data = $this->session->userdata('logged_in');
	$data['username'] = $session_data['username'];
	$this->load->view('templates/header');
	$this->load->view('login');
	$this->load->view('templates/footer', $data);
 }

}

?>