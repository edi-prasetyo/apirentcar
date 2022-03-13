<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends BD_Controller {
    function __construct()
    

    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('M_master');
    }
	

    public function kota_get()
    {
        $kota = $this->M_master->get_kota();
        if (!empty($kota))
        {
            $this->response([
                'code' => 1,
                'message' => 'List Data Kota',
                'data' => $kota
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->response([
                'code' => 0,
                'message' => 'List Data Kota Not Found',
                'data' => $kota
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }


    public function point_get()
    {
        $user_id = $this->get('user_id');
        $point = $this->M_master->get_point($user_id);
        if (!empty($point))
        {
            $this->response([
                'code' => 1,
                'message' => 'List Data Point',
                'data' => $point
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->response([
                'code' => 0,
                'message' => 'List Data Point Not Found',
                'data' => $point
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function claim_point_post()
    {
        $user_id = $this->post('user_id');
        $claim = $this->post('point');
        $point = $this->M_master->claim_point($user_id, $claim);
        if (!empty($point))
        {
            $this->response([
                'code' => 1,
                'message' => 'Success Claim Point',
                'data' => $point
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->response([
                'code' => 0,
                'message' => 'Failed Claim Point',
                'data' => $point
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function promo_get()
    {
        $promo = $this->M_master->get_promo();
        if (!empty($promo))
        {
            $this->response([
                'code' => 1,
                'message' => 'List Data Promo',
                'data' => $promo
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->response([
                'code' => 0,
                'message' => 'List Data Promo Not Found',
                'data' => $promo
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function news_get()
    {
        $news = $this->M_master->get_news($this->get('id'));

        if (!empty($news))
        {
            $this->response([
                'code' => 1,
                'message' => 'List Data News',
                'data' => $news
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->response([
                'code' => 0,
                'message' => 'List Data News Not Found',
                'data' => $news
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

}
