<?php
	$servername = "localhost";
	$username = "sibw";
	$password = "_aprobandoSIBWconUn10";
	$dbname = "viajes";
	
	$conexion = new mysqli($servername, $username, $password, $dbname);
	
	if($conexion -> connect_error)
		die("Conexión fallida: " . $conexion -> connect_error);
		
	$sql = "select * from Comentarios";
	$consulta = $conexion -> query($sql);
	
	if(result -> num_rows > 0) {
		while($row = $result -> fetch_assoc()) {
			echo '<div class="comentario">
				<p class="autores">Autor: Pedro Luis Fuertes Moreno</p>
				<p class="fechas">Fecha: x</p>
				<p class="horas">Hora: 13:00</p>
				<p class="textos">Texto: Hola, mi nombre es Pedro</p>
				</div>';
		}
	} else
		echo "0 results";
	
	$conexion -> close();
?>
