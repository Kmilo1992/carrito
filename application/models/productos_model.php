<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function guardar($data){
		$this->db->insert('producto',array('nombre'=>$data['nombre'],
			'exitencia'=> $data['existencia'],
			'precio' => $data['costo']));
		return TRUE;
	}
}

?>