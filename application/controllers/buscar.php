<?

	class Buscar extends CI_Controller{

		public function index(){
			$this->load->view('layouts/header');
			$this->load->model('buscar_model');

			if($this->input->get('qry') && strlen($this->input->get('qry'))>=2){
				$qry = $this->input->get('qry');
				$palabras = explode(' ', $qry);
				$data['productos'] = $this->buscar_model->buscar($palabras);
			}else{
				$data['productos'] = false;
			}
			
			$this->load->view('productos/buscar',$data);
			$this->load->view('layouts/footer');
		}

	}

?>