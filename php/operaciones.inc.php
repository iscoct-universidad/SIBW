<?php
	function consultaPalabrasProhibidas() {
		return BaseDeDatosViajes::consulta("select * from PalabrasProhibidas");
	}
	
	function conjuntoComentarios($idViaje) {
		return BaseDeDatosViajes::consulta("select * from Comentarios where idViaje=\"" . $idViaje . "\";");
	}
	
	/*
		Formato devuelto:
			[ "referencia" => [referencia1, ...], "contenidoNavegacion" => [contenido1, ...] ]
			[ ["referencia" => "referencia1", "contenido" => "contenido1"], ... ]
	*/
	
	function getNavegacion($tipo, $publicoObjetivo = "Publico") {
		$str = "select * from Navegacion where tipo=\"" . $tipo . "\" and publicoObjetivo=\"" . $publicoObjetivo . "\";";
		
		$consulta = BaseDeDatosViajes::consulta($str);
		$referencias = explode(",", $consulta[0] -> referencias);
		$contenidos = explode(",", $consulta[0] -> contenidoNavegacion);
		$resultado = [];
		$tamNav = count($contenidos);
		
		for($i = 0; $i < $tamNav; $i++)
			array_push($resultado, ["referencia" => $referencias[$i], "contenido" => $contenidos[$i] ]);
			
		return $resultado;
	}
	
	function getViajes($id = "-1") {
		$sql = ($id == -1) ? "select * from Viajes;" : "select * from Viajes where id=\"" .
			$id . "\";";
			
		return BaseDeDatosViajes::consulta($sql);
	}
	
	function getViajePorNombre($nombre) {
		return consulta("select * from Viajes where ciudad=\"" . $nombre . "\";");
	}

	/*
		pre: Palabras clave debe ser mayor que uno
	*/
	
	function getViajesPorPalabrasClave($palabrasClave) {
		$arrayPalabras = explode(",", $palabrasClave);
		
		$consulta = "select * from Viajes where palabrasClave like '%{$arrayPalabras[0]}%'";
		$tamArray = count($arrayPalabras);
		
		for($i = 1; $i < $tamArray; $i++)
			$consulta .= " or palabrasClave like '%{$arrayPalabras[$i]}%'";
		
		$consulta .= ";";
			
		return BaseDeDatosViajes::consulta($consulta);
	}
?>
