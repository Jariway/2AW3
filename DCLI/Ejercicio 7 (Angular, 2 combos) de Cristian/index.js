var main = angular.module('main', []);
main.controller('content', function ($scope, $http) {
    var app = $scope;

    $http.get('json/datoscombo1.json')
        .then(function (res) {
            app.categorias = res.data;
        });
        
    app.cambio = function(){
        var id = app.seleccionado.id;
        $http.get("json/datos-"+id+".json")
        .then(function(res){
            app.datos = res.data;    
        });
    }
}); 

