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
			exit();
		}else{
			if(/*informacion enviada del form*/){

				$usr = $_POST[];
				$pwd = $_POST[];

				$esUsuario = $this->login_model->es_usuario($usr,$pwd);

				if($esUsuario){
					$this->session->set_userdata('usrTienda',$isUser)
				}else{//Usuario/Contrasena incorrecta
					$data['logged'] = false;
					$data['failure'] = true;

					$this->load->view(/*Vista login simple*/);

				}
			}else//No se envio informacion
				redirect(base_url(),'refresh');

		}
	}//Fin index()
}

?>