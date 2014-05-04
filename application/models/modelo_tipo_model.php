<?php
class Modelo_tipo_model extends CI_Model
{
	public function listar()
	{
		$sql = 'SELECT id_modelo_tipo,nombre FROM modelo_tipo';
		
		$query = $this->db->query($sql);
		
		return $query->result_array();
	}
}