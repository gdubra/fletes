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
    
    $scope.consultar_localidad = function(direccion){
        return gmapUtil.consulta_geocode(direccion);
    };
    
    
    $scope.marcador_origen = function(){
        $scope.oferta.origen = gmapUtil.traducir_localidad(angular.copy($scope.oferta.origen));
        gmapUtil.encuadrar_mapa($scope.map,$scope.oferta.destino,$scope.oferta.origen,$scope.oferta.otrasLocalidades);
    };
    
    $scope.marcador_destino = function(){
        $scope.oferta.destino = gmapUtil.traducir_localidad($scope.oferta.destino);
        gmapUtil.encuadrar_mapa($scope.map,$scope.oferta.destino,$scope.oferta.origen,$scope.oferta.otrasLocalidades);
    };
    
    $scope.agregar_localidad = function(){
        return $scope.oferta.otrasLocalidades.push(null);
    };
    
    $scope.remover_localidad = function(index){
        $scope.oferta.otrasLocalidades.splice(index,1);
        gmapUtil.encuadrar_mapa($scope.map,$scope.oferta.destino,$scope.oferta.origen,$scope.oferta.otrasLocalidades);
        return;
    };
    
    $scope.marcador_intermedio = function(localidad, index){
        $scope.oferta.otrasLocalidades[index]  = {
                gid: localidad.place_id, 
                localidad:localidad.formatted_address, 
                formatted_address:localidad.formatted_address,
                lat:localidad.geometry.location.lat,
                lng:localidad.geometry.location.lng
       };
        
        gmapUtil.encuadrar_mapa($scope.map,$scope.oferta.destino,$scope.oferta.origen,$scope.oferta.otrasLocalidades);
    };
    
    $scope.obtener_cordenadas = function(localidad){
        return gmapUtil.obtener_cordenadas(localidad);
    };
    
    $scope.submit = function(){
        if (!$scope.form.$invalid) {
            var url = $scope.oferta.id?  {url:ajax_urls.ACTUALIZAR_OFERTA.replace(':id',$scope.oferta.id)} : ajax_urls.CREAR_OFERTA;
            return ajaxManager.ajax_post($scope,url,$scope.oferta);
        }
        
        return;
      
    };
}]);