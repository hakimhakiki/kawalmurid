<?php
defined("BASEPATH") or exit("No direct access allowed!");

class ModelJadwal extends CI_Model{
	public $properties = array("title"=>"Jadwal");

	/*
	 * Semua function 'look' digunakan pada dropdown
	 * function getPelajaranPerHari untuk menghitung jumlah pelajaran
	 * function get
	*/

	function getJadwal(){
		return $this->db->get("viewJadwal");
	}

	function lookKelas(){
		return $this->db->get("kelas");
	}

	function lookRuangan(){
		return $this->db->get("ruangan");
	}

	function lookPelajaran(){
		return $this->db->get("mata_pelajaran");
	}

	function lookTahunajaran(){
		return $this->db->query("SELECT tahun_ajaran FROM jadwal GROUP BY tahun_ajaran");
	}

	function addJadwal($table, $jadwal){
		$this->db->insert($table, $jadwal);
	}

	function updateJadwal($id, $jadwal){
		$this->db->where("id_jadwal", $id);
		$this->$this->db->update("jadwal", $jadwal);
	}

	function getPelajaranPerHari($tahun_ajaran, $semester, $kelas){
		return $this->db->query("CALL getPelajaranPerHari('$tahun_ajaran', '$semester', '$kelas')");
	}

	function getLastJadwal(){
		$last = null;
		$jadwal = $this->getJadwal()->result();
		foreach ($jadwal as $j) {
			$last = $j->id_jadwal;
		}
		return $last;
	}
	
}
?>