<?php
class Producto_sucursal_model extends CI_Model
{
	/**
	 * @param id_producto
	 * @param id_sucursal
	 * @param stock
	 */
	public function registrar($arg0)
	{
		$sql = 'INSERT INTO producto_sucursal (id_producto,id_sucursal,stock)
				VALUES (?,?,?)';
		
		$this->db->query($sql,$arg0);
	
	}
	
	public function obtener_por_producto($arg0)
	{
		$sql = 'SELECT 
					id_producto_sucursal,
					id_producto,
					id_sucursal,
					stock
				FROM producto_sucursal
				WHERE id_producto = ?';
		
		$query = $this->db->query($sql,$arg0);
		
		return $query->result_array();
	}
}