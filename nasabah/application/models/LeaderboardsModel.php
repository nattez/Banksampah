<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LeaderboardsModel extends CI_Model
{
	

	public function getLeaderboards()
	{
		//return $this->db->get('user')->result_array();
		 $query = "SELECT `user`.*, `user_role`.*
		 	  	  FROM `user`
		 	  	  JOIN `user_role`
				  ON `user_role`.`role_id` = `user`.`role_id`
		  	  	  WHERE `user`.`role_id` = 3
		  	  	  ORDER BY `user`.`user_points` DESC
		  		 ";
		return $this->db->query($query)->result_array();
	}

}

?>