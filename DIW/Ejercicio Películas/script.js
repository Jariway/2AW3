$(document).ready(function () {

    // Eventos
    $(".mg").click(function () {
        var previousNumber = parseInt($(this).text());
        $(this).text(previousNumber + 1);
    });

    $(".nmg").click(function () {
        var previousNumber = parseInt($(this).text());
        $(this).text(previousNumber + 1);
    });

    $(".honena").click(function () {
        $("table").css("display", "none");
        $(".pelikulaonena").css("display", "block");
        var pelikulaonena = getPelikulaOnena();
        var srcImagen = $(".img" + pelikulaonena).attr('src');
        $("#mejorPeli").attr("src", srcImagen);
    });

    $(".zerrenda").click(function () {
        $("table").css("display", "table");
        $(".pelikulaonena").css("display", "none");
    });

    // Funciones

    function getPelikulaOnena() {
        var highestNumber = 0;
        var highest = 0;
        $(".mg").each(function (index) {
            var currentValue = parseInt($(this).text());
            var currentId = parseInt($(this).attr("num"));
            if (currentValue > highestNumber) {
                highestNumber = currentValue;
                highest = currentId;
            }
        });
        return highest;
    }
});