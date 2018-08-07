<?php




class Messages extends CI_Controller {
	
           public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->model('comment_model');
                $this->load->model('users_model');
                $this->load->model('messages_model');
                $this->load->helper('url_helper');
                $this->load->library('session');

        }
        
        
        
        
        public function create($user){
             
               // if ($this->session->userdata('is_logged') === true) {
              
                        $this->load->helper('form');
                        $this->load->library('form_validation');

                       // $data['title'] = 'Create a message';
                        $data['user'] = $user;
                        
                       $this->form_validation->set_rules('from', 'FROM:', 'required|min_length[4]');
                       $this->form_validation->set_rules('to', 'TO:', 'required|min_length[4]');
                       $this->form_validation->set_rules('subject', 'subject', 'required|min_length[4]|max_length[50]');
                       $this->form_validation->set_rules('message_text', 'message_text', 'required|min_length[4]|max_length[255]');

                        if ($this->form_validation->run() === FALSE) {


                            $this->load->view('templates/header');
                            $this->load->view('messages/create', $data);
                            // $this->load->view('templates/footer');

                        } else {

                            $this->messages_model->create($user);
                            $this->load->view('news/success');
                        }

                 //   }
//                    else{
//                        show_404();
//                    }
                
            
            
            
            
        }
        
        
        public function show($user){
                     

                $data['messages'] = $this->messages_model->get_messages($user);

                
				$this->load->view('templates/header');
                                $this->load->view('messages/read', $data);
				$this->load->view('templates/footer');
		
            
                                    
        }

        
         public function countunreadmess($user){
                     

                $data['count'] = $this->messages_model->countunread($user);

				//$this->load->view('templates/header');
                                return $data['count'];           
            
                                    
        }

        
        
        
        
        
        
        
        
        }
        

