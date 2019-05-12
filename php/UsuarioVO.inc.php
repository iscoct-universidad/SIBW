<?php
	class UsuarioVO
	{
		private $nombreCuenta;
		private $passwd;
		private $email;
		private $nombre;
		private $genero;
		private $tipoUsuario;
		
		function __construct($usuario)
		{
			$this->$nombreCuenta = $usuario -> nombreCuenta;
			$this->$passwd = $usuario -> passwd;
			$this->$email = $usuario -> email; 
			$this->$nombre = $usuario -> nombre;
			$this->$genero = $usuario -> genero;
			$this->$tipoUsuario = $usuario -> tipoUsuario;
		}
		
		public function get_nombreCuenta() {
			return $this->nombreCuenta;
		}
		
		public function get_passwd() {
			return $this->passwd;
		}
		
		public function get_email() {
			return $this->email;
		}
		
		public function get_nombre() {
			return $this->nombre;
		}
		
		public function get_genero() {
			return $this->genero;
		}
		
		public function get_tipoUsuario() {
			return $this->tipoUsuario;
		}
	}
?>
