<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class M_product extends CI_Model
{
    function get_all()
    {
        $this->db->select('id,product_name,product_image');
        $this->db->from('product');
        $this->db->where('product_status', 1);
        $data = $this->db->get()->result();
        return $data;
    }

    // function get_paket($mobil_id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('paket');
    //     $this->db->where('mobil_id', $mobil_id);
    //     $data = $this->db->get()->result();
    //     if (!empty($data)) {
    //         // data mobil 
    //         for ($i = 0; $i < count($data); $i++) {
    //             $this->db->select('mobil_name,mobil_desc,mobil_penumpang,mobil_bagasi,mobil_gambar');
    //             $this->db->from('mobil');
    //             $this->db->where('id', $data[$i]->mobil_id);
    //             $this->db->where('mobil_status', 'Aktif');
    //             $dataMobil = $this->db->get()->result();
    //             if (!empty($dataMobil)) {
    //                 $data[$i]->data_mobil = $dataMobil[0];
    //             } else {
    //                 $data[$i]->data_mobil = NULL;
    //             }
    //         }

    //         // data ketentuan 
    //         for ($i = 0; $i < count($data); $i++) {
    //             $this->db->select('ketentuan_name,ketentuan_desc');
    //             $this->db->from('ketentuan');
    //             $this->db->where('id', $data[$i]->ketentuan_id);
    //             $dataKetentuan = $this->db->get()->result();
    //             if (!empty($dataKetentuan)) {
    //                 $data[$i]->data_ketentuan = $dataKetentuan[0];
    //             } else {
    //                 $data[$i]->data_ketentuan = NULL;
    //             }
    //         }
    //     }

    //     return $data;
    // }



    function get_paket($mobil_id, $city_id)
    {
        $this->db->select('paket.*, mobil.mobil_name, mobil.mobil_gambar, mobil.mobil_penumpang, mobil.mobil_bagasi, kota.kota_name, mobil.image_url');
        $this->db->from('paket');
        $this->db->join('mobil', 'mobil.id = paket.mobil_id', 'LEFT');
        $this->db->join('kota', 'kota.id = paket.kota_id', 'LEFT');
        $this->db->where(['kota_id' => $city_id, 'mobil_id' => $mobil_id, 'paket_type'  => 'Daily']);
        $this->db->order_by('id', 'ASC');
        $data = $this->db->get()->result();
        if (!empty($data)) {

            // data ketentuan 
            for ($i = 0; $i < count($data); $i++) {
                $this->db->select('ketentuan_name,ketentuan_desc');
                $this->db->from('ketentuan');
                $this->db->where('id', $data[$i]->ketentuan_id);
                $dataKetentuan = $this->db->get()->result();
                if (!empty($dataKetentuan)) {
                    $data[$i]->data_ketentuan = $dataKetentuan[0];
                } else {
                    $data[$i]->data_ketentuan = NULL;
                }
            }
        }

        return $data;
    }


    function get_dropoff($kota_asal, $kota_tujuan, $mobil_id)
    {
        // $this->db->select('*');
        // $this->db->from('paket_dropoff');
        // $this->db->where('kota_asal', $kota_asal);
        // $this->db->where('kota_tujuan', $kota_tujuan);
        // $data = $this->db->get()->result();
        // if (!empty($data)) {
        //     // data mobil 
        //     for ($i = 0; $i < count($data); $i++) {
        //         $this->db->select('mobil_name,mobil_desc,mobil_penumpang,mobil_bagasi,mobil_gambar,image_url');
        //         $this->db->from('mobil');
        //         $this->db->where('id', $data[$i]->mobil_id);
        //         $this->db->where('mobil_status', 'Aktif');
        //         $dataMobil = $this->db->get()->result();
        //         if (!empty($dataMobil)) {
        //             $data[$i]->data_mobil = $dataMobil[0];
        //         } else {
        //             $data[$i]->data_mobil = NULL;
        //         }
        //     }

        //     // data ketentuan 
        //     for ($i = 0; $i < count($data); $i++) {
        //         $this->db->select('ketentuan_name,ketentuan_desc');
        //         $this->db->from('ketentuan');
        //         $this->db->where('id', $data[$i]->ketentuan_id);
        //         $dataKetentuan = $this->db->get()->result();
        //         if (!empty($dataKetentuan)) {
        //             $data[$i]->data_ketentuan = $dataKetentuan[0];
        //         } else {
        //             $data[$i]->data_ketentuan = NULL;
        //         }
        //     }
        // }

        // return $data;



        $this->db->select('paket_dropoff.*, mobil.mobil_name, mobil.mobil_gambar, mobil.mobil_penumpang, mobil.mobil_bagasi, kota.kota_name, mobil.image_url');
        $this->db->from('paket_dropoff');
        $this->db->join('mobil', 'mobil.id = paket_dropoff.mobil_id', 'LEFT');
        $this->db->where(['kota_asal' => $kota_asal, 'kota_tujuan' => $kota_tujuan, 'mobil_id' => $mobil_id]);
        $this->db->order_by('id', 'ASC');
        $data = $this->db->get()->result();
        if (!empty($data)) {

            // data ketentuan 
            for ($i = 0; $i < count($data); $i++) {
                $this->db->select('ketentuan_name,ketentuan_desc');
                $this->db->from('ketentuan');
                $this->db->where('id', $data[$i]->ketentuan_id);
                $dataKetentuan = $this->db->get()->result();
                if (!empty($dataKetentuan)) {
                    $data[$i]->data_ketentuan = $dataKetentuan[0];
                } else {
                    $data[$i]->data_ketentuan = NULL;
                }
            }
        }

        return $data;
    }



    function get_airport($bandara, $kota_tujuan, $mobil_id)
    {
        // $this->db->select('*');
        // $this->db->from('paket_airport');
        // $this->db->where('airport_id', $bandara);
        // $this->db->where('kota_tujuan', $kota_tujuan);
        // $data = $this->db->get()->result();
        // if (!empty($data)) {
        //     // data mobil 
        //     for ($i = 0; $i < count($data); $i++) {
        //         $this->db->select('mobil_name,mobil_desc,mobil_penumpang,mobil_bagasi,mobil_gambar, image_url');
        //         $this->db->from('mobil');
        //         $this->db->where('id', $data[$i]->mobil_id);
        //         $this->db->where('mobil_status', 'Aktif');
        //         $dataMobil = $this->db->get()->result();
        //         if (!empty($dataMobil)) {
        //             $data[$i]->data_mobil = $dataMobil[0];
        //         } else {
        //             $data[$i]->data_mobil = NULL;
        //         }
        //     }

        //     // data ketentuan 
        //     for ($i = 0; $i < count($data); $i++) {
        //         $this->db->select('ketentuan_name,ketentuan_desc');
        //         $this->db->from('ketentuan');
        //         $this->db->where('id', $data[$i]->ketentuan_id);
        //         $dataKetentuan = $this->db->get()->result();
        //         if (!empty($dataKetentuan)) {
        //             $data[$i]->data_ketentuan = $dataKetentuan[0];
        //         } else {
        //             $data[$i]->data_ketentuan = NULL;
        //         }
        //     }
        // }

        // return $data;




        $this->db->select('paket_airport.*, mobil.mobil_name, mobil.mobil_gambar, mobil.mobil_penumpang, mobil.mobil_bagasi, kota.kota_name, mobil.image_url');
        $this->db->from('paket_airport');
        $this->db->join('mobil', 'mobil.id = paket_airport.mobil_id', 'LEFT');
        $this->db->join('kota', 'kota.id = paket_airport.city_id', 'LEFT');
        $this->db->where(['airport_id' => $bandara, 'city_id' => $kota_tujuan, 'mobil_id' => $mobil_id]);
        $this->db->order_by('id', 'ASC');
        $data = $this->db->get()->result();
        if (!empty($data)) {

            // data ketentuan 
            for ($i = 0; $i < count($data); $i++) {
                $this->db->select('ketentuan_name,ketentuan_desc');
                $this->db->from('ketentuan');
                $this->db->where('id', $data[$i]->ketentuan_id);
                $dataKetentuan = $this->db->get()->result();
                if (!empty($dataKetentuan)) {
                    $data[$i]->data_ketentuan = $dataKetentuan[0];
                } else {
                    $data[$i]->data_ketentuan = NULL;
                }
            }
        }

        return $data;
    }

    // function get_mobil($kota, $type){
    //     $this->db->select('mobil.id, mobil.mobil_name,mobil.mobil_desc,mobil.mobil_penumpang,mobil.mobil_bagasi,mobil.mobil_gambar,mobil.image_url');
    //     $this->db->from('paket');
    //     $this->db->join('mobil', 'mobil.id = paket.mobil_id');
    //     $this->db->where('kota_id', $kota);
    // 	$this->db->where('paket_type',$type);
    //     $this->db->where('mobil_status', 'Aktif');
    //     $resultMobil = $this->db->get()->result();

    // 	return $resultMobil;
    // }

    // function get_mobil($kota, $type)
    // {
    //     $this->db->select('mobil.id, mobil.mobil_name,mobil.mobil_desc,mobil.mobil_penumpang,mobil.mobil_bagasi,mobil.mobil_gambar,mobil.image_url');
    //     $this->db->from('paket');
    //     $this->db->join('mobil', 'mobil.id = paket.mobil_id');
    //     $this->db->where('paket.kota_id', $kota);
    //     $this->db->where('paket.paket_type', $type);
    //     $this->db->where('mobil.mobil_status', 'Aktif');
    //     $this->db->group_by('mobil.id');
    //     $resultMobil = $this->db->get()->result();

    //     return $resultMobil;
    // }



    function get_mobil($kota = NULL, $type = NULL, $kota_asal = NULL, $kota_tujuan = NULL, $airport_id = NULL)
    {
        if ($type === 'Daily') {
            $this->db->select('mobil.id, mobil.mobil_name,mobil.mobil_desc,mobil.mobil_penumpang,mobil.mobil_bagasi,mobil.mobil_gambar,mobil.image_url');
            $this->db->from('paket');
            $this->db->join('mobil', 'mobil.id = paket.mobil_id', 'LEFT');
            $this->db->join('kota', 'kota.id = paket.kota_id', 'LEFT');
            $this->db->where('kota_id', $kota);
            $this->db->order_by('paket.id', 'ASC');
            $this->db->group_by('paket.mobil_id');
            $resultMobil = $this->db->get()->result();
        } else if ($type === 'drop off' || $type === 'Drop Off' || $type === 'dropoff') {
            $this->db->select('mobil.id, mobil.mobil_name,mobil.mobil_desc,mobil.mobil_penumpang,mobil.mobil_bagasi,mobil.mobil_gambar,mobil.image_url');
            $this->db->from('paket_dropoff');
            $this->db->join('mobil', 'mobil.id = paket_dropoff.mobil_id', 'LEFT');
            $this->db->where('kota_asal', $kota_asal);
            $this->db->where('kota_tujuan', $kota_tujuan);
            $this->db->order_by('paket_dropoff.id', 'ASC');
            $this->db->group_by('paket_dropoff.mobil_id');
            $resultMobil = $this->db->get()->result();
        } else if ($type === 'Airport' || $type === 'Air port' || $type === 'airport') {
            $this->db->select('mobil.id, mobil.mobil_name,mobil.mobil_desc,mobil.mobil_penumpang,mobil.mobil_bagasi,mobil.mobil_gambar,mobil.image_url');
            $this->db->from('paket_airport');
            $this->db->join('mobil', 'mobil.id = paket_airport.mobil_id', 'LEFT');
            $this->db->where('airport_id', $airport_id);
            $this->db->where('city_id', $kota);
            $this->db->order_by('paket_airport.id', 'ASC');
            $this->db->group_by('paket_airport.mobil_id');
            $resultMobil = $this->db->get()->result();
        } else {
            $this->db->select('mobil.id, mobil.mobil_name,mobil.mobil_desc,mobil.mobil_penumpang,mobil.mobil_bagasi,mobil.mobil_gambar,mobil.image_url');
            $this->db->from('paket');
            $this->db->join('mobil', 'mobil.id = paket.mobil_id', 'LEFT');
            $this->db->join('kota', 'kota.id = paket.kota_id', 'LEFT');
            $this->db->where('kota_id', $kota);
            $this->db->order_by('paket.id', 'ASC');
            $this->db->group_by('paket.mobil_id');
            $resultMobil = $this->db->get()->result();
        }

        return $resultMobil;
    }
}
