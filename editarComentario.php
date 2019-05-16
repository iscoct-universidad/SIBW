<?php
	require_once 'php/Comentario.inc.php';
	require_once './comun.php';
	
	$argumentos = [];
	prepararArgumentos($argumentos);
	$plantilla = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_COOKIE['tipoUsuario']) &&
				$_COOKIE['tipoUsuario'] == 'moderador')
	{
		
		if(Comentario::setComentario($_POST['idComentario'], $_POST['texto']) === TRUE)
			$argumentos['text'] = "Se ha modificado el comentario con éxito";
		else
			$argumentos['text'] = "Ha odurrido algún error al intentar modificar el comentario";
			
		$plantilla = "./templates/html/mostrarMensajeInformativo.html";
	} else {
		$plantilla = "./templates/html/mostrarMensajeInformativo.html";
		$argumentos['text'] = "O ha ocurrido un error o no tiene permisos";
	}
	
	renderizarPlantilla($plantilla, $argumentos);
?>
