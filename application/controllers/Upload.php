<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        if ($this->session->userdata('is_logged')===true) {
            $this->load->view('news/upload_form', array('error' => ' '));
        }
        else{
            show_404();
        }
    }

    public function do_upload($id)
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg';
        $config['max_size']             = 10000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name']            = $id;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('news/upload_form', $error);
        }
        else
        {
            //$data = array('upload_data' => $this->upload->data());

            $this->load->view('news/success');
        }
    }
}

?>