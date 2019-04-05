<?php
	require_once './vendor/autoload.php';
	require_once 'php/conjuntoComentarios.inc.php';
	require_once 'php/getViajes.inc.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	# Preparación de los argumentos a enviar
        
	$navegacionSuperior = ['Viaja', 'Tus vuelos', 'Antes de viajar'];
	$navegacionLateral = ['Check-in', 'Tus reservas', 'Estados vuelos'];
	$viaje = getViajes("0");
	$datosViajeAEnviar = [ "ciudad" => $viaje[0]["ciudad"],
		"imagenSecundaria1" => $viaje[0]["imagenesSecundarias"][0],
		"imagenSecundaria2" => $viaje[0]["imagenesSecundarias"][1],
		"texto" => $viaje[0]["texto"], 
		"fecha" => $viaje[0]["fecha"]
	];
	
	$comentarios = conjuntoComentarios('0');
	
	$argumentos = ['navegacionSuperior' => $navegacionSuperior, 'navegacionLateral' => $navegacionLateral, 
	'viaje' => $datosViajeAEnviar, 'comentarios' => $comentarios];
	
	$template = $twig -> load('./templates/evento.html');
	
	echo $template -> render($argumentos);
?>
