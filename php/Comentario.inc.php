<?php 
	
	require_once './php/BaseDeDatosViajes.inc.php';
	require_once './php/validacion.inc.php';
	require_once './php/ComentarioVO.inc.php';

	/**
	 * 
	 */
	class Comentario 
	{
		
		public static function getPalabrasProhibidas() {
			return BaseDeDatosViajes::consulta("select * from PalabrasProhibidas");
		}
	
		public static function getComentarios($idViaje) {
			$consulta = BaseDeDatosViajes::consulta("select * from Comentarios where idViaje=\"$idViaje\" ;");

			$comentarios = []; 
			for($i = 0; $i < count($consulta); ++$i) {
			    $comentarios[$i] = new ComentarioVO($consulta[$i]);
			}
			
			return $comentarios;
		}

		public static function addComentario($idViaje, $nombreAutor, $texto, $tiempo, $hora, $fecha){
		
			$aux = test_int_with_min($idViaje, 0);
			$idViaje = $aux[0]; 
			$datos_correctos = $aux[1];

			if(!$aux[1]){
				$msg_error = "La id del viaje no es válida";
			}

			$nombreAutor = test_string($nombreAutor, 64);
			$texto = test_string($texto, 256);

			$idComentario = BaseDeDatosViajes::getConexion() -> query("select COUNT(idComentario) from Comentarios where idViaje=\"$idViaje\";") -> fetch_row();

			$idComentario = intval($idComentario[0]) + 1;

			$sql = "insert into Comentarios values ($idViaje, $idComentario, \"000.000.000.000\" , \"$nombreAutor\",\"$fecha\",\"$hora\", NULL,\"$texto\");";
			
			echo "Aquí está la tupla que enviaremos: " . $sql . "\n";

			if(BaseDeDatosViajes::getConexion() -> query($sql) === TRUE)
				echo "Se ha insertado la tupla con éxito\n";
			else
				echo "Ha ocurrido un error al insertar la tupla\n";
		}
		
		public static function removeComentario($idComentario) {
			$sql = "delete from Comentarios where idComentario=\"$idComentario\";";
			
			return BaseDeDatosViajes::getConexion() -> query($sql);
		}
	}


 ?>
