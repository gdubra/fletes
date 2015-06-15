angular.module('fletes')
.controller("busquedaCtrl",['$scope','$http','ajaxManager','gmapUtil','uiGmapGoogleMapApi'
    , function ($scope,$http, ajaxManager,gmapUtil,GoogleMapApi) {

    $scope.paginador = {total:0,itemsPorPagina:10,pagina:1};
    $scope.busqueda = {};
    
    $scope.consultar_localidad = function(direccion){
        return gmapUtil.consulta_geocode(direccion);
    };
    
    $scope.filtro_origen = function(){
        $scope.busqueda.origen = gmapUtil.traducir_localidad(angular.copy($scope.busqueda.origen));
    };
    
    $scope.filtro_destino = function(){
        $scope.busqueda.destino = gmapUtil.traducir_localidad(angular.copy($scope.busqueda.destino));
    };
    
    $scope.filtro_desincronizado = function(){
        $scope.fitro_sincronizado = false;
    };
    
    $scope.$watch('busqueda.destino', function() {
        $scope.filtro_desincronizado();
    });
    
    $scope.$watch('busqueda.origen', function() {
        $scope.filtro_desincronizado();
    });
    
    $scope.submit = function(){
        
        if(!$scope.fitro_sincronizado ){
            $scope.paginador.pagina = 1;
            $scope.busqueda.pagina = $scope.paginador.pagina;
            $scope.fitro_sincronizado = true;
            //$scope.ofertas= [];
            return ajaxManager.ajax_post($scope,ajax_urls.BUSCAR_OFERTA,{filtro:$scope.busqueda},function(respuesta){
                if(!angular.isDefined($scope.ofertas)){
                    $scope.ofertas= [];
                }
                
                $scope.paginador.total = respuesta.data.total;
                $scope.ofertas[$scope.paginador.pagina] = respuesta.data.listado;
            });
        }else if(!$scope.form.$invalid && !angular.isDefined($scope.ofertas[$scope.paginador.pagina])) {
            $scope.busqueda.pagina = $scope.paginador.pagina;
            return ajaxManager.ajax_post($scope,ajax_urls.BUSCAR_OFERTA,{filtro:$scope.busqueda},function(respuesta){
                $scope.paginador.total = respuesta.data.total; 
                $scope.ofertas[$scope.paginador.pagina] = respuesta.data.listado;
            });
        }
        return;
    };
    
}]);
