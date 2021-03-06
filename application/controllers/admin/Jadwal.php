<?php
defined("BASEPATH") or exit("No direct access allowed!");

class Jadwal extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/ModelJadwal');
	}

	public function index(){
		$data = $this->ModelJadwal->properties;
		
		$data['kelas'] = $this->ModelJadwal->lookKelas()->result();
		$data['tahunajaran'] = $this->ModelJadwal->lookTahunajaran()->result();
		$data['filter'] = false;
		$this->load->view('admin/jadwal', $data);
	}

	public function filterJadwal(){
		$tahun = $this->input->post("tahunAjaran");
		$kelas = $this->input->post("kelas");
		$semester = $this->input->post("semester");

		//echo $tahun. " ". $kelas. " ". $semester;

		if(is_null($tahun) || is_null($kelas) || is_null($semester)){
			redirect(base_url("admin/Jadwal"));
		}

		$data = $this->ModelJadwal->properties;
		$data['jadwal'] = $this->ModelJadwal->getJadwal()->result();
		$data['kelas'] = $this->ModelJadwal->lookKelas()->result();
		$data['tahunajaran'] = $this->ModelJadwal->lookTahunajaran()->result();
		$data["pelajaranPerHari"] = $this->ModelJadwal->getPelajaranPerHari($tahun, $semester, $kelas)->result();
		$data["data_filter"] = array("tahun"=>$tahun, "kelas"=>$kelas, "semester"=>$semester);
		$data["filter"] = true;
		$this->load->view('admin/Jadwal', $data);
	}
}

?>