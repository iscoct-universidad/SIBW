<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers:  X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$idViaje = $_POST["idViaje"];
		$nombreAutor = $_POST["nombreAutor"];
		$texto = $_POST["texto"];
		
		$tiempo = getdate();
		$hora = $tiempo["hours"] . ":" . $tiempo["minutes"] . ":" . $tiempo["seconds"];
		$fecha = $tiempo["year"] . "-" . $tiempo["mon"] . "-". $tiempo["mday"];
		$server = "localhost";
		$user = "sibw";
		$password = "_aprobandoSIBWconUn10";
		$db = "viajes";

		$conexion = new mysqli($server, $user, $password, $db);
		
		if(! $conexion)
			die("Conexión fallida: ");
		
		echo "id del viaje: " . $idViaje . "\n";
		echo "Nombre del autor: " . $nombreAutor . "\n";
		echo "Texto: " . $texto . "\n";
		echo "Hora: " . $hora . "\n";
		echo "Fecha: " . $fecha . "\n";
		
		$sql = "insert into Comentarios values (\"$idViaje\", \"$nombreAutor\",\"" . $fecha . "\",\"" . $hora . "\", NULL,\"$texto\");";
		
		echo "Aquí está la tupla que enviaremos: " . $sql . "\n";
		
		if($conexion -> query($sql) === TRUE)
			echo "Se ha insertado la tupla con éxito\n";
		else
			echo "Ha ocurrido un error al insertar la tupla\n";
			
		$conexion -> close();
	} else {
		echo "Se ha equivocado de método al llamar a esta ruta\n";
	}
?>
