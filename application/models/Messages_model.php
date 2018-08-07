<?php

class messages_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
        
	}
        
        
        
        public function create($user){
            
        $this->load->helper('url');



        $data = array(
            'user_from' => $this->input->post('from'),
            'user_to' => $this->input->post('to'),
            'subject' => $this->input->post('subject'),
            'message_text' => $this->input->post('message_text'),
            'was_read' => 0,
        );


        return $this->db->insert('messages', $data);          
            
        }
        
            public function get_messages($user){

        
            $this->db->select('id, user_from, user_to, subject, message_text,data');
            $this->db->where('user_to', $user);
            $this->db->from('messages');
            $query = $this->db->get();

            
            
            
            // Flaga przeczytane dla wszystkich wiadomości odebranych/wyswietlonych
            $data['was_read'] = 1;
            $this->db->where('user_to', $user);
            $this->db->update('messages', $data);
            
            
            
            
            
            
            return $query->result_array();
                     
                            
        }

        
        public function get_send_messages($user){

        
            $this->db->select('id, user_from, user_to, subject, message_text,data');
            $this->db->where('user_to', $user);
            $this->db->from('messages');
            $query = $this->db->get();

            return $query->result_array();
                 
        }


        public function countunread($user){
                                   
            $this->db->select('id, user_from, user_to, subject, message_text,data');
            $this->db->where('user_to', $user);
            $this->db->where('was_read', 0);
            $this->db->from('messages');
            $query = $this->db->get();
            return $query->num_rows();
          
                      
        }











}






















