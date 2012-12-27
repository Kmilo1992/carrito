<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
	}
	public function crearUsuario($data){
		$now = date("Y-m-d H:i:s");
		$this->db->insert('usuario',array(
			'nombre'=>$data['nombre'],
			'apPat'=> $data['pat'],
			'apMat' => $data['mat'],
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => md5($data['password']),
			'fRegistro'=> $now
			));
		return TRUE;
	}
	public function esta_ocupado($username){
		$answ = FALSE;
		$q = "select username from usuario ";
		$query = $this->db->query($q);
		if($query->num_rows() > 0){
			$id = 0;
			foreach ($query->result() as $row) {
				if(strcmp ( $row->username , $username ) == 0){
					$answ = TRUE;
				}
			}
		}
		return $answ;
	}
}
?>