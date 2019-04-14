<?php 
/*
	idViaje int,
	idComentario int,
	ipUtilizada varchar(16),
	nombreAutor varchar(64),
	fecha date,
	hora time,
	email varchar(128),
	texto varchar(256),

*/
	class ComentarioVO
	{

		private $idViaje;
		private $idComentario;
		private $ipUtilizada;
		private $nombreAutor;
		private $fecha;
		private $hora;
		private $email; 
		private $texto; 
		
		function __construct($comentario)
		{

		 	$this->idViaje = $comentario -> idViaje;
		 	$this->idComentario = $comentario -> idComentario;
		 	$this->ipUtilizada = $comentario -> ipUtilizada;
		 	$this->nombreAutor = $comentario -> nombreAutor;
		 	$this->fecha = $comentario -> fecha;
		 	$this->hora = $comentario -> hora;
		 	$this->email = $comentario -> email; 
		 	$this->texto = $comentario -> texto;

		}

		public function get_idViaje(){
			return $this->idViaje;
		}
		public function get_idComentario(){
			return $this->idComentario;
		}
		public function get_ipUtilizada(){
			return $this->ipUtilizada;
		}
		public function get_nombreAutor(){
			return $this->nombreAutor;
		}
		public function get_fecha(){
			return $this->fecha;
		}
		public function get_hora(){
			return $this->hora;
		}
		public function get_email(){
			return $this->email;
		}
		public function get_texto(){
			return $this->texto;
		}
		
	}

 ?>