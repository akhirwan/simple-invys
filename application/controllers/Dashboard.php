<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		// $this->load->model('Model_app');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['main_nav'] = 'Dashboard';
		// $data['meta_keyword'] = $data['config']->app_name;
		// $data['meta_description'] = $data['config']->company;
		$data['active_dashboard'] = 'active';

		$this->load->view('_templates/header', $data);
		$this->load->view('_templates/dashboard_nav', $data);
		// $this->load->view('_templates/backoffice_nav');
		$this->load->view('dashboard_page', $data);
		$this->load->view('_templates/footer', $data);
	}

}
