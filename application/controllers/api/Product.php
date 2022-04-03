<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends BD_Controller {
    function __construct()
    
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('M_product');
    }
	

    public function dataproduct_get()
    {
        $product = $this->M_product->get_all();
        if (!empty($product))
        {
            $this->response([
                'code' => 1,
                'message' => 'List Data Product',
                'data' => $product
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->response([
                'code' => 0,
                'message' => 'List Data Product Not Found',
                'data' => $product
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }


    public function datapaket_get(){
        $mobil_id = $this->get('mobil_id');
        $city_id = $this->get('city_id');
        $paket = $this->M_product->get_paket($mobil_id,$city_id);

        if(!empty($paket)){
            $this->response([
                'code' => 1,
                'message' => 'List Data Paket',
                'data' => $paket
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'code' => 0,
                'message' => 'List Data Paket Not Found',
                'data' => $paket
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code

        }
    }


    public function datamobil_get(){
        $kota = $this->get('kota');
        $type = $this->get('type');
        $car = $this->M_product->get_mobil($kota, $type);

        if(!empty($car)){
            $this->response([
                'code' => 1,
                'message' => 'List Data Car',
                'data' => $car
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'code' => 0,
                'message' => 'List Data Car Not Found',
                'data' => $car
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code

        }
    }

    public function datapaketdropoff_get(){
        $kota_asal = $this->get('kota_asal');
        $kota_tujuan = $this->get('kota_tujuan');
        $mobil_id = $this->get('mobil_id');
        $car = $this->M_product->get_dropoff($kota_asal, $kota_tujuan, $mobil_id);

        if(!empty($car)){
            $this->response([
                'code' => 1,
                'message' => 'List Data Paket Dropoff',
                'data' => $car
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'code' => 0,
                'message' => 'List Data Paket Dropoff Not Found',
                'data' => $car
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code

        }
    }


    public function datapaketairport_get(){
        $airport_id = $this->get('airport_id');
        $kota_tujuan = $this->get('kota_tujuan');
        $mobil_id = $this->get('mobil_id');
        
        $car = $this->M_product->get_airport($airport_id, $kota_tujuan, $mobil_id);

        if(!empty($car)){
            $this->response([
                'code' => 1,
                'message' => 'List Data Paket Airport',
                'data' => $car
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'code' => 0,
                'message' => 'List Data Paket airport Not Found',
                'data' => $car
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code

        }
    }

    

}
