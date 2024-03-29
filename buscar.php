<?php
	require_once './vendor/autoload.php';
	require_once 'php/Navegacion.inc.php';
	require_once 'php/Viaje.inc.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	# Preparación de los argumentos a enviar
        
	$navegacionSuperior = Navegacion::get_navegacion('Superior');
	$navegacionLateral = Navegacion::get_navegacion('Lateral');	
	
	$argumentos = ['navegacionSuperior' => $navegacionSuperior, 'navegacionLateral' => $navegacionLateral];

	$template = $twig -> load('./templates/html/buscar.html');
	
	echo $template -> render($argumentos);
?>
