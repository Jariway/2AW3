var main = angular.module('main', []);

main.controller('insertUser', function ($scope, $http) {
    var app = $scope;

    app.nombre = "";
    app.edad = "";
    app.curso = "";
    app.vistaAnadir = false;

    app.insertarUsuario = function () {

        $http({
            url: '../model/ajax/InsertarUsuario.php',
            method: "POST",
            data: {
                'nombre': app.nombre,
                'edad': app.edad,
                'curso': app.curso
            }
        })
    };
});

main.controller('menuController', function ($scope, $http) {
    var app = $scope;
    app.vistaAnadir = false;
});