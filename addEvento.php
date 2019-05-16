<?php
	require_once './comun.php';
	require_once './php/Viaje.inc.php';
	
	$argumentos = [];
	$plantilla = "";
	prepararArgumentos($argumentos);
	
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$plantilla = "./templates/html/addEvento.html";
	} else if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$ciudad = $_POST['ciudad'];
		$fecha = $_POST['fecha'];
		$fechaPublicacion = (new DateTime()) -> format('Y-m-d');
		$fechaModificacion = (new DateTime()) -> format('Y-m-d');
		$texto = $_POST['texto'];
		$palabrasClaves = $_POST['palabrasClaves'];
		$rutasImagenes = $_POST['imagenes'];
		
		$operacionCorrecta = Viaje::addViaje($ciudad, $fecha, $fechaPublicacion, $fechaModificacion, $texto, $palabrasClaves, $rutasImagenes);
		
		echo "Resultado de añadir: " . var_dump($operacionCorrecta);
		
		$argumentos['text'] = ($operacionCorrecta) ? "Se ha realizado la operación con éxito" : "Ha ocurrido algún error en la operación de addViaje";
		
		$plantilla = "./templates/html/mensajeInformativo.html";
	} else {
		$argumentos['text'] = "Está intentando acceder con un método http no permitido";
		$plantilla = "./templates/html/mensajeInformativo.html";
	}
	
	renderizarPlantilla($plantilla, $argumentos);
?>
