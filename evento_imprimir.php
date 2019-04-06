<?php
	require_once './vendor/autoload.php';
	require_once './php/BaseDeDatosViajes.inc.php';
	require_once 'php/operaciones.php';
	require_once 'php/Viaje.inc.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	$viaje = Viaje::getViajes("0");
	$imagenes = $viaje[0] -> getImagenes();
	
	$imagenSecundaria1 = $imagenes[1];
	$imagenSecundaria2 = $imagenes[2];
	
	$datosViajeAEnviar = [ "ciudad" => $viaje[0] -> getCiudad(),
		"imagenSecundaria1" => $imagenSecundaria1,
		"imagenSecundaria2" => $imagenSecundaria2,
		"texto" => $viaje[0] -> getTexto(), 
		"fecha" => $viaje[0] -> getFecha()
	];
	
	$argumentos = ['viaje' => $datosViajeAEnviar];
	
	$template = $twig -> load('templates/evento_imprimir.html');
	
	echo $template -> render($argumentos);
?>
