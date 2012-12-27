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
		
		$idImg = $this->productos_model->obtenerUltimoId();	
		if($idImg) $idImg = (int) $idImg;
		$idImg++;
		$config['upload_path'] = realpath(APPPATH . '../imgsP');
        $config['allowed_types'] = 'gif|jpg|jpeg|png|';
        $config['file_name'] = $idImg."";
        $config['max_size'] = 1000;
        $this->load->library('upload', $config);
        
        if($this->upload->do_upload()){
        	$datos_img = $this->upload->data();
			$data = array(
				'nombre' => $this->input->post('nombre'),
				'existencia' => $this->input->post('existencia'),
				'costo' => $this->input->post('costo'),
				'url' => $idImg.$datos_img["file_ext"]
			);
        	$this->productos_model->guardar($data);	
        }
        else{
        	redirect(base_url()."index.php/productos/nuevo");
        }
		redirect(base_url());
	}
}
?>