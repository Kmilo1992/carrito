<!DOCTYPE html>
<html lang='es'>
<head>
	<title>Código Facilito Store / etiquetas</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/base.css">
	<script src="<?= base_url() ?>js/jquery.js"></script>
	<meta charset='utf-8'>

	<script>

		$(function(){
			//adminEtiquetas();
			/*
			etiquetas();
			$('.entrada-etiqueta').on('keyup',function(e){
				if(e.which == 188 && ((t = $(this).val()).length) > 1 )
					nuevaEtiqueta(t);
				else if(e.which == 188)
					$('.entrada-etiqueta').val('');
			})

			$('#etiquetaC').on('click',function(){
				$('.entrada-etiqueta').focus();
			})*/
		})


		function etiquetas() {
			var f = $('#etiquetaC');
			if($('.etiqueta').size() == 0){
				$('.entrada-etiqueta').css('width',f.width()).val('');
				return;
			}

			var t = $('.etiqueta').last();
			var nuevoAncho = f.width() - (( t.offset().left - f.offset().left )+t.width())-25;

			if(nuevoAncho < (f.width() * 0.20))
				nuevoAncho = f.width();

			$('.entrada-etiqueta').css('width',nuevoAncho).val('');

		}

		function nuevaEtiqueta(txt){
			txt = txt.substring(0,txt.length-1);
			$('<span class="etiqueta"><span class="etiqueta-txt">'+txt+'</span><span class="etiquetaX" class=""><a href="#" class="close del-et">&times;</a></span></span>').insertBefore('.entrada-etiqueta');
			
			$('.del-et').on('click',function(){
				var self = $(this);
				var padre = self.parents('.etiqueta');

				var txt = padre.children('.etiqueta-txt').text();
				var e = $('#enviar-etiquetas');
				var v = e.val();

				if((txt.split(" ")).length>1)
					txt = '"'+txt+'"';

				e.val(v.replace(txt,''));
				padre.remove();

				etiquetas();
			})


			var e = $('#enviar-etiquetas');
			var v = e.val();

			if((txt.split(" ")).length>1)
				txt = '"'+txt+'"';

			if(e != "")
				v += " ";

			e.val(v+txt);
			etiquetas();
		}

	</script>
</head>
<body>


	<section id="etiquetaC">
		<input type="hidden" name="etiquetas" id="enviar-etiquetas" value=""/>
		<input class="entrada-etiqueta" type="text"/>
	</section>

</body>
</html>