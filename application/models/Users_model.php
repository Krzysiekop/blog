<?php
class users_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
                $this->load->library('session');
        
	}
	
	
	
	public function register_user()
{
    $this->load->helper('url');

    

    $data = array(
        'username' => $this->input->post('username'),
        'email' =>  $this->input->post('email'),
        'password' => $this->input->post('password')
    );

    return $this->db->insert('users', $data);
}




    public function login_user()
{
    $this->load->helper('url');

    
       
    $data = array(
            'username' => $this->input->post('username'),   
            'password' => $this->input->post('password')
        );

            $this->db->select('username, password, banned');
            $this->db->where('username', $data['username']);
            $this->db->where('password', $data['password']);
            $this->db->where('banned = 0');
            $this->db->from('users');
            $query = $this->db->get();
                  

            if ($query->num_rows() > 0)
             {

               return 0;

              }

            else
              {

                return 1;

              }


   


          }

 public function AlreadyExist($username)
    {

            $this->db->select('username');
            $this->db->where('username', $username);
            $this->db->from('users');
            $query = $this->db->get();

             if ($query->num_rows() > 0)
                  {
                     
                       return TRUE;

                  }

                  else
                   {

                        return FALSE;

                   }

}
  public function user_profile()
{
    

}

public function get_user($username)
{
           
            $this->db->select();
            $this->db->where('username', $username);
            $this->db->from('users');
            $query = $this->db->get();
          return $query->result_array();
         
    
}

public function countPosts($username){


        $query = $this->db->get_where('news', array('user_id' => $username));
        return $query->num_rows();

}

public function banUser($username){
    
    
    
    $data['banned'] = 1;

        $this->db->where('username', $username);
        $this->db->update('users', $data);
    
    
}




	
}