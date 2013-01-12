function agregarProductos(idProducto,cantidad){
	cantidad = typeof cantidad !== 'undefined' ? cantidad : 1;
	if(!isFinite(cantidad)) return false;
	if(validarNavegador()){
		if(localStorage['carrito_productos_ids']){
			var idsProductos=JSON.parse(localStorage['carrito_productos_ids']);	
		}
		else{
			var idsProductos = [];
		}		
		for(var i = 0;i<cantidad;i++){
			idsProductos.push(idProducto);	
		}
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

/*Etiquetas*/
function adminEtiquetas() {
	etiquetas();
	$('.entrada-etiqueta').on('keyup',function(e){
		if(e.which == 188 && ((t = $(this).val()).length) > 1 )
			nuevaEtiqueta(t);
		else if(e.which == 188)
			$('.entrada-etiqueta').val('');
	})

	$('#etiquetaC').on('click',function(){
		$('.entrada-etiqueta').focus();
	})
}

function etiquetas() {
	var f = $('#etiquetaC');
	if($('.etiqueta').size() == 0){
		$('.entrada-etiqueta').css('width',f.width()).val('');
		return;
	}

	var t = $('.etiqueta').last();
	var nuevoAncho = f.width() - (( t.offset().left - f.offset().left )+t.width())-25;

	if(nuevoAncho < (f.width() * 0.20))
		nuevoAncho = f.width();

	$('.entrada-etiqueta').css('width',nuevoAncho).val('');

}

function nuevaEtiqueta(txt){
	txt = txt.substring(0,txt.length-1);
	$('<span class="etiqueta"><span class="etiqueta-txt">'+txt+'</span><span class="etiquetaX" class=""><a href="#" class="close del-et">&times;</a></span></span>').insertBefore('.entrada-etiqueta');
	
	$('.del-et').on('click',function(e){
		e.preventDefault();
		var self = $(this);
		var padre = self.parents('.etiqueta');

		var txt = padre.children('.etiqueta-txt').text();
		var e = $('#enviar-etiquetas');
		var v = e.val();

		if((txt.split(" ")).length>1)
			txt = '"'+txt+'"';

		e.val(v.replace(txt,''));
		padre.remove();

		etiquetas();
	})


	var e = $('#enviar-etiquetas');
	var v = e.val();

	if((txt.split(",")).length>1)
		txt = '"'+txt+'"';

	if(v != "")
		v += ",";

	e.val(v+txt);
	etiquetas();
}