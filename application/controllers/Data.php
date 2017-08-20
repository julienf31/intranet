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
    public function insert($item_type,$album_id = null){
        $data['current_config'] = $this->data_model->get_config_tv($item_type);
        
        // insert action
        if (isset($_POST['send-btn'])){
            $session_data = $this->session->userdata('logged_in');
            if($session_data){
                if($item_type == 'photos'){
                    // Regarder controler pour multiple upload
                    $data['username'] = $session_data['username'];
                    $this->upload->do_upload('imageup');
                    $data_upload_files = $this->upload->data();
                    $image = $data_upload_files['full_path'];
                    $file = basename($image);
                    if ($this->input->post('img_select') == 'url') {
                        $data = array(
                        'album_id' => $album_id,
                        'name' => $this->input->post('nom'),
                        'created_by' => $data['username'],
                        'created' => date("Y-m-d h:i:s"),
                        'type' => 'url',
                        'url' => $this->input->post('image_url'),
                        'show_photo' => $this->input->post('visible'));
                    }
                    elseif ($this->input->post('img_select') == 'upload'){
                        $data = array(
                        'album_id' => $album_id,
                        'name' => $this->input->post('nom'),
                        'created_by' => $data['username'],
                        'created' => date("Y-m-d h:i:s"),
                        'type' => 'file',
                        'url' => $file,
                        'show_photo' => $this->input->post('visible')
                        );
                    }
                    $this->data_model->insert_data($item_type,$data);
                    $this->session->set_flashdata('message_success', 'Photo ajoutée à l\'album avec succés');
                    $link='liste/'.$item_type.'/'.$album_id;
                    redirect($link);
                }
                elseif($item_type == 'album'){
                    $data['username'] = $session_data['username'];
                    $this->upload->do_upload('imageup');
                    $data_upload_files = $this->upload->data();
                    $image = $data_upload_files['full_path'];
                    $file = basename($image);
                    $data = array(
                    'name' => $this->input->post('name'),
                    'url' => $file,
                    'desc' => $this->input->post('desc'),
                    'show_album' => 1,
                    'created' => date("Y-m-d h:i:s"),
                    'created_by' => $data['username']
                    );
                    $this->data_model->insert_data($item_type,$data);
                    $this->session->set_flashdata('message_success', 'Album créé avec succés');
                    $link='liste/'.$item_type;
                    redirect($link);
                }
                elseif($item_type == 'user'){
                    $data['username'] = $session_data['username'];
                    $active=$this->input->post('active');
                    if($active == null){
                        $active=0;
                    }
                    else{
                        $active=1;
                    }
                    $data = array(
                    'username' => $this->input->post('username'),
                    'password' => sha1($this->input->post('password')),
                    'group' => $this->input->post('group'),
                    'mail' => $this->input->post('mail'),
                    'active' => $active
                    );
                    $this->data_model->insert_data($item_type,$data);
                    $this->session->set_flashdata('message_success', 'Utilisateur ajouté avec succés');
                    $link='liste/'.$item_type;
                    redirect($link);
                }
                elseif($item_type == 'birthday'){
                    $data['username'] = $session_data['username'];
                    $data = array(
                    'Nom' => $this->input->post('name'),
                    'Prénom' => $this->input->post('surname'),
                    'group' => $this->input->post('class'),
                    'date' => $this->input->post('birthdate'),
                    );
                    $this->data_model->insert_data($item_type,$data);
                    $this->session->set_flashdata('message_success', 'Anniversaire ajouté avec succés');
                    $link='liste/'.$item_type;
                    redirect($link);
                }
                else{
                    //Si news :
                    $data['username'] = $session_data['username'];
                    $this->insert_news($item_type,$data);
                }
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
    
    public function insert_news($item_type,$data){
        // essayer de casser les fonctions
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
    
    public function update($item_type, $id, $text_type = null){
        $data['current_config'] = $this->data_model->get_config_tv($item_type);
        if (isset($_POST['send-btn'])) {
            if($item_type == 'album'){
                $this->upload->do_upload('imageup');
                $data_upload_files = $this->upload->data();
                $image = $data_upload_files['full_path'];
                $file = basename($image);
                $data = array(
                'name' => $this->input->post('name'),
                'url' => $file,
                'desc' => $this->input->post('desc')
                );
                $this->data_model->update_data($item_type,$id,$data);
                $this->session->set_flashdata('message_success', 'Album edité avec succés');
                $link='liste/'.$item_type;
                redirect($link);
            }
            else if($item_type == 'user'){
                $active=$this->input->post('active');
                if($active == null){
                    $active=0;
                }
                else{
                    $active=1;
                }
                $data = array(
                'username' => $this->input->post('username'),
                'group' => $this->input->post('group'),
                'mail' => $this->input->post('mail'),
                'active' => $active
                );
                $this->data_model->update_data($item_type,$id,$data);
                $this->session->set_flashdata('message_success', 'Utilisateur modifié avec succés');
                $link='liste/'.$item_type;
                redirect($link);
            }
            else if($item_type == 'birthday'){
                $data = array(
                'Prénom' => $this->input->post('surname'),
                'Nom' => $this->input->post('name'),
                'group' => $this->input->post('group'),
                'date' => $this->input->post('birthdate')
                );
                $this->data_model->update_data($item_type,$id,$data);
                $this->session->set_flashdata('message_success', 'Utilisateur modifié avec succés');
                $link='liste/'.$item_type;
                redirect($link);
            }
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
                
                $preview_data = array(
                'titre'                   => $this->input->post('titre'),
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
            // ?
        }
        
    }
    
    public function update_config_tv($item_type){
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
    
    public function update_state($item_type,$id,$state,$album_id = null){
        $this->data_model->update_state($item_type,$id,$state);
        if($item_type == 'photos'){
            $this->session->set_flashdata('message_success', 'Photo actualisée avec succés');
            $link='liste/'.$item_type.'/'.$album_id;
        }
        elseif($item_type == 'album'){
            $this->session->set_flashdata('message_success', 'Album actualisé avec succés');
            $link='liste/'.$item_type;
        }
        elseif($item_type == 'news' || $item_type == 'bde'){
            $this->session->set_flashdata('message_success', 'News actualisée avec succés');
            $link='liste/'.$item_type;
        }
        elseif($item_type == 'user'){
            $this->session->set_flashdata('message_success', 'Utilisateur actualisé avec succés');
            $link='liste/'.$item_type;
        }
        elseif($item_type == 'screens'){
            if($state == 1){
                $this->session->set_flashdata('message_success', 'Mode maintenance activé');                
            }
            else{
                $this->session->set_flashdata('message_success', 'Mode maintenance désactivé');  
            }
            $link='liste/'.$item_type;
        }
        redirect($link);
    }
    
    public function delete($item_type,$id,$album_id = null){
        $this->data_model->delete($item_type,$id);
        if($item_type == 'photos'){
            $this->session->set_flashdata('message_danger', 'Photo supprimée avec succés');
            $link='liste/'.$item_type.'/'.$album_id;
        }
        elseif($item_type == 'album'){
            $this->session->set_flashdata('message_danger', 'Album supprimé avec succés');
            $link='liste/'.$item_type;
        }
        elseif($item_type == 'user'){
            $this->session->set_flashdata('message_danger', 'Utilisateur supprimé avec succés');
            $link='liste/'.$item_type;
        }
        elseif($item_type == 'birthday'){
            $this->session->set_flashdata('message_danger', 'Anniversaire supprimé avec succés');
            $link='liste/'.$item_type;
        }
        else{
            $this->session->set_flashdata('message_danger', 'News supprimée avec succés');
            $link='liste/'.$item_type;
        }
        redirect($link);
    }
    
    public function report_bug(){
        $comment = isset($_REQUEST['comment']) ? $_REQUEST['comment'] : '';
        $screenshot =  isset($_REQUEST['screenshot']) ? $_REQUEST['screenshot'] : false;
        
        if($screenshot) $screenshot = $this->base64_to_jpg($screenshot, time().'_'.rand(0,30).'.jpg');
        
        echo json_encode(array('result' => 'success'));
        
        $session_data = $this->session->userdata('logged_in');
        if($session_data)
        {
            $username = $session_data['username'];
        }
        else $username = 'unlogged';
            $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => getenv('MAIL_REPORT'),
        'smtp_pass' => getenv('MAIL_PASSWD'),
        'mailtype'  => 'html',
        'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        
        $this->email->from(getenv('MAIL_REPORT'), 'BUG REPORT : '.$username);
        $this->email->to('julien.fournier.69@gmail.com, clem_ios@hotmail.com');
        $atach = FCPATH.$screenshot;
        $this->email->subject('Bug report');
        $this->email->message($comment);
        $this->email->attach($screenshot);
        
        $this->email->send();
    }
    
    public function base64_to_jpg($string, $file) {
        $fp = fopen($file, "wb");
        $data = explode(',', $string);
        fwrite($fp, base64_decode($data[1]));
        fclose($fp);
        return $file;
    }
}
?>