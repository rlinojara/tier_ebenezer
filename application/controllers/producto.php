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
		$config['per_page'] = 10;
	
	
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
		
		$data['moneda'] = $this->combo_moneda('');
		
		$data['modelo_tipo'] = $this->combo_modelo_tipo('');
	
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
			$this->load->model('llanta_model');
			$this->load->model('producto_sucursal_model');
	
			$marca = $this->input->post('marcaReal');
			$medida = trim(strtoupper($this->input->post('medida')));
			$modelo = trim(strtoupper($this->input->post('modelo')));
			$tipo = $this->input->post('modelo_tipo');
			$precio = trim($this->input->post('precio'));
			$moneda = $this->input->post('moneda');
			$data = array();
				
			/**
			 * @see Validacion de producto
			 */
			//$parametro = array($producto);
				
			if( /*$this->producto_model->validar_producto($parametro)*/ false )
			{
				$data['error'] = 'producto ya se encuentra registrado';
				$data['proceso_form'] = false;
			}
			else
			{
				/**
				 * Registrar producto
				 */
				$parametros = array($marca,$medida,1,$moneda,$precio);
				$id_producto = $this->producto_model->registrar($parametros);
				
				/**
			     * Registrar llanta
				 */
				
				$parametros = array($modelo,$tipo,$id_producto);
				$this->llanta_model->registrar($parametros);
				
				
				/** 
				 * Registrando stock por sucursal
				 */
				$stock = $this->input->post('stock');
			
				
				
				foreach ($stock as $i => $valor) 
				{
        			$parametros = array($id_producto,$i,$valor);

        			$this->producto_sucursal_model->registrar($parametros);
        			
        		} 
        		
				
				$data['proceso_form'] = true;
			}
				
				
			/**
			 * @see Parametros para la vista
			 */
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
		$this->load->model('sucursal_model');
		$this->load->model('producto_sucursal_model');
		
	
		$data['view'] = 'producto/producto-form';
	
		if( $this->uri->segment(3,0) > 0 )
		{
			$parametro = array($this->uri->segment(3,0));
				
			$data['producto'] = $this->producto_model->
									   obtener_vproducto_por_id($parametro);
			
			$data['sucursal'] = $this->producto_sucursal_model->
									   obtener_por_producto($parametro);
				
			$data['id'] = $this->uri->segment(3,0);
			$data['url_form'] = 'producto/set_editar_producto';	
			$data['titulo'] = 'Edici&oacute;n';

			$data['sucursales'] = $this->sucursal_model->obtener_sucursal_activas();
			$data['modelo_tipo'] = $this->combo_modelo_tipo($data['producto']['id_modelo_tipo']);
			$data['moneda'] = $this->combo_moneda($data['producto']['id_moneda']);
			
			
			
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
		$this->load->model('producto_model');
		$this->load->model('llanta_model');
		$this->load->model('producto_sucursal_model');
		$this->load->model('sucursal_model');
		
		if ( $this->agent->is_referral() )
		{
			if( $this->input->post('id_producto') )
			{
				$this->load->model('producto_model');
	
				/**
				 * Datos e Edicion de producto
				 */
				$id_producto = $this->input->post('id_producto');
				$marca = $this->input->post('marcaReal');
				$medida = trim(strtoupper($this->input->post('medida')));
				$modelo = trim(strtoupper($this->input->post('modelo')));
				$tipo = $this->input->post('modelo_tipo');
				$precio = trim($this->input->post('precio'));
				$moneda = $this->input->post('moneda');
				
				/**
				 * Editar producto
				 */
				$parametros = array($marca,$medida,1,$moneda,$precio,$id_producto);
				$this->producto_model->editar($parametros);
				
				/**
				 * Editarllanta
				 */
				$parametros = array($modelo,$tipo,$id_producto);
				$this->llanta_model->editar($parametros);
				
				
				/**
				 * Eliminar stock
				 */
				$parametro = array($id_producto);
				$this->producto_sucursal_model->
					   eliminar_por_producto($parametro);
				
				
				/**
				 * Registrando stock por sucursal
				 */
				$stock = $this->input->post('stock');
				
				foreach ($stock as $i => $valor)
				{
					$parametros = array($id_producto,$i,$valor);
				
					$this->producto_sucursal_model->registrar($parametros);
					 
				}
				
				$data['proceso_form'] = true;
				

			   /**
				* Parametros para la vista de editar producto
				*/
				$parametro = array($id_producto);	
							
				$data['producto'] = $this->producto_model->
										   obtener_vproducto_por_id($parametro);
				
				$data['sucursal'] = $this->producto_sucursal_model->
										   obtener_por_producto($parametro);
				
				$data['view'] = 'producto/producto-form';
				$data['url_form'] = 'producto/set_editar_producto';
				$data['sucursales'] = $this->sucursal_model->obtener_sucursal_activas();
				$data['moneda'] = $this->combo_moneda($moneda);
				$data['modelo_tipo'] = $this->combo_modelo_tipo($tipo);
				$data['titulo'] = 'Editar';
				$data['id'] = $id_producto;
					
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
	
	public function obtener_marca_json()
	{
		$this->load->model('marca_model');
	
		$nombre = strtoupper($this->input->post('marca')).'%';
	
		$parametro = array($nombre);
	
		$marca = $this->marca_model->obtener_marca($parametro);
	
		echo json_encode($marca);
	}
	
	public function combo_modelo_tipo($arg0)
	{
		$this->load->model('modelo_tipo_model');
		
		$modelo_tipo = $this->modelo_tipo_model->listar();
		
		$plantilla = '<option value="%s" %s>%s</option>';
		
		$html = '';
		
		$opcion = '';
		
		for($i = 0 ; $i < count($modelo_tipo) ; $i++)
		{
			$opcion = '';
			
			if( $modelo_tipo[$i]['id_modelo_tipo'] == $arg0)
			{
				$opcion = ' selected="selected" ';	
			}	
			
			$html .=  sprintf(
							  	$plantilla,
							  	$modelo_tipo[$i]['id_modelo_tipo'],
							  	$opcion,
							  	$modelo_tipo[$i]['nombre']	
							  );
		}	
		
		return $html;
		
	}
	
	public function combo_moneda($arg0)
	{
		$this->load->model('moneda_model');
		
		$moneda = $this->moneda_model->listar();
		
		$plantilla = '<option value="%s" %s>%s</option>';
		
		$html = '';
		
		$opcion = '';
		
		for($i = 0 ; $i < count($moneda) ; $i++)
		{
			$opcion = '';
			
			if( $moneda[$i]['id_moneda'] == $arg0)
			{
				$opcion = ' selected="selected" ';
			}
		
			$html .=  sprintf(
								$plantilla,
								$moneda[$i]['id_moneda'],
								$opcion,
							  	$moneda[$i]['nombre']
							);
		}
		
		return $html;
	}
	
}