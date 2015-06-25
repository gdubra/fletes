angular.module('fletes')
.controller("RstClaveCtrl",['$scope','ajaxManager'
    , function ($scope,ajaxManager) {
        $scope.submit = function(){
            if (!$scope.form.$invalid) {
                return ajaxManager.ajax_post($scope,ajax_urls.CONFIRMAR_RESETEAR_CLAVE,{token:$scope.token,clave:$scope.clave,clave2:$scope.clave2});
            }
            return;
        };
}]);