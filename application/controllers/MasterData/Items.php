<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Model_app');
		$this->load->model('Item');
	}

	public function Index() {
		$data['title'] = 'Items Management';
		$data['main_nav'] = 'Dashboard';
		$data['breadcrumb'] = 'Items';
		$data['active_item'] = 'active';
		
		$data['items'] = $this->Item->get_item('0')->result();

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

		$whereSup['sup_is_active'] = 1;
		$whereSup['sup_is_deleted'] = 0;
        $data['suppliers'] = $this->Model_app->where_data($whereSup, 'tbl_suppliers')->result();

		$where['cat_is_active'] = 1;
		$where['cat_is_deleted'] = 0;
        $data['categories'] = $this->Model_app->where_data($where, 'tbl_categories')->result();
		
		if ($id != 0) $data['item'] = $this->Model_app->edit_data(['item_id' => $id], 'tbl_items')->row();

		$this->load->view('_templates/header', $data);
		$this->load->view('_templates/dashboard_nav', $data);
		$this->load->view('item/add_view', $data);
		$this->load->view('_templates/footer', $data);
	}

	public function Action() {
		$id = $this->input->post('id');

        $data['item_code'] = $this->input->post('code');
        $data['item_name'] = $this->input->post('name');
        $data['item_category_id'] = $this->input->post('category_id');
        $data['item_description'] = $this->input->post('description');
        $data['item_cost_price'] = $this->input->post('cost_price');
        $data['item_sell_price'] = $this->input->post('sell_price');
        $data['item_supplier_id'] = $this->input->post('supplier_id');

		if ($id == 0) {
			$data['item_created_at'] = date("Y-m-d h:i:s");
			$data['item_modified_at'] = date("Y-m-d h:i:s");
			$data['item_created_by'] = $this->session->userdata('email');
			$data['item_modified_by'] = $this->session->userdata('email');

			$this->Model_app->insert_data($data, 'tbl_items');
		} else {
			$data['item_modified_at'] = date("Y-m-d h:i:s");
			$data['item_modified_by'] = $this->session->userdata('email');

			$this->Model_app->update_data(['item_id' => $id], $data, 'tbl_items');
		}

		redirect(base_url().'item?alert=success');
	}

	public function Activate($id) {
		$data['item_is_active'] = $this->input->post('status');
		$data['item_modified_at'] = date("Y-m-d h:i:s");
		$data['item_modified_by'] = $this->session->userdata('email');

		$this->Model_app->update_data(['item_id' => $id], $data, 'tbl_items');
		
		redirect(base_url().'item?alert=success');
	}

	public function Remove($id) {
		$data['item_is_deleted'] = 1;
		$data['item_modified_at'] = date("Y-m-d h:i:s");
		$data['item_modified_by'] = $this->session->userdata('email');

		$this->Model_app->update_data(['item_id' => $id], $data, 'tbl_items');
        redirect(base_url().'item?alert=success');
	}

	public function Destroy($id) {
		$this->Model_app->delete_data(['item_id' => $id],'tbl_items');
        redirect(base_url().'item?alert=success');
	}
}