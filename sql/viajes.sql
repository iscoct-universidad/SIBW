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
	"Viaje a unas de las ciudades mas bonitas del mundo", "./img/paris.jpeg", "./img/paris.jpeg", "img/paris.jpeg"), ("1", "Roma", "2000-2-2", "Viaje a unas de las ciudades
	mas impresionantes del mundo", './img/roma.jpg', './img/roma.jpg', './img/roma.jpg'), ("2", "Londres", "2000-3-3",
	"Viaje a unos de los paises mas caros del mundo xdd", './img/londres.jpg', './img/londres.jpg', './img/londres.jpg'),
	("3", "Jerez", "2018-2-2", "Viaje a unas de las ciudades con mejor vino del mundo",
	'./img/jerez.jpg', './img/jerez.jpg', './img/jerez.jpg'),
	("4", "New York", "2017-3-3", 'Viaje a unas de las ciudades mas internacionales del mundo', './img/newYork.jpg', './img/newYork.jpg', './img/newYork.jpg'), ("5", "Cordoba", "2010-3-3", 'Viaje a una ciudad de mierda', './img/cordoba.jpg', './img/cordoba.jpg', './img/cordoba.jpg'), ("6", "Madrid", "2010-2-3", 'Viaje a unas de las ciudades mas importantes de espania', './img/madrid.jpg', './img/madrid.jpg', './img/madrid.jpg'), ("7", "Lisboa", "2010-2-3", 'Viaje a unas de las ciudades mas importantes de Portugal', './img/lisboa.jpg', './img/lisboa.jpg', './img/lisboa.jpg'), ("8", "Los Angeles", "2019-2-3", 'Viaje a una de las ciudades mas emblematicas de EEUU', './img/losAngeles.jpg', './img/losAngeles.jpg', './img/losAngeles.jpg');
