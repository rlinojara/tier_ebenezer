<?php
class Compra_producto_model extends CI_Model
{
	/**
	 * @param id_compra
	 * @param id_producto
	 * @param cantidad
	 * @param precio_unitaro
	 */
	public function registrar($arg0)
	{
		$sql = 'INSERT INTO compra_producto
				(id_compra,id_producto,cantidad,precio_unitario) 
				VALUES (?,?,?,?)';
		
		$this->db->query($sql,$arg0);
	}

	/**
	 * @param id_compra
	 */
	public function obtener_por_compra($arg0)
	{
		$sql = 'SELECT 
					a.id_compra_producto,
					a.id_compra,
					a.id_producto,
					a.cantidad,
					a.precio_unitario,
					b.nombre_marca,
					b.modelo
				FROM compra_producto as a
				INNER JOIN v_producto as b
					ON a.id_producto = b.id_producto
				WHERE id_compra = ?';
		
		$query = $this->db->query($sql,$arg0);
		
		return $query->result_array();
	}
	
}