<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/rest/REST_Controller.php';

class Welcome_rest extends REST_Controller
{
	public function index_get()
	{
		$this->response(
			array(
				'message' => 'Welcome to CodeIgniter!',
				'code' => 0,
				'token' => AUTHORIZATION::generateToken(array(
					'sub' => '1234567890',
					'iat' => 1516239022
				), 'your_256_bit_secret_____________')
			),
			REST_Controller::HTTP_OK
		);
	}
}
