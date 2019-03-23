console.log("Ha conseguido referenciar esto en condiciones");

function showComments() {
    console.log("Se llama correctamente a la función");

    document.getElementById("principalAntes").id = "principal";
    document.getElementById("apartadoComentarios").style.display = "block";
}

function addBloqueComentario(autor, texto) {
    let fecha = new Date();
    let hora = fecha.getHours();

    let comentarios = document.getElementById("conjuntoComentarios");

    let nuevoComentario = document.createElement("div");
    let nuevoAutor = document.createElement("p");
    let nuevaFecha = document.createElement("p");
    let nuevaHora = document.createElement("p");
    let nuevoTexto = document.createElement("p");

    nuevoComentario.class = "comentario";
    nuevoAutor.class = "autores";
    nuevaFecha.class = "fechas";
    nuevaHora.class = "horas";
    nuevoTexto.class = "textos";
    
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
        const palabrasProhibidas = ["palabra1", "palabra2", "palabra3", "palabra4",
        "palabra5", "palabra6", "palabra7", "palabra8", "palabra9", "palabra10"];
        let encontrado = false;
        let i = 0;
        let tam = palabrasProhibidas.length;

        for(let palabra of palabrasProhibidas)
            texto = texto.replace(palabra, "*");

        addBloqueComentario(autor, texto);

    } else {
        alert("No ha introducido todos los campos en el formulario o el email no es válido");
    }
}
