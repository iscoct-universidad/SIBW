<?php
	require_once './comun.php';

	$argumentos = [];
	prepararArgumentos($argumentos);
	renderizarPlantilla('./templates/html/buscar.html', $argumentos);
?>
