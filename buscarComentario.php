<?php
	require_once './comun.php';
	require_once 'php/Comentario.inc.php';
	
	$argumentos = [];
	prepararArgumentos($argumentos);
	$plantilla = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'GET' && $_COOKIE['tipoUsuario'] == 'moderador') {
	
		if(isset($_GET['idComentario'])) {
			$comentario = Comentario::getComentarioPorIdComentario($_GET['idComentario']);
			
			$argumentos['nombreAutor'] = $comentario -> nombreAutor;
			$argumentos['texto'] = $comentario -> texto;
			$argumentos['fecha'] = $comentario -> fecha;
			
			$plantilla = "./templates/html/resultadoBusquedaComentario.html";
		} else {
			$plantilla = "./templates/html/formularioBuscarComentario.html";
		}
		
	} else {
		$argumentos['text'] = "Ha intentado acceder con un método http erróneo o no tiene acceso a esta página";
		$plantilla = './templates/html/mostrarMensajeInformativo.html';
	}
	
	renderizarPlantilla($plantilla, $argumentos);
?>
