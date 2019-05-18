<?php
	require_once './comun.php';
	require_once './php/Viaje.inc.php';
	
	$argumentos = [];
	$plantilla = "";
	prepararArgumentos($argumentos);
	
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$argumentos['event'] = ['id' => $_GET['id']];
		$plantilla = "./templates/html/modificarPublicadoEvento.html";
	} else if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$publicado = $_POST['publicado'];
		
		$operacionCorrecta = Viaje::editarPublicadoViaje($id, $publicado);
		
		$argumentos['text'] = ($operacionCorrecta) ? "Se ha realizado la operación con éxito" : "Ha ocurrido algún error en la operación de modificarPublicadoEvento";
		
		$plantilla = "./templates/html/mostrarMensajeInformativo.html";
	} else {
		$argumentos['text'] = "Está intentando acceder con un método http no permitido";
		$plantilla = "templates/html/mostrarMensajeInformativo.html";
	}
	
	renderizarPlantilla($plantilla, $argumentos);
?>
