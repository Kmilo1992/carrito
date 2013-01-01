<? 
	if(!$respuesta){
		header("Location: ".base_url());   
	}
?>

<span class='title'>¡Algo no salió bien!</span>
<p> Parece que hubo un error con tu transacci&oacute;n, intenta m&aacute;s tarde</p>
<a href="<?= base_url() ?>micarrito"><button class='btn'>Ir a mi carrito</button></a>