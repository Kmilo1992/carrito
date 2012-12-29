-- Obtener productos que no esten en oferta
-- NOTA: Se debe especificar la fecha del "CLIENTE" 

SELECT * FROM producto WHERE idProducto NOT IN(SELECT idProducto FROM oferta WHERE (inicioOferta <=   AND finOferta > ) ORDER BY idProducto DESC 