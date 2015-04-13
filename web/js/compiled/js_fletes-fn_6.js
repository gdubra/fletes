var agendanafn = angular.module('fn.fletes', []);

//CONTROLADORES
//Controlador de alertas emergentes
agendanafn.controller('AlertasCtrl',['$rootScope',function($rootScope) {
    $rootScope.alertas=null;
}]);

//FACTORIES
agendanafn.factory('ajaxAuthInterceptor', function() {  
    var ajaxAuthInterceptor = {
            responseError: function(rejection) {
                if(rejection.status === 403){
                    window.location.reload();
                }
                return rejection;}
    };

    return ajaxAuthInterceptor;
});

agendanafn.factory('ajaxManager', ['$http','$rootScope', function($http,$rootScope) {
    return {
        update_scope_model: 
            function($scope,retrieved_data){
                for (var key in retrieved_data) {
                    $scope[key] = retrieved_data[key];
                }
            },
        ajax_get: 
            function($scope,url,config, sucess_callback, fail_callback){
            return $http.get(url.url,config)
            .success(angular.bind(this,function(retrieved_data){
                if(angular.isDefined(retrieved_data)){
                    this.update_scope_model($scope,retrieved_data.data);
                }
                
                if(retrieved_data.success){
                    if(angular.isDefined(sucess_callback)){
                        sucess_callback(retrieved_data.data);
                    }
                }else{
                    //mostrar errores
                    $scope.form.errores = retrieved_data.errores;
                    
                    if(angular.isDefined(fail_callback)){
                        fail_callback(retrieved_data);
                    }else if(!angular.isDefined(retrieved_data.alertas)){//por si no hay otra alerta defindia 
                        $rootScope.alertas=[{tipo:'danger',mensaje:'Error Fatal recargue la pagina y vuelva a intentarlo'}];
                    }
                }
                    
                
                if(angular.isDefined(retrieved_data.alertas)){
                    $rootScope.alertas = retrieved_data.alertas;
                }
            }))
            .error(function() {
                $scope.waiting_post_response = false;
                $rootScope.alertas=[{tipo:'danger',mensaje:'Error Fatal recargue la pagina y vuelva a intentarlo'}];
            });
        },
        ajax_post: 
            function($scope,url,data, sucess_callback, fail_callback){
                
                $scope.form.errores = null;
                if(angular.isDefined(data)){
                    data.csrf = url.csrf;
                }else{
                    data = {csrf: url.csrf};
                }
                
                return $http.post(url.url,data)
                .success(angular.bind(this,function(retrieved_data) {
                    if(angular.isDefined(retrieved_data.data)){
                        this.update_scope_model($scope,retrieved_data.data);
                    }
                    
                    if(angular.isDefined(retrieved_data.alertas)){
                        $rootScope.alertas = retrieved_data.alertas;
                    }
                    
                    if(retrieved_data.success){
                        if(angular.isDefined(sucess_callback)){
                            sucess_callback(retrieved_data);
                        }
                    }else{
                        //mostrar errores
                        $scope.form.errores = retrieved_data.errores;
                        
                        if(angular.isDefined(fail_callback)){
                            fail_callback(retrieved_data);
                        }else if(!angular.isDefined(retrieved_data.alertas)){//por si no hay otra alerta defindia 
                            $rootScope.alertas=[{tipo:'danger',mensaje:'Error Fatal recargue la pagina y vuelva a intentarlo'}];
                        }
                    }
                    
                }))
                .error(function() {
                        $rootScope.alertas=[{tipo:'danger',mensaje:'Error Fatal recargue la pagina y vuelva a intentarlo'}];
                    });
                }
    };
}]);