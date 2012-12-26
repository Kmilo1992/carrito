<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('productos_model');		
	}
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('welcome_message');
		$this->load->view('layouts/footer');
	}
	public function nuevo(){
		$this->load->view('layouts/header');
		$this->load->view('productos/nuevo');
		$this->load->view('layouts/footer');	
	}
	public function crear(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'existencia' => $this->input->post('existencia'),
			'costo' => $this->input->post('costo')
		);
		$this->productos_model->guardar($data);
		redirect(base_url());
	}
}
?>