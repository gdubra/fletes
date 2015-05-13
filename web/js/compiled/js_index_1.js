angular.module('fletes')
.controller("IndexCtrl",['$scope','$http','uiGmapGoogleMapApi'
    , function ($scope,$http, GoogleMapApi) {
    
    $scope.viaje = {};
    $scope.mapConfig = {};
    $scope.mapConfig.center = {latitude: -34.604974,longitude: -58.433320};//centro en Ba
    $scope.mapConfig.zoom = 10;
    $scope.map = { control:{}};
    //Iniciar Mapa {}
    GoogleMapApi.then(function(maps) {
    $scope.googleVersion = maps.version;
    maps.visualRefresh = true;
    });
    
    $scope.cosnultarGmap = function(direccion){
        return $http({method: 'GET',url:'http://maps.googleapis.com/maps/api/geocode/json', 
            params: {
              address: direccion,
              sensor: false,
              language: 'es',
              components:"country:AR|locality:"+direccion
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
        $scope.busqueda.origen = {
                idKey:'origen', 
                formatted_address:$scope.busqueda.origen.formatted_address, 
                coords:{
                        latitude: $scope.busqueda.origen.geometry.location.lat,
                        longitude: $scope.busqueda.origen.geometry.location.lng
                       }
       };
       
        var bounds = new google.maps.LatLngBounds();
        bounds.extend(new google.maps.LatLng($scope.busqueda.origen.coords.latitude,$scope.busqueda.origen.coords.longitude));
        if(angular.isDefined($scope.busqueda.origen)){
            bounds.extend(new google.maps.LatLng($scope.busqueda.destino.coords.latitude,$scope.busqueda.destino.coords.longitude));
        }
        $scope.map.control.getGMap().fitBounds(bounds);
    };
    
    $scope.marcador_destino = function(){
        $scope.busqueda.destino = {
                idKey:'destino', 
                formatted_address:$scope.busqueda.destino.formatted_address, 
                coords:{
                        latitude: $scope.busqueda.destino.geometry.location.lat,
                        longitude: $scope.busqueda.destino.geometry.location.lng
                       }
       };
        
        var bounds = new google.maps.LatLngBounds();
        bounds.extend(new google.maps.LatLng($scope.busqueda.destino.coords.latitude,$scope.busqueda.destino.coords.longitude));
        if(angular.isDefined($scope.busqueda.origen)){
            bounds.extend(new google.maps.LatLng($scope.busqueda.origen.coords.latitude,$scope.busqueda.origen.coords.longitude));
        }
       $scope.map.control.getGMap().fitBounds(bounds);
    };
    
    //$scope.$watch('busqueda.origen',function(){marcador_origen();});

    
}]);
