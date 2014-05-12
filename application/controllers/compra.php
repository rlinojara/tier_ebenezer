<?php
class Compra extends  MY_Controller
{
/**
	 * @abstract vista de listar compra
	 */
	public function listar_compra()
	{
		$this->load->library('pagination');
		$this->load->model('compra_model');
	
		$parametros = array(1);
		$config['total_rows'] = $this->compra_model->cantidad_total_compras($parametros);
		$config['per_page'] = 100;
		$config['base_url'] = site_url('compra/listar_compra/');
	
		$config['num_links'] = '2';
	
		$config['prev_link'] = 'anterior';
	
		$config['next_link'] = 'siguiente';
	
		$config['uri_segment'] = '3';
	
		$config['first_link'] = '<<';
	
		$config['last_link'] = '>>';
	
		$this->pagination->initialize($config);
	
	
		$parametros = array(
							  1,
							  intval($this->uri->segment(3,0)),
							  intval($config['per_page'])
						   );
	
		$data['compras'] = $this->compra_model->
						   paginacion_compra($parametros);
	
		$data['paginacion'] =  $this->pagination->create_links();
	
		$data['view'] = 'compra/compra-list';
	
		$data['pagina'] = $this->uri->segment(3,'');
	
		$this->load->view('index',$data);
	}
	
	
	
	public function registrar_compra()
	{
		/**
		 *@see Combos dinamicos
		 */
		$data['tipo_compra'] = $this->combo_tipo_compra('');
		$data['moneda'] = $this->combo_moneda('');
		$data['tipo_pago'] = $this->combo_tipo_pago('');
		
		$data['view'] = 'compra/compra-form';
		$this->load->view('index',$data);
	}
	
	public function set_registrar_compra()
	{
		
		$this->load->model('compra_model');
		$this->load->model('compra_producto_model');
		$this->load->model('producto_sucursal_model');
		/*$this->load->model('compra_producto_sucursal_model');*/
		
		$fecha_compra = $this->input->post('fecha_compra');
		$tipo_compra = $this->input->post('tipo_compra');
		$numero_documento = $this->input->post('numero_documento');
		$num_guia_remision = $this->input->post('numero_guia');
		$proveedor = $this->input->post('proveedor');
		$razon_social = $this->input->post('razon_social');
		$moneda = $this->input->post('moneda');
		$tipo_cambio = $this->input->post('tipo_cambio');
		$tipo_pago = $this->input->post('tipo_pago');
		
		$producto = $this->input->post('txtproducto');
		$cantidad = $this->input->post('txtcantidad');
		$precio_unitario = $this->input->post('txtpunitario');
		
		
		/**
		 * @see Si es boleta
		 */
		if( $tipo_pago == 2)
		{
			$num_guia_remision = '';
		}
		
		/**
		 * @see Si tipo de moneda es SOLES
		 */
		
		if($moneda == 1)
		{
			$tipo_cambio = 0;
		}	

		
		/**
		 * @see Registrando compra
		 */
		
		$parametros = array(
								$tipo_compra,
								$moneda,
								1,
								$tipo_pago,
								$numero_documento,
								$num_guia_remision,
								$proveedor,
								$tipo_cambio,
								$fecha_compra,
								$razon_social
						   );
		
		$id_compra = $this->compra_model->registrar($parametros);
		
		/**
		 * @see Registrando producto de compra 
		 */
		
		for( $i = 0 ; $i < count($producto) ; $i++)
		{
			$parametros = array(
									$id_compra,
									$producto[$i],
									$cantidad[$i],
									$precio_unitario[$i]
							   );
			
			$this->compra_producto_model->registrar($parametros);
		}	
		
		
		
		/*** PRIMERA FORMA ACTUALIZAR STOCK ***/
		/**
		 * @see Si el ID de Sucursal "ALMACEN" es 5
		 */
		
		$sucursal = 5;
		
		for( $i = 0 ; $i < count($producto) ; $i++)
		{
			$parametros = array(
								 $cantidad[$i],
								 $producto[$i],
								 $sucursal
							   );
			
			$this->producto_sucursal_model->
				   agregar_stock_por_producto($parametros);
		}	
		
		
		/*** SEGUNDA FORMA ACTUALIZAR STOCK ***/
		
		/*
		$sucursal = 5;
		$parametro = array($id_compra);
		$compra_producto = $this->compra_producto_model->
								  obtener_por_compra($id_compra);
		
		for( $i = 0 ; $i < count($compra_producto) ; $i++)
		{
			for( $j = 0 ; $j < intval($compra_producto[$i]['cantidad']); $j++)
			{
				
				$parametros = array(
									 $compra_producto[$i]['id_compra_producto'],
									 $sucursal,
									 1 	
								   );
				
				$this->compra_producto_sucursal_model->registrar($parametros);
			}	
		}
		*/	

	}
	
