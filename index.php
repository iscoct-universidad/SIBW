<?php
	require_once './vendor/autoload.php';
	require_once './php/operaciones.inc.php';
	require_once './php/BaseDeDatosViajes.inc.php';
	require_once 'php/Viaje.inc.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	# Preparación de los argumentos a enviar
        
	$navegacionSuperior = getNavegacion('Superior');
	$navegacionLateral = getNavegacion('Lateral');
	$viajes = Viaje::getViajes();
	$eventos = [];
	
	foreach($viajes as $v) {
		$imagenes = $v -> getImagenes();
		$imagenPrincipal = $imagenes[0];
		
		array_push($eventos, ['href' => "./evento.php?idViaje=".$v -> getId(), 'imagenFuente' => $imagenPrincipal, 'ciudad' => $v -> getCiudad() ]);
	}

	$argumentos = ['navegacionSuperior' => $navegacionSuperior, 'navegacionLateral' => $navegacionLateral, 'eventos' => $eventos];

	$template = $twig -> load('./templates/html/principal.html');
	
	echo $template -> render($argumentos);
?>
