<?php
defined("BASEPATH") or exit("No direct access allowed!");

class UbahJadwal extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("admin/ModelJadwal");
	}

	public function index(){
		$data["title"] = "Ubah Jadwal";
		$data['kelas'] = $this->ModelJadwal->lookKelas()->result();
		$data["jadwal"] = $this->ModelJadwal->getJadwal()->result();
		$data['tahunajaran'] = $this->ModelJadwal->lookTahunajaran()->result();
		$data["filter"] = false;
		$this->load->view("admin/ubahJadwal", $data);
	}

	public function filterJadwal(){
		$tahun = $this->input->post("tahunajaran");
		$kelas = $this->input->post("kelas");
		$semester = $this->input->post("semester");

		if(is_null($tahun) || is_null($kelas) || is_null($semester)){
			redirect(base_url("admin/UbahJadwal"));
		}

		$data["title"] = "Ubah Jadwal";
		$data['jadwal'] = $this->ModelJadwal->getJadwal()->result();
		$data['kelas'] = $this->ModelJadwal->lookKelas()->result();
		$data['tahunajaran'] = $this->ModelJadwal->lookTahunajaran()->result();
		$data["data_filter"] = array("tahun"=>$tahun, "kelas"=>$kelas, "semester"=>$semester);
		$data["filter"] = true;
		$this->load->view("admin/ubahJadwal", $data);
	}

	public function updateRow(){
		// TODO update data table
	}

	public function deleteRow(){
		// TODO delete data
	}
}
?>