	public function editar_compra()
	{
		$data['view'] = 'compra/compra-form-update';
		$this->load->view('index',$data);
	}
	
	public function combo_tipo_compra($arg0)
	{
		$this->load->model('compra_tipo_doc_model');
		
		$tipo_compra = $this->compra_tipo_doc_model->listar();
		
		$plantilla = '<option value="%s" %s>%s</option>';
		
		$html = '';
		
		$opcion = '';
		
		for($i = 0 ; $i < count($tipo_compra) ; $i++)
		{
			$opcion = '';
			
			if( $tipo_compra[$i]['id_compra_tipo_doc'] == $arg0)
			{
				$opcion = ' selected="selected" ';
			}
		
			$html .=  sprintf(
								$plantilla,
								$tipo_compra[$i]['id_compra_tipo_doc'],
								$opcion,
								$tipo_compra[$i]['nombre']
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
	
	public function combo_tipo_pago($arg0)
	{
		$this->load->model('compra_tipo_pago_model');
		
		$tipo_pago = $this->compra_tipo_pago_model->listar();
		
		$plantilla = '<option value="%s" %s>%s</option>';
		
		$html = '';
		
		$opcion = '';
		
		for($i = 0 ; $i < count($tipo_pago) ; $i++)
		{
			$opcion = '';
			
			if( $tipo_pago[$i]['id_compra_tipo_pago'] == $arg0)
			{
				$opcion = ' selected="selected" ';
			}
		
			$html .=  sprintf(
								$plantilla,
								$tipo_pago[$i]['id_compra_tipo_pago'],
								$opcion,
								$tipo_pago[$i]['nombre']
							);
		}
		
		return $html;
	}
	
	
	public function obtener_marca_json()
	{
		$this->load->model('marca_model');
	
		if(isset($_POST['marca'])){
			$nombre = strtoupper($this->input->post('marca')).'%';
		}
		else{
			$nombre = strtoupper($this->input->get('query')).'%';
		}
	
		$parametro = array($nombre);
	
		$marca = $this->marca_model->obtener_marca($parametro);
	
		echo json_encode($marca);
	}
	
	public function obtener_producto_marca_json()
	{
		$this->load->model('producto_model');
		
		$marca = $this->input->post('marca');
		
		$nombre = '';
		
		if(isset($_POST['producto']))
		{
			$nombre = strtoupper($this->input->post('producto')).'%';
		}
		
		$parametro = array($marca,$nombre);
		
		$marca = $this->producto_model->obtener_producto_por_marca($parametro);
		
		echo json_encode($marca);
	}
	
	
	public function existe_numero_doc()
	{
		$this->load->model('compra_model');
		
		$num_doc = $this->input->post('num_doc');
		$tipo_doc = $this->input->post('tipo_doc');
		$proveedor = $this->input->post('proveedor');
		
		$parametros = array($num_doc,$tipo_doc,$proveedor);		
		$total = $this->compra_model->existe_numero_doc($parametros);
		
		if( $total > 0)
		{
			return true;
		}	
		else 
		{
			return false;
		}
	}
	
}
?>