<?php
class Producto_model extends CI_Model
{
	/**
	 * @param nombre
	 * @param apellido
	 * @param email
	 * @param producto
	 * @param password
	 */
	public function registrar($arg0)
	{
		$sql = 'INSERT INTO producto(nombre,apellido,email,producto,password)
				VALUES (?,?,?,?,?)';
	
		$this->db->query($sql,$arg0);
	}
	
	
	/**
	 * @param nombre
	 * @param apellido
	 * @param email
	 * @param password
	 * @param id_producto
	 */
	public function editar($arg0)
	{
		$sql = 'UPDATE producto
				SET nombre = ?,
					apellido = ?,
					email = ?,
					password = ?
				WHERE id_producto = ?';
	
		$this->db->query($sql,$arg0);
	}
	
	public function deshabilitar($arg0)
	{
		$sql = 'UPDATE producto
				SET estado = 2
				WHERE id_producto = ?';
	
		$this->db->query($sql,$arg0);
	}
	
	public function habilitar($arg0)
	{
		$sql = 'UPDATE producto
				SET estado = 1
				WHERE id_producto = ?';
	
		$this->db->query($sql,$arg0);
	}
	
	/**
	 * @param producto
	 */
	public function validar_producto($arg0)
	{
		$sql = 'SELECT count(*) as cantidad FROM producto
				WHERE producto = ?';
	
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
	public function obtener_producto_por_id($arg0)
	{
		$sql = 'SELECT id_producto,
					   nombre,
					   apellido,
					   email,
					   password
				FROM producto
				WHERE id_producto = ?';
	
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
	 * @param id_producto
	 */
	public function editar_perfil($arg0)
	{
		$sql = 'UPDATE producto
				SET email = ?,
					password = ?
				WHERE id_producto = ?';
	
		$this->db->query($sql,$arg0);
	
	}
	
	public function cantidad_total_productos()
	{
		$sql = 'SELECT COUNT(*) as total FROM producto';
	
		$query = $this->db->query($sql);
	
		$result = $query->result_array();
	
		return $result[0]['total'];
	
	}
	
	
	/**
	 * @param por_pagina
	 * @param pagina
	 */
	public function paginacion_producto($arg0)
	{
		$sql = 'SELECT * FROM producto LIMIT ?,?';
	
		$query = $this->db->query($sql,$arg0);
	
		return $query->result_array();
	}
}