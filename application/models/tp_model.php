<?php
class Tp_model extends CI_Model
{
	public function listar()
	{
		$sql = 'SELECT id_tp,nombre
				FROM tp WHERE estado = 1';
		
		$query = $this->db->query($sql);
		
		return $query->result_array();
	}
}