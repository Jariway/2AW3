function cambiarFoto(foto) {
    if (foto == "suma") {
        var fullPath = document.getElementById("imgContenedor").src;
        var filename = fullPath.replace(/^.*[\\\/]/, '');

        //Patrón números
        var numberPattern = /\d+/g;
        var numimg = filename.match(numberPattern);

        numimgint = Number(numimg);
        numimgint = numimgint + 1;
        if (numimgint > 5) {
            document.getElementById("imgContenedor").src = "img/wallpaper_0.jpg";
            numimgint = 0;

        } else {
            document.getElementById("imgContenedor").src = "img/wallpaper_" + numimgint + ".jpg";
        }

        // Este código se repite, podría haberlo sacado a una función pero no tengo tiempo, de hecho se repiten más cosas
        document.getElementById("foto" + numimgint + "texto").style.color = "red";
        var textos = document.getElementsByName("galeriafoto");
        textos.forEach(texto => {
            if (texto.id != "foto" + numimgint + "texto")
                texto.style.color = "purple";
        });

    } else {
        document.getElementById("foto" + foto + "texto").style.color = "red";
        var textos = document.getElementsByName("galeriafoto");
        textos.forEach(texto => {
            if (texto.id != "foto" + foto + "texto")
                texto.style.color = "purple";
        });
        document.getElementById("imgContenedor").src = "img/wallpaper_" + foto + ".jpg";
    }

}

function getCheckboxes(divName) {
    //Recoge todos los checkboxes
    var checkMarcada = document.getElementsByName("opciones");
    checkMarcada.forEach(check => {
        if (check.checked == true) {
            if (check.value == "miColor") {
                cambiarColor(divName);
            } else {
                cambiarTamanio(divName);
            }
        }
    });
}

function cambiarEstilo(divName) {
    getCheckboxes(divName);
}

function cambiarTamanio(divName) {
    document.getElementById(divName).style.fontSize = "xx-large";
}

function cambiarColor(divName) {
    document.getElementById(divName).style.backgroundColor = "red";
}

function normalizarDiv(divName) {
    document.getElementById(divName).style.backgroundColor = "white";
    document.getElementById('four').style.backgroundColor = "blue";
    document.getElementById('two').style.backgroundColor = "blue";
    document.getElementById('six').style.backgroundColor = "blue";
    document.getElementById(divName).style.fontSize = "small";
}

function getDatosFormulario() {
    var izena = document.getElementById("Izena").value;
    var abizena = document.getElementById("Abizena").value;
    var nota = document.getElementById("Nota").value;

    var tableRef = document.getElementById('hemen');

    var filas = tableRef.rows.length;
    var newRow = tableRef.insertRow(filas - 1);

    var celda1 = newRow.insertCell(0);
    celda1.innerHTML = izena;
    var celda2 = newRow.insertCell(1);
    celda2.innerHTML = abizena;
    var celda3 = newRow.insertCell(2);
    celda3.innerHTML = nota;
}

function validar() {
    // alert("Hola");
    var valNombre = validarNombre();
    var valEdad = validarEdad();
    var valSelect = validarSelect();
    var valCheckbox = validarCheckbox();
    var valTarjeta = validarTarjeta();
    if (valNombre == true && valEdad == true && valSelect == true && valCheckbox == true && valTarjeta == true) {
        alert("Se ha validado el formulario");
        return true;
    } else {
        return false;
    }

}

function validarNombre() {
    //var dosCaracteres = new RegExp("\w{3,}");
    var nombre = document.getElementById("nombre").value;
    if (nombre.length < 2) {
        alert("Necesitas más de 2 caracteres")
        return false;
    } else {
        return true;
    }
}

function validarEdad() {
    var edad = document.getElementById("edad").value;
    if (edad < 18) {
        alert("No tienes la edad mínima");
        return false;
    } else {
        return true;
    }
}

function validarSelect() {
    var selectInput = document.getElementById("estudios");
    var valorInput = selectInput.options[selectInput.selectedIndex].value;

    if (valorInput == "Seleccione") {
        alert("Tienes que elegir uno al menos");
        return false;
    } else {
        return true;
    }
}

function validarCheckbox() {
    var checkBox = document.getElementById("acepto");
    if (checkBox.checked == true) {

        return true;
    } else {
        alert("No has aceptado los términos");
        return false;
    }
}

function validarTarjeta() {
    var regexTarjeta = new RegExp("\\d{4}-\\d{4}-\\d{4}-\\d{4}");
    var tarjeta = document.getElementById("numtarjeta").value;
    if (regexTarjeta.test(tarjeta)) {
        return true;
    } else {
        alert("La tarjeta no cumple el formato");
        return false;
    }
}

function numbersonly(myfield, e) {
    var key;
    var keychar;
    if (window.event){
        key = window.event.keyCode;
    }else if (e){
        key = e.which;
    } else{
        return true;
    }
        
    keychar = String.fromCharCode(key);

    if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)){
        return true;
    }else if ((("0123456789").indexOf(keychar) > -1)){
        return true;
    } else if ((keychar == ".")) {
        if (myfield.value.indexOf(keychar) > -1){
            return false;
        }
    } else{
        return false;
    }
        
}