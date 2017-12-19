<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('date', 'form'));
    }

    function index()
    {
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            redirect('admin', 'refresh');
        } else {
            $data['screens'] = $this->data_model->get_tv_aivalable();
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['current_config'] = $this->data_model->get_config_tv("news");
            $data['config'] = $this->data_model->get_config_tv("news");
            $data['current_config']['moduleCentre'] = 'infoNoTrust';
            
            $this->form_validation->set_rules('emailforgot', 'Email', 'required|valid_email');
            if($this->form_validation->run() == FALSE) {
            }else{
                $email = $this->input->post('emailforgot');
                $clean = $this->security->xss_clean($email);
                $userInfo = $this->user_model->getUserInfoByEmail($clean);
                if(!$userInfo){
                    $this->session->set_flashdata('forgot_error', 'Nous ne trouvons pas de compte associé à cette adresse mail');
                    log_message('error', 'Email not found in database : '.$email);
                    redirect(site_url().'/login');
                }
                $this->user_model->userGotToken($userInfo['id']);
                //build token
                $token = $this->user_model->insertToken($userInfo['id']);
                $qstring = $this->base64url_encode($token);
                $link = site_url() . '/login/reset_password/token/' . $qstring;

                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => getenv('MAIL_REPORT'),
                    'smtp_pass' => getenv('MAIL_PASSWD'),
                    'mailtype'  => 'html',
                    'charset'   => 'utf8'
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                
                //$this->email->from(getenv('MAIL_REPORT'), 'Site YNOV');
                $this->email->from(getenv('MAIL_REPORT'), 'Télés YNOV Toulouse');
                $this->email->to($clean);

                $this->email->subject('Demande de changement de votre mot de passe');



                $datamail['config'] = $this->data_model->get_config_tv("news");
                $datamail['user'] = $this->user_model->getUserInfoByEmail($email);
                $datamail['link'] = $link;

                $filename = base_url().'uploads/'.$data['config']['logo'];
                $this->email->attach($filename,'inline');
                $datamail['img'] = $this->email->attachment_cid($filename);

                $message = $this->load->view('mail/forgot', $datamail, true);

                $this->email->message($message);

                $this->email->send();
                //log_message('error', 'Mail send to :'.$email.' to reset password');
                $this->session->set_flashdata('success', 'Un e-mail à été envoyé pour réinitialiser votre mot de passe');
                redirect(site_url().'/login');
            }
        }
        
        $this->template->set('title', 'Login');
        $this->template->load('templates/admin', 'login', $data);
    }
    
    public function reset_password()
    {
        $token = $this->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);
        
        $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();
        
        if(!$user_info){
            $this->session->set_flashdata('danger', 'Votre clef est érronée ou à expirée. Demandez un nouveau changement.');
            redirect(site_url().'/login');
        }
        $data = array(
        'firstName'=> $user_info->username,
        'email'=>$user_info->mail,
        'token'=>$this->base64url_encode($token)
        );
        $this->session->set_flashdata('success', 'Votre mot de passe à été modifié, vous pouvez désormais vous connecter');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        
        if ($this->form_validation->run() == FALSE) {
            $data['current_config'] = $this->data_model->get_config_tv("news");
            $this->template->set('title', 'Changez votre mot de passe');
            $this->template->load('templates/admin', 'reset_password', $data);
        }else{
            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $hashed = sha1($cleanPost['password']);
            $cleanPost['password'] = $hashed;
            $cleanPost['user_id'] = $user_info->id;
            unset($cleanPost['passconf']);
            if(!$this->user_model->updatePassword($cleanPost)){
                $this->session->set_flashdata('danger', 'Nous avons rencontrer une erreur lors de la modification de votre mot de passe, veuillez réessayer');
            }else{
                $this->session->set_flashdata('success', 'Votre mot de passe à été modifié, vous pouvez désormais vous connecter');
                $this->user_model->deleteUserToken($user_info->id);
            }
            redirect(site_url().'/login');
        }
    }
    
    public function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
    
    public function base64url_decode($data) {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
    
}

?>