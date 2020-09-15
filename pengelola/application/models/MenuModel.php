<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuModel extends CI_Model
{
	

	public function getMenu()
	{
		return $this->db->get('menu')->result_array();
		// $query = "SELECT `menu`.`menu_id`,`menu_code`,`menu_name`
		// 	  	  FROM `menu`
		// 		 ";
		// return $this->db->query($query)->result_array();
	}

	public function getSubMenu()
	{
		$query = "SELECT `submenu`.*,`menu`.`menu_name`
				  FROM `submenu`
				  JOIN `menu`
				  ON `submenu`.`menu_id` = `menu`.`menu_id`
		   		 ";
		return $this->db->query($query)->result_array();
	}

	public function editMenu($menu_id, $menu_code, $menu_name)
	{
		$query = $this->db->query(
				" UPDATE menu 
				  SET menu_code = '$menu_code', menu_name = '$menu_name'
				  WHERE menu_id = '$menu_id' ");
		return $query;
	}

	public function deleteMenu($menu_id)
	{
		$this->db->where('menu_id', $menu_id);
		$this->db->delete('menu');
	}

	public function deleteSubMenu($submenu_id)
	{
		$this->db->where('submenu_id', $submenu_id);
		$this->db->delete('submenu');
	}

}

?>