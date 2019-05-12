<?php
	require_once './comun.php';
	
	$argumentos = [];
	prepararArgumentos($argumentos);
	renderizarPlantilla('./templates/html/crearUsuario.html', $argumentos);
?>
