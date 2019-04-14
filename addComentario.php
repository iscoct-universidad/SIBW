<?php
	/*require_once './vendor/autoload.php';
	require_once 'php/Comentario.inc.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');
	$twig = new \Twig\Environment($loader);
	
	$idViaje = $_POST["idViaje"];
	$nombreAutor = $_POST["nombreAutor"];
	$texto = $_POST["texto"];
	
	$tiempo = getdate();
	$hora = $tiempo["hours"] . ":" . $tiempo["minutes"] . ":" . $tiempo["seconds"];
	$fecha = $tiempo["year"] . "-" . $tiempo["mon"] . "-". $tiempo["mday"];
	
	Comentario::addComentario($idViaje, $nombreAutor, $texto, $tiempo, $hora, $fecha);

	//addComentario();
	/* Validamos los datos de entrada del comentario 
	  $name = filter_var($_POST["name"], );
	  $email = test_input($_POST["email"], FILTER_VALIDATE_EMAIL);
	  $text = test_input($_POST["text"]);*/
	
	
?>
