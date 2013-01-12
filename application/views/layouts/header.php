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

				if(parseInt($('#s').css('top')) > 0){
					moBuscar(0,null);
					$('#main').off('click',"**");
				}
				else{
					moBuscar(80,function(){
						$('#main').on('click',function(e){
							if($(e.target).closest('#s').length == 0)
								moBuscar(0,null);
						})
					});
					$('.input-s').focus();
				} 
			})

			
		})


		function moBuscar(t,f){
			$("#s").animate({ top:t	},'fast',f);
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
					<a href="<?= base_url() ?>"><li>Inicio</li></a>
					<li>M&aacute;s vendidos</li>
					<li><a href='<?= base_url() ?>micarrito'>Mi carrito</a></li>
					<li> Perfil
					<? if($this->session->userdata('usrTienda')) { 
							if($this->session->userdata('usrTipo') == '0') {
					?>
						
						<ul>
							<li><a href="<?= base_url() ?>productos/nuevo">Nuevo Producto</a></li>
							<li><a href="<?= base_url() ?>logout">Salir</a></li>
						</ul>
						
					<? } else { ?>

						<ul>
							<li><a href="<?= base_url() ?>perfil/compras">Compras</a></li>
							<li><a href="<?= base_url() ?>perfil/direcciones">Direcciones de Envío</a></li>
							<li><a href="<?= base_url() ?>logout">Salir</a></li>
						</ul>

					<? }  ?> 
					</li>
					<? } else { ?>
						<li><a href="<?= base_url() ?>registrar">Registrarse</a></li>
						<li><a href="<?= base_url() ?>login">Entrar</a></li>
					<? } ?>
					<li class="buscar-icon"><img class="buscar-icon" src="<?= base_url() ?>imgs/search-icon-w.png" /></li>

				</ul>
			</nav>
		</div>
		<section id="s">
			<form class="ss form-search" action="<?= base_url() ?>buscar/" type="get">
				<div class="input-append input-sd">
					<input type="text" class="search-query input-s" autocomplete="off" name="qry" placeholder="Buscar">
					<button type="submit" class="btn">Buscar</button>
				</div>
			</form>
		</section>
	</header>
	<div id='main'>