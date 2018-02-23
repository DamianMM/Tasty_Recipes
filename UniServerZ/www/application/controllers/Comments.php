<?php

class Comments extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Comments_model', '', TRUE);
    }


    function getComment(){
        $page = $this->input->post('pageid');
        echo $this->Comments_model->load_comments($page);
    }

}