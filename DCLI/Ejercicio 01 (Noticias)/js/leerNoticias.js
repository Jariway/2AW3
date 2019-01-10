var misUsuarios = ["Mikel", "Ane", "Endika"];
var misContrasenas = ["11", "22", "33"];
var misRoles = ["usu", "admin", "usu"];

function showLogin() {
  document.getElementById("miLogin").style = "display: block;";
}

function checkLogin() {
  var idUsuario = document.getElementById("idUsuario").value;
  var idContrasena = document.getElementById("idContrasena").value;
  var correcto = comprobarCampos(idUsuario, idContrasena);
  if (correcto) {
    var usuarioExiste = false;
    var contrasenaExiste = false;
    var posicionUsuario;

    // Comprobar usuario
    for (i = 0; i < misUsuarios.length; i++) {
      if (misUsuarios[i] == idUsuario) {
        usuarioExiste = true;
        posicionUsuario = i;
      }
    }

    if (misContrasenas[posicionUsuario] == idContrasena) {
      contrasenaExiste = true;
    }

    if (contrasenaExiste && usuarioExiste) {
      document.getElementById("miPerfil").innerHTML = idUsuario;
      document.getElementById("miLogin").style = "display:none;";
      mostrarOAnadir(posicionUsuario);
    } else {
      alert("Datos incorrectos");
    }
  }

}

function comprobarCampos(usuario, contrasena) {
  var compUser = true;
  if (usuario == "" || usuario == undefined) {
    alert("El usuario no puede estr vacío.")
    compUser = false;
  }
  return compUser;
}

function mostrarOAnadir(posicionUsuario) {
  document.getElementById("elementos").style = "display: block;";
  if (misRoles[posicionUsuario] == "admin") {
    document.getElementById("crearNoticia").style = "display: block;";
  }
}

function anadirNoticia() {

  var titulo = document.getElementById("idNoticiaNuevaTitulo").value;
  var texto = document.getElementById("idNoticiaNuevaTexto").value;

  if(titulo=="" || texto == ""){
    alert("Todos los campos son obligatorios");
  }else{
  var divNuevo = document.createElement("div");
  divNuevo.setAttribute("class", "texto");

  var nuevoH3 = document.createElement("h3");
  nuevoH3.innerHTML = titulo;
  divNuevo.appendChild(nuevoH3);

  var nuevoTexto = document.createElement("p");
  nuevoTexto.innerHTML = texto;
  divNuevo.appendChild(nuevoTexto);

  // Agregar
  document.getElementById("elementos").appendChild(divNuevo);

  // Vaciar
  document.getElementById("idNoticiaNuevaTitulo").value = "";
  document.getElementById("idNoticiaNuevaTexto").value = "";

  }
}

function numbersonly(myfield, e) {
  var key;
  var keychar;
  if (window.event) {
    key = window.event.keyCode;
  } else if (e) {
    key = e.which;
  } else {
    return true;
  }

  keychar = String.fromCharCode(key);

  if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)) {
    return true;
  } else if ((("0123456789").indexOf(keychar) > -1)) {
    return true;
  } else if ((keychar == ".")) {
    if (myfield.value.indexOf(keychar) > -1) {
      return false;
    }
  } else {
    return false;
  }

}