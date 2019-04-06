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
	'Viaja,Tus vuelos,Antes de viajar,Galeria',
	'www.google.es,www.google.es,www.google.es,./galeria.php',
	'Superior',
	'Publico'
);

insert into Navegacion values(
	'Check-in,Tus reservas,Estados vuelos',
	'www.google.es,www.google.es,www.google.es',
	'Lateral',
	'Publico'
);
