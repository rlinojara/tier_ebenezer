<?php
class Compra_producto_sucursal_model extends CI_Model
{
	
	/**
	 * @param id_compra_producto
	 * @param id_sucursal
	 * @param id_estado
	 */
	public function registrar($arg0)
	{
		$sql = 'INSERT INTO compra_producto_sucursal
				(id_compra_producto,id_sucursal,id_estado)
				VALUES
				(?,?,?)';
		
		$this->db->query($sql,$arg0);
	}
}