<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Model_app');
	}

	public function Index() {
		$data['title'] = 'Login';
		// $data['config']	= $this->Model_app->get_data('config_info')->row();
        $this->load->view('auth/login_view', $data);
	}

	public function Action() {
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() != false) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = [
				'user_name' 		=> $username,
				'user_password' 	=> md5($password),
				'user_is_active'	=> 1
			];

			$this->load->model('Model_app');
			$cek = $this->Model_app->cek_login('tbl_users', $where)->row();

			if (isset($cek->user_id)) {
				// var_dump($cek);die;
				$check['id'] = $cek->user_person_id; 
				$data = $this->Model_app->cek_login('tbl_people', $check)->row();

				if (isset($data)) {
					$data_session = array(
						'id'			=> $data->id,
						'name'			=> $data->first_name . ' ' . $data->last_name,
						'departement'	=> $cek->user_dept_id,
						'address'		=> $data->address,
						'email'			=> $data->email,
						'phone'			=> $data->phone,
						'status' 		=> 'is_login'
					);
					$this->session->set_userdata($data_session);
					redirect(base_url().'dashboard');
				} else {
					redirect(base_url());
				}
			} else {
				redirect(base_url().'?alert=failed');
			}
		} else {
			$data['title'] = 'Login';
			// $data['config']	= $this->Model_app->get_data('config_info')->row();
			$this->load->view('auth/login_view', $data);
		}
	}
	
	public function Logout(){
		$this->session->sess_destroy();
		redirect(base_url().'?alert=logout');
	}
}