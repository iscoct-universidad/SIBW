function showComments() {
    console.log("Se llama correctamente a la función");

    document.getElementById("principal").id = "principalDespues";
    document.getElementById("apartadoComentarios").style.display = "block";
}

function addBloqueComentario(autor, texto) {
    let fecha = new Date();
    let hora = "" + fecha.getHours() + ":" + fecha.getMinutes() + "h";

    let comentarios = document.getElementById("conjuntoComentarios");

    let nuevoComentario = document.createElement("div");
    let nuevoAutor = document.createElement("p");
    let nuevaFecha = document.createElement("p");
    let nuevaHora = document.createElement("p");
    let nuevoTexto = document.createElement("p");

    nuevoComentario.className  = "comentarios";
    nuevoAutor.className  = "autores";
    nuevaFecha.className  = "fechas";
    nuevaHora.className  = "horas";
    nuevoTexto.className  = "textos";

    nuevoAutor.innerText = "Autor: " + autor;
    nuevaFecha.innerText = "Fecha: " + fecha;
    nuevaHora.innerText = "Hora: " + hora;
    nuevoTexto.innerText = "Texto: " + texto;
    
    nuevoComentario.appendChild(nuevoAutor);
    nuevoComentario.appendChild(nuevaFecha);
    nuevoComentario.appendChild(nuevaHora);
    nuevoComentario.appendChild(nuevoTexto);

    comentarios.appendChild(nuevoComentario);
}

function addComment() {
    let texto = document.getElementsByName("text")[0].value;
    let email = document.getElementsByName("email")[0].value;
    let autor = document.getElementsByName("name")[0].value;
    let realEmail = email.indexOf("@");
    let condicionTexto = (texto && texto.length > 0) ? true : false;
    let condicionAutor = (email && email.length > 0) ? true : false;
    let condicionEmail = (autor && autor.length > 0) ? true : false;
    
    if(condicionTexto && condicionEmail && condicionAutor && realEmail > -1) {
		let cabecera = {
			method: 'GET',
			mode: 'cors'
		};
		
		fetch("http://localhost:8080/consultaPalabrasProhibidas.php", cabecera)
						.then((res) => {
			return res.json();	
		}).then((palabrasProhibidas) => {
			for(let palabra of palabrasProhibidas) {
				console.log("Palabra prohibida actual: " + palabra.palabraProhibida);
			    texto = texto.replace(palabra.palabraProhibida, "*");
			}
			
			addBloqueComentario(autor, texto);
			
			let idViaje =
				document.getElementById("conjuntoComentarios").getAttribute("idViaje");
			let datosPost = new FormData();
			
			datosPost.append('nombreAutor', autor);
			datosPost.append('texto', texto);
			datosPost.append('idViaje', idViaje);
			
			cabecera = {
				method: 'POST',
				mode: 'cors',
				body: datosPost
			};
			
			fetch("http://localhost:8080/addComentario.php", cabecera).then((res) => {
				res.text();
			}).then((texto) => {
				console.log(texto);
				console.log("Se ha recibido una respuesta correcta por parte del servidor");
			});
			
		});
	}
}

function removeComment(idComentario) {
	let cabecera = {};

	cabecera = {
		method: 'GET'
	};
	
	fetch(`http://localhost:8080/removeComment.php?idComentario=${idComentario}`, cabecera).then((res) => {
		return res.text();
	}).then((texto) => {
		console.log(`Texto: ${texto}`);
		location.reload();
	});
}

function mostrarEdicionComentario(idComentario) {
	let bloque = document.getElementById("edicion" + idComentario);
	
	bloque.style.display = 'block';
}

function guardarBorrador() {
	localStorage.nombre = document.getElementsByName("name")[0].value;
	localStorage.email = document.getElementsByName("email")[0].value;
	localStorage.texto = document.getElementsByName("text")[0].value;
	
	console.log("Hasta aquí hemos llegado");
	console.log("Valor de localStorage.nombre: " + localStorage.nombre);
}

function ventanaEmergente(redSocial) {
	let tituloEvento = document.getElementById("tituloEvento").innerHTML;
	let imagen = document.getElementsByClassName("imagenes")[0].src;
	
	window.open("./mensajeRedSocial.php?tituloEvento=" + tituloEvento + "&imagen=" +
		imagen + "&redSocial=" + redSocial, 
		"_blank", "channelmode=yes,resizable=yes,fullscreen=yes");
}
