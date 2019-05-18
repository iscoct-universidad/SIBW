<?php
	require_once './comun.php';
	require_once './php/Viaje.inc.php';
	
	$argumentos = [];
	$plantilla = "";
	prepararArgumentos($argumentos);
	
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$argumentos['event'] = ['id' => $_GET['id']];
		$plantilla = "./templates/html/busquedaAsincrona.html";
		renderizarPlantilla($plantilla, $argumentos);
	} else if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$texto = $_POST['texto'];
		
		if((isset($_COOKIE['tipoUsuario'])) and ($_COOKIE['tipoUsuario'] == 'gestor' or $_COOKIE['tipoUsuario'] == 'superusuario'))
			$operacionCorrecta = Viaje::busquedaTituloDescripcion($texto);
		else
			$operacionCorrecta = Viaje::busquedaTituloDescripcionRestringida($texto);
		
		echo json_encode($operacionCorrecta);
	} else {
		$argumentos['text'] = "Está intentando acceder con un método http no permitido";
		$plantilla = "templates/html/mostrarMensajeInformativo.html";
		renderizarPlantilla($plantilla, $argumentos);
	}
?>
