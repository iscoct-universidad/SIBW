<?php
	// Argumentos debe ser un array ya inicializado (aunque sea [])
		
	function prepararArgumentos(&$argumentos) {
		require_once 'php/Navegacion.inc.php';
		require_once 'php/Usuario.inc.php';
		
		$navegacionSuperior = Navegacion::get_navegacion('Superior');
		$navegacionLateral = Navegacion::get_navegacion('Lateral');
		
		$argumentos['navegacionSuperior'] = $navegacionSuperior;
		$argumentos['navegacionLateral'] = $navegacionLateral;
		
		if(isset($_COOKIE["user"]) && isset($_COOKIE["pass"])) {
			$argumentos['usuario']['user'] = $_COOKIE['user'];
			$tipoUsuario = Usuario::getUsuarioPorCredenciales($_COOKIE['user'], $_COOKIE['pass']) -> tipoUsuario;
			
			$argumentos['usuario']['tipoUsuario'] = $tipoUsuario;
		}
	}
	
	function renderizarPlantilla($ruta, &$argumentos) {
		require_once './vendor/autoload.php';
		
		$loader = new \Twig\Loader\FilesystemLoader('.');

		$twig = new \Twig\Environment($loader);
		
		$template = $twig -> load($ruta);
	
		echo $template -> render($argumentos);
	}
?>
