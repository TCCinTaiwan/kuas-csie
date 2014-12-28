<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main_model extends CI_Model 
{
	public function __construct()
	{
		$this->load->database();
	}
    public function get_all($database,$condition = False)
    {
        if (!$condition)
        {
            $query = $this->db->get($database);
            return $query->result_array();
        }
		$query = $this->db->get_where($database, $condition);
    	return $query->result_array();
    }
}