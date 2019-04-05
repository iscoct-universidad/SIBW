<?php
	require_once './vendor/autoload.php';
	require_once './php/operaciones.php';
	require_once './php/conexionBD.php';
	
	conexionBD();
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	# Preparación de los argumentos a enviar
        
	$navegacionSuperior = getNavegacion('Superior');
	$navegacionLateral = getNavegacion('Lateral');
	$viajes = getViajes();
	$eventos = [];
	
	foreach($viajes as $v)
		array_push($eventos, ['href' => 'evento.php', 'imagenFuente' => $v -> imagenPrincipal, 'ciudad' => $v -> ciudad ]);
	
	$argumentos = ['navegacionSuperior' => $navegacionSuperior, 'navegacionLateral' => $navegacionLateral, 'eventos' => $eventos];

	$template = $twig -> load('./templates/principal.html');
	
	echo $template -> render($argumentos);
?>
