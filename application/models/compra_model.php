<?php
class Compra_model extends CI_Model
{
	
	public function cantidad_total_compras($arg0)
	{
		$parametros = array($arg0[0]);
		
		$sql = 'SELECT COUNT(*) as total 
				FROM compra as a
				INNER JOIN compra_tipo_doc as b
					ON a.id_compra_tipo_doc = b.id_compra_tipo_doc
				INNER JOIN compra_estado as c
					ON c.id_compra_estado = a.id_compra_estado 
				WHERE a.id_compra_estado = ?';
		
		/*
		if( strlen($arg0[1]) > 1 )
		{
			$sql.= ' AND nombre LIKE ?';
			array_push($parametros, $arg0[1]);
		}*/
		
		$query = $this->db->query($sql,$parametros);
		
		$result = $query->result_array();
		
		return $result[0]['total'];
	}
	
	public function paginacion_compra($arg0)
	{
		$parametros = array($arg0[0]);
		
		$sql = 'SELECT a.numero_documento,
					   b.nombre as nombre_tipo_doc,
					   a.fecha_compra,
					   c.nombre as nombre_estado,
					   a.nombre_proveedor 
				FROM compra as a
				INNER JOIN compra_tipo_doc as b
					ON a.id_compra_tipo_doc = b.id_compra_tipo_doc
				INNER JOIN compra_estado as c
					ON c.id_compra_estado = a.id_compra_estado
				WHERE a.id_compra_estado = ? ';
		
		/*
		if( strlen($arg0[1]) > 1 )
		{
			$sql.= ' AND nombre LIKE ?';
			array_push($parametros, $arg0[1]);
		}*/
		
		$sql .= ' LIMIT ?,?';
		
		array_push($parametros, $arg0[1]);
		array_push($parametros, $arg0[2]);
		
		$query = $this->db->query($sql,$parametros);
		
		return $query->result_array();
	}
}