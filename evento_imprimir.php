<?php
	require_once './vendor/autoload.php';
	require_once 'php/conexionBD.php';
	require_once 'php/operaciones.php';
	
	conexionBD();
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	$viaje = getViajes("0");
	
	$viaje = getViajes("0");
	$imagenes = explode(',', $viaje[0] -> imagenes);
	
	$imagenSecundaria1 = $imagenes[1];
	$imagenSecundaria2 = $imagenes[2];
	
	$datosViajeAEnviar = [ "ciudad" => $viaje[0] -> ciudad,
		"imagenSecundaria1" => $imagenSecundaria1,
		"imagenSecundaria2" => $imagenSecundaria2,
		"texto" => $viaje[0] -> texto, 
		"fecha" => $viaje[0] -> fecha
	];
	
	$argumentos = ['viaje' => $datosViajeAEnviar];
	
	$template = $twig -> load('templates/evento_imprimir.html');
	
	echo $template -> render($argumentos);
?>
