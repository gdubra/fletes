angular.module('fletes')
.controller("IndexCtrl",['$scope','$http','uiGmapGoogleMapApi'
    , function ($scope,$http, GoogleMapApi) {
    $scope.map = {};
    $scope.map.center = {latitude: -34.604974,longitude: -58.433320};//centro en Ba
    $scope.map.zoom = 10;
    //Iniciar Mapa
    GoogleMapApi.then(function(maps) {
    $scope.googleVersion = maps.version;
    maps.visualRefresh = true;
    });
    
    $scope.cosnultarGmap = function(direccion){
        return $http({method: 'GET',url:'http://maps.googleapis.com/maps/api/geocode/json', 
            params: {
              address: direccion,
              sensor: false
            },
            transformRequest: function(data, headersGetter) {
                var headers = headersGetter();

                delete headers['X-Requested-With'];

                return headers;
            }
          }).then(function(response){
            return angular.isDefined(response.data.results)? response.data.results : [];
          });
    };
    
}]);
