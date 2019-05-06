<?php
	require_once './comun.php';
	require_once 'php/Viaje.inc.php';
	
	$palabrasClaves = $_GET["palabrasClaves"];

	if($palabrasClaves != null) {
		$viajes = Viaje::getViajesPorPalabrasClave($palabrasClaves);
		$ciudades = [];
		
		foreach($viajes as $viaje)
			array_push($ciudades, ["nombre" => $viaje -> getCiudad(),
								   "id"		=> $viaje -> getId()]);
			
	} else
		$viajes = null;
	
	$argumentos = [];
	$argumentos['ciudades'] = $ciudades;
	
	prepararArgumentos($argumentos);
	renderizarPlantilla('./templates/html/buscarPorPalabrasClaves.html', $argumentos);
?>
