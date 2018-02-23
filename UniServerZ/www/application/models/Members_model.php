<?php
class Members_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($username,$password)
    {
        $query = $this->db->get_where('username', array('userName' => $username), 1);
        $result= $query->result();
        return $this->verify($result, $password);
    }
    private function verify($result,$password){
        foreach($result as $row) {
            $hash = $row->pass;
            $verify = password_verify($password, $hash);

            if (empty($verify))
                return FALSE;
            else return $result;
        }
        return FALSE;
    }
}