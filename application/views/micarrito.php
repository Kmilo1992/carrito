<span class="title">Mis productos</span>
<table class='table table-striped' id='tablaProductos'>

</table>
<p><strong>Total: </strong><span id='total'></span> </p>
<button class='btn' id='pagar'>Pagar</button>
<button class='btn' id='borrar'>Borrar todo</button>

<script>
	var productos = {};
	$(document).on("ready",function(){
		var costo_total= 0;
		
		var tabla = "<thead><tr><th>Nombre</th><th>Precio</th><th>Cantidad</th</tr></thead>";
		var arregloProductos = obtenerProductos();
		var iterador = 0;
		for(i in arregloProductos){
			
			var idProducto = arregloProductos[i];
			$.ajax({
				type: "POST",
				url: " <?=base_url()?>productos/productoCarrito",
				data: {id:idProducto},
				dataType: 'JSON',
				success: function(data){
					iterador++;
					//console.log(data);
					costo_total += parseFloat(data.precio);
					$('#total').text(costo_total);
					if(productos[data.idProducto])
						productos[data.idProducto].cantidad++;
					else{
						productos[data.idProducto] = {};
						productos[data.idProducto].nombre= data.nombre;
						productos[data.idProducto].precio = data.precio;
						productos[data.idProducto].cantidad = 1;
					}
					if(iterador == arregloProductos.length) tabla += formarTabla();
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
		$('#pagar').on('click',function(){
			window.location.href="<?= base_url() ?>ventas/crear/"+costo_total;
		});
	});
	function formarTabla(){
		console.log("entre a formar la tabla");	
		var answer = "";
		for(i in productos){
			var producto = productos[i];
			answer += "<tr>";
			answer += "<td>"+producto.nombre+"</td>";
			answer += "<td>"+producto.precio+"</td>";
			answer += "<td>"+producto.cantidad+"</td>";
			answer += "</tr>";
		}
		return answer;
	}
</script>