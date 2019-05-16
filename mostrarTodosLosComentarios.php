<?php
	require_once './comun.php';
	require_once 'php/Comentario.inc.php';
	require_once 'php/Viaje.inc.php';
	
	$argumentos = [];
	$plantilla = "";
	prepararArgumentos($argumentos);
	
	if(isset($_COOKIE['user']) && isset($_COOKIE['pass']) && $_COOKIE['tipoUsuario'] == 'moderador') {
		$plantilla = "./templates/html/mostrarTodosLosComentarios.html";
		$comentarios = Comentario::getComments();
		$argumentos['comments'] = [];
		
		foreach($comentarios as $comment) {
			$formatoComentario = ['id' => $id, 'nombreAutor' => $comment -> nombreAutor, 'texto' => $comment -> texto];
			array_push($argumentos['comments'], $formatoComentario);
		}

	} else {
		$text = "Usted no tiene permiso para acceder a esta página";
		$plantilla = "./templates/html/mostrarMensajeInformativo.html";
		$argumentos['text'] = $text;
	}
	
	renderizarPlantilla($plantilla, $argumentos);
?>
