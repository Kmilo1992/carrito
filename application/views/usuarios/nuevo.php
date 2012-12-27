<span class='title'>Reg&iacute;strate</span>
<form method='post' action='usuarios/crear'>
	<div class="input">
		<label>Nombre: </label>
		<input type='text' placeholder='Escribe tu nombre' name='nombre' pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,30}$" required title='M&aacute;s de 2 letras' >*
	</div>
	<div class="input">
		<label>Apellido Paterno: </label>
		<input type='text' placeholder='Tu apellido paterno' name='pat' pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,30}$" title='M&aacute;s de 2 letras' >
	</div>
	<div class="input">
		<label>Apellido Materno: </label>
		<input type='text' placeholder='Tu apellido materno' name='mat' pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,30}$" title='M&aacute;s de 2 letras' >
	</div>
	<div class="input">
		<div class="alert alert-error">
  			
		</div>
		<label>Username: </label>
		<input type='text' placeholder='Elige un &uacute;nico nombre de usuario' name='username' required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,30}$" title='M&aacute;s de 2 letras' id='username'>*
	</div>
	<div class="input">
		<label>Email: </label>
		<input type='email' placeholder='Escribe tu email' name='email' required>*
	</div>
	<div class="input">
		<label>Contraseña: </label>
		<input type='password' name='password' required id='p1'>*
	</div>
	<div class="input">
		<label>Repetir contraseña: </label>
		<input type='password' name='password' required id='p2'>*
	</div>
	<button class='btn'>Reg&iacute;strame</button>
</form>
<script>
	$(document).on('ready',function(){

	});
</script>