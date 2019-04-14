<?php
	require_once './php/BaseDeDatosViajes.inc.php';
	/*
	function consultaPalabrasProhibidas() {
		return BaseDeDatosViajes::consulta("select * from PalabrasProhibidas");
	}
	
	function conjuntoComentarios($idViaje) {
		$con = "select * from Comentarios where idViaje=\"" . $idViaje . "\";";
		//echo $con;
		return BaseDeDatosViajes::consulta("select * from Comentarios where idViaje=\"" . $idViaje . "\";");
	}
	*/
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

	
?>
