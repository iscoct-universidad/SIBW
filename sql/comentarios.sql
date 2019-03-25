create table if not exists Comentarios (
	idViaje varchar(64),
	nombreAutor varchar(64),
	fecha date,
	hora time,
	email varchar(128),
	texto varchar(256),
		PRIMARY KEY(nombreAutor, fecha, hora),
		FOREIGN KEY(idViaje) references Viajes(id)
);

insert into Comentarios values (
	"0",
	"Francisco José Cotán López",
	date("1996-07-16"),
	"12:30:00",
	NULL,
	"Hola mi nombre es Fran"
);

insert into Comentarios values (
	"0",
	"Pedro Luis Fuertes",
	date("2019-3-22"),
	"16:00:00",
	NULL,
	"Hola mi nombre es Pedro"
);
