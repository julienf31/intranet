<?php
Class User extends CI_Model
{
    function login($username, $password){
        $this->db->select('id, username, password');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 1)
        {
            return $query->result();
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
            error_log('no user found getUserInfo('.$email.')');
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
            error_log('Unable to updatePassword('.$post['user_id'].')');
            return false;
        }        
        return true;
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
            $createdTS = strtotime($created);
            $today = date('Y-m-d H:m:s'); 
            $todayTS = strtotime($today);
            

            // faire comparaison pour expiration
            if($createdTS != $todayTS){
                return false;
            }
            
            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
            
        }else{
            return false;
        }
        
    }   
}
?>