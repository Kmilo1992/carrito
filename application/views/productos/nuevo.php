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
	<button class='btn'>Subir Producto</button>
</form>