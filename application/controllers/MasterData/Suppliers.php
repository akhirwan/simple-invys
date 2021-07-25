<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Model_app');
		$this->load->model('Supplier');
	}

	public function index()
	{
		$data['title'] = 'Suppliers Management';
		$data['main_nav'] = 'Dashboard';
		$data['breadcrumb'] = 'Suppliers';
		$data['active_supplier'] = 'active';

		$data['suppliers'] = $this->Supplier->get_supplier('0')->result();

		$this->load->view('_templates/header', $data);
		$this->load->view('_templates/dashboard_nav', $data);
		$this->load->view('supplier/list_view', $data);
		$this->load->view('_templates/footer', $data);
	}

	public function Write($id) {
		$data['title'] = 'Suppliers Management';
		$data['main_nav'] = 'Dashboard';
		$data['breadcrumb'] = 'Suppliers';
		$data['active_supplier'] = 'active';
		
		$data['suppliers'] = [];
		if ($id != 0) $data['suppliers'] = $this->Supplier->get_supplier($id)->row();

		$this->load->view('_templates/header', $data);
		$this->load->view('_templates/dashboard_nav', $data);
		$this->load->view('supplier/add_view', $data);
		$this->load->view('_templates/footer', $data);
	}

	public function Action() {
		$id = $this->input->post('id');
		$persId = $this->input->post('pers_id');

		$supp['sup_name'] = $this->input->post('name');
		$supp['sup_npwp'] = $this->input->post('npwp');

		if ($this->input->post('banned') == null) {
			$supp['sup_is_active'] = 1;
		} else {
			$supp['sup_is_active'] = 0;
		}

		// id, first_name, last_name, gender, phone, email, address, province, city
		$pers['first_name'] = $this->input->post('first_name');
		$pers['last_name'] = $this->input->post('last_name');
		$pers['gender'] = $this->input->post('gender');
		$pers['address'] = $this->input->post('address');
		$pers['phone'] = $this->input->post('phone');
		$pers['email'] = $this->input->post('email');

		// var_dump($persId);exit;

		$this->db->trans_start();

		if ($id == 0) {
			$supp['sup_created_at'] = date("Y-m-d h:i:s");
			$supp['sup_modified_at'] = date("Y-m-d h:i:s");
			$supp['sup_created_by'] = $this->session->userdata('email');
			$supp['sup_modified_by'] = $this->session->userdata('email');

			$persId = $this->Model_app->insert_person($pers, 'tbl_people');
	
			$supp['sup_person_id'] = $persId;
			$this->Model_app->insert_data($supp, 'tbl_suppliers');

		} else {
			$supp['sup_modified_at'] = date("Y-m-d h:i:s");
			$supp['sup_modified_by'] = $this->session->userdata('email');

			$this->Model_app->update_data(['id' => $persId], $pers, 'tbl_people');
			$this->Model_app->update_data(['sup_id' => $id], $supp, 'tbl_suppliers');
		}


		$this->db->trans_complete();

		redirect(base_url().'supplier?alert=success');
	}

	public function Activate() {
		$id = $this->input->post('id');
		
		$supp = $this->Model_app->edit_data(['sup_id' => $id], 'tbl_suppliers')->row();
		
		if ($supp->sup_is_active == 0) {
			$data['sup_is_active'] = 1;
		} else {
			$data['sup_is_active'] = 0;
		}
		
		$data['sup_modified_at'] = date("Y-m-d h:i:s");
		$data['sup_modified_by'] = $this->session->userdata('email');

		$this->Model_app->update_data(['sup_id' => $id], $data, 'tbl_suppliers');
		
		redirect(base_url().'supplier?alert=success');
	}

	public function Remove($id) {
		$data['sup_is_deleted'] = 1;
		$data['sup_modified_at'] = date("Y-m-d h:i:s");
		$data['sup_modified_by'] = $this->session->userdata('email');

		$this->Model_app->update_data(['sup_id' => $id], $data, 'tbl_suppliers');
        redirect(base_url().'supplier?alert=success');
	}

	public function Destroy($id) {
		$this->Model_app->delete_data(['sup_id' => $id],'tbl_suppliers');
        redirect(base_url().'supplier?alert=success');
	}
}