<?php 
	require_once './php/BaseDeDatosViajes.inc.php';
	require_once './php/ViajeVO.inc.php';

	class Viaje 
	{
		
		public static function getViajes($id = "-1") {
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
			return BaseDeDatosViajes::consultaconsulta("select * from Viajes where ciudad=\"" . $nombre . "\";");
		}


	}

 ?>