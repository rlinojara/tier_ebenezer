<?php
class Compra_tipo_pago_model extends CI_Model
{
	public function listar()
	{
		$sql = 'SELECT id_compra_tipo_pago,
					   nombre
				FROM compra_tipo_pago
				WHERE estado = 1';
		
		$query = $this->db->query($sql);
		
		return $query->result_array();
	}
}