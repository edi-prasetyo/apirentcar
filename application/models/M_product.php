<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_product extends CI_Model{
	function get_all() {
        $this->db->select('id,product_name,product_image');
		$this->db->from('product');
		$this->db->where('product_status', 1);
		$data = $this->db->get()->result();
        return $data;
    }

    function get_paket($mobil_id){
        $this->db->select('*');
		$this->db->from('paket');
		$this->db->where('mobil_id', $mobil_id);
		$data = $this->db->get()->result();
		if(!empty($data)){
                // data mobil 
                for($i = 0; $i < count($data); $i++ ){
                    $this->db->select('mobil_name,mobil_desc,mobil_penumpang,mobil_bagasi,mobil_gambar');
        		    $this->db->from('mobil');
        		    $this->db->where('id', $data[$i]->mobil_id);
                    $this->db->where('mobil_status', 'Aktif');
                    $dataMobil = $this->db->get()->result();
                    if(!empty($dataMobil)){
                        $data[$i]->data_mobil = $dataMobil[0];
                    }else{
                        $data[$i]->data_mobil = NULL;
                    }
                }

                 // data ketentuan 
                 for($i = 0; $i < count($data); $i++ ){
                    $this->db->select('ketentuan_name,ketentuan_desc');
        		    $this->db->from('ketentuan');
        		    $this->db->where('id', $data[$i]->ketentuan_id);
                    $dataKetentuan = $this->db->get()->result();
                    if(!empty($dataKetentuan)){
                        $data[$i]->data_ketentuan = $dataKetentuan[0];
                    }else{
                        $data[$i]->data_ketentuan = NULL;
                    }
                }
		}
		
		return $data;
    }

    function get_mobil($kota, $type){
        $this->db->select('mobil.id, mobil.mobil_name,mobil.mobil_desc,mobil.mobil_penumpang,mobil.mobil_bagasi,mobil.mobil_gambar,mobil.image_url');
        $this->db->from('paket');
        $this->db->join('mobil', 'mobil.id = paket.mobil_id');
        $this->db->where('kota_id', $kota);
		$this->db->where('paket_type',$type);
        $this->db->where('mobil_status', 'Aktif');
        $resultMobil = $this->db->get()->result();
		
		return $resultMobil;
    }
}