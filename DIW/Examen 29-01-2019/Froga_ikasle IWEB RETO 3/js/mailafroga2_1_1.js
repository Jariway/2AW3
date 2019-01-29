$(document).ready(function () {
    // event.preventDefault();  no ejecutar submit
    var todosLibros;
    // Regex pass
    var height = $(window).height();
    $('body').height(height);
    $('body').css("background-color", "grey");
    /*  $("#idDivLogin").css("display", "none"); */

    // Botón login
    $(".loginbutton").click(function () {
        $("#idDivLogin").css("display", "grid");
    });

    // Botón cancelar
    $("#cancelar").click(function () {
        $("#idDivLogin").css("display", "none");
    });

    // Nav biblioteca
    $("#bibliotecaNav").click(function () {
        $(".container").css("display", "flex");
        //$(".container").css("display", "flex");
        obtenerLibros();
    });

    // Botón de enviar
    $("#bidali").click(function () {

        var erabiltzailea = $("#userLogin").val();
        var pasahitza = $("#passLogin").val();
        if (erabiltzailea == "Ane" && pasahitza == "Usuario12") {
            $("#idDivLogin").css("display", "none");
            $("#bibliotecaNav").css("display", "flex");
        } else {
            alert("Contraseña incorrecta")
        }
    });

    // Todas las funciones de abajo las podría haber hecho en una pero no tengo tiempo para pensar
    // Obtener los datos de los libros
    function obtenerLibros() {
        $.ajax({
            url: "json/datosJSON.json",
            success: function (result) {
                todosLibros = result;
                RecorrerJson();
            },
            error: function (error) {
                alert("Error");
            }
        });
    }

    function aniadirAutor(valor) {
        var nuevoAutor = "<option value='" + valor + "'>" + valor + "</option>"
        $("#idSelectAutor").append(nuevoAutor);
    }

    function RecorrerJson() {
        $(".libro").remove();
        $("#divLibros").css("display", "flex");
        $(".container").css("display", "flex");
        $.each(todosLibros, function (i, item) {
            var esNovedad = "";
            aniadirAutor(item.autor);
            if (item.novedad == "True") {
                esNovedad = "NOVEDAD";
            }
            var nuevoLibro = "<div class='libro'> <div id='titulolibro'>" + item.titulo + "</div> <img class='caratula' src='" + item.foto + "' />    <p div class='datoslibro'>" + item.autor + "</p><br> <div id='novedadlibro'>" + esNovedad + "</div> <br> <div class='datoslibro'>" + item.tipo + "</div><br><p><a class='btn btn-default datoslibro' href='#' role='button'>View details &raquo;</a></p></div>";
            $("#divLibros").append(nuevoLibro);
        });
    }

    function RecorrerNovedades() {
        $(".libro").remove();
        $.each(todosLibros, function (i, item) {
            if (item.novedad == "True") {
                var nuevoLibro = "<div class='libro'> <div id='titulolibro'>" + item.titulo + "</div> <img class='caratula' src='" + item.foto + "' />    <p div class='datoslibro'>" + item.autor + "</p><br> <div id='novedadlibro'>NOVEDAD</div> <br> <div class='datoslibro'>" + item.tipo + "</div><br><p><a class='btn btn-default datoslibro' href='#' role='button'>View details &raquo;</a></p></div>";
                $("#divLibros").append(nuevoLibro);
            }

        });
    }

    function RecorrerFiltro(valor) {
        $(".libro").remove();
        $.each(todosLibros, function (i, item) {
            var esNovedad = "";
            if (item.novedad == "True") {
                esNovedad = "NOVEDAD";
            }
            if (item.tipo == valor) {
                var nuevoLibro = "<div class='libro'> <div id='titulolibro'>" + item.titulo + "</div> <img class='caratula' src='" + item.foto + "' />    <p div class='datoslibro'>" + item.autor + "</p><br> <div id='novedadlibro'>" + esNovedad + "</div> <br> <div class='datoslibro'>" + item.tipo + "</div><br><p><a class='btn btn-default datoslibro' href='#' role='button'>View details &raquo;</a></p></div>";
                $("#divLibros").append(nuevoLibro);
            }

        });
    }

    function RecorrerAutor(valor) {
        $(".libro").remove();
        $.each(todosLibros, function (i, item) {
            var esNovedad = "";
            if (item.novedad == "True") {
                esNovedad = "NOVEDAD";
            }
            if (item.autor == valor) {
                var nuevoLibro = "<div class='libro'> <div id='titulolibro'>" + item.titulo + "</div> <img class='caratula' src='" + item.foto + "' />    <p div class='datoslibro'>" + item.autor + "</p><br> <div id='novedadlibro'>" + esNovedad + "</div> <br> <div class='datoslibro'>" + item.tipo + "</div><br><p><a class='btn btn-default datoslibro' href='#' role='button'>View details &raquo;</a></p></div>";
                $("#divLibros").append(nuevoLibro);
            }

        });
    }

    $("#idButtonBuscar").click(function () {
        if ($('#idCheckedNovedad').is(':checked')) {
            RecorrerNovedades();
        } else {
            if ($("#idSelectTipo option:selected").text() == "FICCION") {
                RecorrerFiltro("ficcion");
            } else if ($("#idSelectTipo option:selected").text() == "NO FICCION") {
                RecorrerFiltro("Noficcion");
            } else {
                RecorrerJson();
            }

            /*             if ($("#idSelectTipo option:selected").text() != "TODO") {
                            RecorrerAutor($("#idSelectTipo option:selected").text());
                        } */

        }

    });



});
// "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"