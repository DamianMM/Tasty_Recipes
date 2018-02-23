<?php
/**
 * Created by PhpStorm.
 * User: Damian
 * Date: 28/09/2016
 * Time: 14:53
 */

class Pages extends CI_Controller {
    public function view($page = 'index')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('recipes/comments', $data);
        $this->load->view('templates/footer', $data);
    }
}