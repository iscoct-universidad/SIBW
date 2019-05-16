<?php
	require_once './comun.php';
	require_once 'php/Viaje.inc.php';
	
	$argumentos = [];
	$plantilla = "";
	prepararArgumentos($argumentos);
	
	if(isset($_COOKIE['user']) && isset($_COOKIE['pass']) && $_COOKIE['tipoUsuario'] == 'moderador') {
		$plantilla = "./templates/html/mostrarTodosLosComentarios.html";
		$argumentos['eventos'] = [];
		$eventos = Viaje::getViajes();
		
		foreach($eventos as $event) {
			$formatoEvento = ['ciudad' => $event -> getCiudad()];
			array_push($argumentos['eventos'], $formatoEvento);
		}
		
	} else {
		$text = "Usted no tiene permiso para acceder a esta página";
		$plantilla = "./templates/html/mostrarMensajeInformativo.html";
		$argumentos['text'] = $text;
	}
	
	renderizarPlantilla($plantilla, $argumentos);
?>
