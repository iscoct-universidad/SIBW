<?php
	function addComentario($idViaje, $nombreAutor, $texto, $tiempo, $hora, $fecha){
		$sql = "insert into Comentarios values (\"$idViaje\", \"$nombreAutor\",\"" 
			. $fecha . "\",\"" . $hora . "\", NULL,\"$texto\");";
		
		echo "Aquí está la tupla que enviaremos: " . $sql . "\n";
		
		if($GLOBALS["CONEXION"] -> query($sql) === TRUE)
			echo "Se ha insertado la tupla con éxito\n";
		else
			echo "Ha ocurrido un error al insertar la tupla\n";
	}
	
	function addComentario() {
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			$idViaje = $_POST["idViaje"];
			$nombreAutor = $_POST["nombreAutor"];
			$texto = $_POST["texto"];
			
			$tiempo = getdate();
			$hora = $tiempo["hours"] . ":" . $tiempo["minutes"] . ":" . $tiempo["seconds"];
			$fecha = $tiempo["year"] . "-" . $tiempo["mon"] . "-". $tiempo["mday"];
			
			addComentario($idViaje, $nombreAutor, $texto, $tiempo, $hora, $fecha);
		}
	}
?>
