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
}