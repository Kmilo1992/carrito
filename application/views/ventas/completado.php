<? 
	if(!$respuesta){
		header("Location: ".base_url());   
	}
?>

<span class='title'>¡Genial!</span>
<p> Te enviaremos tus productos en un plazo no mayor a una semana.</p>

<script>
	var productos = {};
	var arregloProductos = obtenerProductos();
	var iterador = 0;
	for(i in arregloProductos){
		var idProducto = arregloProductos[i];
		if(productos[idProducto])
			productos[idProducto].cantidad++;
		else{
			productos[idProducto] = {};
			productos[idProducto].idP = idProducto;
			productos[idProducto].cantidad = 1;
		}
	}
	$(document).on('ready',function(){
		guardarVentas();	
	});
	
	function guardarVentas(){
		var iterador = 0;
		for(i in productos){
			var producto = productos[i];
			
			$.ajax({
				type: "POST",
				url: " <?=base_url()?>ventas/agregarVenta",
				data: $.param({id:producto.idP}),
				success: function(data){
					iterador++;
					console.log(data);
				}
			}).error(function(e,v){
				//console.log(e)
			});
		}
	}

</script>
