<?php

class Users extends CI_Controller {
	
           public function __construct()
        {
                parent::__construct();
                $this->load->model('users_model');
                $this->load->model('messages_model');
                $this->load->helper('url_helper');
                $this->load->library('session');
                $this->load->helper('captcha');
                $this->load->model('news_model');
                $this->perPage = 2;
        }




                public function create()
                {

                    $this->load->helper('form');
                    $this->load->library('form_validation');
                    $this->load->database();

                    $data['title'] = 'Register for free';


                    //mail oraz name UNIKALNE

                    $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[users.username]');
                    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
                    $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');

                    if ($this->form_validation->run() === FALSE)
                    {
                        $this->load->view('templates/header', $data);
                        $this->load->view('users/create');
                       // $this->load->view('templates/footer');

                    }
                    else
                    {
                        $this->users_model->register_user();
                        $this->load->view('news/success');
                    }


                }






                    public function captcha()
                {

                                           $vals = array(
                                            'word'          => 'Random word',
                                            'img_path'      => './captcha/',
                                            'img_url'       => 'http://example.com/captcha/',
                                            'font_path'     => './path/to/fonts/texb.ttf',
                                            'img_width'     => '150',
                                            'img_height'    => 30,
                                            'expiration'    => 7200,
                                            'word_length'   => 8,
                                            'font_size'     => 16,
                                            'img_id'        => 'Imageid',
                                            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

                                            // White background and border, black text and red grid
                                            'colors'        => array(
                                                    'background' => array(255, 255, 255),
                                                    'border' => array(255, 255, 255),
                                                    'text' => array(0, 0, 0),
                                                    'grid' => array(255, 40, 40)
                                            )
                                    );

                                    $cap = create_captcha($vals);
                                        echo $cap['image'];
                                           

                 }                 


               

                public function login()
                {

                     
                            $this->load->helper('form');
                            $this->load->library('form_validation');

                            $data['title'] = 'Login for free';
                        


                            $this->form_validation->set_rules('username', 'Username', 'required');
               
                            $this->form_validation->set_rules('password', 'Password', 'required');



                           // $this->session->set_userdata('asdsad', asdasddsa);   
                            if ($this->form_validation->run() === FALSE)
                            {
                                $this->load->view('templates/header', $data);
                                $this->load->view('users/login');
                              //  $this->load->view('templates/footer');
                            
                                      

                            }

                            //User zalogowal sie 
                            else
                           {
                             
                                    $IsExist = $this->users_model->login_user();
                                if ($IsExist == 0) {


                                     //Dodanie danych do sesji
                                    if ($this->input->post('username') == 'Admin'){

                                $newdata = array(
                                'is_logged' => true,
                                'user_name' => $this->input->post('username'),
                                'Admin' => true  );                                  }

                                    else   {
                                    $newdata = array(
                                    'is_logged' => true,
                                    'user_name' => $this->input->post('username'));

                                 }



                            $this->session->set_userdata($newdata);
                                


                           $this->load->view('news/success');
                                
                            }


                                //User nie zalogowal sie
                                else
                                {

                                    show_404();
                                }
                                
                            }
                }


                        public function logoff()
                        {                     


                        session_destroy();       
                        $this->load->view('news/success');


                        }

                        
                         public function profile($user)
                        {                     
                        
                        $data['count_messages'] = $this->messages_model->countunread($user);     
                        $data['userzy'] = $this->users_model->get_user($user);   
                        $data['liczba_postow']=$this->users_model->countPosts($user); 
                        
                        
                        
                        $this->load->view('templates/header');
                        
                        $this->load->view('users/profile', $data);
                        $this->load->view('templates/footer');

                        }
        
                        
                        
                        
                       public function countposts($user){
                           
                        $data['liczba_postow']=$this->users_model->countPosts($user);
                           
                        
                        $this->load->view('templates/header');
                        
                        $this->load->view('users/profile', $data);
                        $this->load->view('templates/footer');
                           
                           
                           
                           
                       }
                        
                        
                        
                    public function ban($username){
                                   
                        if ($this->session->userdata('Admin')===true){
                    
                        $this->users_model->banUser($username);
                        
                        }
                        else {
                            
                            show_404();
                            
                        }
                                                      
                    }
                        
                        
                   public function loadmoredata(){
                                $conditions = array();

                                // Get last post ID
                                $lastID = $this->input->post('id');

                                // Get post rows num
                                $conditions['where'] = array('id >'=>$lastID);
                                $conditions['returnType'] = 'count';
                                $data['postNum'] = $this->news_model->getRows($conditions);

                                // Get posts data from the database
                                $conditions['returnType'] = '';
                                //$conditions['order_by'] = "id DESC";
                                $conditions['limit'] = $this->perPage;
                                $data['posts'] = $this->news_model->getRows($conditions);

                                $data['postLimit'] = $this->perPage;

                                // Pass data to view
                                $this->load->view('news/load_more_data', $data, false);
    }
                        
                        
                        
    } 


         





    




