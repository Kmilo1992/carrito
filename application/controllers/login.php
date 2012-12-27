<?php

class Login extends CI_Controller
{
	public function index(){
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('login_model');

		// IDSesion: usrTienda

		if($this->session->userdata('usrTienda'))
		{
			redirect(base_url(),'refresh');
			exit(0);
		}else{
			if($this->input->post('usr') && $this->input->post('pwd')){

				$usr = $this->input->post('usr');
				$pwd = $this->input->post('pwd');

				$esUsuario = $this->login_model->es_usuario($usr,$pwd);

				if($esUsuario){
					$this->session->set_userdata('usrTienda',$isUser);
				}else{//Usuario/Contrasena incorrecta
					$data['logged'] = false;
					$data['failure'] = true;

					$this->load->view('login');

				}
			}else//No se envio informacion
				redirect(base_url(),'refresh');

		}
	}//Fin index()
}

?>