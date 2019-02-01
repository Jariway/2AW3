$(document).ready(function () {

    // Cosas que venían ya en el JS
    $('body').height(height);
    $('body').css("background-color", "grey");
    var height = $(window).height();
    event.preventDefault();

    // Lista de todos los libros (Sólo se carga una vez)
    var todosLibros;

    // Botón login muestra el login
    $(".loginbutton").click(function () {
        $("#idDivLogin").css("display", "grid");
    });

    // Botón cancelar oculta el login
    $("#cancelar").click(function () {
        $("#idDivLogin").css("display", "none");
    });

    // Al hacer click en biblioteca muestra los libros
    $("#bibliotecaNav").click(function () {
        $(".container").css("display", "flex");
        //$(".container").css("display", "flex");
        obtenerLibros();
    });

    // Botón de enviar
    $("#submitUser").click(function () {
        var erabiltzailea = $("#userLogin").val();
        var pasahitza = $("#passLogin").val();
        if (erabiltzailea == "Ane" && pasahitza == "Usuario12") {
            $("#idDivLogin").css("display", "none");
            $("#bibliotecaNav").css("display", "flex");
        } else {
            alert("Contraseña incorrecta")
        }
    });





});