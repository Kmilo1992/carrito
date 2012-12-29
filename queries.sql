-- Obtener productos que no esten en oferta
-- NOTA: Se debe especificar la fecha del "CLIENTE" 
-- Formato fecha: 2012-12-31 08:00:00 

SELECT * FROM producto WHERE idProducto NOT IN(SELECT idProducto FROM oferta WHERE (inicioOferta <=   AND finOferta > ) ORDER BY idProducto DESC 

--
--Información de los productos en oferta
-- NOTA: Se debe especificar la fecha del "CLIENTE" 
-- Formato fecha: 2012-12-31 08:00:00 
SELECT oferta.idOferta, oferta.idProducto, (producto.precio-(producto.precio * oferta.descuento)) AS precio, oferta.descuento, producto.nombre,producto.url_img,producto.exitencia FROM producto NATURAL JOIN oferta WHERE (oferta.inicioOferta <= current_date()  AND oferta.finOferta > current_date())