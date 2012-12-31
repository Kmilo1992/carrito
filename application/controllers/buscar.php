<?

	class Buscar extends CI_Controller{

		public function index(){
			$this->load->view('layouts/header');
			$this->load->model('buscar_model');

			$qry = $this->input->get('qry');
			$palabras = explode(' ', $qry);

			$data['productos'] = $this->buscar_model->buscar($palabras);
			$this->load->view('welcome_message',$data);
			$this->load->view('layouts/footer');
		}

	}

?>