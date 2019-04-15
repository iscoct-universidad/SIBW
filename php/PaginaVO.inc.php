<?php 
	
	/**
		id int AUTO_INCREMENT,
		titulo varchar(256),
		texto text,
	 */
	class PaginaVO
	{
		
		private $id;
		private $titulo;
		private $texto; 

		function __construct($pagina)
		{
			$this->id = $pagina -> id;
			$this->titulo = $pagina -> titulo;
			$this->texto = $pagina -> texto; 
		}

		public function get_id(){
			return $this->id;
		}
		public function get_titulo(){
			return $this->titulo;
		}
		public function get_texto(){
			return $this->texto;
		}

	}

 ?>