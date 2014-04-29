<?php
class Usuario extends MY_Controller
{
	
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
	public function set_registrar_usuario()
	{
		if ( $this->agent->is_referral() )
		{
			$this->load->model('usuario_model');
		
			$nombre = trim(strtoupper($this->input->post('nombre')));
			$apellido = trim(strtoupper($this->input->post('apellido')));
			$email = trim(strtolower($this->input->post('email')));
			$usuario = trim(strtolower($this->input->post('usuario')));
			$password = md5(trim($this->input->post('password')));
			$data = array();
			
			/**
			 * @see Validacion de usuario
			 */
			$parametro = array($usuario);
			
			if( $this->usuario_model->validar_usuario($parametro) )
			{
				$data['error'] = 'Usuario ya se encuentra registrado';
			}
			else
			{
				$parametros = array($nombre,$apellido,$email,$usuario,$password);
					
				$this->usuario_model->registrar($parametros);
			}
			
			$data['view'] = 'usuario/usuario-form';
		
			$this->load->view('index',$data);
		}
		else
		{
			redirect('usuario/registrar_usuario');
		}	 	
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