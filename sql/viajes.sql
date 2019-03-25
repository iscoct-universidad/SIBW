create table if not exists Viajes (
	id varchar(64),
	ciudad varchar(64),
	fecha date,
	texto varchar(256),
	imagenPrincipal varchar(64),
	imagenSecundaria1 varchar(64),
	imagenSecundaria2 varchar(64),
		PRIMARY KEY(id)
);

insert into Viajes values ("0", "Paris", "2019-2-10",
	"Viaje a unas de las ciudades mas bonitas del mundo", "img/paris.jpeg", "img/paris.jpeg", "img/paris.jpeg"), ("1", "Roma", "2000-2-2", "Viaje a unas de las ciudades
	mas impresionantes del mundo", 'img/roma.jpg', 'img/roma.jpg', 'img/roma.jpg'), ("2", "Londres", "2000-3-3",
	"Viaje a unos de los paises mas caros del mundo xdd", 'img/londres.jpg', 'img/londres.jpg', 'img/londres.jpg');
