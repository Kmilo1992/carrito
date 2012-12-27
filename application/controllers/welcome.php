<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('productos_model');		
	}
	public function index()
	{
		$data['productos'] = $this->productos_model->obtenerUltimos(5);
		$this->load->view('layouts/header');
		$this->load->view('welcome_message',$data);
		$this->load->view('layouts/footer');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */