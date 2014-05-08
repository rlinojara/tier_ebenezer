<?php
class Compra_estado_model extends CI_Model
{
	public function listar()
	{
		$sql = 'SELECT id_compra_estado,nombre 
				FROM compra_estado WHERE 
				estado = 1';
		
		$query = $this->db->query($sql);
		
		return $query->result_array();
	}
}