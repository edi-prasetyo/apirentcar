<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends BD_Controller {
    function __construct()
    
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('M_order');

	    $this->load->helper('xenditapi');

	    $this->xendit_config = $this->config->item('xendit');
	    $this->xendit = new XenditApi($this->xendit_config);
    }
	

    public function dataorder_get()
    {
        $user_id = $this->get('user_id');
        $order = $this->M_order->get_all($user_id);


        // pagging 10 per order
        if (!empty($order))
        {
            $this->response(array(
                'code' => 1,
                'message' => 'List Data Orders',
                'data' => $order
            ), REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->response(array(
                'code' => 0,
                'message' => 'List Data Orders Not Found',
                'data' => $order
            ), REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function dataorderdetail_get()
    {
        $id = $this->get('id');
        $order = $this->M_order->get_detail($id);

        if (!empty($order))
        {
            $this->response(array(
                'code' => 1,
                'message' => 'Detail Data Orders',
                'data' => $order
            ), REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->response(array(
                'code' => 0,
                'message' => 'List Detail Data Orders Not Found',
                'data' => $order
            ), REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }


    public function payment_channels_get(){
	    $this->xendit->get_payment_channels();
	    exit;
    }
    public function set_xendit_callback_url_get(){
	    $this->xendit->set_callback_urls();
	    exit;
    }

	public function random_string($length = 10) {
	    //$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $characters = '0123456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

    public function test_create_order_direct_get(){

	    $_POST = $this->xendit->get_sample();

	    $_GET['__devel'] = true;
	    if(isset($_GET['__channel']) && $_GET['__channel']){
		    $_POST['payment_channel'] = $_GET['__channel'];
		    $_POST['payment_code'] = $_GET['__code'];
	    }
	    $this->create_order_post();
    }
    public function test_create_order_redirect_get(){

	    $_POST = $this->xendit->get_sample();
	    $_GET['__devel'] = true;

	    $this->create_order_post();
    }

    public function create_order_post()
    {

	    if(isset($_GET['__devel'])):
		    $data = $this->xendit->get_sample();
	    else:


	        $data['user_id'] = $this->input->post('user_id');
	        $data['driver_id'] = NULL;
	        $data['driver_name'] = NULL;
	        $data['product_id'] = $this->input->post('product_id');
	        $data['product_name'] = $this->input->post('product_name');
	        $data['order_id'] = strtoupper($this->random_string(7));
	        $data['order_point'] = $this->input->post('order_point');
	        $data['kode_transaksi'] = $this->input->post('kode_transaksi');
	        $data['passenger_name'] = $this->input->post('passenger_name');
	        $data['passenger_phone'] = $this->input->post('passenger_phone');
	        $data['passenger_email'] = $this->input->post('passenger_email');
	        $data['kota_id'] = $this->input->post('kota_id');
	        $data['kota_name'] = $this->input->post('kota_name');
	        $data['mobil_id'] = $this->input->post('mobil_id');
	        $data['mobil_name'] = $this->input->post('mobil_name');
	        $data['paket_id'] = $this->input->post('paket_id');
	        $data['paket_name'] = $this->input->post('paket_name');
	        $data['alamat_jemput'] = $this->input->post('alamat_jemput');
	        $data['tanggal_jemput'] = $this->input->post('tanggal_jemput');
	        $data['jam_jemput'] = $this->input->post('jam_jemput');
	        $data['permintaan_khusus'] = $this->input->post('permintaan_khusus');
	        $data['lama_sewa'] = $this->input->post('lama_sewa');
	        $data['jumlah_mobil'] = $this->input->post('jumlah_mobil');
	        $data['ketentuan_desc'] = $this->input->post('ketentuan_desc');
	        $data['paket_desc']  = $this->input->post('paket_desc');
	        $data['origin'] = $this->input->post('origin');
	        $data['destination'] = $this->input->post('destination');
	        $data['jarak']    = 0;
	        $data['start_price'] = $this->input->post('start_price');
	        $data['total_price'] = $this->input->post('total_price');
	        $data['diskon_point'] = $this->input->post('diskon_point');
	        $data['promo_amount'] = $this->input->post('promo_amount');
	        $data['grand_total'] = $this->input->post('grand_total');
	        $data['status'] = $this->input->post('status');
	        $data['status_read'] = $this->input->post('status_read');
	        $data['order_type'] = $this->input->post('order_type');
	        $data['pembayaran_id'] = $this->input->post('pembayaran_id') === NULL ? 1 : $this->input->post('pembayaran_id');
	        $data['pembayaran'] =  $this->input->post('pembayaran') === NULL ? 1 : $this->input->post('pembayaran');
	        $data['status_pembayaran'] = $this->input->post('status_pembayaran');
	        $data['stage']  = $this->input->post('stage');

		    // Xendit support, direct payment
		    //$data['payment_channel'] =  $this->input->post('payment_channel');
		    //$data['payment_code'] =  $this->input->post('payment_code');

		endif;


	    #$this->create_order_api_direct($data);
	    $this->create_order_api_redirect($data);
    }

    private function create_order_api_direct($data)
    {

	    $trx = array();
	    // Xendit
	    $payment_channel = strtoupper($data['payment_channel']);
	    $payment_code = strtoupper($data['payment_code']);
	    if(in_array($payment_channel, $this->config['channels'] )){
			$trx = $this->xendit->call_api_direct($data);


		    if(isset($_GET['__debug'])) echo '<pre>', print_r($trx), '</pre>';

		    if(!$trx['success']){
		        $this->response(array(
		            'code' => 0,
		            'message' => $trx['reason'],
		            //'trx' => $trx
		        ), REST_Controller::HTTP_UNAUTHORIZED);

		    } else {

			    switch($payment_channel){
				    case 'VIRTUAL_ACCOUNT':
					    $data['no_va'] = $trx['data']['account_number'];
					    $data['expired_payment_date'] = date('Y-m-d H:i:s', strtotime($trx['data']['expiration_date']));
					    $data['payment_transaction_id'] = $trx['data']['id'];
					    break;

				    case 'RETAIL_OUTLET':
					    $data['no_va'] = $trx['data']['payment_code'];
					    $data['expired_payment_date'] = date('Y-m-d H:i:s', strtotime($trx['data']['expiration_date']));
					    $data['payment_transaction_id'] = $trx['data']['id'];
					    break;

				    case 'EWALLET':

					    switch($payment_code){
						    case 'OVO':
							    $data['no_va'] = $trx['data']['phone'];
							    break;
						    case 'DANA':
						        $data['payment_url'] = $trx['data']['checkout_url'];
						        break;
						    case 'LINKAJA':
						        $data['payment_url'] = $trx['data']['checkout_url'];
						        break;
					    }

			    }

			    $status = isset($trx['data']['status']) ? $trx['data']['status'] : 'PENDING';
			    $data['status_pembayaran'] = $this->xendit->gen_payment_status($status);


		    }
	    }
	    // Cash
	    //else {}

	    $insertOrderTransaction = $this->M_order->insert($data);

	    if (!empty($insertOrderTransaction))
	    {
	        $this->response(array(
	            'code' => 1,
	            'message' => 'Insert Data Orders Success',
	            'trx' => $trx
	        ), REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
	    }
	    else
	    {
	        $this->response(array(
	            'code' => 0,
	            'message' => 'Insert data order Not success',
	            //'trx' => $trx
	        ), REST_Controller::HTTP_UNAUTHORIZED); // NOT_FOUND (404) being the HTTP response code
	    }

    }


    private function create_order_api_redirect($data)
    {

	    $trx = array();
	    if($data['pembayaran'] == 'Transfer'){

			$trx = $this->xendit->call_api_redirect($data);

		    //if(isset($_REQUEST['__debug'])) echo '<pre>', print_r($trx), '</pre>';

		    if(!$trx['success']){

			    $response = array(
				    'code' => 0,
				    'message' => $trx['reason'],
				    //'trx' => $trx
			    );
			    $this->xendit->write_log(json_encode(array('trx'=>$response, 'data'=>$data)), 'TRX', 'trx');
		        $this->response($response, REST_Controller::HTTP_UNAUTHORIZED);

		    } else {

			    $status = isset($trx['data']['status']) ? $trx['data']['status'] : 'PENDING';
			    $data['status_pembayaran'] = $this->xendit->gen_payment_status($status);
			    $data['expired_payment_date'] = date('Y-m-d H:i:s', strtotime($trx['data']['expiry_date']));
			    $data['payment_transaction_id'] = $trx['data']['id'];
			    $data['payment_url'] = $trx['data']['invoice_url'];

			    // Data ini akan ditambahkan pada callback
		        unset($data['payment_channel']);
		        unset($data['payment_code']);
		    }

	    }
	    elseif($data['pembayaran'] == 'Cash'){
		    // Nothing

	    } else {
		    $response = array(
	            'code' => 0,
	            'message' => 'Metode pembayaran salah',
	            //'trx' => $trx
	        );
		    $this->xendit->write_log(json_encode(array('trx'=>$response, 'data'=>$data)), 'TRX', 'trx');
	        $this->response($response, REST_Controller::HTTP_UNAUTHORIZED);
	    }

	    // Cash
	    //else {}

	    $insertOrderTransaction = $this->M_order->insert($data);

	    if (!empty($insertOrderTransaction))
	    {

		    $trx_rsp = $trx;
		    // if redirect method
		    if(isset($trx['data']['invoice_url']) && $trx['data']['invoice_url']){

			    $trx_rsp = array(
				    'success' => $trx['success'],
				    'data' => array(
					    'id' => $trx['data']['id'],
					    'status' => $trx['data']['status'],
					    'invoice_url' => $trx['data']['invoice_url'],
					    'expiry_date' => $trx['data']['expiry_date'],

				    ),
			    );
		    }
		    $response =array(
	            'code' => 1,
	            'message' => 'Insert Data Orders Success',
	            'trx' => $trx_rsp
	        );
	        $this->xendit->write_log(json_encode(array('trx'=>$response, 'data'=>$data)), 'TRX', 'trx');
		    $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
	    }
	    else
	    {
		    $response = array(
	            'code' => 0,
	            'message' => 'Insert data order Not success',
	            //'trx' => $trx
	        );
		    $this->xendit->write_log(json_encode(array('trx'=>$response, 'data'=>$data)), 'TRX', 'trx');
	        $this->response($response, REST_Controller::HTTP_UNAUTHORIZED); // NOT_FOUND (404) being the HTTP response code
	    }

    }
}
