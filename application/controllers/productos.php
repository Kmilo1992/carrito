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
				'url' => $idImg.$datos_img["file_ext"],
				'etiquetas' => limpiarEtiquetas($this->input->post('etiquetas'))
			);
        	$this->productos_model->guardar($data);	
        }
        else{
        	redirect(base_url()."index.php/productos/nuevo");
        }
		redirect(base_url());
	}

	private function limpiarEtiquetas($etiquetas){
		$etis = explode(',', $etiquetas);
		$etq = array();

		foreach ($etis as $etiqueta) {
			$etiqueta = trim($etiqueta);
			$etiqueta = htmlspecialchars($etiqueta,"UTF-8");
			array_push($etq, $etiqueta);
		}


		return $etq;
	}


	function productoCarrito(){
		$id = $this->input->post('id');
		$obj = $this->productos_model->obtenerProducto($id);
		$producto = $obj->row();
		$datos = array(
			'idProducto'=>$producto->idProducto,
			'nombre'=>$producto->nombre,
			'precio'=>$producto->precio
		);
		echo json_encode($datos);
	}
}
?>