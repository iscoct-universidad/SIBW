<?php 
	require_once './php/BaseDeDatosViajes.inc.php';
	require_once './php/ViajeVO.inc.php';
	require_once './php/validacion.inc.php';

	class Viaje 
	{
		
		public static function getViajes($id = "-1") {
			
			$sql = ($id == -1) ? "select * from Viajes;" : "select * from Viajes where id=\"" .
				$id . "\";";
			$id = test_int_with_min($id, 1)[1];
			$consulta = BaseDeDatosViajes::consulta($sql);
			$viajes; 
			for($i = 0; $i < count($consulta); ++$i) {
			    $viajes[$i] = new ViajeVO($consulta[$i]);
			}
			
			return $viajes;
		}
		
		public static function getViajePorNombre($nombre) {

			$nombre = test_string($nombre, 64);

			$consulta = BaseDeDatosViajes::consulta("select * from Viajes where ciudad=\"" . $nombre . "\";");
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
		
		public static function removeViaje($id) {
			$sql = "delete from Viajes where id='$id';";
			$eliminarComentarios = "delete from Comentarios where idViaje='$id';";
			
			BaseDeDatosViajes::getConexion() -> query($eliminarComentarios);
			
			return BaseDeDatosViajes::getConexion() -> query($sql);
		}

		public static function setViaje($id, $ciudad, $fecha, $fechaPublicacion,
					$fechaModificacion, $texto, $palabrasClave, $imagenes, $videos) {
			
		}
		
		public static function eliminarPalabraClave($id, $palabra) {
			$sql = "select id,palabrasClave from Viajes where palabrasClave like '%$palabra%' and id='$id';";
			
			$viaje = BaseDeDatosViajes::consulta($sql)[0];
			$reemplazo = [",$palabra," => "", "$palabra," => "", ",$palabra" => "", $palabra => ""];
			
			$palabrasClave = $viaje -> palabrasClave;
			
			$palabrasClave = strtr($palabrasClave, $reemplazo);
			
			$sql = "update Viajes set palabrasClave='$palabrasClave' where id='$id';";
			
			return BaseDeDatosViajes::getConexion() -> query($sql);	
		}
		
		public static function addPalabraClave($id, $palabra) {
			$sql = "select palabrasClave from Viajes where id='$id';";
			
			$palabrasClave = BaseDeDatosViajes::consulta($sql)[0] -> palabrasClave;
			$palabrasClave .= ",$palabra";
			
			$sql = "update Viajes set palabrasClave='$palabrasClave' where id='$id';";
			
			return BaseDeDatosViajes::getConexion() -> query($sql);
		}
		
		public static function eliminarFotografiaEvento($id, $fotografia) {
			$sql = "select imagenes from Viajes where palabrasClave like '%$fotografia%' and id='$id';";
			
			$viaje = BaseDeDatosViajes::consulta($sql)[0];
			$reemplazo = [",$fotografia," => "", "$fotografia," => "", ",$fotografia" => "", $fotografia => ""];
			
			$palabrasClave = $viaje -> fotografia;
			
			$fotografia = strtr($fotografia, $reemplazo);
			
			$sql = "update Viajes set imagenes='$fotografia' where id='$id';";
			
			return BaseDeDatosViajes::getConexion() -> query($sql);	
		}
		
		public static function addFotografiaEvento($id, $fotografia) {
			$sql = "select imagenes from Viajes where id='$id';";
			
			$imagenes = BaseDeDatosViajes::consulta($sql)[0] -> imagenes;
			$imagenes .= ",$fotografia";
			
			$sql = "update Viajes set imagenes='$imagenes' where id='$id';";
			
			return BaseDeDatosViajes::getConexion() -> query($sql);
		}
		
		public static function addViaje($ciudad, $fecha, $fechaPublicacion,
			$fechaModificacion, $texto, $palabrasClaves, $rutasImagenes)
		{
			$sql = "select max(id) as id from Viajes;";
			$id = (BaseDeDatosViajes::consulta($sql)[0] -> id) + 1;
			$sql = "insert into Viajes(id,ciudad,fecha,fechaPublicacion,fechaModificacion,texto,palabrasClave,imagenes) values ('$id','$ciudad','$fecha','$fechaPublicacion','$fechaModificacion','$texto','$palabrasClaves','$rutasImagenes');";
			
			return BaseDeDatosViajes::getConexion() -> query($sql);
		}
		
		public static function editarViaje($id, $ciudad, $fecha, $fechaPublicacion,
			$fechaModificacion, $texto, $palabrasClave, $rutasImagenes)
		{
			$sql = "update Viajes set ciudad='$ciudad',fecha='$fecha',fechaPublicacion='$fechaPublicacion',fechaModificacion='$fechaModificacion',texto='$texto',palabrasClave='$palabrasClave',imagenes='$rutasImagenes' where id='$id';";
			
			return BaseDeDatosViajes::getConexion() -> query($sql);
		}
	}

 ?>
