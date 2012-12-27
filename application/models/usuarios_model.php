<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function crearUsuario($data){
		$this->db->insert('usuario',array(
			'nombre'=>$data['nombre'],
			'apPat'=> $data['pat'],
			'apMat' => $data['mat'],
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => md5($data['password'])
			));
		return TRUE;
	}
}
?>