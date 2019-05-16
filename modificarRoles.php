<?php
	require_once './comun.php';
	require_once './php/Usuario.inc.php';
	
	$argumentos = [];
	$plantilla = "";
	prepararArgumentos($argumentos);
	
	if(isset($_COOKIE['tipoUsuario']) && $_COOKIE['tipoUsuario'] == 'superusuario') {
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$usuarios = Usuario::getUsuarios();
			
			$argumentos['usuarios'] = [];
			
			foreach($usuarios as $user) {
				array_push($argumentos['usuarios'], ['tipoUsuario' => $user -> tipoUsuario, 'nombreCuenta' => $user -> nombreCuenta]);
			}
			
			$plantilla = "./templates/html/modificarRoles.html";
		} else if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$nombreCuenta = $_POST['nombreCuenta'];
			$tipoUsuario = $_POST['tipoUsuario'];
			$operacionCorrecta = Usuario::setRol($nombreCuenta, $tipoUsuario);
			
			$argumentos['text'] = ($operacionCorrecta) ? "Se ha realizado la operación con éxito" : "Ha ocurrido algún error en la modificación del rol (0 superusuarios?)";
			
			$plantilla = "./templates/html/mostrarMensajeInformativo.html";
		} else {
			$argumentos['text'] = "Está intentando acceder con un método http no permitido";
			$plantilla = "templates/html/mostrarMensajeInformativo.html";
		}
	} else {
		$argumentos['text'] = "Está intentando acceder a un lugar al que no tiene permiso";
		$plantilla = "templates/html/mostrarMensajeInformativo.html";
	}
	renderizarPlantilla($plantilla, $argumentos);
?>
