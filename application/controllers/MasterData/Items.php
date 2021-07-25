<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Model_app');
	}

	public function Index() {
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

	public function Write($id) {
		$data['title'] = 'Items Management';
		$data['main_nav'] = 'Dashboard';
		$data['breadcrumb'] = 'Items';
		$data['active_item'] = 'active';

		$data['item'] = [];
		
		if ($id != 0) $data['item'] = $this->Model_app->edit_data(['id' => $id], 'tbl_items')->row();

		$this->load->view('_templates/header', $data);
		$this->load->view('_templates/dashboard_nav', $data);
		$this->load->view('item/add_view', $data);
		$this->load->view('_templates/footer', $data);
	}

	public function Action() {
		$id = $this->input->post('id');

        $data['code'] = $this->input->post('code');
        $data['name'] = $this->input->post('name');
        $data['category_id'] = $this->input->post('category_id');
        $data['description'] = $this->input->post('description');
        $data['cost_price'] = $this->input->post('cost_price');
        $data['sell_price'] = $this->input->post('sell_price');
        $data['supplier_id'] = $this->input->post('supplier_id');

		if ($id == 0) {
			$data['created_at'] = date("Y-m-d h:i:s");
			$data['modified_at'] = date("Y-m-d h:i:s");
			$data['created_by'] = $this->session->userdata('email');
			$data['modified_by'] = $this->session->userdata('email');

			$this->Model_app->insert_data($data, 'tbl_items');
		} else {
			$data['modified_at'] = date("Y-m-d h:i:s");
			$data['modified_by'] = $this->session->userdata('email');

			$this->Model_app->update_data(['id' => $id], $data, 'tbl_items');
		}

		redirect(base_url().'item?alert=success');
	}

	public function Remove($id) {
		$this->Model_app->delete_data(['id' => $id],'tbl_items');
        redirect(base_url().'item?alert=success');
	}
}