function agregarProducto(idProducto){
	if(validarNavegador()){
		if(localStorage['carrito_productos_ids']){
			var idsProductos=JSON.parse(localStorage['carrito_productos_ids']);	
		}
		else{
			var idsProductos = [];
		}		
		idsProductos.push(idProducto);
		localStorage['carrito_productos_ids'] = JSON.stringify(idsProductos);
		return true;
	}
	else
		return false;
}
function obtenerProductos(){
	return JSON.parse(localStorage['carrito_productos_ids']);
}
function eliminarProducto(id){
	var idsProductos=JSON.parse(localStorage['carrito_productos_ids']);
	idsProductos = idsProductos.filter(function(i){
		return i != id;
	});
	localStorage['carrito_productos_ids'] = JSON.stringify(idsProductos);
}
function vaciarProductos(){
	localStorage['carrito_productos_ids'] = "";
}
function validarNavegador(){
	if(typeof(Storage)!=="undefined")
  	{
  		return true;
  	}
	else
  	{
  		return false;
  	}
}