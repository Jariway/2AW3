$(document).ready(function () {
    var click1 = "";
    var click2 = "";
    // Eventos
    $(".c").click(function () {
        var id = $(this).attr("id");
        if (click1 == "") {
            click1 = id;
            changeOpacity(true);
        } else {
            click2 = id;
            swapPhotos();
        }

    });

    // Funciones
    function changeOpacity(change) {
        if (change) {
            $("#" + click1).css("opacity", "0.3");
        } else {
            $("#" + click1).css("opacity", "1");
        }
    }

    function swapPhotos() {
        var img1SRC = $('#i' + click1).attr('src');
        var img2SRC = $('#i' + click2).attr('src');
        $("#i" + click1).attr("src", img2SRC);
        $("#i" + click2).attr("src", img1SRC);
        changeOpacity(false);
        click1="";
        click2="";
    }

});