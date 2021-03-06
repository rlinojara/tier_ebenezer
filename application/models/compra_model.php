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
		
		$sql = 'SELECT
					   a.id_compra,
					   a.numero_documento,
					   b.nombre as nombre_tipo_doc,
					   a.fecha_compra,
					   c.nombre as nombre_estado,
					   a.nombre_proveedor,
					   a.id_compra_estado 
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
		
		$sql .= ' ORDER BY a.fecha_compra DESC LIMIT ?,?';
		
		array_push($parametros, $arg0[1]);
		array_push($parametros, $arg0[2]);
		
		$query = $this->db->query($sql,$parametros);
		
		return $query->result_array();
	}
	
	
	public function registrar($arg0)
	{
		$sql = 'INSERT INTO compra
				(
					id_compra_tipo_doc,
					id_moneda,
					id_compra_estado,
					id_compra_tipo_pago,
					numero_documento,
					numero_guia_remision,
					nombre_proveedor,
					cambio_moneda,
					fecha_compra,
					compra_razon_social,
					subtotal,
					igv,
					total
				)
				VALUES
				(
					?,
					?,
					?,
					?,
					?,
					?,
					?,
					?,
					?,
					?,
					?,
					?,
					?
				)';
		
		$this->db->query($sql,$arg0);
		
		return $this->db->insert_id(); 
	}
	
		
	
	public function editar()
	{
		$sql = 'UPDATE compra 
				SET id_moneda = ?,
					id_compra_tipo_pago = ?,
					nombre_proveedor = ?,
					cambio_moneda = ?,
					fecha_compra = ?,
					compra_razon_social = ?
				WHERE id_compra = ?';
	}
	
	/**
	 * @param id_compra_tipo_doc
	 * @param numero_doc
	 * @param nombre_proveedor
	 */
	public function existe_numero_doc($arg0)
	{
		$sql = 'SELECT COUNT(*) total 
				FROM compra WHERE id_compra_tipo_doc = ? AND
				numero_documento = ? AND 
				nombre_proveedor = ? AND 
				id_compra_estado = 1';
		
		$query = $this->db->query($sql,$arg0);
		
		$result = $query->result_array();
		
		return $result[0]['total'];
	}
	
	/**
	 * @param id_compra_estado
	 * @param id_compra
	 */
	public function actualizar_estado($arg0)
	{
		$sql = 'UPDATE compra
				SET id_compra_estado = ?
				WHERE id_compra = ?';
		
		$this->db->query($sql,$arg0);
	}
	
	
	public function obtener_por_id($arg0)
	{
		$sql = 'SELECT 
					a.id_compra,
					a.id_compra_tipo_doc,
					b.nombre as compra_tipo_doc_nombre,
					a.id_moneda,
					c.nombre as moneda_nombre,
					a.id_compra_tipo_pago,
					d.nombre as compra_tipo_doc_nombre,
					a.numero_documento,
					a.numero_guia_remision,
					a.nombre_proveedor,
					a.cambio_moneda,
					a.fecha_compra,
					a.compra_razon_social,
					a.subtotal,
					a.igv,
					a.total
				FROM compra as a
				INNER JOIN compra_tipo_doc as b
					ON a.id_compra_tipo_doc = b.id_compra_tipo_doc
				INNER JOIN moneda as c
					ON c.id_moneda = a.id_moneda
				INNER JOIN compra_tipo_pago as d
					ON d.id_compra_tipo_pago = a.id_compra_tipo_pago
				WHERE a.id_compra = ?';
		
		$query = $this->db->query($sql,$arg0);
		
		return $query->result_array();
	}
}