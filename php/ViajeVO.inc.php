<?php 

	class ViajeVO
	{
		private $id;
		private $ciudad;
		private $fecha; 
		private $texto;
		private $palabrasClave; 
		private $imagenes; 
		private $videos;
		
		function __construct($viaje)
		{
			$this->id = $viaje -> id;
			$this->ciudad = $viaje -> ciudad;
			$this->fecha = $viaje -> fecha;; 
			$this->texto = $viaje -> texto;
			$this->palabrasClave = $viaje -> palabrasClave;
			$this->imagenes = explode(',', $viaje -> imagenes);
			$this->videos = explode(';', $viaje -> videos);
		}

		public function getId(){
			return $this->id;
		} 
		public function getCiudad(){
			return $this->ciudad;
		} 
		public function getFecha(){
			return $this->fecha;
		} 
		public function getTexto(){
			return $this->texto;
		} 
		public function getPalabrasClave(){
			return $this->palabrasClave;
		} 
		public function getImagenes(){
			return $this->imagenes;
		} 
		
		/*
			Devuelve un array de arrays
				Un array en donde cada posición tendrá un array constituido
					por el video fuente y su correspondiente formato
					
					array[0] = <videoFuente>	array[1] = <formatoVideo>
		*/
		
		public function getVideos() {
			$resultado = [];
			
			foreach($this->videos as $video)
				array_push($resultado, explode(',', $video));
				
			return $resultado;
		}
	}

 ?>
