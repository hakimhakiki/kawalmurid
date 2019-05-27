<?php
defined("BASEPATH") or exit("Stop");

class Launcher extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->session->set_userdata("data_list", array());
		$this->session->set_userdata("k_tmp", "");
		$this->session->set_userdata("th_tmp", "");
		$this->session->set_userdata("sm_tmp", "");
	}
	
	function index(){
		$url = base_url("admin/Dashboard");
		echo "Anda boleh Pindah Link <a href=$url>Klik disini</a>";
	}
}
?>