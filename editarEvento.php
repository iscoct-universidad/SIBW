<?php
	require_once './comun.php';
	
	$argumentos = [];
	prepararArgumentos($argumentos);
	
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		renderizarPlantilla('./templates/html/editarEvento.html', $argumentos);
	} else if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
	}
?>
