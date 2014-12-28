<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Message_model extends CI_Model 
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_message($limit = 10, $offset = 0,$type = FALSE)
	{
		if ($type === FALSE)
		{
			$query = $this->db->get('message',$limit,$offset);
			return $query->result_array();
		}
		$query = $this->db->get_where('message', array('type' => $type),$limit,$offset);
		return $query->result_array();
	}
	public function get_message_count($type = FALSE)
	{
		if ($type === FALSE)
		{
			$query = $this->db->get('message');
			return $query->num_rows();
		}
		$query = $this->db->get_where('message', array('type' => $type));
		return $query->num_rows();
	}
}