create table if not exists Comentarios (
	idViaje varchar(64),
	ipUtilizada varchar(64),
	nombreAutor varchar(64),
	fecha date,
	hora time,
	email varchar(128),
	texto varchar(256),
		PRIMARY KEY(nombreAutor, fecha, hora),
		FOREIGN KEY(idViaje) references Viajes(id) on delete cascade
);

insert into Comentarios values (
	"0",
	"123.123.123.123",
	"Francisco José Cotán López",
	date("1996-07-16"),
	"12:30:00",
	"frandkv27@gmail.com",
	"Hola mi nombre es Fran"
);

insert into Comentarios values (
	"0",
	"123.123.123.123",
	"Pedro Luis Fuertes",
	date("2019-3-22"),
	"16:00:00",
	"frandkv27@gmail.com",
	"Hola mi nombre es Pedro"
);
