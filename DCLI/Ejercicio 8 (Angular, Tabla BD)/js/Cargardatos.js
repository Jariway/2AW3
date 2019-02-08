var miAplicacion = angular.module('miAplicacion', []);

miAplicacion.controller('mainController', ["$scope", "$http", function ($scope, $http) {

    $scope.showAdd = 0;
    $scope.showEdit = 0;
    $scope.showDelete = 0;
    $scope.showConsultas = 0;
    $scope.showEditarAlumno = 0;

    // Añadir alumno
    $scope.usuario = "";
    $scope.edad = "";
    $scope.curso = "";

    // Lista alumnos
    $scope.alumnos = "";
    $scope.selectAlumnos = "";

    // Modificar alumno
    $scope.editNombre = "";
    $scope.editCurso = $scope.curso;

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
                var objetoUsuario = {};
                objetoUsuario.Nombre = $scope.usuario;
                objetoUsuario.Edad = $scope.edad;
                objetoUsuario.Curso = $scope.curso;
                $scope.alumnos.push(objetoUsuario);
                alert("Alumno insertado correctamente.");
            }, function (error) {
                console.log("error al insertar alunmno");
            });
    };

    // Editar alumno
    $scope.editarAlumno = function () {
        console.log("Editando alumno");
        $http({
                url: "class/ajax/index_modificarAlumno.php",
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: "nombre=" + $scope.editNombre + "&edad=" + $scope.selectAlumnos.Edad + "&curso=" + $scope.curso + "&id=" + $scope.selectAlumnos.id,
            })
            .then(function () {
                var objetoUsuario = {};
                objetoUsuario.Nombre = $scope.editNombre;
                objetoUsuario.Edad = $scope.selectAlumnos.Edad;
                objetoUsuario.Curso = $scope.curso;
                objetoUsuario.id = $scope.selectAlumnos.id;

                $scope.borrarAlumnoDelScope($scope.selectAlumnos.id);
                $scope.alumnos.push(objetoUsuario);
                alert("Alumno editado correctamente.");
            }, function (error) {
                console.log("Error al editar alunmno");
            });
    };
    // Eliminar alumno
    $scope.eliminarAlumno = function () {
        console.log("Eliminando alumno");
        $http({
                url: "class/ajax/index_borrarAlumno.php",
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: "id=" + $scope.selectAlumnos.id,
            })
            .then(function () {
                console.log($scope.editNombre);
                console.log($scope.selectAlumnos.Edad);
                console.log($scope.curso);
                console.log($scope.selectAlumnos.id);
                $scope.borrarAlumnoDelScope($scope.selectAlumnos.id);
                alert("Alumno borrado correctamente.");
            }, function (error) {
                console.log("Error al borrar alunmno");
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
            $scope.edad = "";
            $scope.showEdit = 1;
        } else if (mostrar == 'showDelete') {
            $scope.showDelete = 1;
        } else if (mostrar == 'showConsultas') {
            $scope.showConsultas = 1;
        }
    };

    // Borrar un alumno
    $scope.borrarAlumnoDelScope = function (pid) {

        angular.forEach($scope.alumnos, function (value, key) {
            if (value.id == pid) {
                $scope.alumnos.splice(key, 1);
                /*  alert("Alumno borrado del scope"); */
            }
        });
    };

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