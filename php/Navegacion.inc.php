<?php  
	
	require_once './php/BaseDeDatosViajes.inc.php';
	require_once './php/validacion.inc.php';
	require_once './php/NavegacionVO.inc.php';

	/**
	 * 
	 */
	class Navegacion 
	{
		
		public static function get_navegacion($tipo, $publicoObjetivo = "Publico") {
			$str = "select * from Navegacion where tipo=\"" . $tipo . "\" and publicoObjetivo=\"" . $publicoObjetivo . "\";";

			$consulta = BaseDeDatosViajes::consulta($str);
			//var_dump($consulta);
			$navegacionVO = new NavegacionVO($consulta[0]);  
				
			return $navegacionVO->get_elementos();
		}

	}

?>