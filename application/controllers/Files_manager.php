<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Files_manager extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['user'] = $this->user_model->get_user_info($session_data['username']);
        }
    }
    
    public function displayFilesManager(){
        // below would better be in a model
        $html='';
        
        $data['files'] = $this->files_model->listFiles();
        
        $html.=$this->load->view('files_manager/display', $data, true); // returns view as data
        
        echo $html;
    }
    
    public function uploadImage()
    {
        error_log("test");
        if (!empty($_FILES))
        {
            $config['upload_path'] = "uploads/";
            $config['allowed_types'] = 'gif|jpg|png|bmp';
            $this->load->library('upload');
            
            $files= $_FILES;
            $number = count($_FILES['file']['name']);
            $errors = 0;
            for ($i = 0; $i < $number; $i++)
            {
                $_FILES['file']['name'] = $files['file']['name'][$i];
                $_FILES['file']['type'] = $files['file']['type'][$i];
                $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
                $_FILES['file']['error'] = $files['file']['error'][$i];
                $_FILES['file']['size'] = $files['file']['size'][$i];
                
                $this->upload->initialize($config);
                if (! $this->upload->do_upload("file")) {
                    $errors++;
                }
            }
            if ($errors > 0) {
                echo $errors . "File(s) cannot be uploaded";
            }
        }
    }
    
    public function addToDatabase($img){
        
    }
    
    public function deleteImage($id){
        
    }
    
    public function getImageId(){
        
    }
}
?>