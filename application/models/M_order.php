<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_order extends CI_Model{
	function get_all($q) {
		$this->db->select('id,product_name,order_id,product_id,paket_name, total_price, start_price, status, status_pembayaran');
		$this->db->from('transaksi');
		$this->db->where('user_id', $q);
		$data = $this->db->get()->result();
		return $data;
	}


	function get_detail($id) {
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id', $id);
		$data = $this->db->get()->result();
		if(!empty($data)){
			return $data[0];
		}else{
			return NULL;
		}
		
	}


	function insert($data){
		return $this->db->insert('transaksi', $data);
	}
}