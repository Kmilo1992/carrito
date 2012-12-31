<!DOCTYPE html>
<html lang='es'>
<head>
	<title>Código Facilito Store</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/extras.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/base.css">
	<script src="<?= base_url() ?>js/jquery.js"></script>
	<script src="<?= base_url() ?>js/modernizr.js"></script>
	<script src="<?= base_url() ?>js/persistence.js"></script>
	<script>

		$(function(){
			var v = 0;
			$('.buscar-icon').on('click',function(){
				if(v%2 != 0) moBuscar(0);
				else moBuscar(80);
				v++;
			})
		})


		function moBuscar(t){
			$("#s").animate({
				top:t
			});
		}
		
	</script>
	<meta charset='utf-8'>
</head>
<body>
	<header>
		<div id='h'>
			<a href="<?= base_url()?>"><h1>My store</h1></a>
			<nav id='n'>
				<ul>
					<a href="<?= base_url()?>"><li>Inicio</li></a>
					<li>M&aacute;s vendidos</li>
					<? if($this->session->userdata('usrTienda')) { ?>
						<li>Perfil</li>
						<li><a href='./micarrito'>Mi carrito</a></li>
						<li><a href="./logout">Salir</a></li>
					<? } else { ?>
						<li><a href="./registrar">Registrarse</a></li>
						<li><a href="./login">Entrar</a></li>
					<? } ?>
					<li class="buscar-icon"><img src="<?= base_url() ?>/imgs/search-icon-w.png" /></li>

				</ul>
			</nav>
		</div>
		<section id="s">
			<form class="ss form-search" action="./buscar/" type="get">
				<div class="input-append input-sd">
					<input type="text" class="search-query input-s" name="qry" placeholder="Buscar">
					<button type="submit" class="btn">Buscar</button>
				</div>
			</form>
		</section>
	</header>
	<div id='main'>