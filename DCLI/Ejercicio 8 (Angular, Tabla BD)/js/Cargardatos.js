var miAplicacion = angular.module('miAplicacion', []);

miAplicacion.controller('mainController', ["$scope", "$http", function ($scope, $http) {

    $scope.showAdd = 0;
    $scope.showEdit = 0;
    $scope.showDelete = 0;
    $scope.showConsultas = 0;

    // Añadir alumno
    $scope.usuario = "";
    $scope.edad = "";
    $scope.curso = "";

    // Lista alumnos
    $scope.alumnos = "";


    // Funciones
    // Insertar alumno
    $scope.insertarAlumno = function () {
        console.log("Insertando alumno");
        $http({
                url: "class/ajax/index_anadirAlumno.php",
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: "nombre=" + $scope.usuario + "&edad=" + $scope.edad + "&curso=" + $scope.curso,
            })
            .then(function () {
                alert("Alumno insertado correctamente.");
            }, function (error) {
                console.log("error al insertar alunmno");
            });
    };

    // Muestra u oculta las cosas
    $scope.mostrarMenu = function (mostrar) {
        $scope.showAdd = 0;
        $scope.showEdit = 0;
        $scope.showDelete = 0;
        $scope.showConsultas = 0;
        if (mostrar == 'showAdd') {
            $scope.showAdd = 1;
        } else if (mostrar == 'showEdit') {
            $scope.showEdit = 1;
        } else if (mostrar == 'showDelete') {
            $scope.showDelete = 1;
        } else if (mostrar == 'showConsultas') {
            $scope.showConsultas = 1;
        }
    };

    console.log("Insertando alumno");
    $http({
            url: "class/ajax/index_listarAlumnos.php",
            method: "GET"
        })
        .then(function (res) {
            console.log("Alumnos obtenidos de la lista");
            $scope.alumnos = res.data;
            console.log($scope.alumnos);
        }, function (error) {
            console.log(error);
        });
}]);