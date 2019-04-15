<?php
	require_once './vendor/autoload.php';
	require_once './php/operaciones.inc.php';
	require_once 'php/Pagina.inc.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');
	$twig = new \Twig\Environment($loader);
	$escaper = new \Twig\Extension\EscaperExtension('html');
	//$twig->addExtension($escaper);
	
	# Preparación de los argumentos a enviar
        
	$navegacionSuperior = getNavegacion('Superior');
	$navegacionLateral = getNavegacion('Lateral');

	$datos_pagina = [];
	if($_GET["idPagina"]){
		$idPagina = $_GET["idPagina"];
		$pagina = Pagina::getPaginas($idPagina);

		if($pagina)
		$datos_pagina = [ "titulo" => $pagina[0] -> get_titulo(),
						  "texto" => $pagina[0] -> get_texto(),
		];
		
	}
	
	$argumentos = ['navegacionSuperior' => $navegacionSuperior, 'navegacionLateral' => $navegacionLateral, 'pagina' => $datos_pagina];
	
	$template = $twig -> load('./templates/html/pagina.html');
	
	echo $template -> render($argumentos);
?>
