<?php
	require_once './vendor/autoload.php';
	require_once './php/BaseDeDatosViajes.inc.php';
	require_once 'php/operaciones.inc.php';
	require_once 'php/Viaje.inc.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	$viaje = Viaje::getViajes($_GET["idViaje"]);
	
	$datosViajeAEnviar = [ "ciudad" => $viaje[0] -> getCiudad(),
		"imagenes" => $viaje[0] -> getImagenes(),
		"texto" => $viaje[0] -> getTexto(), 
		"fecha" => $viaje[0] -> getFecha()
	];
	
	$argumentos = ['viaje' => $datosViajeAEnviar];
	
	$template = $twig -> load('templates/html/evento_imprimir.html');
	
	echo $template -> render($argumentos);
?>
