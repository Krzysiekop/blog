<?php
class comment_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();

	}
	
	
	
	public function create()
    {
        $this->load->helper('url');



        $data = array(
            'name' => $this->input->post('name'),
            'body' => $this->input->post('text'),
            'post_id' => $this->input->post('id'),
        );


        return $this->db->insert('comments', $data);
    }


    public function get_comments($id)
    {


        //$query = $this->db->get_where('comments', array('post_id' => $id));


            $this->db->select('name, body, post_id, id, created_at');
            $this->db->where('post_id', $id);
            $this->db->from('comments');
            $query = $this->db->get();

            return $query->result_array();




    }


    public function delete($id){


        $this->db->where('id', $id);
        $this->db->delete('comments');




    }







}