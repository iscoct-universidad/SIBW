create table if not exists Paginas (
	id int AUTO_INCREMENT,
	titulo varchar(256),
	texto text CHARACTER SET utf8,
		PRIMARY KEY(id)
);

insert into Paginas (titulo, texto) values(
	'Sobre Nosotros',
	'<p>Nosotros somos dos estudiantes de ingenier&iacute;a inform&aacute;tica.</p>
	 <p>Nuestros nombres son Francisco Jos&eacute; Cot&aacute;n y Pedro Luis Fuertes.</p>
	 <p>Hemos hecho esta web para una pr&aacute;ctica de SIBW.</p>'
);

insert into Paginas (titulo, texto) values(
	'Antes de viajar', 
	'<p>Cosas que se deben tener en cuenta antes de viajas.</p>
	<ul>
		<li>Se debe estar en el aeropuerto al menos 2h antes de que salga el vuelo.</li>
		<li>Recuerde llevar su identificación personal. (DNI si es dentro de europa, Pasaporte si es fuera de Europa). Es muy recomendable viajar siempre con el pasaporte.</li>
		<li>No está permitido viajar con líquidos.</li>
		<li>Todos los objetos electrónicos que tengan baterías de lítio deben ir en cabina.</li>
	</ul>'
);
