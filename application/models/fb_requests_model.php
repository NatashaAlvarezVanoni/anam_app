<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fb_requests_model extends CI_Model
{
	function database_insert($request_ids)
	{
		// This is an example function that will be called when you accept requests.
		// NOTE: You must have a database set to use this function!
		foreach ($request_ids as $value)
		{
			// Loops through each id and adds them into database if they don't already exists.
			$request_data = $this->fb_ignited->api('/'.$value);
			$user_id = $this->fb_ignited->getUser();
			$other_id = $request_data['from']['id'];			
			if ($request_data['from'])
			{
				$this->db->select('*')->from('user_friends')->where(array('id'=>$user_id, 'friend'=>$other_id));
				$query = $this->db->get();
				if ($query->num_rows() == 0)
				{
					$array = array(
						'id' => $user_id,
						'friend' => $other_id 
					);
					$this->db->insert('user_friends', $array);
				}
				$this->db->select('*')->from('user_friends')->where(array('id'=>$other_id, 'friend'=>$user_id));
				$query = $this->db->get();
				if ($query->num_rows() == 0)
				{
					$array = array(
						'id' => $other_id,
						'friend' => $user_id 
					);
					$this->db->insert('user_friends', $array);
				}	
			}
		}		
	}
}
