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
	
	public function eliminar_por_producto($arg0)
	{
		$sql = 'DELETE FROM producto_sucursal
				WHERE id_producto = ?';
		
		$this->db->query($sql,$arg0);
	}
	
	
	/**
	 * @param stock
	 * @param id_producto
	 * @param id_sucursal
	 */
	public function agregar_stock_por_producto($arg0)
	{
		$sql = 'UPDATE producto_sucursal
				SET stock = (stock + ?)
				WHERE id_producto = ? AND id_sucursal = ?';
		
		$this->db->query($sql,$arg0);
	}
}