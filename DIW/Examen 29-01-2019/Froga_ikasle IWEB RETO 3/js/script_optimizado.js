$(document).ready(function () {

    // Cosas que venían ya en el JS
    $('body').height(height);
    $('body').css("background-color", "grey");
    var height = $(window).height();
    //event.preventDefault();

    // ACCIONES

    // Botón login muestra el login
    $(".loginbutton").click(function () {
        $("#idDivLogin").css("display", "grid");
    });

    $(".cancelar").click(function () {
        $("#idDivLogin").css("display", "none");
    });

    $(".enviar").click(function () {
        var erabiltzailea = $(".usuario").val();
        var pasahitza = $(".pass").val();
        if (erabiltzailea == "Ane" && pasahitza == "Usuario12") {
            $("#idDivLogin").css("display", "none");
            $("#bibliotecaNav").css("display", "grid");
        } else {
            alert("Contraseña incorrecta")
        }
    });

});