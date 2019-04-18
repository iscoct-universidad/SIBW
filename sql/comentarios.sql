create table if not exists Comentarios (
	idViaje varchar(64),
	ipUtilizada varchar(64),
	email varchar(64),
	fecha date,
	hora time,
	email varchar(128),
	texto varchar(256),
		PRIMARY KEY(email, fecha, hora),
		FOREIGN KEY(idViaje) references Viajes(id) on delete cascade,
		FOREIGN KEY(email) references Usuario(nombreCuenta)
			on delete cascade
);
