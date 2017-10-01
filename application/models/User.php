<?php
Class User extends CI_Model
{
    function login($username, $password){
        $this->db->select('id, username, password, active');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', sha1($password));
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 1)
        {
            $user = $query->result();
            if($user[0]->active){
                return $user;
            }
            else{ // traiter ca dans controler
                $this->session->set_flashdata('danger', 'Votre compte n\'est pas activé');
                redirect(site_url().'/login');
            }
        }
        else
        {
            return false;
        }
    }
    
    function get_user_info($username){
        $this->db->from('users');
        $this->db->where('username', $username);
        $query = $this->db->get();
        
        return $query->row_array();
    }
    
    public function getUserInfoByEmail($email){
        $q = $this->db->get_where('users', array('mail' => $email), 1);
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found with mail '.$email);
            return false;
        }
    }
    
    public function getUserInfo($id){
        $q = $this->db->get_where('users', array('id' => $id), 1);
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }
    
    public function updatePassword($post){
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', array('password' => $post['password']));
        $success = $this->db->affected_rows();
        
        if(!$success){
            error_log('Impossible de mettre à jour le mot de passe updatePassword('.$post['user_id'].')');
            return false;
        }
        return true;
    }
    
    public function set_ip_user($id,$ip){
        $this->db->from('users');
        $this->db->where('id',$id);
        $this->db->set('ip',$ip);
        $this->db->update('users');
    }
    
    public function set_last_login($id){
        $this->db->from('users');
        $this->db->where('id',$id);
        $this->db->set('last',date('Y-m-d H:i:s'));
        $this->db->update('users');
    }
    
    public function maskUpdate($id){
        $this->db->from('users');
        $this->db->where('id',$id);
        $this->db->set('showUpdates',0);
        $this->db->update('users');
    }
    
    //  TOKENS
    
    public function insertToken($user_id){
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d H:i:s');
        
        $string = array(
        'token'=> $token,
        'user_id'=>$user_id,
        'created'=>$date
        );
        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token . $user_id;
        
    }
    
    public function isTokenValid($token){
        $tkn = substr($token,0,30);
        $uid = substr($token,30);
        
        $q = $this->db->get_where('tokens', array(
        'tokens.token' => $tkn,
        'tokens.user_id' => $uid), 1);
        
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            $created = $row->created;
            $time = new DateTime($created);
            $endTime = $time->modify("+15 minutes");
            $curTime = new DateTime();
            if($endTime < $curTime){
                return false;
            }
            
            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
            
        }else{
            return false;
        }
        
    }

    public function deleteUserToken($id){
        $this->db->from('tokens');
        $this->db->where('user_id', $id);
        $this->db->delete('tokens');
    }

    public function userGotToken($id){
        $this->db->from('tokens');
        $this->db->where('user_id', $id);
        if($this->db->count_all_results() != 0){
            // deja un token pour cet utilisateur
            $this->user_model->deleteUserToken($id);
        }
    }
    
    public function cleanBirthday(){
        $this->db->from('etudiants');
        $students = $this->db->get();
        
        foreach ($students->result_array() as $key => $student) {
            if(fnmatch('*ng*', $student['formation'])){
                echo "Ingésup trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                if(fnmatch('[Bb]1*', $student['group'])){
                    echo "B1 trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                    $b1++;
                    $this->db->from('etudiants');
                    $this->db->where('id',$student['id']);
                    $this->db->set('group',"B1 Ingésup");
                    $this->db->update('etudiants');
                }
                else if(fnmatch('[Bb]2*', $student['group'])){
                    echo "B2 trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                    $this->db->from('etudiants');
                    $this->db->where('id',$student['id']);
                    $this->db->set('group',"B2 Ingésup");
                    $this->db->update('etudiants');
                }
                else if(fnmatch('[Bb]3*', $student['group'])){
                    echo "B3 trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                    $this->db->from('etudiants');
                    $this->db->where('id',$student['id']);
                    $this->db->set('group',"B3 Ingésup");
                    $this->db->update('etudiants');
                }
                else if(fnmatch('[Mm]1*', $student['group'])){
                    echo "M1 trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                    $this->db->from('etudiants');
                    $this->db->where('id',$student['id']);
                    $this->db->set('group',"M1 Ingésup");
                    $this->db->update('etudiants');
                }
                else if(fnmatch('[Mm]2*', $student['group'])){
                    echo "M2 trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                    $this->db->from('etudiants');
                    $this->db->where('id',$student['id']);
                    $this->db->set('group',"M2 Ingésup");
                    $this->db->update('etudiants');
                }
                else{
                    echo "UNDEFINED STUDENT ".$student['Nom']." ".$student['Prénom']."<br/>";
                }
            }
            else if(fnmatch('*ESSC*', $student['formation'])){
                echo "ESSCA trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                $this->db->from('etudiants');
                $this->db->where('id',$student['id']);
                $this->db->set('group',"B3 ESSCA");
                $this->db->update('etudiants');
            }
            else if(fnmatch('*Lim*', $student['formation'])){
                echo "Lim'Art trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                if((fnmatch('*MANAA*', $student['group']))||(fnmatch('*[Bb]1*', $student['group']))){
                    echo "MANAA B1 trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                    $this->db->from('etudiants');
                    $this->db->where('id',$student['id']);
                    $this->db->set('group',"MANAA");
                    $this->db->update('etudiants');
                }
                else if(fnmatch('*[Bb]2*', $student['group'])){
                    echo "Lim B2 trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                    $this->db->from('etudiants');
                    $this->db->where('id',$student['id']);
                    $this->db->set('group',"B2 Lim'Art");
                    $this->db->update('etudiants');
                }
                else if(fnmatch('*[Bb]3*', $student['group'])){
                    echo "Lim B3 trouvé : ".$student['Nom']." ".$student['Prénom']."<br/>";
                    $this->db->from('etudiants');
                    $this->db->where('id',$student['id']);
                    $this->db->set('group',"B3 Lim'Art");
                    $this->db->update('etudiants');
                }
            }
        }
        echo $b1;
    }
}
?>