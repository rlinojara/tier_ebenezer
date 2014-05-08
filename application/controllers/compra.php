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
	
	public function editar_compra()
	{
		$data['view'] = 'compra/compra-form-update';
		$this->load->view('index',$data);
	}
	
}
?>