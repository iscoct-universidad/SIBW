<?php
	function consulta($sql) {
		$resultado = [];

		if($consulta = BaseDeDatosViajes::getConexion() -> query($sql)) {
			while($obj = $consulta -> fetch_object()) {
				array_push($resultado, $obj);
			}
		}
		
		return $resultado;
	}
	
	function consultaPalabrasProhibidas() {
		return consulta("select * from PalabrasProhibidas");
	}
	
	function conjuntoComentarios($idViaje) {
		return consulta("select * from Comentarios where idViaje=\"" . $idViaje . "\";");
	}
	
	function getNavegacion($tipo, $publicoObjetivo = "Publico") {
		$str = "select contenidoNavegacion from Navegacion where tipo=\"" . $tipo . "\" and publicoObjetivo=\"" . $publicoObjetivo . "\";";
		
		$consulta = consulta($str);
		
		return explode(",", $consulta[0] -> contenidoNavegacion);
	}
	
	function getViajes($id = "-1") {
		$sql = ($id == -1) ? "select * from Viajes;" : "select * from Viajes where id=\"" .
			$id . "\";";
			
		return consulta($sql);
	}
	
	function getViajePorNombre($nombre) {
		return consulta("select * from Viajes where ciudad=\"" . $nombre . "\";");
	}
?>
