<?php 
	
	require_once './php/BaseDeDatosViajes.inc.php';
	require_once './php/validacion.inc.php';
	require_once './php/UsuarioVO.inc.php';

	class Usuario
	{
		public static function getUsuario($email) {
			return BaseDeDatosViajes::consulta("select * from Usuarios where \"email\"=
				" . $email . ";");
		}

		// Credenciales == nombreCuenta + passwd
				
		public static function getUsuarioPorCredenciales($nombreCuenta, $passwd) {
			return BaseDeDatosViajes::consulta("select * from Usuario where nombreCuenta=\"$nombreCuenta\" and passwd=\"$passwd\";")[0];
		}
		
		public static function getUsuarios() {
			return BaseDeDatosViajes::consulta("select * from Usuario;");
		}
		
		public static function addUsuario($nombreCuenta, $passwd, $email,
				$nombre, $genero, $tipoUsuario) {
			
			$sql = "select * from Usuarios where \"email\"=$email;";
			
			$existe = BaseDeDatosViajes::consulta($sql);
				
			if($existe[0] == NULL) {
				$sql = "insert into Usuario values (\"$nombreCuenta\", \"$passwd\",
					\"$email\", \"$nombre\", \"$genero\", \"$tipoUsuario\");";
					
				return BaseDeDatosViajes::getConexion() -> query($sql);
			} else
				return FALSE;
		}
		
		public static function setUsuario($nombreCuenta, $nombre, $genero, $password) {
			$sql = "update Usuario set nombre=\"$nombre\",genero=\"$genero\",passwd=\"$password\" where nombreCuenta=\"$nombreCuenta\";";
			
			return BaseDeDatosViajes::getConexion() -> query($sql);
		}
		
		public static function setRol($nombreCuenta, $tipoUsuario) {
			$sql = "update Usuario set tipoUsuario='$tipoUsuario' where nombreCuenta='$nombreCuenta';";
			$numSuperusuarios = "select count(*) from Usuario where tipoUsuario='superusuario';";
			$tipoUsuarioACambiar = "select tipoUsuario from Usuario where nombreCuenta='$nombreCuenta';";
			
			$numSuperusuarios = BaseDeDatosViajes::getConexion() -> query($numSuperusuarios) -> num_rows;
			$tipoUsuarioACambiar = BaseDeDatosViajes::getConexion() -> query($tipoUsuarioACambiar) -> num_rows;
			
			if($numSuperusuarios == $tipoUsuarioACambiar && $numSuperusuarios == 1)
				return false;
			else
				return BaseDeDatosViajes::getConexion() -> query($sql);
		}
	}
	
?>
