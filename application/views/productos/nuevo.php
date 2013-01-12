<script>
	$(function(){adminEtiquetas();})
</script>

<span class='title'>Nuevo Producto</span>
<? echo form_open_multipart('productos/crear'); ?>
	<div class="input">
		<label>Nombre: </label>
		<input type='text' placeholder='Nombre Producto' name='nombre'>
	</div>
	<div class="input">
		<label>Existencia: </label>
		<input type='text' placeholder='Cantidad en inventario' name='existencia'>
	</div>
	<div class="input">
		<label>Imagen: </label>
		<input type='file' name='userfile'>
	</div>
	<div class="input">
		<label>Costo: </label>
		<input type='text' placeholder='Costo del producto' name='costo'>
	</div>

	<div class="control-group">
	    <label class="control-label" for="inputEmail">Etiquetas:</label>
	    <div id="etiquetaC" class="controls">
				<input type="hidden" name="etiquetas" id="enviar-etiquetas" value=""/>
				<input class="entrada-etiqueta" type="text"/>
	    </div>
 	</div>
	<button class='btn'>Subir Producto</button>
</form>