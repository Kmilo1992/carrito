<?php

	class Login_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function es_usuario($usr,$pwd)
		{
			$qry = "SELECT idUsuario FROM usuario WHERE (username='$usr' OR username='$usr') AND password='$pwd'";
			$res = $this->db->query($qry);

			if($res->num_rows()>0)
				return $res->row();
			else
				false;
		}
	}

?>