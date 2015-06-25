var agendanaui = angular.module('ui.fletes',['ui.fletes.tpls','ui.fletes.componentes']);
angular.module('ui.fletes.tpls',['template/genericos/confirmar.html']);
//DIRECTIVES
agendanaui.directive('validar', function() {
    return {
        restrict: 'A',
        require:  '^form',
        link: function (scope, el, attrs, formCtrl) {
          var inputEl   = el[0].querySelector("[name]");// find the text box element, which has the 'name' attribute
          var inputNgEl = angular.element(inputEl);// convert the native text box element to an angular element
          var inputName = inputNgEl.attr('name');

          inputNgEl.bind('blur', function() {// only apply the has-error class after the user leaves the text box
            el.toggleClass('has-error', formCtrl[inputName].$invalid);
          });
        }
      };
    });

//Controladores
//controlador del modal de confirmacion
agendanaui.controller('confirmarCtrl', function ($scope, $modal, contenido,confirmacion_callback,cancelacion_callback) {

    $scope.content = content;
    $scope.confirmacion_callback = confirmacion_callback;
    $scope.cancelacion_callback = cancelacion_callback;
    $scope.confirmar = function () {
        $modal.close(true);
    };

    $scope.cancelar = function () {
        $modal.dismiss(false);
    };
    
    $modal.result.then(function (confirm) {
        if(confirm){
            $scope.confirmacion_callback();
        }else if(angular.isDefined($scope.cancelacion_callback)){
            $scope.cancelacion_callback();
        }
      });
});

angular.module('ui.fletes.componentes',[])
.directive('botonCmp',function($compile,$q){
    return {
      restrict: 'A',
      scope: {
          'btnClick': '&?ngClick',
          'btnClass': '&?ngClass',
          'btnDisabled': '=?ngDisabled',
      }, 
      link:  function (scope, element, attrs){
              scope.buttonLoading = false;
              
              if(angular.isDefined(attrs['ngClick'])){
                  scope.wrapped_ng_click = function(){
                      scope.buttonLoading = true;
                      $q.when(scope.btnClick()).then(function(){scope.buttonLoading = false;},function(){scope.buttonLoading = false;});
                  };
              }
              
              var html = '';
              html += '<button type="'+attrs['type']+'" class="'+attrs['class']+'"';
              html += attrs.ngClick?'data-ng-click="wrapped_ng_click()"':'';
              html += attrs.ngDisabled?'data-ng-disabled="btnDisabled"':'';
              html += '>';
              html += '<span ng-hide="buttonLoading">'+element.text()+'</span>';
              html += '<span ng-show="buttonLoading" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>';
              html += '</button>';
              element.replaceWith($compile(html)(scope));
      }
  };})
  .directive('iconoCmp',function($compile,$q){
      return {
        restrict: 'A',
        scope: {
            'iconClick': '&ngClick',
            'iconClass': '&ngClass',
            'icon': '@',
            'autobrewActionIcon':'@'
        }, 
        link:  function (scope, element, attrs){
                
                scope.buttonLoading = false;
                scope.wrapped_ng_click = function(){
                    scope.buttonLoading = true;
                    $q.when(scope.iconClick()).then(function(){scope.buttonLoading = false;},function(){scope.buttonLoading = false;});
                };
                
                if(angular.isDefined(attrs['ngClass'])){
                    scope.wrapped_ng_class = function(){return 'glyphicon '+ (scope.buttonLoading ? 'glyphicon-refresh glyphicon-refresh-animate' : scope.iconClass());};
                }else{
                    scope.wrapped_ng_class = function(){return 'glyphicon ' + (scope.buttonLoading ? 'glyphicon-refresh glyphicon-refresh-animate' : scope.autobrewActionIcon);};
                }
                
                ignoreAttr = ['ngClick', 'ngClass','ngShow','ngDisabled'];
                var html = '';
                html += '<span ';
                for(var attr in attrs.$attr){
                    if(ignoreAttr.indexOf(attr) == -1){
                        html += attr+'="'+attrs[attr]+'" ';
                    }
                }
                html += attrs.ngShow? 'data-ng-show="'+attrs.ngShow+'" ': '';
                html += attrs.ngDisabled? 'data-ng-disabled="'+attrs.ngDisabled+'" ':'';
                html += 'data-ng-click="wrapped_ng_click()" ';
                html += 'data-ng-class="wrapped_ng_class()">';
                html += '</span>';
                element.replaceWith($compile(html)(scope));
        }
    };})




//TEMPLATES
//template de confirmacion
angular.module("template/genericos/confirmar.html", []).run(["$templateCache", function($templateCache) {
    $templateCache.put("template/genericos/confirmar.html",
            "<div class=\"modal-body\">"+
                "{{content}}"+
            "</div>"+
            "<div class=\"modal-footer\">"+
            "<button class=\"btn btn-primary\" ng-click=\"confirmar()\">OK</button>"+
            "<button class=\"btn btn-default\" ng-click=\"cancelar()\">Cancel</button>"+
            "</div>"
    );
  }]);
