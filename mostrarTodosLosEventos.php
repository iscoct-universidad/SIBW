<?php
	require_once './comun.php';
	require_once 'php/Viaje.inc.php';
	
	$argumentos = [];
	$plantilla = "";
	prepararArgumentos($argumentos);
	
	if(isset($_COOKIE['user']) && isset($_COOKIE['pass']) && $_COOKIE['tipoUsuario'] == 'gestor') {
		$plantilla = "./templates/html/mostrarTodosLosEventos.html";
		$argumentos['events'] = [];
		$eventos = Viaje::getViajes();
		
		foreach($eventos as $event) {
			$formatoEvento = ['id' => $event -> id, 'ciudad' => $event -> ciudad, 'texto' => $event -> texto];
			array_push($argumentos['events'], $formatoEvento);
		}
		
	} else {
		$text = "Usted no tiene permiso para acceder a esta página";
		$plantilla = "./templates/html/mostrarMensajeInformativo.html";
		$argumentos['text'] = $text;
	}
	
	renderizarPlantilla($plantilla, $argumentos);
?>
