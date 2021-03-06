<?php
class Marca_model extends CI_Model
{
	/**
	 * @param nombre
	 * @param estado
	 * @param id_categoria
	 */
	public function registrar($arg0)
	{
		$sql = 'INSERT INTO subcategoria(nombre,estado,id_categoria)
				VALUES (?,?,?)';
	
		$this->db->query($sql,$arg0);
	}
	
	
	/**
	 * @param nombre
	 * @param estado
	 * @param id_subcategoria
	 */
	public function editar($arg0)
	{
		$sql = 'UPDATE subcategoria
				SET nombre = ?
				WHERE id_subcategoria = ?';
	
		$this->db->query($sql,$arg0);
		
	}
	
	public function deshabilitar($arg0)
	{
		$sql = 'UPDATE subcategoria
				SET estado = 2
				WHERE id_subcategoria = ?';
	
		$this->db->query($sql,$arg0);
	}
	
	public function habilitar($arg0)
	{
		$sql = 'UPDATE subcategoria
				SET estado = 1
				WHERE id_subcategoria = ?';
	
		$this->db->query($sql,$arg0);
	}
	
	/**
	 * @param nombremarca
	 */
	public function validar_marca($arg0)
	{
		$sql = 'SELECT count(*) as cantidad FROM subcategoria
				WHERE nombre = ?';
	
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
	 * @param id_subcategoria
	 */
	public function obtener_marca_por_id($arg0)
	{
		$sql = 'SELECT id_subcategoria,
					   nombre
				FROM subcategoria
				WHERE id_subcategoria = ?';
	
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
	 * @param estado
	 */
	public function cantidad_total_marcas($arg0)
	{
		$parametros = array($arg0[0]);
		
		$sql = 'SELECT COUNT(*) as total FROM subcategoria WHERE estado = ?';
		
		if( strlen($arg0[1]) > 1 )
		{
			$sql.= ' AND nombre LIKE ?';
			array_push($parametros, $arg0[1]);
		}	
		
		$query = $this->db->query($sql,$parametros);
	
		$result = $query->result_array();
	
		return $result[0]['total'];
	
	}
	
	
	/**
	 * @param por_pagina
	 * @param pagina
	 */
	public function paginacion_marca($arg0)
	{
		$parametros = array($arg0[0]);
		
		$sql = 'SELECT * FROM subcategoria WHERE estado = ? ';
		
		if( strlen($arg0[1]) > 1 )
		{
			$sql.= ' AND nombre LIKE ?';
			array_push($parametros, $arg0[1]);
		}
		
		$sql .= ' LIMIT ?,?';

		array_push($parametros, $arg0[2]);
		array_push($parametros, $arg0[3]);
		
		$query = $this->db->query($sql,$parametros);
	
		return $query->result_array();
	}
	

	/**
	 * @param nombre
	 */
	public function obtener_marca($arg0)
	{
		$sql = 'SELECT id_subcategoria,nombre FROM subcategoria
				WHERE nombre LIKE ? AND estado = 1';
	
		$query = $this->db->query($sql,$arg0);
		
		return $query->result_array();
	}
	

}