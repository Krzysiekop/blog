<?php

class News extends CI_Controller {
	
           public function __construct() {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->model('comment_model');
                $this->load->helper('url_helper');
                $this->load->library('session');

        }


        public function index() {

                $data['news'] = $this->news_model->get_news();
                $data['title'] = 'News archive';

                $this->load->view('templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer');
        }


        public function view($slug = null)  {

                $data['news_item'] = $this->news_model->get_news($slug);


                $data2['comments'] = $this->comment_model->get_comments($slug);

           if (empty($data['news_item']))
        {
                show_404();
        }

				$data['title'] = $data['news_item']['title'];

				$this->load->view('templates/header', $data);
                $this->load->view('news/view', $data);
				$this->load->view('comment/view', $data2);
				$this->load->view('templates/footer');
		
		}


                public function create()
                {

                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Create a post on blog';

                $this->form_validation->set_rules('title', 'Title', 'required|min_length[4]|max_length[50]');
                $this->form_validation->set_rules('text', 'Text', 'required|min_length[4]|max_length[255]');

                if ($this->form_validation->run() === FALSE)
                {
                    $this->load->view('templates/header', $data);
                    $this->load->view('news/create');
                    $this->load->view('templates/footer');

                }
                else
                {
                    $this->news_model->set_news();
                    $this->load->view('news/success');
                }


                }





                    public function delete($id)
                {

                    $this->news_model->delete_news($id);
                }




                    public function edit($id)
                {

                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Edit a news item';

                $this->form_validation->set_rules('title', 'Title', 'required|min_length[4]');
                $this->form_validation->set_rules('text', 'Text', 'required|min_length[4]');

                if ($this->form_validation->run() === FALSE)
                {
                    $this->load->view('templates/header', $data);
                    $this->load->view('news/edit');
                    $this->load->view('templates/footer');

                }

                else
                {
                    $this->news_model->edit_news($id);
                    $this->load->view('news/success');
                }

                }


                public function category(){

                    $category=$this->uri->segment(3);
                    $data['news']=$this->news_model->category($category);
                    $data['title'] = 'News archive';

                $this->load->view('templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer');




                }






}