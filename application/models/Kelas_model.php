<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Kelas_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function data()
	{
		$this->db->select('kelas.*,pegawai.*');
		$this->db->from('kelas');
        $this->db->join('pegawai', 'kelas.nip = pegawai.nip');
		$this->db->order_by('kelas','asc');
		$query = $this->db->get();
		return $query->result();
	}

    public function detail($id_kelas){
        $this->db->select('kelas.*,pegawai.*');
		$this->db->from('kelas');
        $this->db->join('pegawai', 'kelas.nip = pegawai.nip');
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get();
        return $query->row();
    }

    public function guru($nip){
        $this->db->select('kelas.*,pegawai.*');
		$this->db->from('kelas');
        $this->db->join('pegawai', 'kelas.nip = pegawai.nip');
        $this->db->where('kelas.nip', $nip);
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah($data){
        $this->db->insert('kelas', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_kelas', $data['id_kelas']);
        $this->db->update('kelas', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_kelas', $data['id_kelas']);
        $this->db->delete('kelas', $data);
    }

}

?>