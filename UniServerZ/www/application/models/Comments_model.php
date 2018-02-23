<?php
class Comments_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function load_comments($pageid){
        $this->db->select('ID,theComment,userID,pageID,username.userAlias');
        $this->db->from('comments');
        $this->db->join('username','username.UserNameID = comments.userID');
        $this->db->order_by('ID','asc');


        $query = $this->db->get();
        $result = json_encode($query->result());
        return $result;

    }

    function delComments($ID)
    {

        $this->db->delete('comments', array('ID' => $ID));

    }
    function add_comments($comment, $page, $membersid)
    {

        $commentData = array(
            'theComment' => $comment,
            'pageID' => $page,
            'userID' => $membersid
        );

        $this->db->insert('comments', $commentData);

    }
}