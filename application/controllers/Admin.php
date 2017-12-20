<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper('form');
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['user'] = $this->user_model->get_user_info($session_data['username']);
        }
    }
    
    // Panel admin
    public function index(){
        $this->session->unset_userdata('search');
        $this->session->unset_userdata('birthday_search');
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['current_config'] = $this->data_model->get_config_tv("news");
            $data['config'] = $data['current_config'];
            $data['username'] = $session_data['username'];
            $data['user'] = $this->user_model->get_user_info($session_data['username']);
            
            $data['nb_news'] = $this->data_model->count_data('news');
            $data['nb_news_bde'] = $this->data_model->count_data('news_bde');
            $data['nb_photos'] = $this->data_model->count_data('photos');
            $data['nb_users'] = $this->data_model->count_data('users');
            $data['nb_birthdays'] = $this->data_model->count_data('birthday');
            $temp = $this->data_model->get_config_tv("news");

            $this->template->set('title', 'Administration');
            $this->template->load('templates/admin', 'admin/admin', $data);
        }
        else{
            redirect('login', 'refresh');
        }
    }
    
    // Administrer les diferents items
    public function liste($item_type,$album_id = null){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            if($value = $this->input->post('search')){
                $value = $this->input->post('search');
                $this->session->set_userdata('search', $value);
            }
            
            $db = $this->data_model->select_db($item_type);
            $data['current_config'] = $this->data_model->get_config_tv('news');
            $data['config'] = $data['current_config'];
            $data['item_type'] = $item_type;
            
            if($item_type == 'album'){
                $data['nb_album'] = $this->data_model->count_data($db);
                $data['nb_photos'] = $this->data_model->count_data('photos');
            }
            elseif($item_type == 'photos' && $album_id != ""){
                $data['album_id'] = $album_id;
                $data['content_album'] = $this->data_model->get_album($album_id);
                $data['photos'] = $this->data_model->get_photos_from_album($album_id);
            }
            elseif($item_type == 'birthday'){
                $data['groups'] = $this->data_model->get_birthday_groups_list();
                if($this->input->post('search')){
                $value = $this->input->post('search');
                $this->session->set_userdata('birthday_search', $value);
                }
                elseif ($this->input->post('group')) {
                    if($this->input->post('group') == "all"){
                        $this->session->unset_userdata('search');
                        $this->session->unset_userdata('birthday_search');
                    }
                    else{
                        $value = $this->input->post('group');
                        $this->session->set_userdata('birthday_search', $value);
                    }
                }
            }
            elseif($item_type == "screens"){
                
            }
            
            $this->load->library('pagination');
            
            $config['base_url'] = site_url('liste/'.$item_type.'/');
            $config['total_rows'] = $this->data_model->count_data($db);
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            
            if($this->uri->segment(3)){
                $from = ($this->uri->segment(3)) ;
            }
            else{
                $from = 0;
            }
            $size = $config['per_page'];
            $this->pagination->initialize($config);
            
            $data['liste_items']= $this->data_model->list_data($item_type,$from,$size,$value);
            $data['from'] = $from;
            
            $this->template->set('title', 'Liste');
            $this->template->load('templates/admin', 'admin/liste', $data);
        }
        else{
            redirect('login', 'refresh');
        }
    }
    
    public function album(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['liste_items']= $this->data_model->album();
            $data['current_config'] = $this->data_model->get_config_tv('news');
            $this->template->set('title', 'Liste');
            $this->template->load('templates/admin', 'albums', $data);
        }
        else{
            redirect('login', 'refresh');
        }
    }
    
    // Ajout d'entrées, voir le controler data pour l'insertion en DB
    public function add($item_type,$album_id = null){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['item_type'] = $item_type;
            $data['current_config'] = $this->data_model->get_config_tv('news');
            $data['config'] = $data['current_config'];
            if($item_type == 'photos' && $album_id != ""){
                $data['album_id'] = $album_id;
                $data['content_album'] = $this->data_model->get_album($album_id);
            }
            else if($item_type == 'user'){
                $data['groups'] = $this->data_model->get_groups_list(); //user groups
            }
            else if($item_type == 'birthday'){
                $data['groups'] = $this->data_model->get_birthday_groups_list(); //class groups
            }
            $this->template->set('title', 'Ajout');
            $this->template->load('templates/admin', 'admin/add', $data);
        }
        else{
            redirect('login', 'refresh');
        }
    }
    
    // Edition de news, voir le controler data pour l'update de la DB
    public function edit($item_type,$id){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['current_data'] = $this->data_model->get_data($item_type,$id);
            $data['current_config'] = $this->data_model->get_config_tv('news');
            $data['config'] = $data['current_config'];
            if($item_type == 'news' || $item_type == 'bde'){
                if($data['current_data']['text_type'] == 'JSON'){
                    $video_datas = $data['current_data']['texte'];
                    $video_id = json_decode($video_datas)->videoId;
                    $data['current_data']['texte'] = 'https://www.youtube.com/watch?v='.$video_id;
                }
            }
            else if($item_type == 'user'){
                $data['groups'] = $this->data_model->get_groups_list();
            }
            else if($item_type == 'birthday'){
                $data['groups'] = $this->data_model->get_birthday_groups_list(); //class groups
            }
            $data['item_type'] = $item_type;
            $this->template->set('title', 'Edition');
            $this->template->load('templates/admin', 'admin/edit', $data);
        }else{
            redirect('login', 'refresh');
        }
    }
    
    // Configuration generale
    public function config(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['current_config'] = $this->data_model->get_config_tv("news");
            $data['config'] = $data['current_config'];
            $data['configs'] = $this->data_model->get_config();
            $this->template->set('title', 'Config');
            $this->template->load('templates/admin', 'admin/config', $data);
        }
        else{
            redirect('login', 'refresh');
        }
    }
    
    // Configuration des ecrans d'affichage (news,bde,albumphoto)
    public function tv_config($item_type){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['item_type'] = $item_type;
            $data['current_config'] = $this->data_model->get_config_tv($item_type);
            $data['config'] = $data['current_config'];
            $data['modules'] = $this->data_model->modules();
            $data['animationsIn'] = $this->data_model->animations('in');
            $data['animationsOut'] = $this->data_model->animations('out');
            $this->template->set('title', 'Config');
            $this->template->load('templates/admin', 'tv_config', $data);
        }
        else{
            redirect('login', 'refresh');
        }
    }
    
    // Affichage du changelog
    public function changelog(){
        $session_data = $this->session->userdata('logged_in');
        $data['current_config'] = $this->data_model->get_config_tv("news");
        $data['config'] = $data['current_config'];
        $data['username'] = $session_data['username'];
        $data['configs'] = $this->data_model->get_config();
        $this->template->set('title', 'Changelog');
        $this->template->load('templates/admin', 'changelog', $data);
    }
    
    // Affichage de la page de maintenance
    public function maintenance(){
        $this->load->view('errors/maintenance');
    }
    
    // Affichage de la page d'erreur 404'
    public function error404(){
        $this->load->view('errors/404');
    }
    
    // Fonction de deconexion
    public function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('admin', 'refresh');
    }
    
    public function maskUpdates($id){
        $this->user_model->maskUpdate($id);
        redirect('admin', 'refresh');
    }

    public function clearSearch(){
        $this->session->unset_userdata('search');
        $this->session->unset_userdata('birthday_search');
        redirect($_SERVER['HTTP_REFERER']);
    }

	public function graduate_group($id){
        $class = $this->data_model->get_student_class($id);
        switch ($class) {
            case 1:
                $class = 2;
				$this->data_model->update_student($id,$class);
				return true;
                break;
            case 2:
                $class = 3;
				$this->data_model->update_student($id,$class);
				return true;
                break;
            case 3:
                $class = 4;
				$this->data_model->update_student($id,$class);
				return true;
                break;
            case 4:
                $class = 5;
				$this->data_model->update_student($id,$class);
				return true;
                break;
			case 5:
				return false;
                break;
            case 6:
                $class = 7;
				$this->data_model->update_student($id,$class);
				return true;
                break;
            case 7:
                $class = 8;
				$this->data_model->update_student($id,$class);
				return true;
                break;
			case 8:
				return false;
                break;
			default:
				return false;
                break;
        }
	}
	
	public function graduate_selection(){
		$success = 0;
		$fail = 0;
		if(isset($_POST['group'])){
			foreach ($_POST['group'] as $key => $value) {
				if($this->graduate_group($value) == true)
					$success++;
				else
					$fail++;
			}
			if($success>0)
				$this->session->set_flashdata('message_success', $success.' étudiant promus');
			if($fail>0)
				$this->session->set_flashdata('message_warning', $fail.' étudiant non promus');
		}
		else{
			$this->session->set_flashdata('message_warning', 'Aucun étudiant séléctionné');
		}
		//die();
		redirect($_SERVER['HTTP_REFERER']);
    }

    public function graduate_student($id){
        $class = $this->data_model->get_student_class($id);
        switch ($class) {
            case 1:
                $class = 2;
				$this->data_model->update_student($id,$class);
                break;
            case 2:
                $class = 3;
				$this->data_model->update_student($id,$class);
                break;
            case 3:
                $class = 4;
				$this->data_model->update_student($id,$class);
                break;
            case 4:
                $class = 5;
				$this->data_model->update_student($id,$class);
                break;
			case 5:
                break;
            case 6:
                $class = 7;
				$this->data_model->update_student($id,$class);
                break;
            case 7:
                $class = 8;
				$this->data_model->update_student($id,$class);
                break;
			case 8:
                break;
			default:
                break;
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete_selection(){
		$success = 0;
		if(isset($_POST['group'])){
			foreach ($_POST['group'] as $key => $value) {
                $this->data_model->delete('birthday',$value);
                $success++;
			}
			if($success>0)
				$this->session->set_flashdata('message_success', $success.' étudiant supprimés');
		}
		else{
			$this->session->set_flashdata('message_warning', 'Aucun étudiant séléctionné');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

    public function multiple_birthday(){
        if(isset($_POST['delete'])){
            $this->delete_selection();
        }
        elseif (isset($_POST['graduate'])) {
            $this->graduate_selection();
        }
    }

    public function cleanBirthday(){
        $this->db->from('birthdays2');
        $students = $this->db->get();
        $b1=0;
        foreach ($students->result_array() as $key => $student) {
            if(fnmatch('*equi*', $student['group'])){
                echo "Equipe trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                $this->db->from('birthdays2');
                $this->db->where('id',$student['id']);
                $this->db->set('group',"Staff");
                $this->db->update('birthdays2');
            }
            else if(fnmatch('*Lim*', $student['group'])){
                echo "Lim'Art trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                if((fnmatch('*MANAA*', $student['group']))||(fnmatch('*[Bb]1*', $student['group']))){
                    echo "MANAA B1 trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                    $this->db->from('birthdays2');
                    $this->db->where('id',$student['id']);
                    $this->db->set('group',"MANAA");
                    $this->db->update('birthdays2');
                }
                else if(fnmatch('*[Bb]2*', $student['group'])){
                    echo "Lim B2 trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                    $this->db->from('birthdays2');
                    $this->db->where('id',$student['id']);
                    $this->db->set('group',"B2 Lim'Art");
                    $this->db->update('birthdays2');
                }
                else if(fnmatch('*[Bb]3*', $student['group'])){
                    echo "Lim B3 trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                    $this->db->from('birthdays2');
                    $this->db->where('id',$student['id']);
                    $this->db->set('group',"B3 Lim'Art");
                    $this->db->update('birthdays2');
                }
            }else {
                echo "Ingésup trouvé : " . $student['Nom'] . " " . $student['Prénom'] . "<br/>";
                if (fnmatch('[Bb]1*', $student['group'])) {
                    echo "B1 trouvé : " . $student['Nom'] . " " . $student['Prénom'] . "<br/>";
                    $b1++;
                    $this->db->from('birthdays2');
                    $this->db->where('id', $student['id']);
                    $this->db->set('group', "B1 Ingésup");
                    $this->db->update('birthdays2');
                } else if (fnmatch('[Bb]2*', $student['group'])) {
                    echo "B2 trouvé : " . $student['Nom'] . " " . $student['Prénom'] . "<br/>";
                    $this->db->from('birthdays2');
                    $this->db->where('id', $student['id']);
                    $this->db->set('group', "B2 Ingésup");
                    $this->db->update('birthdays2');
                } else if (fnmatch('[Bb]3*', $student['group'])) {
                    echo "B3 trouvé : " . $student['Nom'] . " " . $student['Prénom'] . "<br/>";
                    $this->db->from('birthdays2');
                    $this->db->where('id', $student['id']);
                    $this->db->set('group', "B3 Ingésup");
                    $this->db->update('birthdays2');
                } else if (fnmatch('[Mm]1*', $student['group'])) {
                    echo "M1 trouvé : " . $student['Nom'] . " " . $student['Prénom'] . "<br/>";
                    $this->db->from('birthdays2');
                    $this->db->where('id', $student['id']);
                    $this->db->set('group', "M1 Ingésup");
                    $this->db->update('birthdays2');
                } else if (fnmatch('[Mm]2*', $student['group'])) {
                    echo "M2 trouvé : " . $student['Nom'] . " " . $student['Prénom'] . "<br/>";
                    $this->db->from('birthdays2');
                    $this->db->where('id', $student['id']);
                    $this->db->set('group', "M2 Ingésup");
                    $this->db->update('birthdays2');
                } else {
                    echo "UNDEFINED STUDENT " . $student['Nom'] . " " . $student['Prénom'] . "<br/>";
                }
            }

        }
        echo $b1;
    }

    public function updateApplication(){
        $result = array();
        $command = 'git pull';
        exec($command, $result);
        if($result[sizeof($result)-1] == "Already up-to-date."){
            $this->session->set_flashdata('success','Application déja à jour');
            redirect('admin', 'refresh');
        }
        else{
            $this->session->set_flashdata('success','Mise à jour effectuée');
            redirect('admin', 'refresh');
        }
    }

    public function saveApplication(){
        $output = shell_exec('./var/www/html/backup.sh');
        var_dump($output);
    }
}

?>