<?php
	require_once './comun.php';
	require_once 'php/Viaje.inc.php';
	
	$argumentos = [];
	prepararArgumentos($argumentos);
	$plantilla = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
	
		if(isset($_GET['idViaje'])) {
			$viaje = Viaje::getViajes($_GET['idViaje'])[0];
			
			$argumentos['ciudad'] = $viaje -> getCiudad();
			$argumentos['texto'] = $viaje -> getTexto();
			$argumentos['fechaPublicacion'] = $viaje -> getFechaPublicacion();
			
			$plantilla = "./templates/html/resultadoBusquedaEvento.html";
		} else {
			$plantilla = "./templates/html/formularioBuscarEvento.html";
		}
		
	} else {
		$argumentos['text'] = "Ha intentado acceder con un método http erróneo o no tiene acceso a esta página";
		$plantilla = './templates/html/mostrarMensajeInformativo.html';
	}
	
	renderizarPlantilla($plantilla, $argumentos);
?>
