<?php

	class Login_Model extends CI_Model
	{
		public function __construct()
		{
			$this->::parent();
			$this->load->database();
		}

		public function is_user($usr,$pwd)
		{
			$qry = "SELECT idUsuario FROM usuario WHERE username='$usr' OR username='$usr' AND password='$pwd'";
			$ans = $this->db->query($qry);

			if($ans->num_rows()>0)
				return $ans->row();
			else
				false;
		}
	}

?>