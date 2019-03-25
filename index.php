<?php
	require_once './vendor/autoload.php';
	require_once 'conjuntoViajes.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	# Preparación de los argumentos a enviar
        
	$navegacionSuperior = ['Viaja', 'Tus vuelos', 'Antes de viajar'];
	$navegacionLateral = ['Check-in', 'Tus reservas', 'Estados vuelos'];
	$viajes = conjuntoViajes();
	$eventos = [];
	
	foreach($viajes as $v)
		array_push($eventos, ['href' => 'evento.php', 'imagenFuente' => $v["imagenPrincipal"], 'ciudad' => $v["ciudad"] ]);
	
	$argumentos = ['navegacionSuperior' => $navegacionSuperior, 'navegacionLateral' => $navegacionLateral, 'eventos' => $eventos];
	
	$template = $twig -> load('principal.php');
	
	echo $template -> render($argumentos);
?>
