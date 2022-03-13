<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_main extends CI_Model{

	function get_user($q) {
		return $this->db->get_where('user',['email' => $q]);
	}

	function create($data){
		return $this->db->insert('user', $data);
	}

	function get_user_data($user_id) {
		return $this->db->get_where('user',['id' => $user_id])->result();
	}

	
}