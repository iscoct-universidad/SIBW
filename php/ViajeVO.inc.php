<?php 

	class ViajeVO
	{
		private $id;
		private $ciudad;
		private $fecha; 
		private $texto;
		private $palabrasClave; 
		private $imagenes; 
		
		function __construct($viaje)
		{
			$this->id = $viaje -> id;
			$this->ciudad = $viaje -> ciudad;
			$this->fecha = $viaje -> fecha;; 
			$this->texto = $viaje -> texto;
			$this->palabrasClave = $viaje -> palabrasClave;
			$this->imagenes = explode(',', $viaje -> imagenes);
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

	}

 ?>