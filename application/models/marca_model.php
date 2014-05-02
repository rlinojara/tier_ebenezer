<?php
class Marca_model extends CI_Model
{
	/**
	 * @param nombre
	 * @param apellido
	 * @param email
	 * @param marca
	 * @param password
	 */
	public function registrar($arg0)
	{
		$sql = 'INSERT INTO marca(nombre,apellido,email,marca,password)
				VALUES (?,?,?,?,?)';
	
		$this->db->query($sql,$arg0);
	}
	
	
	/**
	 * @param nombre
	 * @param apellido
	 * @param email
	 * @param password
	 * @param id_marca
	 */
	public function editar($arg0)
	{
		$sql = 'UPDATE marca
				SET nombre = ?,
					apellido = ?,
					email = ?,
					password = ?
				WHERE id_marca = ?';
	
		$this->db->query($sql,$arg0);
	}
	
	public function deshabilitar($arg0)
	{
		$sql = 'UPDATE marca
				SET estado = 2
				WHERE id_marca = ?';
	
		$this->db->query($sql,$arg0);
	}
	
	public function habilitar($arg0)
	{
		$sql = 'UPDATE marca
				SET estado = 1
				WHERE id_marca = ?';
	
		$this->db->query($sql,$arg0);
	}
	
	/**
	 * @param marca
	 */
	public function validar_marca($arg0)
	{
		$sql = 'SELECT count(*) as cantidad FROM marca
				WHERE marca = ?';
	
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
	
	/**
	 * @param id_usario
	 */
	public function obtener_marca_por_id($arg0)
	{
		$sql = 'SELECT id_marca,
					   nombre,
					   apellido,
					   email,
					   password
				FROM marca
				WHERE id_marca = ?';
	
		$query = $this->db->query($sql,$arg0);
	
		$result = $query->result_array();
	
		if(is_array($result) && count($result) == 1)
		{
			return $result[0];
		}
		else
		{
			return array();
		}
	}
	
	/**
	 * @param email
	 * @param password
	 * @param id_marca
	 */
	public function editar_perfil($arg0)
	{
		$sql = 'UPDATE marca
				SET email = ?,
					password = ?
				WHERE id_marca = ?';
	
		$this->db->query($sql,$arg0);
	
	}
	
	public function cantidad_total_marcas()
	{
		$sql = 'SELECT COUNT(*) as total FROM marca';
	
		$query = $this->db->query($sql);
	
		$result = $query->result_array();
	
		return $result[0]['total'];
	
	}
	
	
	/**
	 * @param por_pagina
	 * @param pagina
	 */
	public function paginacion_marca($arg0)
	{
		$sql = 'SELECT * FROM marca LIMIT ?,?';
	
		$query = $this->db->query($sql,$arg0);
	
		return $query->result_array();
	}
}