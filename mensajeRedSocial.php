<?php
	require_once './vendor/autoload.php';
	
	require_once 'php/operaciones.php';
	require_once 'php/Viaje.inc.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	if($_SERVER["REQUEST_METHOD"] == "GET") {
		echo "Aquí entramos correctamente\n";
		$redSocial = $_GET["redSocial"];
		$imagen = $_GET["imagen"];
		$tituloEvento = $_GET["tituloEvento"];
		
		$argumentos = ["redSocial" => $redSocial, "imagen" => $imagen, "tituloEvento" => $tituloEvento];
	}
	
	$template = $twig -> load('./templates/mensaje.html');
	
	echo $template -> render($argumentos);
?>
