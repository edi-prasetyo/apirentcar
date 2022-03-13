<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends BD_Controller {
    function __construct()
    
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('M_order');
    }
	

    public function dataorder_get()
    {
        $user_id = $this->get('user_id');
        $order = $this->M_order->get_all($user_id);


        // pagging 10 per order

        if (!empty($order))
        {
            $this->response([
                'code' => 1,
                'message' => 'List Data Orders',
                'data' => $order
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->response([
                'code' => 0,
                'message' => 'List Data Orders Not Found',
                'data' => $order
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function dataorderdetail_get()
    {
        $id = $this->get('id');
        $order = $this->M_order->get_detail($id);

        if (!empty($order))
        {
            $this->response([
                'code' => 1,
                'message' => 'Detail Data Orders',
                'data' => $order
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->response([
                'code' => 0,
                'message' => 'List Detail Data Orders Not Found',
                'data' => $order
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }


    public function create_order()
    {
        $data['user_id'] = $this->post('user_id');
        $data['driver_id'] = NULL;
        $data['driver_name'] = NULL;
        $data['product_id'] = $this->post('product_id');
        $data['product_name'] = $this->post('product_name');
        $data['order_id'] = strtoupper(random_string('numeric', 7));
        $data['order_point'] = $this->post('order_point');
        $data['kode_transaksi'] = $this->post('kode_transaksi');
        $data['passenger_name'] = $this->post('passenger_name');
        $data['passenger_phone'] = $this->post('passenger_phone');
        $data['passenger_email'] = $this->post('passenger_email');
        $data['kota_id'] = $this->post('kota_id');
        $data['kota_name'] = $this->post('kota_name');
        $data['mobil_id'] = $this->post('mobil_id');
        $data['mobil_name'] = $this->post('mobil_name');
        $data['paket_id'] = $this->post('paket_id');
        $data['paket_name'] = $this->post('paket_name');
        $data['alamat_jemput'] = $this->post('alamat_jemput');
        $data['tanggal_jemput'] = $this->post('tanggal_jemput');
        $data['jam_jemput'] = $this->post('jam_jemput');
        $data['permintaan_khusus'] = $this->post('permintaan_khusus');
        $data['lama_sewa'] = $this->post('lama_sewa');
        $data['jumlah_mobil'] = $this->post('jumlah_mobil');
        $data['ketentuan_desc'] = $this->post('ketentuan_desc');
        $data['paket_desc']  = $this->post('paket_desc');
        $data['origin'] = $this->post('origin');
        $data['destination'] = $this->post('destination');
        $data['jarak']    = 0;
        $data['start_price'] = $this->post('start_price');
        $data['total_price'] = $this->post('total_price');
        $data['diskon_point'] = $this->post('diskon_point');
        $data['promo_amount'] = $this->post('promo_amount');
        $data['grand_total'] = $this->post('grand_total');
        $data['status'] = $this->post('status');
        $data['status_read'] = $this->post('status_read');
        $data['order_type'] = $this->post('order_type');
        $data['pembayaran_id'] = $this->post('pembayaran_id') === NULL ? 1 : $this->post('pembayaran_id');
        $data['pembayaran'] =  $this->post('pembayaran') === NULL ? 1 : $this->post('pembayaran');
        $data['status_pembayaran'] = $this->post('status_pembayaran');
        $data['stage']  = $this->post('stage');

        $insertOrderTransaction = $this->M_order->insert($data);

        if (!empty($insertOrderTransaction))
        {
            $this->response([
                'code' => 1,
                'message' => 'Insert Data Orders Success',
                'data' => $order
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->response([
                'code' => 0,
                'message' => 'Insert data order Not success',
                'data' => $order
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }


        // xendit
        // Sewamobilokakey
        //xnd_development_sg9ud24JCN6pWMzxKINNMP2VKRzxkadokszV3fSoOZOI6mCCbIrifxcsICRw
        //xnd_public_development_Cn0j44Fwg1DuZiGppUE5oPG3TfecVu1kwRdXPLj3ERxZRZzmf79P0Q2UxogxP5y0
        //public key 
        //xnd_public_development_Cn0j44Fwg1DuZiGppUE5oPG3TfecVu1kwRdXPLj3ERxZRZzmf79P0Q2UxogxP5y0
    }

}
