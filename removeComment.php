<?php
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['idComentario'])) {
		require_once './php/Comentario.inc.php';
		
		if(Comentario::removeComentario($_GET['idComentario']) === TRUE)
			echo "Se eliminó bien la tupla";
		else
			echo "Hubo un error al intentar eliminar el comentario de la base de datos";
	} else {
		echo "Hubo un error al realizar la petición GET";
	}
?>
