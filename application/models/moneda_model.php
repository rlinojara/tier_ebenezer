<?php
class Moneda_model extends CI_Model
{
	
	public function listar()
	{
		$sql = 'SELECT id_moneda, nombre FROM moneda';
		
		$query = $this->db->query($sql);
		
		return $query->result_array();
	}
	
}