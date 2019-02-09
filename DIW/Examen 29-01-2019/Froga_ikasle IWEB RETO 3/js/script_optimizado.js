$(document).ready(function () {

    // Cosas que venían ya en el JS
    $('body').height(height);
    $('body').css("background-color", "grey");
    var height = $(window).height();
    var todosLosLibros;
    //event.preventDefault();

    // ACCIONES
    // Botón login muestra el login
    $(".loginbutton").click(function () {
        $("#idDivLogin").css("display", "grid");
    });

    // Botón cancelar cierra el login
    $(".cancelar").click(function () {
        $("#idDivLogin").css("display", "none");
    });
    // Botón biblioteca abre la biblioteca
    $("#bibliotecaNav").click(function () {
        obtenerLibros();
        $(".container").css("display", "grid");
        $("#divLibros").css("display", "grid");
    });

    // Botón enviar comprueba el login
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

    // FUNCIONES
    // Obtener los datos de los libros (Sólo se ejecuta una vez)
    function obtenerLibros() {
        $.ajax({
            url: "json/datosJSON.json",
            success: function (result) {
                todosLosLibros = result;
                RecorrerJson();
            },
            error: function (error) {
                alert("Error");
            }
        });
    }

    // Inserta los libros
    function RecorrerJson() {
        $(".libro").remove();
        $("#divLibros").css("display", "flex");
        $(".container").css("display", "grid");
        $.each(todosLosLibros, function (i, item) {
            var esNovedad = "";
            if (item.novedad == "True") {
                esNovedad = "NOVEDAD";
            }
            var nuevoLibro = "<div class='libro'> <div id='titulolibro'>" + item.titulo + "</div> <img class='caratula' src='" + item.foto + "' />    <p div class='datoslibro'>" + item.autor + "</p><br> <div id='novedadlibro'>" + esNovedad + "</div> <br> <div class='datoslibro'>" + item.tipo + "</div><br><p><a class='btn btn-default datoslibro' href='#' role='button'>View details &raquo;</a></p></div>";
            $("#divLibros").append(nuevoLibro);
        });
    }

});