<?php
	require_once './comun.php';
	require_once 'php/Viaje.inc.php';
	
	if($_SERVER["REQUEST_METHOD"] == "GET") {
		echo "Aquí entramos correctamente\n";
		$redSocial = $_GET["redSocial"];
		$imagen = $_GET["imagen"];
		$tituloEvento = $_GET["tituloEvento"];
		
		$argumentos = ["redSocial" => $redSocial, "imagen" => $imagen, "tituloEvento" => $tituloEvento];
	}
	
	renderizarPlantilla('./templates/html/mensaje.html', $argumentos);
?>
