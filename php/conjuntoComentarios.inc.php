<?php
	function conjuntoComentarios($idViaje) {
		require_once('conexionBD.inc.php');
		
		$conexion = conexionBD();

		$sql = "select * from Comentarios where idViaje=\"" . $idViaje . "\";";
		
		$consulta = $conexion -> query($sql);
		$resultado = [];
		
		if($consulta -> num_rows > 0)
			while($row = $consulta -> fetch_assoc())
				array_push($resultado, [ "nombreAutor" => $row["nombreAutor"], "fecha" => $row["fecha"], "hora" => $row["hora"], "texto" => $row["texto"] ]);

		$conexion -> close();
		
		return $resultado;
	}
?>
