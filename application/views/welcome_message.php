<div class="alert" id='info'></div>
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
				<button class="btn btn-inverse comprar" data-id="<?= $producto->idProducto ?>"> Comprar </button>
			</div>
		</div>
	<? }} ?>
</div>
<script>
	$(document).on("ready",init);
	function init(){
		$('.comprar').on('click', function(){
			var id = $(this).data('id');
			if(agregarProducto(id)){
				$('#info').addClass('alert-success');
				$('#info').text('¡Tu producto ha sido agregado!');
				$('#info').slideDown('slow');
				desaparecer();
			}
			else{
				$('#info').addClass('alert-error');
				$('#info').text('Algo salió mal, intenta de nuevo.');
				$('#info').slideDown('slow');	
			}
		});
	}
	function desaparecer(){
		setTimeout(function(){$('#info').slideUp('slow');},4000);	
	}
</script>