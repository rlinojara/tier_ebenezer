<?php
class Compra_tipo_doc_model extends CI_Model
{
	public function listar()
	{
		$sql = 'SELECT id_compra_tipo_doc,
					   nombre
				FROM compra_tipo_doc
				WHERE estado = 1';
		
		$query = $this->db->query($sql);
		
		return $query->result_array();
	}
}