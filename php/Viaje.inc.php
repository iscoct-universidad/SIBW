<?php 
	require_once './php/BaseDeDatosViajes.inc.php';
	require_once './php/ViajeVO.inc.php';
	require_once './php/validacion.inc.php';

	class Viaje 
	{
		
		public static function getViajes($id = "-1") {
			$id = test_int_with_min($id, 1)[1];
			$sql = ($id == -1) ? "select * from Viajes;" : "select * from Viajes where id=\"" .
				$id . "\";";
				
			$consulta = BaseDeDatosViajes::consulta($sql);
			$viajes; 
			for($i = 0; $i < count($consulta); ++$i) {
			    $viajes[$i] = new ViajeVO($consulta[$i]);
			}
			
			return $viajes;
		}
		
		public static function getViajePorNombre($nombre) {

			$consulta = BaseDeDatosViajes::consultaconsulta("select * from Viajes where ciudad=\"" . $nombre . "\";");
			$viajes; 
			for($i = 0; $i < count($consulta); ++$i) {
			    $viajes[$i] = new ViajeVO($consulta[$i]);
			}
			
			return $viajes;

		}

		/*
		pre: Palabras clave debe ser mayor que uno
	*/
	
	public static function getViajesPorPalabrasClave($palabrasClave) {
		$arrayPalabras = explode(",", test_string($palabrasClave, 256));
		$tamArray = count($arrayPalabras);
		
		$consulta = "select * from Viajes where palabrasClave like '%{$arrayPalabras[0]}%'";
		
		for($i = 1; $i < $tamArray; $i++)
			$consulta .= " or palabrasClave like '%{$arrayPalabras[$i]}%'";
		
		$consulta .= ";";

		$consulta = BaseDeDatosViajes::consulta($consulta);
			$viajes; 
			for($i = 0; $i < count($consulta); ++$i) {
			    $viajes[$i] = new ViajeVO($consulta[$i]);
			}
			
			return $viajes;
			
		return $viajes;
	}


	}

 ?>