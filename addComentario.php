<?php
	require_once 'php/Comentario.inc.php';
	
	$idViaje = $_POST["idViaje"];
	$nombreAutor = $_POST["nombreAutor"];
	$texto = $_POST["texto"];
	
	$tiempo = getdate();
	$hora = $tiempo["hours"] . ":" . $tiempo["minutes"] . ":" . $tiempo["seconds"];
	$fecha = $tiempo["year"] . "-" . $tiempo["mon"] . "-". $tiempo["mday"];
	
	Comentario::addComentario($idViaje, $nombreAutor, $texto, $tiempo, $hora, $fecha);

?>
