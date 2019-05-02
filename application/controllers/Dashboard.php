<?php
defined("BASEPATH") or exit("No direct access allowed");

class Dashboard extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model("ModelDashboard");
	}
	function index(){
		// Inisiasi untuk header dan sidebar
		$data = $this->ModelDashboard->properties;
		$this->load->view("admin/dashboard", $data);
	}
}
?>