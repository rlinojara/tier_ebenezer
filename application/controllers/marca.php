<?php
class Marca extends MY_Controller
{
	/**
	 * @abstract vista de listar marca
	 */
	public function listar_marca()
	{
		$this->load->library('pagination');
		$this->load->model('marca_model');
		
	
		$config['base_url'] = site_url('marca/listar_marca/');
		$parametros = array('1','');
		$config['total_rows'] = $this->marca_model->cantidad_total_marcas($parametros);
		$config['per_page'] = 100;
	
	
		$config['num_links'] = '2';
		$config['prev_link'] = 'anterior';
		$config['next_link'] = 'siguiente';
		$config['uri_segment'] = '3';
		$config['first_link'] = '<<';
		$config['last_link'] = '>>';
	
		$this->pagination->initialize($config);
		
		$pagina = intval($this->uri->segment(3,0));
	
		$parametros = array(
							 1,
							 '',	
							 intval($this->uri->segment(3,0)),
							 intval($config['per_page'])
						   );
		
		$data['marcas'] = $this->marca_model->paginacion_marca($parametros);
		
		if( count($data['marcas']) == 0 )
		{
			$pagina--;
			
			$parametros = array(
									1,
									'',
									abs($pagina),
									intval($config['per_page'])
							   );
				
			$data['marcas'] = $this->marca_model->paginacion_marca($parametros);
		}	
		
		/**
		 * Eliminando la sesion
		 */
		if(isset($_SESSION['marca']['buscar']))
		{
			unset($_SESSION['marca']['buscar']);
		}	
	
		$data['paginacion'] =  $this->pagination->create_links();
		$data['view'] = 'marca/marca-list';
		$data['pagina'] = $this->uri->segment(3,'');

		$this->load->view('index',$data);
	}
	
	/**
	 * @abstract logica de deshabilitar marca
	 */
	public function deshabilitar_marca()
	{
		$this->load->model('marca_model');
	
		if( $this->uri->segment(3,0) > 0)
		{
			$parametro = array($this->uri->segment(3,0));
				
			$this->marca_model->deshabilitar($parametro);
		}
	
		$pagina = $this->uri->segment(4,'');
		
		if(isset($_SESSION['marca']['busqueda']))
		{
			redirect('marca/buscar/'.$pagina,'refresh');
		}	
		else
		{
			redirect('marca/listar_marca/'.$pagina,'refresh');
		}	 
		
	}
	
	/**
	 * @abstract logica de deshabilitar marca
	 */
	public function habilitar_marca()
	{
		$this->load->model('marca_model');
	
		if( $this->uri->segment(3,0) > 0)
		{
			$parametro = array($this->uri->segment(3,0));
	
			$this->marca_model->habilitar($parametro);
		}
	
		$pagina = $this->uri->segment(4,'');
	
		if(isset($_SESSION['marca']['busqueda']))
		{
			redirect('marca/buscar/'.$pagina,'refresh');
		}	
		else
		{
			redirect('marca/listar_marca/'.$pagina,'refresh');
		}	 
	}
	
	
	/**
	 * @abstract vista de registrar marca
	 */
	public function registrar_marca()
	{
		$data['view'] = 'marca/marca-form';
	
		$data['url_form'] = 'marca/set_registrar_marca';
	
		$data['titulo'] = 'Registro';
	
		$this->load->view('index',$data);
	}
	
	/**
	 * @abstract logica de registrar marca
	 */
	public function set_registrar_marca()
	{
		if ( $this->agent->is_referral() )
		{
			$this->load->model('marca_model');
	
			$nombre = trim(strtoupper($this->input->post('nombre')));

			$data = array();
				
			/**
			 * @see Validacion de marca
			*/
			$parametro = array($nombre);
				
			if( $this->marca_model->validar_marca($parametro) )
			{
				$data['error'] = 'marca ya se encuentra registrada';
				$data['proceso_form'] = false;
			}
			else
			{
				/**
				 * Registrando marca
				 */
				$parametros = array($nombre,1,1);
				$this->marca_model->registrar($parametros);
				$data['proceso_form'] = true;
			}
				
				
			/**
			 * @see Parametros para la vista
			 */
			$data['view'] = 'marca/marca-form';
			$data['titulo'] = 'Registro';
			$data['url_form'] = 'marca/set_registrar_marca';
	
			$this->load->view('index',$data);
		}
		else
		{
			redirect('marca/registrar_marca');
		}
	}
	
