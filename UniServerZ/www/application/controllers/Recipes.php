<?php
class Recipes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Comments_model', '', TRUE);
    }

    public function view($page = 'index')
    {
        if (!file_exists(APPPATH . 'views/recipes/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter


        $this->load->view('templates/header', $data);
        $this->load->view('recipes/' . $page, $data);
        $this->get_comments($page);
        $this->load->view('templates/footer', $data);
    }

    public function get_comments($page){

        $data = array (
            'recipe' => $page,
            'result',
            'pageid');

        if ($page == 'meatballs'){
            $data['pageid']='1';
        }
        elseif ($page == 'pancakes'){
            $data['pageid']='2';
        }

        $data['result']=$this->Comments_model->load_comments($data['pageid']);
        $this->load->view('recipes/comments', $data, $page);

    }


}