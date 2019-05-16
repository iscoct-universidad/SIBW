<?php
	require_once './comun.php';
	require_once './php/Viaje.inc.php';
	
	$argumentos = [];
	$plantilla = "";
	prepararArgumentos($argumentos);
	
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$argumentos['event'] = ['id' => $_GET['id']];
		$plantilla = "./templates/html/editarEvento.html";
	} else if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$ciudad = $_POST['ciudad'];
		$fecha = $_POST['fecha'];
		$fechaPublicacion = (new DateTime()) -> format('Y-m-d');
		$fechaModificacion = (new DateTime()) -> format('Y-m-d');
		$texto = $_POST['texto'];
		$palabrasClaves = $_POST['palabrasClaves'];
		$rutasImagenes = $_POST['imagenes'];
		
		$operacionCorrecta = Viaje::editarViaje($id,$ciudad, $fecha, $fechaPublicacion, $fechaModificacion, $texto, $palabrasClaves, $rutasImagenes);
		
		$argumentos['text'] = ($operacionCorrecta) ? "Se ha realizado la operación con éxito" : "Ha ocurrido algún error en la operación de editarViaje";
		
		$plantilla = "./templates/html/mostrarMensajeInformativo.html";
	} else {
		$argumentos['text'] = "Está intentando acceder con un método http no permitido";
		$plantilla = "templates/html/mostrarMensajeInformativo.html";
	}
	
	renderizarPlantilla($plantilla, $argumentos);
?>
