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
}