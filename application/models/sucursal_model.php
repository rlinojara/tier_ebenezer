<?php
class Sucursal_model extends CI_Model
{
	public function obtener_sucursal_activas()
	{
		$sql = 'SELECT 
					id_sucursal,
					nombre
				FROM sucursal
				WHERE estado = 1';
		
		$query = $this->db->query($sql);
		
		return $query->result_array();
		
	}
}