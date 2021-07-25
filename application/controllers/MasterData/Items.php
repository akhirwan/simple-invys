<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Model_app');
	}

	public function index() {
		$data['title'] = 'Items Management';
		$data['main_nav'] = 'Dashboard';
		$data['breadcrumb'] = 'Items';
		$data['active_item'] = 'active';

        $data['items'] = $this->Model_app->get_data('tbl_items')->result();
        // $data['categories'] = $this->Model_app->get_data('tbl_categories')->result();
        // $data['suppliers'] = $this->Model_app->get_data('tbl_suppliers')->result();

		$this->load->view('_templates/header', $data);
		$this->load->view('_templates/dashboard_nav', $data);
		$this->load->view('item/list_view', $data);
		$this->load->view('_templates/footer', $data);
	}

	public function insert() {}
}