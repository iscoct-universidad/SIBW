<?php
	require_once './comun.php';
	require_once 'php/Comentario.inc.php';
	require_once 'php/Viaje.inc.php';
	
	$argumentos = [];
	prepararArgumentos($argumentos);

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
	
	
	$datosViajeAEnviar = [  "ciudad" => $viaje[0] -> getCiudad(),
							"imagenSecundaria1" => $imagenSecundaria1,
							"imagenSecundaria2" => $imagenSecundaria2,
							"texto" => $viaje[0] -> getTexto(), 
							"fecha" => $viaje[0] -> getFecha(),
							"fechaPublicacion" => $viaje[0] -> getFechaPublicacion(),
							"fechaModificacion" => $viaje[0] -> getFechaModificacion(),
							"id" => $viaje[0] -> getId() ];
							
	if( $video[0][0] ) {
		$datosViajeAEnviar['video'] = $video[0][0];
		$datosViajeAEnviar['formatoVideo'] = $video[0][1];
	}
	
	$comentarios = Comentario::getComentarios($idViaje);

	//var_dump($comentarios);

	$comments = [];
	if($comentarios)
	foreach($comentarios as $com) {
		array_push($comments, [ 
								"nombreAutor" => $com -> get_nombreAutor(),
								"fecha"		  => $com -> get_fecha(), 
								"hora"  	  => $com -> get_hora(),
								"texto" 	  => $com -> get_texto(),
								"idComentario" => $com -> get_idcomentario() ]);
	}
	
	$argumentos['viaje'] = $datosViajeAEnviar;
	$argumentos['comentarios']  = $comments;
	
	renderizarPlantilla('./templates/html/evento.html', $argumentos);
?>
