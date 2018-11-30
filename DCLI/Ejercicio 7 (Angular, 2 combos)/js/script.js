var miApp = angular.module('miApp', []);

miApp.controller('miControlador', function ($scope, $http) {

    $scope.listaMainCombobox = [];
    $scope.listaSecondCombobox = [];
    $scope.mostrarSegundoSelect = 'false';

    $scope.resultPrimerSelect = {
        id: "",
        tipo: "",
        formato: ""
    }

    $http.get('JSON/datoscombo1.json').then(function (data) {
        $scope.listaMainCombobox = data.data;
    });

    $scope.mostrarSelect = function () {
            $http.get('JSON/datoscombo1.json').then(function (data) {
        $scope.listaMainCombobox = data.data;
    });
        $scope.mostrarSegundoSelect = 'true';

    };




});