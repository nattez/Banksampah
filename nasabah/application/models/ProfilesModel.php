<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilesModel extends CI_Model
{
	
	public function getLogQuests($username)
	{
		//return $this->db->get('log_quest')->result_array();
		$query = "SELECT `log_quest`.`log_quest_id`,`active_quest_id`,`quest_id`,`log_quest`.`user_id`,`quest_name`,`quest_points`,`trash_size`,`date_started`,`date_ended`,`stat`
		 	  	  FROM `log_quest`
		 	  	  JOIN `user`
		 	  	  ON `user`.`user_id` = `log_quest`.`user_id`
		 	  	  WHERE `user`.`username` = '$username'
		 		 ";
		return $this->db->query($query)->result_array();
	}

}

?>