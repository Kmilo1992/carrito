<?php

	class Login_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function es_usuario($usr,$pwd)
		{
			$qry = "SELECT idUsuario,tipo FROM usuario WHERE (username='$usr' OR username='$usr') AND password='$pwd'";
			$res = $this->db->query($qry);

			if($res->num_rows()>0)
				return array('usr'=>$res->row()->idUsuario,'tipo'=>$res->row()->tipo);
			else
				return false;
		}
	}

?>