var DietakArray = [5, 14, 10];
var KmPrezioa = 0.45;
var OrduaPrezioa = 25;
var letraTam = 25;

function calcularTotal() {
    var totalBidaiak = calcularBidaiak();
    var totalDietak = calcularDietak();
    document.getElementById("total").innerHTML = totalBidaiak + totalDietak;
}

function calcularDietak() {
    var checkboxes = document.getElementsByName("dietak");
    var totalComida = 0;

    var totalComida = 0;
    if (checkboxes[0].checked) {
        totalComida = totalComida + DietakArray[0];
    }
    if (checkboxes[1].checked) {
        totalComida = totalComida + DietakArray[1];
    }
    if (checkboxes[2].checked) {
        totalComida = totalComida + DietakArray[2];
    }

    document.getElementById("totalDietak").innerHTML = totalComida;

    return totalComida;
}

function calcularBidaiak() {

    var kilometroak = KmPrezioa * document.getElementById("km").value;
    var orduak = OrduaPrezioa * document.getElementById("orduakBidaiak").value;
    var totalBidaiak = kilometroak + orduak;

    var orduakInputValue = document.getElementById("orduakBidaiak").value;
    var KMInputValue = document.getElementById("km").value;

    if (orduakInputValue > 300) {
        document.getElementById("imagenORDUAKerror").style.display = "inline";
    } else {
        document.getElementById("imagenORDUAKerror").style.display = "none";

    }

    if (KMInputValue > 200) {
        document.getElementById("imagenKMerror").style.display = "inline";
    } else {
        document.getElementById("imagenKMerror").style.display = "none";

    }
    document.getElementById("totalBidaiak").innerHTML = totalBidaiak;

    return totalBidaiak;
}

function limpiarTodo() {
    var inputs = document.getElementsByTagName("input");

    // Limpiar inputs tipo text
    for (i = 0; i < inputs.length; i++) {
        if (inputs[i].type == "text") {
            inputs[i].value = 0;
        }
    }

    // Limpiar checkboxes
    var checkboxes = document.getElementsByName("dietak");
    for (i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = false;
    }

    calcularTotal();
}

function cambiarTamanos(valor) {
    var emaitzaLabels = document.getElementsByClassName("emaitza");
    for (i = 0; i < emaitzaLabels.length; i++) {
        var style = window.getComputedStyle(emaitzaLabels[i], null).getPropertyValue('font-size');
        var tamanoActual = parseFloat(style);
        if (valor == 0 && tamanoActual < 40) {
            emaitzaLabels[i].style.fontSize = (tamanoActual + 2) + 'px';
        } else if (valor == 1 && tamanoActual > 26) {
            emaitzaLabels[i].style.fontSize = (tamanoActual - 2) + 'px';
        }
    }
}

function soloNumeros(input, e) {
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
        if (input.value.indexOf(keychar) > -1) {
            return false;
        }
    } else {
        return false;
    }
}