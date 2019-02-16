$(document).ready(function () {
    // Eventos
    $(".c").click(function () {
        var id = $(this).attr("id");
        addPoint(id);
    });

    $("#puntuar").click(function () {
        $(".bichos").css("display", "grid");
    });
    $("#cambiarEstilos").click(function () {
        var valorSelect = getValorSelect();
        var varlorTamanio = parseInt( $("#tamanio").val());
        var varlorColor = $("#color").val();
        changeStyles(valorSelect, varlorTamanio, varlorColor);
    });
    $("#mejor").click(function () {
        var highestImage = getHighest();
        showHighestImage(highestImage);
    });
    $("#btnEstilos").click(function () {
        $(".estilos").css("display", "block");
    });

    // Funciones
    function changeStyles(valorSelect, varlorTamanio, varlorColor) {
        if (valorSelect == "TITULO") {
            $(".titulo").css("color",varlorColor);
            $(".titulo").css("font-size", varlorTamanio);
        }else{
            $("img").css("border", "2px solid" + varlorColor);
            $("img").css("padding", varlorTamanio);
        }
    }

    function addPoint(pid) {
        $(".p" + pid).text(parseInt($(".p" + pid).text()) + 1);
    }

    // Obtiene la imagen con el número más alto
    function getHighest() {
        var highestNumber = 0;
        var highest = 1;
        $(".punt").each(function (index) {
            var currentValue = parseInt($(this).text());
            var currentId = parseInt($(this).attr("num"));
            if (currentValue > highestNumber) {
                highestNumber = currentValue;
                highest = currentId;
            }
        });
        return highest;
    }

    // Muestra la imagen con la puntuación más alta
    function showHighestImage(pnumber) {
        var srcImagen = $("#i" + pnumber).attr('src');
        $("#mejorImagen").css("display", "block");
        $("#mejorImagen").attr("src", srcImagen);
    }

    // Obtiene el valor del select de los estilos
    function getValorSelect() {
        return $("#aplicara option:selected").text();
    }
});