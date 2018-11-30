var miApp = angular.module('miApp', []);

miApp.controller('miControlador', function ($scope, $http) {

    $scope.listaMainCombobox = [];
    $scope.listaSecondCombobox = [];
    $scope.mostrarSegundoSelect = 'false';
    $scope.autor = '';
    $scope.titulo = '';

    $scope.resultPrimerSelect = {
        id: "",
        tipo: "",
        formato: ""
    }
    $scope.resultSegundoSelect = {
        titulo: "",
        autor: "",
        tipo: ""
    }

    $http.get('JSON/datoscombo1.json').then(function (data) {
        $scope.listaMainCombobox = data.data;
    });

    $scope.mostrarSelect = function () {
    var idJSON = $scope.resultPrimerSelect.id;

    // Pide el JSON
        $http.get('JSON/datos_' + idJSON + '.json').then(function (data) {
        $scope.listaSecondCombobox = data.data;
    });

    $scope.mostrarSegundoSelect = 'true';
       $scope.titulo = $scope.resultSegundoSelect.titulo;
       $scope.autor = $scope.resultSegundoSelect.autor;
    };




});