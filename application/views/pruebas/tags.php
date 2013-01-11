<!DOCTYPE html>
<html lang='es'>
<head>
	<title>Código Facilito Store / Tags</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap.css">
	<script src="<?= base_url() ?>js/jquery.js"></script>
	<meta charset='utf-8'>

	<script>

		$(function(){
			etiquetas();

			$('.input-tag').on('keyup',function(e){
				if(e.which == 188 && ((t = $(this).val()).length) > 1 )
					nuevaEtiqueta(t);
				else if(e.which == 188)
					$('.input-tag').val('');
			})

		})


		function etiquetas() {

			
			var f = $('#tagC');

			if($('.tag').size() == 0){
				$('.input-tag').css('width',f.width()).val('');
				return;
			}
			
			var t = $('.tag').last();
			var nuevoAncho = f.width() - (( t.offset().left - f.offset().left )+t.width())-25;

			if(nuevoAncho < (f.width() * 0.20))
				nuevoAncho = f.width();

			$('.input-tag').css('width',nuevoAncho).val('');

		}

		function nuevaEtiqueta(txt){
			txt = txt.substring(0,txt.length-1);
			$('<span class="tag"><span class="tagText">'+txt+'</span><span class="tagX"></span></span>').insertBefore('.input-tag');

			etiquetas();
		}

	</script>

	<style>

		*{
			margin: 0;
			padding: 0;
		}

		#tagC{
			background: #CCC;
			display: block;
			margin: 0 auto;
			margin-top:10%;
			width: 480px;
			padding: 5px;
		}

		#tagC:hover{
			outline:1px solid rgba(56,56,56,0.5);
		}

		.input-tag{
			background: transparent !important;
			display: inline-block !important;
			margin: 4px 2px !important;
			padding: 0 !important;
			outline: 0 !important;
			border: 0 !important;
			-webkit-border-radius: 0 !important;
			box-shadow: inset 0 0 #000 !important;
		}

		.input-tag:focus,input[type=text]:focus{
			outline: 0 !important;
			box-shadow: inset 0 0 #000 !important;
		}

		span{
			cursor:pointer;
		}

		.tag{
			background: rgba(56,56,56,1);
			display: inline-block;
			border-radius: 5px;
			height: 22px;
			color:white;
			padding: 2px 5px;
			margin: 2px;
			position:relative;
		}

		.tagText{
			white-space: nowrap;
		}
	</style>
</head>
<body>


	<section id="tagC">
		<input class="input-tag" type="text"/>
	</section>

</body>
</html>