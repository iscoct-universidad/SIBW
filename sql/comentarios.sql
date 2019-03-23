create table if not exists Comentarios (
	nombreAutor varchar(64),
	fecha date,
	hora time,
	email varchar(128),
	texto varchar(256)
);

insert into Comentarios values (
	"Francisco José Cotán López",
	date("1996-07-16"),
	"12:30",
	NULL,
	"Hola mi nombre es Fran"
);

insert into Comentarios values (
	"Pedro Luis Fuertes",
	date("2019-3-22"),
	"16:00",
	NULL,
	"Hola mi nombre es Pedro"
);
