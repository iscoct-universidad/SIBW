<?php
	require_once 'php/Usuario.inc.php';
	require_once './comun.php';
	
	$argumentos = [];
			
	prepararArgumentos($argumentos);
			
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
			$nombreCuenta = $_POST["nombreCuenta"];
			$passwd = $_POST["passwd"];
			$usuario = Usuario::getUsuarioPorCredenciales($nombreCuenta, $passwd);
			
			$argumentos['usuario'] = ['nombre' => $usuario -> nombre];
			
			renderizarPlantilla('/templates/html/editarUsuario.html', $argumentos);
		} else {
			echo "Está intentando editar un usuario no registrado";
		}
	} else if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$nombre = $_POST['nombre'];
		$genero = $_POST['genero'];
		$password = $_POST['passwd'];
		$confirmPassword = $_POST['confirmPasswd'];
		$texto = "";
		
		if($password == $confirmPassword) {
			$respuesta = Usuario::setUsuario($_COOKIE['user'], $nombre, $genero, $password);
			
			if($respuesta == 1) {
				$texto = "Se han modificado los datos del usuario con éxito";
			} else
				$texto = "Hubo algún error al modificar los datos en la base de datos";
		} else
			$texto = "Las contraseñas no coinciden";
			
		$argumentos['text'] = $texto;
		
		renderizarPlantilla('/templates/html/mostrarMensajeInformativo.html', $argumentos);
	}
?>
