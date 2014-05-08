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
		$data['view'] = 'compra/compra-form';
		$this->load->view('index',$data);
	}
	
	public function set_registrar_compra()
	{
		die("entre");
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
	
	public function tipo_pago($arg0)
	{
		$this->load->model('compra_tipo_pago_model');
		
		$tipo_pago = $this->compra_tipo_pago_model->listar();
		
		$plantilla = '<option value="%s" %s>%s</option>';
		
		$html = '';
		
		$opcion = '';
		
		for($i = 0 ; $i < count($tipo_pago) ; $i++)
		{
			$opcion = '';
			
			if( $tipo_pago[$i]['id_moneda'] == $arg0)
			{
				$opcion = ' selected="selected" ';
			}
		
			$html .=  sprintf(
								$plantilla,
								$tipo_pago[$i]['id_moneda'],
								$opcion,
								$tipo_pago[$i]['nombre']
							);
		}
		
		return $html;
	}
	
}
?>