	/**
	 * @abstract vista de editar marca
	 */
	public function editar_marca()
	{
		$this->load->model('marca_model');
	
		$data['view'] = 'marca/marca-form';
	
		if( $this->uri->segment(3,0) > 0 )
		{
			$parametro = array($this->uri->segment(3,0));
				
			$data['marca'] = $this->marca_model->obtener_marca_por_id($parametro);
				
			$data['id'] = $this->uri->segment(3,0);
				
			$data['url_form'] = 'marca/set_editar_marca';
				
			$data['titulo'] = 'Edici&oacute;n';
				
			$this->load->view('index',$data);
		}
		else
		{
			redirect('marca/registrar_marca');
		}
	
	
	}
	
	/**
	 * @abstract logica de editar marca
	 */
	public function set_editar_marca()
	{
		if ( $this->agent->is_referral() )
		{
			if( $this->input->post('id_marca') )
			{
				$this->load->model('marca_model');
	
	
				/**
				 * Datos e Edicion de marca
				*/
				$nombre = trim(strtoupper($this->input->post('nombre')));
				$id_marca = $this->input->post('id_marca');
	
				$parametros = array($nombre,$id_marca);
				$this->marca_model->editar($parametros);
				$data['proceso_form'] = true;
	
				/**
				 * @see Obteniendo datos del actual marca
				 */
				$parametro = array($id_marca);
				$data['marca'] = $this->marca_model->obtener_marca_por_id($parametro);
	
				/**
				 * Parametros para la vista de editar marca
				*/
				$data['view'] = 'marca/marca-form';
				$data['id'] = $id_marca;
				$data['url_form'] = 'marca/set_editar_marca';
				$data['titulo'] = 'Edici&oacute;n';
					
				$this->load->view('index',$data);
			}
			else
			{
				redirect('marca/listar_marca');
			}
		}
		else
		{
			redirect('marca/listar_marca');
		}
			
	}
	
	
	public function buscar()
	{
		$this->load->library('pagination');
		$this->load->model('marca_model');
		
		$parametros = array();
		
		if( isset($_POST) && count($_POST) > 0)
		{	
			if(isset($_SESSION['marca']))
			{	
				unset($_SESSION['marca']['busqueda']);
			}
			
			$nombre = strtoupper(trim($this->input->post('txtbusqueda')));
			$_SESSION['marca']['busqueda']['nombre'] = $nombre ;
		}
		else 
		{
			$nombre = $_SESSION['marca']['busqueda']['nombre'];
		}		
		
		$data['busqueda']['nombre'] = $nombre;
		
		$estado = 1;
		
		
		$parametros = array($estado,$nombre.'%');
		
		$config['base_url'] = site_url('marca/buscar/');
		$config['total_rows'] = $this->marca_model->cantidad_total_marcas($parametros);
		$config['per_page'] = 100;
		$config['num_links'] = '2';
		$config['prev_link'] = 'anterior';
		$config['next_link'] = 'siguiente';
		$config['uri_segment'] = '3';
		$config['first_link'] = '<<';
		$config['last_link'] = '>>';
		$this->pagination->initialize($config);
		
		$pagina = intval($this->uri->segment(3,0));
	
		$parametros = array(
							 1,
							 $nombre.'%',  	
							 $pagina,
							 intval($config['per_page'])
						   );
		
		$data['marcas'] = $this->marca_model->paginacion_marca($parametros);
		
		if( count($data['marcas']) == 0 )
		{
			$pagina--;
			
			$parametros = array(
									1,
									$nombre.'%',
									abs($pagina),
									intval($config['per_page'])
								);
		
			$data['marcas'] = $this->marca_model->paginacion_marca($parametros);
		}
		
		
		$data['pagina'] = $pagina;
		$data['paginacion'] =  $this->pagination->create_links();
		$data['view'] = 'marca/marca-list';
		$data['pagina'] = $this->uri->segment(3,'');
		$this->load->view('index',$data);
		
			
	}
	
	/**
	 * @param id_marca
	 */
	public function existe_producto_activo_por_marca($id_marca)
	{
		$this->load->model('producto_model');
		
		$parametro = array($id_marca);
		
		$total = $this->producto_model->
			   existe_producto_activo_por_marca($parametro);
		
		if($total > 0)
		{
			return true;
		}
		else
		{
			return false;
		}	
			 	
	}
	
}	