
var miAplicacion = angular.module('miAplicacion', []);

miAplicacion.controller('mainController', ["$scope", "$http", function ($scope, $http) {

    $scope.showAdd = 1;
    $scope.showEdit = 1;
    $scope.showDelete = 1;
    $scope.showConsultas = 1;
}]);