<?php $view->extend('FletesBundle::layout.html.php') ?>
<?php $view['slots']->start('_assets') ?>        
        <?php foreach ($view['assetic']->javascripts(array('bundles/fletes/js/index.js'),array(),
                   array('output' => 'js/compiled/js.js')) as $url): ?>
            <script src="<?php echo $view->escape($url) ?>"></script>
        <?php endforeach ?>
<?php $view['slots']->stop() ?>  
<div class="container" data-ng-controller="IndexCtrl">
    <div class="row">
        <div class="col-xs-12 col-md-6 mtop-5">
            <input type="text" ng-model="origen" placeholder="Direccion de Origien" typeahead="direccion as direccion.formatted_address for direccion in cosnultarGmap($viewValue)" typeahead-loading="loadingLocations" class="form-control">
        </div>
        <div class="col-xs-12 col-md-6 mtop-5">
            <input type="text" ng-model="destino" placeholder="Direccion de Destino" typeahead="direccion as direccion.formatted_address for direccion in cosnultarGmap($viewValue)" typeahead-loading="loadingLocations" class="form-control">
        </div>
    </div>
    <div class="row mtop-10">
    <ui-gmap-google-map class="col-md-12"
         center="map.center"
         zoom="map.zoom"
         
        ></ui-gmap-google-map>
    </div>
</div>