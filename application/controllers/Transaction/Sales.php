<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		// $this->load->model('Model_app');
	}

	public function index()
	{
		$data['title'] = 'Sales Management';
		$data['main_nav'] = 'Dashboard';
		$data['breadcrumb'] = 'Sales';
		$data['active_sales'] = 'active';

		$this->load->view('_templates/header', $data);
		$this->load->view('_templates/dashboard_nav', $data);
		$this->load->view('sales/sales_view', $data);
		$this->load->view('_templates/footer', $data);
	}

}