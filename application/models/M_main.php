<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_main extends CI_Model{

	function get_user($q) {
		return $this->db->get_where('user',['email' => $q]);
	}


	function get_user_point($q){
		$this->db->select('SUM(point.nominal_point) as total_point, point.user_id');
		$this->db->from('point');
		$this->db->join('user', 'user.id = point.user_id');
		$this->db->where('user.email', $q);
        $this->db->where('point.point_status', 1);
        
		$data = $this->db->get()->result();
        if(!empty($data)){
            $data = $data[0];
        }else{
            $data = [];
        }
		return $data;
	}

	function create($data){
		return $this->db->insert('user', $data);
	}

	function get_user_data($user_id) {
		return $this->db->get_where('user',['id' => $user_id])->result();
	}

	
}