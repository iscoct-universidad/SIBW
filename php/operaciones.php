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
	
	function getViajes($id = "-1") {
		$sql = ($id == -1) ? "select * from Viajes;" : "select * from Viajes where id=\"" .
			$id . "\";";
			
		return consulta($sql);
	}
?>
