<?php
defined("BASEPATH") or exit("No direct access allowed");

class Axe extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	private function getSize(){
		$tmp = $this->session->userdata("data_list");
		return count($tmp);
	}

	private function getIndex($no){
		// Sebelum mengubah atau menghapus, maka harus mencari indexnya terlebih dahulu
		$tmp = $this->session->userdata("data_list");
		foreach ($tmp as $key => $val) {
			if($val['no']===$no){
				return $key;
			}
		}
		return null;
	}

	private function addData($no, $name, $balance){

		// Tampung sementara isi tabel
		$tmp = $this->session->userdata("data_list");
		array_push($tmp, array("no" => $no, "name" => $name, "balance" => $balance));
		// Simpan kembali ke session
		$this->session->set_userdata("data_list", $tmp);
	}

	private function deleteData($no){
		$tmp = $this->session->userdata("data_list");
		$id =  $this->getIndex($no);
		// array_diff($tmp, $id);
		unset($tmp[$id]);
		$this->session->set_userdata("data_list", $tmp);
	}

	public function index(){
		// Cuma contoh
		$data['data_list'] = $this->session->userdata("data_list");
		$data['table_size'] = $this->getSize();
		$this->load->view('test_axe', $data);
	}

	public function addRow(){
		$my_no = $this->input->post("no");
		$my_name = $this->input->post("name");
		$my_balance = $this->input->post("balance");
		$this->addData($my_no, $my_name, $my_balance);
		redirect(base_url("Axe"));
	}

	public function deleteRow($no){
		$this->deleteData($no);
		redirect(base_url("Axe"));
	}
}

?>