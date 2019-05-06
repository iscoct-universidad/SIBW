<?php
	require_once './comun.php';
	require_once 'php/Viaje.inc.php';
	
	$viaje = Viaje::getViajes($_GET["idViaje"]);
	$videos = $viaje[0] -> getVideos();
	
	$datosViajeAEnviar = [ "ciudad" => $viaje[0] -> getCiudad(),
			"imagenes" => $viaje[0] -> getImagenes(),
			"texto" => $viaje[0] -> getTexto(), 
			"fecha" => $viaje[0] -> getFecha(),
		];
		
	if($videos[0][0] != "")
		$datosViajeAEnviar['videos'] = $videos;
		
	$argumentos = ['viaje' => $datosViajeAEnviar];
	
	renderizarPlantilla('templates/html/evento_imprimir.html', $argumentos);
?>
