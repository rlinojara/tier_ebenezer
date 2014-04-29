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
	 * @param password
	 */
	public function registrar($arg0)
	{
		$sql = 'INSERT INTO usuario(nombre,apellido,email,usuario,password)
				VALUES (?,?,?,?,?)';
		
		$this->db->query($sql,$arg0);
	}
	
	
	/**
	 * @param nombre 
	 * @param apellido
	 * @param email
	 * @param password
	 */
	public function editar($arg0)
	{
		$sql = 'UPDATE usuario
				SET nombre = ?,
					apellido = ?,
					email = ?,
					password = ?
				WHERE id_usuario = ?';

		$this->db->sql($sql,$arg0);
	}
	
	public function deshabilitar()
	{
		
	}
	
	public function habilitar()
	{
		
	}
	
	/**
	 * @param usuario
	 */
	public function validar_usuario($arg0)
	{
		$sql = 'SELECT count(*) as cantidad FROM usuario 
				WHERE usuario = ?';
	
		$query = $this->db->query($sql,$arg0);

		$result = $query->result_array();
		 
		if ( $result[0]['cantidad'] == 0 )
		{
			return false;
		}
		else 
		{
			return true;
		}	
	}
	
}