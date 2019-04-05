<?php
	function consulta($sql) {
		$resultado = [];

		if($consulta = $GLOBALS['CONEXION'] -> query($sql)) {
			while($obj = $consulta -> fetch_object()) {
				array_push($resultado, $obj);
			}
		}
		return $resultado;
	}
	
	function consultaPalabrasProhibidas() {
		return consulta("select * from PalabrasProhibidas");
	}
	
	function conjuntoComentarios() {
		return consulta("select * from Comentarios where idViaje=\"" . $idViaje . "\";");
	}
	
	function getNavegacion($tipo, $publicoObjetivo = "Publico") {
		$consulta = consulta("select * from Navegacion where tipo=\"" . $tipo . "\" and publicoObjetivo=\"" . $publicoObjetivo . "\";");
		
		return preg_split(",", $consulta -> contenidoNavegacion);
	}
	
	function getViajes($id = "-1") {
		$sql = ($id == -1) ? "select * from Viajes;" : "select * from Viajes where id=\"" .
			$id . "\";";
			
		return consulta($sql);
	}
?>
