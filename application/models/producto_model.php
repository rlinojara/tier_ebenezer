<?php
class Producto_model extends CI_Model
{
	/**
	 * @param id_subcategoria 
	 * @param nombre (medida)
	 * @param estado
	 * @param id_moneda
	 * @param precio
	 */
	public function registrar($arg0)
	{
		$sql = 'INSERT INTO producto(id_subcategoria,
									 nombre,
									 estado,
									 id_moneda,
									 precio)
				VALUES (?,?,?,?,?)';
	
		$this->db->query($sql,$arg0);
		
		return $this->db->insert_id(); 
	}
	
	
	/**
	 * @param nombre
	 * @param id_subcategoria
	 * @param estado
	 * @param id_moneda
	 */
	public function editar($arg0)
	{
		$sql = 'UPDATE producto
				SET id_subcategoria = ?,
					nombre = ?,
					estado = ?,
					id_moneda = ?,
					precio = ?
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
	public function obtener_vproducto_por_id($arg0)
	{
		$sql = 'SELECT id_producto,
					   medida,
					   estado_producto,
					   id_marca,
					   id_moneda,
					   nombre_marca,
					   nombre_moneda,
					   modelo,
					   id_modelo_tipo,
					   nombre_modelo_tipo,
					   precio,
					   estado,
					   id_tp,
					   pliegue,
					   nombre_tp
				FROM v_producto
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
		$sql = 'SELECT COUNT(*) as total FROM v_producto';
	
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
		$sql = 'SELECT * FROM v_producto LIMIT ?,?';
	
		$query = $this->db->query($sql,$arg0);
	
		return $query->result_array();
	}
	
	/**
	 * @param marca
	 * @param producto 
	 */
	public function obtener_producto_por_marca($arg0)
	{
		$sql = 'SELECT id_producto,medida,modelo
				FROM v_producto WHERE estado = 1 AND
				id_marca = ? AND medida LIKE ?';

		$query = $this->db->query($sql,$arg0);

		return $query->result_array($sql,$arg0);
	}
	
	/**
	 * @param marca
	 */
	public function existe_producto_activo_por_marca($arg0)
	{
		$sql = 'SELECT COUNT(*) as total
				FROM v_producto WHERE estado = 1 AND id_marca = ?';
		
		$query = $this->db->query($sql,$arg0);
		
		$result = $query->result_array();
		
		return $result[0]['total'];
	}
	
}