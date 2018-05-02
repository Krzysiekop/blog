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









//     public function delete_news($id)
// {
    
//     $this->db->where('id', $id);
//     $this->db->delete('news');
  
// }
 
//     public function edit_news($id)
// {

//     $this->load->helper('url');
//     $slug = url_title($this->input->post('title'), 'dash', TRUE);
    
//     $data = array(
//         'title' => $this->input->post('title'),
//         'slug' => $slug,
//         'text' => $this->input->post('text')
//     );    
    
    
//     //$this->db->set('text', $data[text);
//     $this->db->where('id', $id);
//     $this->db->update('news', $data);  // Produces: INSERT INTO mytable (`name`) VALUES ('{$name}')
// }
	
}