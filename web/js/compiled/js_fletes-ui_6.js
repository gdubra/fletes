var agendanaui = angular.module('ui.fletes',['ui.fletes.tpls']);
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
