<?php
	require_once './comun.php';
	require_once './php/BaseDeDatosViajes.inc.php';
	require_once './php/Viaje.inc.php';
	
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
		$argumentos = [];
		prepararArgumentos($argumentos);
		
		$respuesta = Viaje::removeViaje($_GET['id']);
		
		$argumentos['text'] = ($respuesta == 1) ? 
			"Se eliminó con éxito" : "No se pudo eliminar el evento";
		
		renderizarPlantilla('templates/html/exitoEdicionUsuario.html', $argumentos);
	} else {
		echo "No puede realizar usted esa operación";
	}
	
?>
