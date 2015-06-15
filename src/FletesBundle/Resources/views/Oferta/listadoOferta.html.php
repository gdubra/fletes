<?php $view->extend('FletesBundle::layout.html.php') ?>
<?php $view['slots']->start('_assets') ?>        
        <?php foreach ($view['assetic']->javascripts(array('bundles/fletes/js/listado-oferta-ctrl.js'),array(),
                   array('output' => 'js/compiled/js.js')) as $url): ?>
            <script src="<?php echo $view->escape($url) ?>"></script>
        <?php endforeach ?>
        <?php foreach ($view['assetic']->stylesheets(array('bundles/fletes/css/listado-oferta.css')) as $url): ?>
            <link rel="stylesheet" href="<?php echo $view->escape($url) ?>" />
        <?php endforeach ?>
<?php $view['slots']->stop() ?>


<div data-ng-controller="busquedaCtrl">
        <form data-role="form" name="form" data-ng-submit="submit()" class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 no-side-paddings">
                <input type="text" id="bOrigen" name="bOrigen" ng-model="busqueda.origen" placeholder="Direccion de Origien" typeahead="direccion as direccion.formatted_address for direccion in consultar_localidad($viewValue)" typeahead-loading="loadingLocations" class="form-control" typeahead-on-select="filtro_origen()" autocomplete="off">  
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5">
                <input type="text" id="bDestino" name="bDestino" ng-model="busqueda.destino" placeholder="Direccion de Destino" typeahead="direccion as direccion.formatted_address for direccion in consultar_localidad($viewValue)" typeahead-loading="loadingLocations" class="form-control" typeahead-on-select="filtro_destino()" autocomplete="off">
            </div>
            <button type="button" class="btn btn-primary col-xs-12 col-sm-2 col-md-2" ng-click="submit()" boton-cmp>Buscar</button>
        </form>


        <div  class="row listado mtop-5">
            <div class="oferta col-xs-12" data-ng-repeat="oferta in (ofertas[paginador.pagina])">
                <img class="col-xs-4 col-sm-4" data-ng-src="{{oferta.proveedor.usuario.fotoPerfil}}" ></img>
                <div class="col-xs-8">
                 <h3>Nombre Del User</h3>
                 <h4>{{oferta.origen.localidad}}</h4>
                 <h4>{{oferta.destino.localidad}}</h4>
                </div>
            </div>
            <div class="panel panel-default text-center" ng-show="ofertas != undefined && paginador.total==0">
                <div class="panel-body">
                   <h1>Sin Resultados</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <pagination class="center-block" ng-hide="paginador.total < paginador.itemsPorPagina" total-items="paginador.total" ng-model="paginador.pagina" ng-change="submit()" previous-text="&lsaquo;" next-text="&rsaquo;"></pagination>
        </div>
        

</div>