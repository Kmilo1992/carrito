<?
	
	class Buscar_Model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function buscar($palabras){

			$cad = join(" ",$palabras);
			$snt = "SELECT * FROM producto WHERE idProducto IN (SELECT idProducto FROM etiqueta WHERE" ;

			$c = 0;
			foreach ($palabras as $p) {
				if($c==0){
					$snt .= " nombre = '".$p."'";
					$c++;
					continue;
				}

				$snt .= " OR nombre = '".$p."'";
			}

			$snt .=  ") OR  idProducto IN (SELECT idProducto FROM producto WHERE nombre LIKE '%$cad%')";
			
			$res = $this->db->query($snt);

			if($res->num_rows()>0)
				return $res;
			else
				return false;
		}
	}

?>