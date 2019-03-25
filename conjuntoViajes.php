<?php
	function conjuntoViajes($id = "-1") {
		require_once('conexionBD.php');
		
		$conexion = conexionBD();

		if($id == -1)
			$sql = "select * from Viajes;";
		else
			$sql = "select * from Viajes where id=\"" . $id . "\";";
		
		$consulta = $conexion -> query($sql);
		$resultado = [];
		
		if($consulta -> num_rows > 0)
			while($row = $consulta -> fetch_assoc())
				array_push($resultado, 
					[
					"id" => $row["id"],
					"ciudad" => $row["ciudad"],
					"fecha" => $row["fecha"], 
					"texto" => $row["texto"], 
					"imagenPrincipal" => $row["imagenPrincipal"],
					"imagenesSecundarias" => [ $row["imagenSecundaria1"], $row["imagenSecundaria2"] ]
					]);
	
		$conexion -> close();
		
		return $resultado;
	}
?>
