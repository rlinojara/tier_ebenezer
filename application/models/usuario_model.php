<?php
class Usuario_model extends CI_Model
{
	
	/**
	 * @param usuario
	 * @param contrase–a
	 */
	public function acceder($arg0)
	{
		$sql = 'SELECT
				 	id_usuario,
					nombre,
					apellido,
					usuario,
					email
				FROM usuario 
				WHERE usuario = ? AND
					  password = md5(?)';
		
		$query = $this->db->query($sql,$arg0);
		
		return $query->result_array();
		
	}
	
	
	/**
	 * @param nombre
	 * @param apellido
	 * @param email
	 * @param usuario
	 * @param contrase–a
	 */
	public function registrar($arg0)
	{
		
	}
	
	
	/**
	 * @param nombre 
	 * @param apellido
	 * @param email
	 * @param contrase–a
	 */
	public function editar()
	{
		
	}
	
	public function deshabilitar()
	{
		
	}
	
	public function habilitar()
	{
		
	}
	
}