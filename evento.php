<?php
	require_once './vendor/autoload.php';
	
	require_once 'php/operaciones.php';
	require_once 'php/Viaje.inc.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	# Preparación de los argumentos a enviar
        
	$navegacionSuperior = getNavegacion('Superior');
	$navegacionLateral = getNavegacion('Lateral');
	$viaje = Viaje::getViajes();
	$imagenes = $viaje[0] -> getImagenes();
	
	$imagenSecundaria1 = $imagenes[1];
	$imagenSecundaria2 = $imagenes[2];
	$video = $viaje[0] -> getVideos();
	
	$datosViajeAEnviar = [  "ciudad" => $viaje[0] -> getCiudad(),
							"imagenSecundaria1" => $imagenSecundaria1,
							"imagenSecundaria2" => $imagenSecundaria2,
							"texto" => $viaje[0] -> getTexto(), 
							"fecha" => $viaje[0] -> getFecha(),
							"video" => $video[0][0],
							"formatoVideo" => $video[0][1]
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
