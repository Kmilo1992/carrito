<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
	}
	function crearVenta($idP,$cantidad,$idC){
		$iC = $idC;
		$iP = $idP;
		$c = $cantidad;
		$fecha = date("Y-m-d H:i:s");
		$q = "INSERT INTO venta(idComprador,idProducto,cantidad,fechaVenta) VALUES('".$iC."','".$iP."','".$c."','".$fecha."')";
		$this->db->query($q);
		return TRUE;
	}

}
?>