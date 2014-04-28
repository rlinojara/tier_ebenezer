<?php
class Inicio extends MY_Controller
{
	public function index()
	{
		$this->bievenida();
	}
	
	public function bievenida()
	{
		$this->load->view('index.php');
		
	}
	
	public function cerrar_sesion()
	{
		session_destroy();
		
		redirect('login/index');
	}
	
}