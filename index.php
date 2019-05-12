<?php
	require_once './comun.php';
	require_once './php/BaseDeDatosViajes.inc.php';
	require_once 'php/Viaje.inc.php';
	
	$argumentos = [];
	prepararArgumentos($argumentos);
	
	$viajes = Viaje::getViajes();
	$eventos = [];
	
	foreach($viajes as $v) {
		$imagenes = $v -> getImagenes();
		$imagenPrincipal = $imagenes[0];
		
		array_push($eventos, ['href' => "./evento.php?idViaje=".$v -> getId(), 'imagenFuente' => $imagenPrincipal, 'ciudad' => $v -> getCiudad(), 'id' => $v -> getId() ]);
	}

	$argumentos['eventos'] = $eventos;
	
	renderizarPlantilla('./templates/html/principal.html', $argumentos);
?>
