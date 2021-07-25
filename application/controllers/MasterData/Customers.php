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

	public function Action() {
		$id = $this->input->post('id');
		$persId = $this->input->post('pers_id');

		if ($this->input->post('banned') == null) {
			$cust['cust_is_active'] = 1;
		} else {
			$cust['cust_is_active'] = 0;
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
			$cust['cust_created_at'] = date("Y-m-d h:i:s");
			$cust['cust_modified_at'] = date("Y-m-d h:i:s");
			$cust['cust_created_by'] = $this->session->userdata('email');
			$cust['cust_modified_by'] = $this->session->userdata('email');

			$persId = $this->Model_app->insert_person($pers, 'tbl_people');
	
			$cust['cust_person_id'] = $persId;
			$this->Model_app->insert_data($cust, 'tbl_customers');

		} else {
			$cust['cust_modified_at'] = date("Y-m-d h:i:s");
			$cust['cust_modified_by'] = $this->session->userdata('email');

			$this->Model_app->update_data(['id' => $persId], $pers, 'tbl_people');
			$this->Model_app->update_data(['cust_id' => $id], $cust, 'tbl_customers');
		}


		$this->db->trans_complete();

		redirect(base_url().'customer?alert=success');
	}

	public function Activate() {
		$id = $this->input->post('id');
		
		$cust = $this->Model_app->edit_data(['cust_id' => $id], 'tbl_customers')->row();
		
		if ($cust->cust_is_active == 0) {
			$data['cust_is_active'] = 1;
		} else {
			$data['cust_is_active'] = 0;
		}
		
		$data['cust_modified_at'] = date("Y-m-d h:i:s");
		$data['cust_modified_by'] = $this->session->userdata('email');

		$this->Model_app->update_data(['cust_id' => $id], $data, 'tbl_customers');
		
		redirect(base_url().'customer?alert=success');
	}

	public function Remove($id) {
		$data['cust_is_deleted'] = 1;
		$data['cust_modified_at'] = date("Y-m-d h:i:s");
		$data['cust_modified_by'] = $this->session->userdata('email');

		$this->Model_app->update_data(['cust_id' => $id], $data, 'tbl_customers');
        redirect(base_url().'customer?alert=success');
	}

	public function Destroy($id) {
		$this->Model_app->delete_data(['cust_id' => $id],'tbl_customers');
        redirect(base_url().'customer?alert=success');
	}
}