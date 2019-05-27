<?php
defined("BASEPATH") or exit("No direct access allowed");

class ModelJadwal extends CI_Model{
	public $properties = array("title"=>"Jadwal");

	function getJadwal(){
		return $this->db->get('viewJadwal');
	}

	function lookKelas(){
		return $this->db->get('kelas');
	}

	function lookRuangan(){
		return $this->db->get('ruangan');
	}

	function lookPelajaran(){
		return $this->db->get("mata_pelajaran");
	}

	function addJadwal($table, $jadwal){
		$this->db->insert($table, $jadwal);
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