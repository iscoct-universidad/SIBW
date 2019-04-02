<?php
	function conexionBD() {
		$server = "localhost";
		$user = "sibw";
		$password = "_aprobandoSIBWconUn10";
		$db = "viajes";
		
		$conexion = new mysqli($server, $user, $password, $db);
		
		if(! $conexion)
			die("Conexión fallida: ");
		
		return $conexion;
	}
?>
