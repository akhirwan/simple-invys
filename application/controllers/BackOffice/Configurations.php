<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configurations extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		// $this->load->model('Model_app');
	}

	public function index()
	{
		$data['title'] = 'Configurations Management';
		$data['main_nav'] = 'Back Office';
		$data['breadcrumb'] = 'Configurations';
		// $data['meta_keyword'] = $data['config']->app_name;
		// $data['meta_description'] = $data['config']->company;
		$data['active_config'] = 'active';

		$this->load->view('_templates/header', $data);
		// $this->load->view('_templates/dashboard_nav', $data);
		$this->load->view('_templates/backoffice_nav', $data);
		$this->load->view('config/index', $data);
		$this->load->view('_templates/footer', $data);
	}

}