<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login_model extends CI_Model
{

    public function check($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$username);
        $this->db->where('password', $password);
        $query = $this->db->get();

        return $query->row();
    }

}
