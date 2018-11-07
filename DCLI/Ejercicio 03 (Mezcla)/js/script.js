function cambiarImagen(numero) {
    var urlImagen;
    if (numero == "1") {
        urlImagen = "bulls.png";
    } else if (numero == "2") {
        urlImagen = "celtics.jpg";
    } else {
        urlImagen = "nba.jpg";
    }
    document.getElementById("foto").src = "imagenes/" + urlImagen;
}

function cambiarIdioma(idioma) {
    if (idioma == "1") {
        document.getElementById("titulo").innerHTML = "ELEMENTO DESBERDINEN PROPIETATEAK LORTU"
    } else {
        document.getElementById("titulo").innerHTML = "CONSEGUIR LAS PROPIEDADES DE LOS ELEMENTOS DISTINTOS"
    }
}

function saludar(){
    var nombre = document.getElementById("Izena").value;
    var nick = document.getElementById("Nick").value;
    var contrasena = document.getElementById("Pasahitza").value;

    if (nombre == "" || nick == "" || contrasena == ""){
        alert("Los campos no pueden estar vacíos")
    }else{
        if(contrasena.length < 8){
            alert("La contraseña tiene que tener 8 caracteres como mínimo");
        }else{
            document.getElementById("SaludoAqui").innerHTML = "Tu nombre es " + nombre + ", tu nick es " + nick + " y tu contraseña es " + contrasena + "."
        }
    }
}

function comprobarCampos() {


}
