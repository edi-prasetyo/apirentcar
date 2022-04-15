<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_master extends CI_Model{
    function get_kota() {
		return $this->db->get_where('kota')->result();
	}

    function get_point($user_id){
        $this->db->select('SUM(nominal_point) as total_point, user_id');
		$this->db->from('point');
		$this->db->where('user_id', $user_id);
        $this->db->where('point_status', 1);
        
		$data = $this->db->get()->result();
        if(!empty($data)){
            $data = $data[0];
        }else{
            $data = [];
        }
        return $data;
    }


    function claim_point($user_id, $point){
        $data = array(
            'point_status' => 0,
            'updated_at' => date('Y-m-d H:i:s')
        );
    
        $this->db->where('user_id', $user_id);
        return $this->db->update('point', $data);


    }

    function get_promo(){
        $this->db->select('id,name,price');
		$this->db->from('promo');
		$this->db->where('is_active', 1);
        
		$data = $this->db->get()->result();
     
        return $data;
    }

    function get_news($id = NULL){
        $this->db->select('id,user_id,category_id,berita_title,berita_desc,berita_gambar,berita_status,berita_keywords,berita_views,image_url');
		$this->db->from('berita');
        if($id != NULL){
            $this->db->where('id', $id);
        }
		$data = $this->db->get()->result();
     
        return $data;
    }


    function get_airport() {
		return $this->db->get_where('airport')->result();
	}
}