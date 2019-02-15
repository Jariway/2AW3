$(document).ready(function () {
    // Eventos
    $(".c").click(function () {
        var id = $(this).attr("id");
        addPoint(id);
    });

    $("#puntuar").click(function () {
        $(".bichos").css("display", "grid");
    });
    $("#mejor").click(function () {
        var highestImage = getHighest();
        showHighestImage(highestImage);
    });
    $("#btnEstilos").click(function () {
        $(".estilos").css("display", "block");
    });

    // Funciones
    function addPoint(pid) {
        $(".p" + pid).text(parseInt($(".p" + pid).text()) + 1);
    }

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

    function showHighestImage(pnumber){
        var srcImagen = $("#i" + pnumber).attr('src');
        $("#mejorImagen").css("display", "block");
        $("#mejorImagen").attr("src", srcImagen);
    }
});