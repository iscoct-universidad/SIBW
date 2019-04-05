<?php
	function consultaPalabrasProhibidas() {
		require_once('conexionBD.inc.php');
		
		$conexion = conexionBD();
			
		$sql = "select * from PalabrasProhibidas;";
		$consulta = $conexion -> query($sql);
		$resultado = [];
		
		if($consulta -> num_rows > 0) {
			while($row = $consulta -> fetch_assoc())
				array_push($resultado, $row["palabraProhibida"]);
		}
			
		$conexion -> close();
		
		return $resultado;
	}
	
	header('Access-Control-Allow-Origin: *');
	
	$palabrasProhibidas = consultaPalabrasProhibidas();
	$impresion = "";
	
	foreach($palabrasProhibidas as $palabra)
		$impresion .= $palabra . " ";
	
	$impresion = trim($impresion, " ");
	
	echo $impresion;
?>
