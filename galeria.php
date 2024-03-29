<?php
	require_once './vendor/autoload.php';
	
	require_once 'php/Navegacion.inc.php';
	require_once 'php/Viaje.inc.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	# Preparación de los argumentos a enviar
        
	$navegacionSuperior = Navegacion::get_navegacion('Superior');
	$navegacionLateral = Navegacion::get_navegacion('Lateral');
	$viaje = Viaje::getViajes();
	$datosViajeAEnviar = [];
	
	foreach($viaje as $v) {
		array_push($datosViajeAEnviar, [ "ciudad" => $v -> getCiudad(), 
			"imagenes" => $v -> getImagenes() ]);
	}
	
	$argumentos = ['navegacionSuperior' => $navegacionSuperior, 'navegacionLateral' => $navegacionLateral, 'viajes' => $datosViajeAEnviar];
	
	
	$template = $twig -> load('./templates/html/galeria.html');
	
	echo $template -> render($argumentos);
?>
