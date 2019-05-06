<?php
	require_once './comun.php';
	require_once 'php/Viaje.inc.php';
	
	$argumentos = [];
	prepararArgumentos($argumentos);
	
	$viaje = Viaje::getViajes();
	$datosViajeAEnviar = [];
	
	foreach($viaje as $v) {
		array_push($datosViajeAEnviar, [ "ciudad" => $v -> getCiudad(), 
			"imagenes" => $v -> getImagenes() ]);
	}
	
	$argumentos['viajes'] = $datosViajeAEnviar;
	renderizarPlantilla('./templates/html/galeria.html', $argumentos);
?>
