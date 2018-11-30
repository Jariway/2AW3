var miApp = angular.module("miApp", []);
miApp.controller('miControlador',function($scope) {
    $scope.nombre = '';
    $scope.apellido = "";
    $scope.mensaje = "";

    $scope.SacarMensaje = function () {
        $scope.mensaje = "Hola " + $scope.nombre + "" + $scope.apellido;
    }
});