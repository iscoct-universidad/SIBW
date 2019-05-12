<?php
	require_once './comun.php';
	require_once './php/Usuario.inc.php';
	
	if(! isset($_COOKIE['user']) && ! isset($_COOKIE['pass']) &&
				$_SERVER['REQUEST_METHOD'] == 'POST' &&	isset($_POST['user']) &&
				isset($_POST['passwd'])) {
		$nombreCuenta = $_POST['user'];
		$password = $_POST['passwd'];
		$usuario = Usuario::getUsuarioPorCredenciales($nombreCuenta, $password);
		
		if(count($usuario) == 1) {
			setcookie("user", $nombreCuenta, time() + 10000000);
			setcookie("pass", $password, time() + 100000000);
		} else 
			echo "Ocurrió un error";
	}
	
	require_once './index.php';
?>
