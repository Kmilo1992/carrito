<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model');		
		
	}
	function nuevo(){
		$this->load->view('layouts/header');
		$this->load->view('usuarios/nuevo');
		$this->load->view('layouts/footer');	
	}	
	function crear(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'pat' => $this->input->post('pat'),
			'mat' => $this->input->post('mat'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
		);
		if($this->usuarios_model->crearUsuario($data)){
			//TODO
			redirect(base_url());
		}
		else{
			//TODO	
		}
	}
	function ocupado(){
		$username = $this->input->post('username');
		if(!$this->usuarios_model->esta_ocupado($username)) echo "FALSE";
		else echo "TRUE";
	}
}
?>