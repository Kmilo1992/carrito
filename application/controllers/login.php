<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('');
	}

	public function index(){
		
		$this->load->helper('form');
		$this->load->model('login_model');

		// IDSesion: usrTienda

		if($this->session->userdata('usrTienda'))
		{
			redirect(base_url(),'refresh');
			exit(0);
		}else{
			if($this->input->post('usr') && $this->input->post('pwd')){

				$usr = $this->input->post('usr');
				$pwd = md5($this->input->post('pwd'));

				$esUsuario = $this->login_model->es_usuario($usr,$pwd);

				if($esUsuario){
					$this->session->set_userdata('usrTienda',$esUsuario);
					redirect(base_url(),'refresh');
				}else{//Usuario/Contrasena incorrecta
					$data['failure'] = true;

					$this->load->view('layouts/header');
					$this->load->view('acceso/login',$data);
					$this->load->view('layouts/footer');
				}
			}else{
				//No se envio informacion
				$data['failure'] = true;

				$this->load->view('layouts/header');
				$this->load->view('acceso/login',$data);
				$this->load->view('layouts/footer');
			}

		}
	}//Fin index()


	public function logout(){
		$this->session->sess_destroy();		
		redirect(base_url(),'refresh');
	}

}

?>