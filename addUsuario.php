<?php
	require_once 'php/Usuario.inc.php';
	
	$nombreCuenta = $_POST["nombreCuenta"];
	$passwd = $_POST['passwd'];
	$email = $_POST["email"];
	$nombre = $_POST["nombre"];
	$genero = $_POST["genero"];
	$tipoUsuario = $_POST["tipoUsuario"];

	$introducidoConExito = Usuario::addUsuario($nombreCuenta, $passwd, $email, 
				$nombre, $genero, $tipoUsuario);
	
	if($introducidoConExito)
		echo "Se ha insertado la tupla con éxito";
	else
		echo "Ha ocurrido un error al insertar la tupla";
?>
