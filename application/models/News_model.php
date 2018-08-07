<?php
class news_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
        
	}


	public function get_news($slug = FALSE)
    {
        if ($slug === FALSE)
        {
                $query = $this->db->get('news',3,0);
                return $query->result_array();
        }

        $query = $this->db->get_where('news', array('id' => $slug));
        return $query->row_array();

    }

   function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('news');
        
        //fetch data by conditions
        if(array_key_exists("where",$params)){
            foreach ($params['where'] as $key => $value){
                $this->db->where($key,$value);
            }
        }
        
        if(array_key_exists("order_by",$params)){
            $this->db->order_by($params['order_by']);
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }
    
    
    
    
    
    
    
    
    
    
	
	public function set_news()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text'),
            'category' => $this->input->post('category'),
            'user_id' => $this->session->userdata('user_name')
        );

        return $this->db->insert('news', $data);
    }

    
    
    //usuwa jeden post oraz komentarze
    
    public function delete_news($id)
    {
    
        $this->db->where('id', $id);
        $this->db->delete('news');
        
        $this->db->where('post_id', $id);
        $this->db->delete('comments');
        
  
    }
 
    public function edit_news($id)
    {

        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );


        //$this->db->set('text', $data[text);
        $this->db->where('id', $id);
        $this->db->update('news', $data);  // Produces: INSERT INTO mytable (`name`) VALUES ('{$name}')
}


public function category($category){


        $query = $this->db->get_where('news', array('category' => $category));
        return $query->result_array();

}

public function categoryUser($username){


        $query = $this->db->get_where('news', array('user_id' => $username));
        return $query->result_array();

}

    
public function categoryUserComments($username){


        $query = $this->db->get_where('comments', array('name' => $username));
        return $query->result_array();

}




}