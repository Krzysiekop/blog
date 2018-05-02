<?php

class Comment extends CI_Controller {
	
           public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->model('comment_model');
                $this->load->helper('url_helper');
                $this->load->library('session');

        }


        


//        public function view($slug = null)
//        {
//
//                $data['news_item'] = $this->news_model->get_news($slug);
//           if (empty($data['news_item']))
//        {
//                show_404();
//        }
//
//				$data['title'] = $data['news_item']['title'];
//
//				$this->load->view('templates/header', $data);
//				$this->load->view('news/view', $data);
//				$this->load->view('templates/footer');
//
//		}


                public function create()
                {
                    if ($this->session->userdata('is_logged')===true) {
                        $this->load->helper('form');
                        $this->load->library('form_validation');

                        $data['title'] = 'Create a comment';

                        $this->form_validation->set_rules('name', 'Name', 'required|min_length[4]');
                        $this->form_validation->set_rules('text', 'Text', 'required|min_length[4]');

                        if ($this->form_validation->run() === FALSE) {
                            $this->load->view('templates/header', $data);
                            $this->load->view('comment/create');
                            // $this->load->view('templates/footer');
                        } else {
                            $this->comment_model->create();
                            $this->load->view('news/success');
                        }

                    }
                    else{
                        show_404();
                    }
                }

                    public function delete($id)
                {
                    if ($this->session->userdata('Admin')===true) {
                        $this->comment_model->delete($id);
                        $this->load->view('news/success');
                    }
                    else{
                        show_404();
                    }
                }










}