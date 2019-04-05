<?php
	require_once './vendor/autoload.php';
	require_once 'php/conexionBD.php';
	require_once 'php/operaciones.php';
	
	conexionBD();
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	# Preparación de los argumentos a enviar
        
	$navegacionSuperior = getNavegacion('Superior');
	$navegacionLateral = getNavegacion('Lateral');
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
	
	$comentarios = conjuntoComentarios('0');
	
	$comments = [];
	
	foreach($comentarios as $com) {
		array_push($comments, [ "autor" => $com -> nombreAutor,
			"fecha" => $com -> fecha, "hora" => $com -> hora,
			"texto" => $com -> texto ]);
	}
	
	$argumentos = ['navegacionSuperior' => $navegacionSuperior, 'navegacionLateral' => $navegacionLateral, 
	'viaje' => $datosViajeAEnviar, 'comentarios' => $comments];
	
	$template = $twig -> load('./templates/evento.html');
	
	echo $template -> render($argumentos);
?>
