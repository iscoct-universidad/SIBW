--	Contenido Navegación y Referencias deberían de tener el mismo número de elementos --
--	2 elementos estarán separados por "," y sin espacios separados entre ","--

create table if not exists Navegacion (
	contenidoNavegacion varchar(256),
	referencias varchar(256),
	tipo enum('Superior', 'Lateral'),
	publicoObjetivo enum('Publico'),
		PRIMARY KEY(tipo, publicoObjetivo)
);

insert into Navegacion values(
	'Inicio, Antes de viajar,Galeria, Buscar, Sobre Nosotros, Operaciones Disponibles',
	'./index.php,./pagina.php?idPagina=2,./galeria.php, ./buscar.php, ./pagina.php?idPagina=1,./operacionesDisponibles.php',
	'Superior',
	'Publico'
);

insert into Navegacion values(
	'Sobre Nosotros,Antes de viajar,Buscar,Crear usuario',
	'./pagina.php?idPagina=1,./pagina.php?idPagina=2,./buscar.php,./crearUsuario.php',
	'Lateral',
	'Publico'
);
