<?php
	require_once './comun.php';
	require_once './php/OperacionesDisponibles.inc.php';
	
	$argumentos = [];
	$plantilla = "";
	prepararArgumentos($argumentos);
	
	if(isset($_COOKIE['user'])) {
		$tipoUsuario = $_COOKIE['tipoUsuario'];
	} else {
		$tipoUsuario = 'anonimo';
	}
	
	$operacionesDisponibles = $GLOBALS['operacionesDisponibles'][$tipoUsuario];
		
	$argumentos['operacionesDisponibles'] = $operacionesDisponibles;
	$plantilla = "./templates/html/operacionesUsuario.html";
		
	renderizarPlantilla($plantilla, $argumentos);
?>
