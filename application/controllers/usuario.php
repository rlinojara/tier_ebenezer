<?php
class Usuario extends CI_Controller{
	
	
	
	/**
	 * @abstract vista de listar usuario
	 */
	public function listar_usuario()
	{
		$data['view'] = 'usuario/usuario-list';
		
		$this->load->view('index',$data);
	}
	
	/**
	 * @abstract logica de deshabilitar usuario
	 */
	public function deshabilitar_usuario()
	{
	
	}
	
	
	/**
	 * @abstract vista de registrar usuario
	 */
	public function registrar_usuario()
	{
		$data['view'] = 'usuario/usuario-form';
		
		$this->load->view('index',$data);
	}
	
	/**
	 * @abstract logica de registrar usuario
	 */
	public function set_registrar_usurio()
	{
		
	}
	
	/**
	 * @abstract vista de editar usuario 
	 */
	public function editar_usuario()
	{
		$data['view'] = 'usuario/usuario-form';
		
		$this->load->view('index',$data);
	}
	
	/**
	 * @abstract logica de editar usuario
	 */
	public function set_editar_usuario()
	{
		
	}
	
	public function perfil_usuario()
	{
		$data['view'] = 'usuario/perfil';
		
		$this->load->view('index',$data);
	}
	
	
}

?>