<?php
	require_once './vendor/autoload.php';
	require_once 'php/Comentario.inc.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');
	$twig = new \Twig\Environment($loader);
	
	$palabrasProhibidas = Comentario::getPalabrasProhibidas(); 
	
	echo json_encode($palabrasProhibidas);
	
?>
