create table if not exists Comentarios (
	idViaje varchar(128),
	idComentario int,
	ipUtilizada varchar(16),
	nombreAutor varchar(64),
	fecha date,
	hora time,
	email varchar(128),
	texto varchar(256),
		PRIMARY KEY (idComentario),
		FOREIGN KEY (idViaje) references Viajes(id)
);

insert into Comentarios values (
	1,
	1,
	"123.123.123.123",
	"Francisco Jose Cotan Lopez",
	date("1996-07-16"),
	"12:30:00",
	"frandkv27@gmail.com",
	"Hola mi nombre es Fran"
);

insert into Comentarios values (
	1,
	2,
	"123.123.123.123",
	"Pedro Luis Fuertes",
	date("2019-3-22"),
	"16:00:00",
	"frandkv27@gmail.com",
	"Hola mi nombre es Pedro"
);
