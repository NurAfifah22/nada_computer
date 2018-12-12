<?php 
/**
 * 
 */
class Home extends CI_Model
{
	
	function get_data()
	{
		$query = $this->db->query("SELECT Harga_Jual from penservisan join barang ON penservisan.ID_Barang = barang.ID_Barang group by ID_Servis");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
}

?>