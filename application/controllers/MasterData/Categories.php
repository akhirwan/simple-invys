<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Model_app');
	}

	public function index()
	{
		$data['title'] = 'Categories Management';
		$data['main_nav'] = 'Dashboard';
		$data['breadcrumb'] = 'Categories';
		$data['active_category'] = 'active';
		
        $data['categories'] = $this->Model_app->where_data(['cat_is_deleted' => 0], 'tbl_categories')->result();

		$this->load->view('_templates/header', $data);
		$this->load->view('_templates/dashboard_nav', $data);
		$this->load->view('category/list_view', $data);
		$this->load->view('_templates/footer', $data);
	}

	public function Action() {
		$id = $this->input->post('id');
        $data['cat_code'] = $this->input->post('code');
        $data['cat_name'] = $this->input->post('name');
        $data['cat_is_active'] = $this->input->post('status');
        $data['cat_description'] = $this->input->post('description');
		
		if ($id == 0) {
			$data['cat_created_at'] = date("Y-m-d h:i:s");
			$data['cat_modified_at'] = date("Y-m-d h:i:s");
			$data['cat_created_by'] = $this->session->userdata('email');
			$data['cat_modified_by'] = $this->session->userdata('email');

			$this->Model_app->insert_data($data, 'tbl_categories');
		} else {
			$data['cat_modified_at'] = date("Y-m-d h:i:s");
			$data['cat_modified_by'] = $this->session->userdata('email');

			$this->Model_app->update_data(['id' => $id], $data, 'tbl_categories');
		} 
		
		redirect(base_url().'category?alert=success');
	}

	public function Activate($id) {
		$data['cat_is_active'] = $this->input->post('status');
		$data['cat_modified_at'] = date("Y-m-d h:i:s");
		$data['cat_modified_by'] = $this->session->userdata('email');

		$this->Model_app->update_data(['cat_id' => $id], $data, 'tbl_categories');
		
		redirect(base_url().'category?alert=success');
	}

	public function Remove($id) {
		$data['cat_is_deleted'] = 1;
		$data['cat_modified_at'] = date("Y-m-d h:i:s");
		$data['cat_modified_by'] = $this->session->userdata('email');

		$this->Model_app->update_data(['cat_id' => $id], $data, 'tbl_categories');
        redirect(base_url().'category?alert=success');
	}

	public function Destroy($id) {
		$this->Model_app->delete_data(['cat_id' => $id],'tbl_categories');
        redirect(base_url().'category?alert=success');
	}
}