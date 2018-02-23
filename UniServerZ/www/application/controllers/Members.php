<?php
    class Members extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Members_model','',TRUE);
        }

        public function view($page = 'index')
        {

            if ( ! file_exists(APPPATH.'views/members/'.$page.'.php'))
            {
                // Whoops, we don't have a page for that!
                show_404();
            }

            $data['title'] = ucfirst($page); // Capitalize the first letter
            $this->load->view('templates/header', $data);
            $this->load->view('members/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }

        function checkDatabase($username, $password)
        {

            $result = $this->Members_model->login($username, $password);

            if ($result) {

                foreach ($result as $row) {
                    $sess_array =

                        array('id' => $row->UserNameID,
                            'username' => $row->userName,
                            'alias' => $row->userAlias
                        );

                    $this->session->set_userdata('logged_in', $sess_array);
                }

                return TRUE;

            } else {

                $this->form_validation->set_message('checkDatabase', 'Invalid username or password');

                return FALSE;
            }
        }

        public function get_members(){

            $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

            if ($this->form_validation->run()==FALSE){
                $this->session->set_flashdata('validation_errors',validation_errors());
            }
            else{
            $username= $this->input->post('username');
            $password= $this->input->post('password');

                if($this->checkDatabase($username,$password)){
                redirect('index.php');
                }
                else{
                   redirect('members.php');
                }
            }

        }

    }