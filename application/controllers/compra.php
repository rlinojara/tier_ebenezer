<?php
class Compra extends  MY_Controller
{
	public function listar_compra()
	{
		$data['view'] = 'compra/compra-list';
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