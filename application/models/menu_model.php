<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_model extends CI_Model 
{
	public function __construct()
	{
		$this->load->database();
	}
    public function get_menu($parent = 0,$lang = 'zh_TW')
    {
		$query = $this->db->get_where('navigation', array('parent' => $parent));
		if ($query->num_rows() == 0)//假如已經是最底層，不加東西
		{
			return "";
		}
    	$menu = $query->result_array();
    	$output = "<ul>";
    	foreach ($menu as $menu_item) {
    		$herf = preg_replace('/\[lang\]/',$lang,$menu_item[$lang.'_href']);//取代語言
    		$output = $output."<li><a title='".$menu_item['en']."' target='".$menu_item['target']."' href='".$herf."'>".$menu_item[$lang]."</a>".$this->get_menu($menu_item['id'],$lang)."</li>";
    	}
    	$output = $output."</ul>";
    	return $output;
    }
}