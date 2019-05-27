<?php
defined("BASEPATH") or exit("No access allowed");

class FormBuatJadwal extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/ModelJadwal');
	}

	private function getSize(){
		$tmp = $this->session->userdata("data_list");
		return count($tmp);
	}

	private function getIndex($no){
		// Sebelum mengubah atau menghapus, maka harus mencari indexnya (dalam array yang disimpan di session) terlebih dahulu
		$tmp = $this->session->userdata("data_list");
		foreach ($tmp as $key => $val) {
			if($val["idj"]==$no){
				return $key;
			}
		}
		return null;
	}

	private function addData($idRuang, $idPelajaran, $hari, $jamMulai){
		// Tampung sementara isi tabel
		$tmp = $this->session->userdata("data_list");
		$new_id = count($tmp) + 1;
		array_push($tmp, array("idj" => $new_id, "idRuangan" => $idRuang, "idPelajaran" => $idPelajaran, "hari" => $hari, "jamMulai"=> $jamMulai));
		// Simpan kembali ke session
		$this->session->set_userdata("data_list", $tmp);
	}

	private function updateDate($no, $idRuang, $idPelajaran, $hari, $jamMulai){
		$tmp = $this->session->userdata("data_list");
		$id = $this->getIndex($no);
	}

	private function deleteData($no){
		$tmp = $this->session->userdata("data_list");
		$id =  $this->getIndex($no);
		unset($tmp[$id]);
		$this->session->set_userdata("data_list", $tmp);
	}

	public function index(){
		$data = $this->ModelJadwal->properties;

		$data['jadwal'] = $this->ModelJadwal->getJadwal()->result();
		$data['kelas'] = $this->ModelJadwal->lookKelas()->result();
		$data['ruangan'] = $this->ModelJadwal->lookRuangan()->result();
		$data['pelajaran'] = $this->ModelJadwal->lookPelajaran()->result();

		$data['data_list'] = $this->session->userdata("data_list");
		$data['table_size'] = $this->getSize();
		//echo print_r($data['data_list']);
		$this->load->view('admin/view_formbuatjadwal', $data);
	}

	public function addRow(){
		// Buat baris baru pada form
		$my_ruangan = $this->input->post("ruangan");
		$my_pelajaran = $this->input->post("pelajaran");
		$my_hari = $this->input->post("hari");
		$my_jam = $this->input->post("jam");
		$this->addData($my_ruangan, $my_pelajaran, $my_hari, $my_jam);
		redirect(base_url("admin/FormBuatJadwal"));
	}

	public function updateRow($no){
		// Ganti data dalam baris
		$my_ruangan = $this->input->post("ruangan");
		$my_pelajaran = $this->input->post("pelajaran");
		$my_hari = $this->input->post("hari");
		$my_jam = $this->input->post("jam");
	}

	public function deleteRow($no){
		$this->deleteData($no);
		redirect(base_url("admin/FormBuatJadwal"));
	}

	public function detailRow(){
		$idx = $this->input->post("idx");
		$tmp = $this->session->userdata("data_list");

		$id = $this->getIndex($idx);
		$this_data = $tmp[$id];
		echo "<p><input type='text' name='idJadwal' value='". $this_data['idj']. "'></p>
		<p><input type='text' name='idRuangan' value='". $this_data['idRuangan']. "'></p>
		<p><input type='text' name='idPelajaran' value='". $this_data['idPelajaran']. "'></p>
		<p><input type='text' name='hari' value='". $this_data['hari']. "'></p>
		<p><input type='text' name='jamMulai' value='". $this_data['jamMulai']. "'></p>
		";
	}

	public function save(){
		// Simpan kedalam database
		$my_kelas = $this->input->post("kelas");
		$my_tahunAjar = $this->input->post("tahun_ajaran");
		$my_semester = $this->input->post("semester");

		$tmp = $this->session->userdata("data_list");
		$last = $this->ModelJadwal->getLastJadwal();
		if(is_null($last)){
			$last = 1;
		}
		echo "Last Row: $last";
		foreach ($tmp as $t) {
			$data = array(
				'id_jadwal' => $last,
				'id_kelas' => $my_kelas,
				'id_ruangan' => $t['idRuangan'],
				'id_pelajaran' => $t['idPelajaran'],
				'tahun_ajaran' => $my_tahunAjar,
				'semester' => $my_semester,
				'hari' => $t['hari'],
				'jam_mulai' => $t['jamMulai']
			);
			$last = $last + 1;
			$this->ModelJadwal->addJadwal("jadwal", $data);
		}
		$this->session->set_userdata("data_list", array());
		echo "Selesai". "<a href='". base_url("admin/Jadwal"). "'> Klik disini </a>";
	}

}

?>