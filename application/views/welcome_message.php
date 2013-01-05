<div class="alert" id='info' style="display:none;"></div>
<div class="row">
	<? 
		if($productos){
		foreach ($productos->result() as $producto) { ?>
		<div class="span7">
			<div class="span3">
				<img src="<?=base_url()?>imgsP/<?= $producto->url_img ?>">
			</div>
			<div class="span2">
				<h1><?= $producto->nombre ?></h1>
				<p><strong>Existencia: </strong> <?= $producto->exitencia ?> </p>
				<p><strong>Precio: </strong> <?= $producto->precio ?>usd </p>
				<p><strong>Cantidad </strong><input type='number' data-idP="<?= $producto->idProducto ?>" min='1' max='5' value='1' class='cantidad'></p>
				<button class="btn btn-inverse comprar" data-id="<?= $producto->idProducto ?>"> Comprar </button>
			</div>
		</div>
	<? }} ?>
</div>
<script>
	var intervalo;
	$(document).on("ready",init);
	function init(){
		$('.comprar').on('click', function(){
			
			var id = $(this).data('id');
			var selectorCantidad=".cantidad[data-idP="+$(this).data('id')+"]";
			var cantidad = $(selectorCantidad).val();
			if(!cantidad) {
				$('#info').slideUp('slow',error);
				return;
			};
			if(agregarProductos(id,cantidad)){
				$('#info').slideUp('slow',bien);
			}
			else{
				$('#info').slideUp('slow',error);
			}
		});
	}
	function desaparecer(){
		intervalo = setTimeout(function(){$('#info').slideUp('slow');},4000);	
	}
	function bien(){
		if(typeof intervalo !== "undefinded") window.clearInterval(intervalo);
		$('#info').removeClass('alert-error');
		$('#info').addClass('alert-success');
		$('#info').text('¡Tu producto ha sido agregado!');
		$('#info').slideDown('slow');
		desaparecer();
	}
	function error(){
		if(typeof intervalo !== "undefinded") window.clearInterval(intervalo);
		$('#info').removeClass('alert-success');
		$('#info').addClass('alert-error');
		$('#info').text('Algo salió mal, intenta de nuevo.');
		$('#info').slideDown('slow');	
		desaparecer();
	}
</script>