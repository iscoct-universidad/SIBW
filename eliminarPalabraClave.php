<?php
	require_once './comun.php';
	require_once 'php/Viaje.inc.php';
	
	$argumentos = [];
	prepararArgumentos($argumentos);
	$plantilla = "";
	
	if($_COOKIE['tipoUsuario'] == 'gestor') {
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$plantilla = "./templates/html/eliminarPalabraClave.html";
		} else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['palabraClave'])) {
			$text = Viaje::eliminarPalabraClave($_POST['id'], $_POST['palabraClave']) ? 
				"Se ha eliminado la etiqueta con éxito" : "Ha ocurrido un error";
			$argumentos['text'] = $text;
		
			$plantilla = "./templates/html/mostrarMensajeInformativo.html";
		}
	} else {
		$plantilla = "./templates/html/mostrarMensajeInformativo.html";
		$argumentos['text'] = "No tiene permisos para acceder a esta página";
	}
	
	renderizarPlantilla($plantilla, $argumentos);
?>
