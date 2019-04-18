<?php  

	/**
	 * 
	 */
	class ElementoNavegacionVO 
	{
		private $titulo;
		private $enlace;
		private $tipo;
		private $publicoObjetivo;
		
		function __construct($titulo, $enlace, $tipo, $publicoObjetivo)
		{
			$this->titulo = $titulo;
			$this->enlace = $enlace;
			$this->tipo = $tipo;
			$this->publicoObjetivo = $publicoObjetivo;
		}

		public function get_titulo(){
			return $this->titulo;
		}
		public function get_enlace(){
			return $this->enlace;
		}
		public function get_tipo(){
			return $this->tipo;
		}
		public function get_publicoObjetivo(){
			return $this->publicoObjetivo;
		}

	}

?>