<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Model_app');
		$this->load->model('Customer');
	}

	public function index()
	{
		$data['title'] = 'Customers Management';
		$data['main_nav'] = 'Dashboard';
		$data['breadcrumb'] = 'Customers';
		$data['active_customer'] = 'active';

		$data['customers'] = $this->Customer->get_customer('0')->result();

		$this->load->view('_templates/header', $data);
		$this->load->view('_templates/dashboard_nav', $data);
		$this->load->view('customer/list_view', $data);
		$this->load->view('_templates/footer', $data);
	}

	public function Write($id) {
		$data['title'] = 'Customers Management';
		$data['main_nav'] = 'Dashboard';
		$data['breadcrumb'] = 'Customers';
		$data['active_customer'] = 'active';
		
		$data['customers'] = [];
		if ($id != 0) $data['customers'] = $this->Customer->get_customer($id)->row();

		$this->load->view('_templates/header', $data);
		$this->load->view('_templates/dashboard_nav', $data);
		$this->load->view('customer/add_view', $data);
		$this->load->view('_templates/footer', $data);
	}

}