<div class="alert alert-error" id='alert'></div>
<span class='title'>Reg&iacute;strate</span>
<form method='post' action='usuarios/crear' id='form'>
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
		
		<label>Username: </label>
		<input type='text' placeholder='Elige un &uacute;nico nombre de usuario' name='username' required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,30}$" title='M&aacute;s de 2 letras' id='username' oninput='checarDisponibilidad()'>*
		<span id='u_val'></span>
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
	var disponible = false;
	$(document).on('ready',function(){
		$("#form").on('submit',function(e){
			if($('#p1').val() != $('#p2').val()){
				e.preventDefault();
				$('#alert').text("Las contraseñas deben coincidir");
				$('#alert').show('slow');	
				desaparecer();
			}
			else if(!disponible){
				e.preventDefault();
				$('#alert').text("Parece que hay problemas con tu username");
				$('#alert').show('slow');		
				desaparecer();
			}

		});
	});
	function checarDisponibilidad(){		
		$.ajax({
			type: "POST",
			url: "<?=base_url()?>index.php/usuarios/ocupado",
			data: "username="+$('#username').val(),
			success: function(data){
				if(data == "TRUE")  {
					$('#u_val').html("<i class='icon-remove'></i> Ups! Alguien ya tiene ese username");
					disponible = false;
				}
				else if(data == "FALSE"){
					$('#u_val').html("<i class='icon-ok'></i> Yeah! es v&aacute;lido");
					disponible = true;
				}
			},
			error: function(){
				console.log('error');
			}
		});
	}
	function desaparecer(){
		setTimeout(function(){$('#alert').hide('slow');	},4000);
	}
</script>;