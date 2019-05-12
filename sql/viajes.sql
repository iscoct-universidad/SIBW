create table if not exists Viajes (
	id int AUTO_INCREMENT,
	ciudad varchar(64),
	fecha date,
	fechaPublicacion date,
	fechaModificacion date,
	texto varchar(256),
	palabrasClave varchar(256),
	imagenes varchar(256),
	videos varchar(256),
		PRIMARY KEY(id)
);

insert into Viajes (id, ciudad, fecha, fechaPublicacion, fechaModificacion, texto, palabrasClave, imagenes, videos) values 
	(0, "Paris", "2019-2-10", "2019-1-9", "2019-5-9", "Viaje a unas de las ciudades mas bonitas del mundo", "Paris,Europa,Croissant", "./templates/img/paris.jpeg,./templates/img/paris.jpeg,templates/img/paris.jpeg", "templates/videos/paris.webm,video/webm"),
	(1, "Roma", "2000-2-2", "2000-1-1", "2000-1-1", "Viaje a unas de las ciudades	mas impresionantes del mundo", "Roma,Europa,Pizza", "./templates/img/roma.jpg,./templates/img/roma.jpg,./templates/img/roma.jpg", null),
	(2, "Londres", "2000-3-3", "2000-3-3", "2000-3-3", "Viaje a unos de los paises mas caros del mundo xdd", "Londres,Europa", './templates/img/londres.jpg,./templates/img/londres.jpg,./templates/img/londres.jpg', null),
	(3, "Jerez", "2018-2-2", "2018-2-2", "2018-2-2", "Viaje a unas de las ciudades con mejor vino del mundo",	"Jerez,Europa,Vino", './templates/img/jerez.jpg,./templates/img/jerez.jpg,./templates/img/jerez.jpg', null),
	(4, "New York", "2017-3-3", "2017-3-3", "2017-3-3", 'Viaje a unas de las ciudades mas internacionales del mundo', "New York,America,Hamburguesa", './templates/img/newYork.jpg,./templates/img/newYork.jpg,./templates/img/newYork.jpg', null),
	(5, "Cordoba", "2010-3-3", "2010-3-3", "2010-3-3", 'Viaje a una ciudad de mierda', "Cordoba,Europa,Salmorejo", './templates/img/cordoba.jpg,./templates/img/cordoba.jpg,./templates/img/cordoba.jpg', null),
	(6, "Madrid", "2010-2-3", "2010-3-3", "2010-3-3", 'Viaje a unas de las ciudades mas importantes de espania', "Madrid,Europa,Real Madrid", './templates/img/madrid.jpg,./templates/img/madrid.jpg,./templates/img/madrid.jpg', null), 
	(7, "Lisboa", "2010-2-3", "2010-2-3", "2010-2-3", 'Viaje a unas de las ciudades mas importantes de Portugal', "Portugal,Europa,Ni idea", './templates/img/lisboa.jpg,./templates/img/lisboa.jpg,./templates/img/lisboa.jpg', null), 
	(8, "Los Angeles", "2019-2-3", "2019-2-3", "2019-2-3", 'Viaje a una de las ciudades mas emblematicas de EEUU', "Los Angeles,America,Bacon", './templates/img/losAngeles.jpg,./templates/img/losAngeles.jpg,./templates/img/losAngeles.jpg', null);
