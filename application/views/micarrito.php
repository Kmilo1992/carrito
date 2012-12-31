<span class="title">Mis productos</span>
<table class='table table-striped' id='tablaProductos'>

</table>
<button class='btn'>Pagar</button>
<button class='btn' id='borrar'>Borrar todo</button>
<script>
	$(document).on("ready",function(){
		var tabla = "<thead><tr><th>Nombre</th><th>Precio</th></tr></thead>";
		var arregloProductos = obtenerProductos();
		for(i in arregloProductos){

			var idProducto = arregloProductos[i];
			$.ajax({
				beforeSend: function(){console.log(idProducto)},
				type: "POST",
				url: " <?=base_url()?>productos/productoCarrito",
				data: {id:idProducto},
				dataType: 'JSON',
				success: function(data){
					console.log(data);
					tabla += formarColumna(data);
					$("#tablaProductos").html(tabla);			
				}
			}).error(function(e,v){
				console.log(e)
			});
		}
		$('#borrar').on('click',function(){
			vaciarProductos();
			location.reload();
		});
	});
		
	function formarColumna(data){
		var answer = "<tr>";
		answer += "<td>"+data.nombre+"</td>";
		answer += "<td>"+data.precio+"</td>";
		answer += "</tr>";
		return answer;
	}
</script>