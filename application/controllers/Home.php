<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public $vendors  = array();

	function __construct()
	{
		parent:: __construct();
		$this->vendors['head'] = 'globals-public/head.php';
		$this->vendors['header'] = 'globals-public/header.php';
		$this->vendors['scripts'] = 'globals-public/scripts.php';

		// error_reporting(0);
	}
	
	
	
	public function index()
	{
		$this->vendors["title"] = 'Home';
		$this->load->view('public/home', $this->vendors);
	}

	
}
