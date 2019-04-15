<?php 

	require_once './php/BaseDeDatosViajes.inc.php';
	require_once './php/PaginaVO.inc.php';
	require_once './php/validacion.inc.php';

	/**
	 * 
	 */
	class Pagina 
	{
		
		public static function getPaginas($id = "-1") {
			$sql;
			if($id == -1){
				$sql = "select * from Paginas;";
			}else{
				$id = test_int_with_min($id, 1)[1];
				$sql ="select * from Paginas where id=\"$id\";";
			}
			$consulta = BaseDeDatosViajes::consulta($sql);
			$paginas = []; 
			for($i = 0; $i < count($consulta); ++$i) {
			    $paginas[$i] = new PaginaVO($consulta[$i]);
			}
			return $paginas;
		}

	}

 ?>