<?php 
	require_once './php/ElementoNavegacionVO.inc.php';
	
	/**
	
	contenidoNavegacion varchar(256),
	referencias varchar(256),
	tipo enum('Superior', 'Lateral'),
	publicoObjetivo enum('Publico'),

	 */
	class NavegacionVO
	{
		
		private $contenidoNavegacion;
		private $referencias;
		private $tipo;
		private $publicoObjetivo;

		function __construct($navegacion)
		{
			$this->contenidoNavegacion = explode(",", $navegacion -> contenidoNavegacion);
			$this->referencias = explode(",", $navegacion -> referencias);
			$this->tipo = $navegacion -> tipo;
			$this->publicoObjetivo = $navegacion -> publicoObjetivo;
		}

		public function get_contenidoNavegacion(){
			return $this->contenidoNavegacion;
		}
		public function get_referencias(){
			return $this->referencias;
		}
		public function get_tipo(){
			return $this->tipo;
		}
		public function get_publicoObjetivo(){
			return $this->publicoObjetivo;
		}

		public function get_elementos(){
			
			$elementosNavegacion = [];
			
			for($i = 0; $i < count($this->referencias); $i++)
				array_push($elementosNavegacion, new ElementoNavegacionVO($this->contenidoNavegacion[$i], $this->referencias[$i], $this->tipo, $this->publicoObjetivo ));

			return $elementosNavegacion; 
		}

	}

?>