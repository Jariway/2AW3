$(document).ready(function () {

    $(".mg").click(function () {
        var previousNumber = parseInt($(this).text());
        $(this).text(previousNumber+1);

    });
});