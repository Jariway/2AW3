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

    // Botón de buscar con filtros
    $("#idButtonBuscar").click(function () {
        $(".libro").remove();
        var selectTipoLibro = getTypeSelectValue(); // String
        var selectAutorLibro = getAutorSelectValue(); // String
        var checkboxNovedad = getCheckboxStatus(); // Boolean

        var selectTipoSuperado = false;
        var selectAutorSuperado = false;
        var checkboxNovedadSuperado = false;

        $.each(todosLosLibros, function (i, item) {
            if (selectAutorLibro != "TODOS") {
                selectAutorSuperado = filtroAutor(item, selectAutorLibro);
            } else {
                selectAutorSuperado = true;
            }

            if (selectTipoLibro != "todos") {
                selectTipoSuperado = filtroTipo(item, selectTipoLibro);
            } else {
                selectTipoSuperado = true;
            }
            if (checkboxNovedad) {
                checkboxNovedadSuperado = filtroNovedad(checkboxNovedad, item);
            } else {
                checkboxNovedadSuperado = true;
            }
            if (checkboxNovedadSuperado && selectAutorSuperado && selectTipoSuperado) {
                var nuevoLibro = "<div class='libro'> <div id='titulolibro'>" + item.titulo + "</div> <img class='caratula' src='" + item.foto + "' />    <p div class='datoslibro'>" + item.autor + "</p><br> <div id='novedadlibro'>" + item.novedad + "</div> <br> <div class='datoslibro'>" + item.tipo + "</div><br><p><a class='btn btn-default datoslibro' href='#' role='button'>View details &raquo;</a></p></div>";
                $("#divLibros").append(nuevoLibro);
            }

        });
    });

    // FUNCIONES
    function filtroAutor(item, selectAutorLibro) {
        if (item.autor == selectAutorLibro) {
            return true;
        } else {
            return false;
        }
    }

    function filtroTipo(item, selectTipoLibro) {
        if (item.tipo.toLowerCase() == selectTipoLibro) {
            return true;
        } else {
            return false;
        }
    }

    function filtroNovedad(checkbox, item) {
        if (item.novedad == checkbox) {
            return true;
        } else {
            return false;
        }
    }

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
        $(".autoresSelect").remove();
        $("#divLibros").css("display", "flex");
        $(".container").css("display", "grid");
        $.each(todosLosLibros, function (i, item) {
            var esNovedad = "";
            addAutor(item.autor);
            if (item.novedad == "True") {
                esNovedad = "NOVEDAD";
            }
            var nuevoLibro = "<div class='libro'> <div id='titulolibro'>" + item.titulo + "</div> <img class='caratula' src='" + item.foto + "' />    <p div class='datoslibro'>" + item.autor + "</p><br> <div id='novedadlibro'>" + esNovedad + "</div> <br> <div class='datoslibro'>" + item.tipo + "</div><br><p><a class='btn btn-default datoslibro' href='#' role='button'>View details &raquo;</a></p></div>";
            $("#divLibros").append(nuevoLibro);
        });
    }

    function getCheckboxStatus() {
        if ($('#idCheckedNovedad').is(':checked')) {
            return true;
        } else {
            return false;
        }
    }

    // Obtiene el tipo de libro
    function getTypeSelectValue() {
        if ($("#idSelectTipo option:selected").text() == "FICCION") {
            return "ficcion";
        } else if ($("#idSelectTipo option:selected").text() == "NO FICCION") {
            return "noficcion";
        } else {
            return "todos";
        }
    }

    // Añade los autores al select
    function addAutor(valor) {
        var nuevoAutor = "<option class='autoresSelect' value='" + valor + "'>" + valor + "</option>"
        $("#idSelectAutor").append(nuevoAutor);
    }

    function getAutorSelectValue() {
        return $("#idSelectAutor option:selected").text();
    }
});