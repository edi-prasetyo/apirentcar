<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Auth extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_main');
    }

    public function login_post()
    {
        $email = $this->post('email');
        $password = $this->post('password');
        $kunci = $this->config->item('thekey');

        $this->form_validation->set_rules(
			'email',
			'Email',
			'required|valid_email',
			[
				'required' 		=> 'Email Harus diisi',
				'valid_email' 	=> 'Email Harus Valid'
			]
		);

		$this->form_validation->set_rules(
			'password',
			'Password',
			'required'
		);


        if ($this->form_validation->run() === FALSE) {
            $this->set_response([
                'code' => 0,
                'message' => 'Login Failed',
                'data' => $email
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $user = $this->M_main->get_user($email)->row_array();
            if(!empty($user)){
                if (password_verify($password, $user['password'])) {
                    $token['id'] = $user['id']; 
                    $token['username'] = $user['name'];
                    $date = new DateTime();
                    $token['iat'] = $date->getTimestamp();
                    $token['exp'] = $date->getTimestamp() + 60*60*5;
                    $output['token'] = JWT::encode($token,$kunci);
                    $dataUser['id'] = $user['id'];
                    $dataUser['name'] = $user['name'];
                    $dataUser['email'] = $user['email'];
                    $output['user_details'] = $dataUser;
                    $this->set_response([
                        'code' => 1,
                        'message' => 'Login Success',
                        'data' => $output
                    ], REST_Controller::HTTP_OK); 
                }else{
                    $this->set_response([
                        'code' => 0,
                        'message' => 'Incorrect Password, Please Check!',
                        'data' => NULL
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }   
            }else {
                $this->set_response([
                    'code' => 0,
                    'message' => 'Invalid Login',
                    'data' => $email
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function register_post(){
        $name = $this->post('name');
        
        $this->form_validation->set_rules("name","Nama","required");

		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|valid_email|is_unique[user.email]',
			[
				'required' 		=> 'Email Harus diisi',
				'valid_email' 	=> 'Email Harus Valid',
				'is_unique'		=> 'Email Sudah ada, Gunakan Email lain'
			]
		);

		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|min_length[3]',
			[
				'min_length' 	=> 'Password Min 3 karakter'
			]
		);

		$this->form_validation->set_rules('phone', 'Nomor Whatsapp', 'required|min_length[1]');
        
        $phone = $this->post('phone');

        // cek apakah no hp mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($phone))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($phone), 0, 3) == '62') {
                $hp = trim($phone);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr(trim($phone), 0, 1) == '0') {
                $hp = '62' . substr(trim($phone), 1);
            }
        }

        // collect data
        $data = [
            'user_title'	=> $this->post('user_title'),
            'name' 			=> $this->post('name'),
            'email' 		=> $this->post('email'),
            'user_image' 	=> 'default.jpg',
            'user_phone'	=> $this->post('phone'),
            'password'		=> password_hash($this->post('password'), PASSWORD_DEFAULT),
            'role_id'		=> 6,
            'is_active'		=> 1,
            'is_locked'		=> 1,
            'date_created'	=> date('Y-m-d H:i:s')
        ];
		if ($this->form_validation->run() === FALSE) {


            // menambahkan fungsi verifikasi email 
            $this->set_response([
                'code' => 0,
                'message' => 'Register Failed',
                'data' => $data
            ], REST_Controller::HTTP_BAD_REQUEST);
            
            
        } else {

            // insert data
            if($this->M_main->create($data)){
                $this->set_response([
                    'code' => 1,
                    'message' => 'Register Success',
                    'data' => $data
                ], REST_Controller::HTTP_OK);
            }
           
        }

        
    }
    
    public function profile_user_get(){
        $user_id = $this->get('user_id');
        $datauser = $this->M_main->get_user_data($user_id);

        if(!empty($datauser)){
            $this->response([
                'code' => 1,
                'message' => 'List Data User',
                'data' => $datauser
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'code' => 0,
                'message' => 'List Data User Not Found',
                'data' => $datauser
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code

        }
    }

}
