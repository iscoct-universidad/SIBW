<?php
	require_once './comun.php';
	
	$texto = "";
	
	if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
		setcookie('user', $_POST['user'], time() - 10);
		setcookie('pass', $_POST['pass'], time() - 10);
		setcookie('tipoUsuario', time() - 10);
		
		$texto = "Ha cerrado sesión correctamente";
	} else
		$texto = "No se ha podido cerrar sesión";
	
	$argumentos = [];
	prepararArgumentos($argumentos);
	$argumentos['text'] = $texto;
	
	renderizarPlantilla('/templates/html/mostrarMensajeInformativo.html', $argumentos);
?>
