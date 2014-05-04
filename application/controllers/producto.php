<?php
class Producto extends MY_Controller
{
	/**
	 * @abstract vista de listar producto
	 */
	public function listar_producto()
	{
		$this->load->library('pagination');
		$this->load->model('producto_model');
	
		$config['base_url'] = site_url('producto/listar_producto/');
		$config['total_rows'] = $this->producto_model->cantidad_total_productos();
		$config['per_page'] = 1;
	
	
		$config['num_links'] = '2';
	
		$config['prev_link'] = 'anterior';
	
		$config['next_link'] = 'siguiente';
	
		$config['uri_segment'] = '3';
	
		$config['first_link'] = '<<';
	
		$config['last_link'] = '>>';
	
		$this->pagination->initialize($config);
	
	
		$parametros = array(
								intval($this->uri->segment(3,0)),
								intval($config['per_page'])
						   );
	
		$data['productos'] = $this->producto_model->
							 paginacion_producto($parametros);
	
		$data['paginacion'] =  $this->pagination->create_links();
	
		$data['view'] = 'producto/producto-list';
	
		$data['pagina'] = $this->uri->segment(3,'');
	
		$this->load->view('index',$data);
	}
	
	/**
	 * @abstract logica de deshabilitar producto
	 */
	public function deshabilitar_producto()
	{
		$this->load->model('producto_model');
	
		if( $this->uri->segment(3,0) > 0)
		{
			$parametro = array($this->uri->segment(3,0));
				
			$this->producto_model->deshabilitar($parametro);
		}
	
		$pagina = $this->uri->segment(4,'');
	
		redirect('producto/listar_producto/'.$pagina,'refresh');
	}
	
	/**
	 * @abstract logica de deshabilitar producto
	 */
	public function habilitar_producto()
	{
		$this->load->model('producto_model');
	
		if( $this->uri->segment(3,0) > 0)
		{
			$parametro = array($this->uri->segment(3,0));
	
			$this->producto_model->habilitar($parametro);
		}
	
		$pagina = $this->uri->segment(4,'');
	
		redirect('producto/listar_producto/'.$pagina,'refresh');
	}
	
	
	/**
	 * @abstract vista de registrar producto
	 */
	public function registrar_producto()
	{
	
		$this->load->model('sucursal_model');
		
		$this->load->model('moneda_model');
		
		$this->load->model('modelo_tipo_model');
		
		$data['view'] = 'producto/producto-form';
	
		$data['url_form'] = 'producto/set_registrar_producto';
		
		$data['sucursales'] = $this->sucursal_model->obtener_sucursal_activas();
		
		$data['modelo_tipo'] = $this->modelo_tipo_model->listar();
		
		$data['moneda'] = $this->moneda_model->listar();
	
		$data['titulo'] = 'Registro';
	
		$this->load->view('index',$data);
	}
	
	/**
	 * @abstract logica de registrar producto
	 */
	public function set_registrar_producto()
	{
		if ( $this->agent->is_referral() )
		{
			$this->load->model('producto_model');
	
			$nombre = trim(strtoupper($this->input->post('nombre')));
			$apellido = trim(strtoupper($this->input->post('apellido')));
			$email = trim(strtolower($this->input->post('email')));
			$producto = trim(strtolower($this->input->post('producto')));
			$password = md5(trim($this->input->post('password')));
			$data = array();
				
			/**
			 * @see Validacion de producto
			*/
			$parametro = array($producto);
				
			if( $this->producto_model->validar_producto($parametro) )
			{
				$data['error'] = 'producto ya se encuentra registrado';
				$data['proceso_form'] = false;
			}
			else
			{
				/**
				 * Registrando producto
				 */
				$parametros = array($nombre,$apellido,$email,$producto,$password);
				$this->producto_model->registrar($parametros);
				$data['proceso_form'] = true;
			}
				
				
			/**
			 * @see Parametros para la vista
			 */
			$data['view'] = 'producto/producto-form';
			$data['titulo'] = 'Registro';
			$data['url_form'] = 'producto/set_registrar_producto';
	
			$this->load->view('index',$data);
		}
		else
		{
			redirect('producto/registrar_producto');
		}
	}
	
	/**
	 * @abstract vista de editar producto
	 */
	public function editar_producto()
	{
		$this->load->model('producto_model');
	
		$data['view'] = 'producto/producto-form';
	
		if( $this->uri->segment(3,0) > 0 )
		{
			$parametro = array($this->uri->segment(3,0));
				
			$data['producto'] = $this->producto_model->obtener_producto_por_id($parametro);
				
			$data['id'] = $this->uri->segment(3,0);
				
			$data['url_form'] = 'producto/set_editar_producto';
				
			$data['titulo'] = 'Edici&oacute;n';
				
			$this->load->view('index',$data);
		}
		else
		{
			redirect('producto/registrar_producto');
		}
	
	
	}
	
	/**
	 * @abstract logica de editar producto
	 */
	public function set_editar_producto()
	{
		if ( $this->agent->is_referral() )
		{
			if( $this->input->post('id_producto') )
			{
				$this->load->model('producto_model');
	
	
				/**
				 * Datos e Edicion de producto
				*/
				$nombre = trim(strtoupper($this->input->post('nombre')));
				$apellido = trim(strtoupper($this->input->post('apellido')));
				$email = trim(strtolower($this->input->post('email')));
				$password = md5(trim($this->input->post('password')));
				$id_producto = $this->input->post('id_producto');
	
				$parametros = array($nombre,$apellido,$email,$password,$id_producto);
				$this->producto_model->editar($parametros);
				$data['proceso_form'] = true;
	
				/**
				 * @see Obteniendo datos del actual producto
				 */
				$parametro = array($id_producto);
				$data['producto'] = $this->producto_model->obtener_producto_por_id($parametro);
	
				/**
				 * Parametros para la vista de editar producto
				*/
				$data['view'] = 'producto/producto-form';
				$data['id'] = $id_producto;
				$data['url_form'] = 'producto/set_editar_producto';
				$data['titulo'] = 'Edici&oacute;n';
					
				$this->load->view('index',$data);
			}
			else
			{
				redirect('producto/listar_producto');
			}
		}
		else
		{
			redirect('producto/listar_producto');
		}
			
	}
	
	
	
}