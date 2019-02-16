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

    $("#honena").click(function () {
        $("table").css("display", "none");
        $(".pelikulaonena").css("display", "block");
    });
    
    $("#zerrenda").click(function () {
        $("table").css("display", "table");
        $(".pelikulaonena").css("display", "none");
    });
});