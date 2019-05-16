<?php
	require_once './comun.php';
	require_once 'php/Viaje.inc.php';
	
	$argumentos = [];
	prepararArgumentos($argumentos);
	$plantilla = "";
	
	if($_COOKIE['tipoUsuario'] == 'gestor') {
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$plantilla = "./templates/html/addFotografiaEvento.html";
		} else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fotografiaEvento'])) {
			$text = Viaje::addFotografiaEvento($_POST['id'], $_POST['fotografiaEvento']) ? 
				"Se ha añadido la etiqueta con éxito" : "Ha ocurrido un error";
			$argumentos['text'] = $text;
		
			$plantilla = "./templates/html/mostrarMensajeInformativo.html";
		} else {
			$argumentos['text'] = "Hubo algún error con los parámetros en la petición";
			$plantilla = "./templates/html/mostrarMensajeInformativo.html";
		}
	} else {
		$plantilla = "./templates/html/mostrarMensajeInformativo.html";
		$argumentos['text'] = "No tiene permisos para acceder a esta página";
	}
	
	renderizarPlantilla($plantilla, $argumentos);
?>
