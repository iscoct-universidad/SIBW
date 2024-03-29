<?php
	require_once './vendor/autoload.php';
	require_once 'php/Navegacion.inc.php';
	require_once 'php/Viaje.inc.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	# Preparación de los argumentos a enviar
        
	$navegacionSuperior = Navegacion::get_navegacion('Superior');
	$navegacionLateral = Navegacion::get_navegacion('Lateral');
	$palabrasClaves = $_GET["palabrasClaves"];
	


	if($palabrasClaves != null) {
		$viajes = Viaje::getViajesPorPalabrasClave($palabrasClaves);
		$ciudades = [];
		
		foreach($viajes as $viaje)
			array_push($ciudades, ["nombre" => $viaje -> getCiudad(),
								   "id"		=> $viaje -> getId()]);
			
	} else
		$viajes = null;
	
	$argumentos = ['navegacionSuperior' => $navegacionSuperior, 'navegacionLateral' => $navegacionLateral, 
	'ciudades' => $ciudades];

	$template = $twig -> load('./templates/html/buscarPorPalabrasClaves.html');
	
	echo $template -> render($argumentos);
?>
