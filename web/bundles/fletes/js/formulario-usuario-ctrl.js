angular.module('fletes')
.controller("FormularioUsuarioCtrl",['$scope','ajaxManager'
    , function ($scope,ajaxManager) {
        $scope.submit = function(){
            if (!$scope.form.$invalid) {
                return ajaxManager.ajax_post($scope, ajax_urls.CREAR_USUARIO,$scope.usuario,function($data){
                    $scope.registrado=true;
                });
            }
            return;
        };
}]);