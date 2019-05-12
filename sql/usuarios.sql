create table if not exists Usuarios (
	nombreCuenta varchar(64) unique not null,
	passwd varchar(64) not null,
	email varchar(64),
	nombre varchar(64) not null,
	genero enum('MASCULINO', 'FEMENINO'),
	tipoUsuario enum('ANONIMO', 'REGISTRADO', 'MODERADOR',
		'GESTOR', 'SUPERUSUARIO') not null,
		PRIMARY KEY(email)
);

insert into Usuarios (nombreCuenta, passwd,
	email, tipoUsuario) values (
	'root',
	'',
	'',
	'SUPERUSUARIO'
);
