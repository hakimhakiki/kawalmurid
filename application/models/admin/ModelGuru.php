<?php
defined("BASEPATH") or exit("No direct access allowed");

class ModelGuru extends CI_Model{

	public $title = "Guru";
	private $_table = "guru";
	
	public $nip;
	public $nama;
	public $jabatan;


	public function rules()
	{
		return [
			['field' => 'nip',
			'label' => 'Nip',
			'rules' => 'numeric'],

			['field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required'],

			['field' => 'jabatan',
			'label' => 'Jabatan',
			'rules' => 'required']
		];
	}

	function getGuru(){
		return $this->db->get('guru');
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
	return $this->db->get_where($this->_table, ["nip" => $id])->row();
	}

	public function save()
	{
	$post = $this->input->post();
	$this->nip = uniqid();
	$this->nama = $post["nama"];
	$this->jabatan = $post["jabatan"];
	$this->image = $this->_uploadImage(); 

	$this->db->insert($this->_table, $this);
	}


	//private function _uploadImage()
	//{
   // $config['upload_path']          = './upload/guru/';
   // $config['allowed_types']        = 'gif|jpg|png';
   // $config['file_name']            = $this->nip;
   // $config['overwrite']			= true;
   // $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

  //  $this->load->library('upload', $config);

    //if ($this->upload->do_upload('image')) {
    //    return $this->upload->data("file_name");
    //}
    
    //return "default.jpg";
	//}


 function input_data($data,$table){
$this->db->insert($table,$data);
 }

 function edit_data($where,$table){
return $this->db->get_where($table,$where);
 } 

function update_data($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
}

}
?>