// Variables
var numeroAleatorio = Math.round(Math.random() * 50);
var contador = 0;

function empezarJuego() {
  alert("El número que el usuario tiene que acertar: " + numeroAleatorio);
  document.getElementById("divjuego").style = "display: block";
}

function comprobarNumero() {
  var numeroAComprobar = document.getElementById("mi_numero").value;
  if (numeroAComprobar == numeroAleatorio) {
    hasGanado();
    alert("Has acertado el número");
    document.getElementById("mi_numero").value = "";
    mostrarError(false);
  } else {
    darPista(numeroAComprobar);
    document.getElementById("mi_numero").value = "";
    mostrarError(true);
    var nombreDiv = "celda" + contador;
    document.getElementById(nombreDiv).style = "background-color: red;";
    contador++;
    if (contador == 5) {
      alert("Te has quedado sin oportunidades.");
      document.getElementById("divComprobar").style = "display:none;";
    }
  }
}

function mostrarError(estado) {
  if (estado == true) {
    document.getElementById("divimagen").style = "display: block;";
  } else {
    document.getElementById("divimagen").style = "display: none;";
  }
}

function hasGanado() {
  var celdas = document.getElementsByTagName("td");

  for (i = 0; i < celdas.length; i++) {
    celdas[i].style = "background-color: green;";
  }
}

function darPista(numero) {
  var mayorOMenor;
  if (numeroAleatorio > numero) {
    document.getElementById("pista").innerHTML =
      "El número es mayor que " + numero + ".";
  } else {
    document.getElementById("pista").innerHTML =
      "El número es menor que " + numero + ".";
  }
}
