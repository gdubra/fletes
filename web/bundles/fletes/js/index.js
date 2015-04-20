angular.module('fletes')
.controller("IndexCtrl",['$scope','$http','uiGmapGoogleMapApi'
    , function ($scope,$http, GoogleMapApi) {
    
    $scope.viaje = {};
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
              sensor: false,
              components:"country:AR"
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
    
    
    $scope.marcador_origen = function(){
        $scope.viaje.origen = {
                idKey:'origen', 
                formatted_address:$scope.viaje.origen.formatted_address, 
                coords:{
                        latitude: $scope.viaje.origen.geometry.location.lat,
                        longitude: $scope.viaje.origen.geometry.location.lng
                       }
       };
    };
    
    $scope.marcador_destino = function(){
        $scope.viaje.destino = {
                idKey:'destino', 
                formatted_address:$scope.viaje.destino.formatted_address, 
                coords:{
                        latitude: $scope.viaje.destino.geometry.location.lat,
                        longitude: $scope.viaje.destino.geometry.location.lng
                       }
       };
    };
    
    //$scope.$watch('viaje.origen',function(){marcador_origen();});

    
}]);
