<div class="row">
	<? 
		if($productos){
		foreach ($productos->result() as $producto) { ?>
		<div class="span7">
			<div class="span3">
				<img src="<?=base_url()?>imgsP/<?=$producto->url_img?>">
			</div>
			<div class="span2">
				<h1><?= $producto->nombre ?></h1>
				<p><strong>Existencia: </strong> <?= $producto->exitencia ?> </p>
				<p><strong>Precio: </strong> <?= $producto->precio ?>usd </p>
				<button class="btn btn-inverse"> Comprar </button>
			</div>
		</div>
	<? }} ?>
</div>