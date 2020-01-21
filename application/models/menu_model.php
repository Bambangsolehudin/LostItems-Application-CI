<?php  
 
defined('BASEPATH') or exit('No direct script access allowed');
class menu_model extends CI_model
{

	public function getBarangById($id)
	{
		return $this->db->get_where('barang', ['id' => $id ])->row_array();
	}

	public function searchDataBarang()
	{
		$keyword= $this->input->post('keyword');
		//query builder
		$this->db->like('nama' , $keyword);
		$this->db->or_like('tipe' , $keyword);
		$this->db->or_like('kategori' , $keyword);
		$this->db->or_like('deskripsi' , $keyword);
		
		
		return $this->db->get('barang')->result_array();

	}


	

}