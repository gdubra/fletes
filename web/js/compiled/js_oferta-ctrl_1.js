angular.module('fletes')
.controller("FormularioDemandaCtrl",['$scope','$http','uiGmapGoogleMapApi','gmapUtil','ajaxManager'
    , function ($scope,$http, GoogleMapApi, gmapUtil,ajaxManager) {
    
    $scope.oferta = {otrasLocalidades:[]};
    $scope.mapConfig = {};
    $scope.mapConfig.center = {latitude: -34.604974,longitude: -58.433320};//centro en Ba
    $scope.mapConfig.zoom = 10;
    $scope.map = { control:{}};
    $scope.mapConfig.options = {disableDefaultUI:false,disableDoubleClickZoom:true,maxZoom:10,overviewMapControl:false,panControl:false,rotateControl:false,scaleControl:false,scrollwheel:false,zoomControl:false,streetViewControl:false,mapTypeControl:false};
    //Iniciar Mapa {}
    GoogleMapApi.then(function(maps) {
    $scope.googleVersion = maps.version;
    maps.visualRefresh = true;
    });
    
    $scope.cosnultar_localidad = function(direccion){
        return gmapUtil.consulta_geocode(direccion);
    };
    
    
    $scope.marcador_origen = function(){
        $scope.oferta.origen = {
                idKey: $scope.oferta.origen.place_id, 
                formatted_address:$scope.oferta.origen.formatted_address, 
                coords:{
                        latitude: $scope.oferta.origen.geometry.location.lat,
                        longitude: $scope.oferta.origen.geometry.location.lng
                       }
       };
       
        $scope.encuadrar_mapa();
    };
    
    $scope.marcador_destino = function(){
        $scope.oferta.destino = {
                idKey:$scope.oferta.destino.place_id, 
                formatted_address:$scope.oferta.destino.formatted_address, 
                coords:{
                        latitude: $scope.oferta.destino.geometry.location.lat,
                        longitude: $scope.oferta.destino.geometry.location.lng
                       }
       };
        
        $scope.encuadrar_mapa();
    };
    
    $scope.agregar_localidad = function(){
        return $scope.oferta.otrasLocalidades.push(null);
    };
    
    $scope.remover_localidad = function(index){
        $scope.oferta.otrasLocalidades.splice(index,1);
        $scope.encuadrar_mapa();
        return;
    };
    
    $scope.marcador_intermedio = function(localidad, index){
        $scope.oferta.otrasLocalidades[index]  = {
                idKey: localidad.place_id, 
                formatted_address:localidad.formatted_address, 
                coords:{
                        latitude: localidad.geometry.location.lat,
                        longitude:localidad.geometry.location.lng
                       }
       };
        
        $scope.encuadrar_mapa();
    };
    
    $scope.encuadrar_mapa = function(){
        var bounds = new google.maps.LatLngBounds();
        if(angular.isDefined($scope.oferta.destino)){
            bounds.extend(new google.maps.LatLng($scope.oferta.destino.coords.latitude,$scope.oferta.destino.coords.longitude));
        }
        if(angular.isDefined($scope.oferta.origen)){
            bounds.extend(new google.maps.LatLng($scope.oferta.origen.coords.latitude,$scope.oferta.origen.coords.longitude));
        }
        
        if(angular.isDefined($scope.oferta.otrasLocalidades)){
            for(var i=0;i<$scope.oferta.otrasLocalidades.length;i++){
                bounds.extend(new google.maps.LatLng($scope.oferta.otrasLocalidades[i].coords.latitude,$scope.oferta.otrasLocalidades[i].coords.longitude));
            }
        }
        $scope.map.control.getGMap().fitBounds(bounds);
    };
    
    $scope.submit = function(){
        if (!$scope.form.$invalid) {
            var url = $scope.oferta.id?  {url:ajax_urls.ACTUALIZAR_OFERTA.replace(':id',$scope.oferta.id)} : ajax_urls.CREAR_OFERTA;
            return ajaxManager.ajax_post($scope,url,$scope.oferta);
        }
        
        return;
      
    };
}]);
