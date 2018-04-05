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
                $query = $this->db->get('news');
                return $query->result_array();
        }

        $query = $this->db->get_where('news', array('id' => $slug));
        return $query->row_array();

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
        'user_id' => $this->session->userdata('username')
    );

    return $this->db->insert('news', $data);
}

    public function delete_news($id)
{
    
    $this->db->where('id', $id);
    $this->db->delete('news');
  
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












	
    
}