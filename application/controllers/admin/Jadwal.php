<?php
defined("BASEPATH") or exit("No direct access allowed!");

class Jadwal extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/ModelJadwal');
	}

	public function index(){
		$data = $this->ModelJadwal->properties;
		$data['jadwal'] = $this->ModelJadwal->getJadwal()->result();
		$data['kelas'] = $this->ModelJadwal->lookKelas()->result();
		$data['ruangan'] = $this->ModelJadwal->lookRuangan()->result();
		$this->load->view('admin/jadwal', $data);
	}
}

?>