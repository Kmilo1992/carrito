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
		$qry = "SHOW TABLE STATUS WHERE name='producto'";
		$ejec = $this->db->query($qry);
			
		foreach ($ejec->result() as $row) {
			$id = $row->Auto_increment;
		}

		return $id;
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