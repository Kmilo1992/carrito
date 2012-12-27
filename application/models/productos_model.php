<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function guardar($data){
		$this->db->insert('producto',array('nombre'=>$data['nombre'],
			'exitencia'=> $data['existencia'],
			'precio' => $data['costo'],
			'url_img' => $data['url']
			));
		return TRUE;
	}
	function obtenerUltimoId(){
		$q = "select * from producto order by idproducto desc limit 1";
		$query = $this->db->query($q);
		if($query->num_rows() > 0){
			$id = 0;
			foreach ($query->result() as $row) {
				$id = $row->idProducto;
			}
			return $id;
		}
		else{
			return FALSE;
		}
	}
	function obtenerUltimos($limite){
		$q = "select * from producto order by idproducto desc limit ".$limite;
		$query = $this->db->query($q);
		if($query->num_rows() > 0){
			return $query;
		}
		else{
			return FALSE;
		}
	}
}
?>