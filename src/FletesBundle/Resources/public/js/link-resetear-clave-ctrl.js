angular.module('fletes')
.controller("linkRstClaveCtrl",['$scope','ajaxManager'
    , function ($scope,ajaxManager) {
        $scope.submit = function(){
            if (!$scope.form.$invalid) {
                return ajaxManager.ajax_post($scope,ajax_urls.CONFIRMAR_LINK_RESETEAR_CLAVE,{usuario:$scope.usuario});
            }
            return;
        };
}]);