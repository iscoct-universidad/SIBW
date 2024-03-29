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
    let condicionTexto = false;
    let condicionAutor = false;
    let condicionEmail = false;

    if(texto != null)
        condicionTexto = (texto.length > 0) ? true : false;

    if(email != null)
        condicionEmail = (email.length > 0) ? true : false;

    if(autor != null)
        condicionAutor = (autor.length > 0) ? true : false;

    console.log("Texto: " + texto);
    console.log("email: " + email);
    console.log("Autor: " + autor);
    console.log("Real email: " + realEmail);

    if(condicionTexto && condicionEmail && condicionAutor && realEmail > -1) {
		let ajax = new XMLHttpRequest();
		
		ajax.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200) {
				console.log("Hasta aquí llegamos bien");
				console.log("La respuesta que recibimos desde el servidor es: " + this.responseText);
				
				//const palabrasProhibidas = this.responseText.split(" ").pop();
				const palabrasProhibidas = JSON.parse(this.responseText);

				console.log("Hasta aquí llegamos bien");
				console.log("Palabras prohibidas después del json: " + palabrasProhibidas[0].palabraProhibida);
				
				for(let palabra of palabrasProhibidas) {
					console.log("Palabra prohibida actual: " + palabra.palabraProhibida);
				    texto = texto.replace(palabra.palabraProhibida, "*");
				}

				addBloqueComentario(autor, texto);

				let xmlHttp = new XMLHttpRequest();
				let idViaje = document.getElementById("conjuntoComentarios").getAttribute("idViaje");
				let params = "idViaje=0&nombreAutor=" + autor + "&texto=" + texto + "&idViaje=" +  idViaje;
				
				xmlHttp.onreadystatechange = function () {
					if(this.readyState == 4 && this.status == 200) {
						console.log(this.responseText);
						console.log("Se ha recibido una respuesta correcta por parte del servidor");
					}
				};
		
				xmlHttp.open("POST", "http://localhost/SIBW/addComentario.php", true);
				xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlHttp.send(params);
			}
		}
		
		ajax.open("GET", "http://localhost/SIBW/consultaPalabrasProhibidas.php", true);
		ajax.send();
    } else {
        alert("No ha introducido todos los campos en el formulario o el email no es válido");
    }
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
