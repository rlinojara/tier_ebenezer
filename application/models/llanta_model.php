<?php
class llanta_model extends CI_Model
{
	/**
	 * @param modelo
	 * @param id_modelo_tipo
	 * @param id_producto
	 */
	public function registrar($arg0)
	{
		$sql = 'INSERT INTO llanta(modelo,id_modelo_tipo,id_producto)
				VALUES(?,?,?)';
		
		$this->db->query($sql,$arg0);
	}
	
	
	/**
	 * @param modelo
	 * @param id_modelo_tipo
	 * @param id_producto
	 */
	public function editar($arg0)
	{
		$sql = 'UPDATE llanta
				SET modelo = ?,
					id_modelo_tipo = ?
				WHERE id_producto = ?';
		
		$this->db->query($sql,$arg0);
	}
}