<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $vendors  = array();

	function __construct()
	{
		parent:: __construct();
		$this->load->library('session');
		$this->vendors['head'] = 'globals-admin/head.php';
		$this->vendors['header'] = 'globals-admin/header.php';
		$this->vendors['scripts'] = 'globals-admin/scripts.php';

		// error_reporting(0);
	}
	
	
	
	public function index()
	{
		$this->vendors["title"] = 'Admin Dashboard';
		$this->load->view('admin/dashboard', $this->vendors);
	}
	
	public function dashboard()
	{
		is_login();

		$this->vendors["userId"] = $this->session->userdata('user_id');
		$this->vendors["userName"] = $this->session->userdata('user_name');
		$this->vendors["title"] = 'Dashboard';
		$this->load->view('admin/dashboard', $this->vendors);
		
	}
	
	
	public function subject_detials($perem1)
	{
		is_login();

		$this->vendors["userId"] = $this->session->userdata('user_id');
		$this->vendors["userName"] = $this->session->userdata('user_name');
		$this->vendors["id"] = $perem1;
		$this->vendors["title"] = 'Details Dashboard';
		$this->load->view('admin/subjects-details', $this->vendors);
		
	}
	
	public function subject_update($perem1)
	{
		is_login();

		$this->vendors["userId"] = $this->session->userdata('user_id');
		$this->vendors["userName"] = $this->session->userdata('user_name');
		$this->vendors["id"] = $perem1;
		$this->vendors["title"] = 'Dashboard';
		$this->load->view('admin/subjects', $this->vendors);
		
	}





	public function logout()
	{
		$sessionData = array(
			'user_id','user_name'
		);

		$this->session->unset_userdata($sessionData);
		redirect(BASE_URL);
	}

	
}
