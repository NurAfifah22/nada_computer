<?php 

/**
 * 
 */
class Servis extends My_Model
{
	public $_table = array('penservisan', 'barang');
	public $return_type = 'array';

	
	public function data($ID_Servis)
	{
		$query = $this->db->query("SELECT ID_Servis, Tanggal_Servis FROM barang as b join(penservisan as p join user as u ON p.id = u.id) ON p.ID_Barang = b.ID_Barang WHERE ID_Servis = '$ID_Servis'");
		return $query->result();
	} 
}