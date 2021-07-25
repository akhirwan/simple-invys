<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Model_app');
		$this->load->model('Employee');
	}

	public function index()
	{
		$data['title'] = 'Employees Management';
		$data['main_nav'] = 'Back Office';
		$data['breadcrumb'] = 'Employees';
		$data['active_employee'] = 'active';

		$data['employees'] = $this->Employee->get_employee('0')->result();

		$this->load->view('_templates/header', $data);
		$this->load->view('_templates/backoffice_nav', $data);
		$this->load->view('employee/list_view', $data);
		$this->load->view('_templates/footer', $data);
	}

}