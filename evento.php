<?php
	require_once './vendor/autoload.php';
	require_once './php/Navegacion.inc.php';
	require_once 'php/Comentario.inc.php';
	require_once 'php/Viaje.inc.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	# Preparación de los argumentos a enviar
        
	$navegacionSuperior = Navegacion::get_navegacion('Superior');
	$navegacionLateral = Navegacion::get_navegacion('Lateral');
	$idViaje = $_GET["idViaje"];
	$msg_error; 

	$aux = test_int_with_min($idViaje, 0);
	$idViaje = $aux[0]; 

	if(!$aux[1]){
		$idViaje = 0;
		$msg_error = "La id no es válida";
	}

	$viaje = Viaje::getViajes($idViaje);
	$imagenes = $viaje[0] -> getImagenes();
	
	$imagenSecundaria1 = $imagenes[1];
	$imagenSecundaria2 = $imagenes[2];
	$video = $viaje[0] -> getVideos();
	
	if( $video[0][0] )
		$datosViajeAEnviar = [  "ciudad" => $viaje[0] -> getCiudad(),
								"imagenSecundaria1" => $imagenSecundaria1,
								"imagenSecundaria2" => $imagenSecundaria2,
								"texto" => $viaje[0] -> getTexto(), 
								"fecha" => $viaje[0] -> getFecha(),
								"fechaPublicacion" => $viaje[0] -> getFechaPublicacion(),
								"fechaModificacion" => $viaje[0] -> getFechaModificacion(),
								"video" => $video[0][0],
								"formatoVideo" => $video[0][1],
								"id" => $viaje[0] -> getId(),
		];
	else
		$datosViajeAEnviar = [  "ciudad" => $viaje[0] -> getCiudad(),
								"imagenSecundaria1" => $imagenSecundaria1,
								"imagenSecundaria2" => $imagenSecundaria2,
								"texto" => $viaje[0] -> getTexto(), 
								"fecha" => $viaje[0] -> getFecha(),
								"fechaPublicacion" => $viaje[0] -> getFechaPublicacion(),
								"fechaModificacion" => $viaje[0] -> getFechaModificacion(),
								"id" => $viaje[0] -> getId(),
		];

	$comentarios = Comentario::getComentarios($idViaje);

	//var_dump($comentarios);

	$comments = [];
	
	foreach($comentarios as $com) {
		array_push($comments, [ 
								"nombreAutor" => $com -> get_nombreAutor(),
								"fecha"		  => $com -> get_fecha(), 
								"hora"  	  => $com -> get_hora(),
								"texto" 	  => $com -> get_texto() ]);
	}
	
	$argumentos = ['navegacionSuperior' => $navegacionSuperior, 'navegacionLateral' => $navegacionLateral, 
	'viaje' => $datosViajeAEnviar, 'comentarios' => $comments];
	
	$template = $twig -> load('./templates/html/evento.html');
	
	echo $template -> render($argumentos);
?>
