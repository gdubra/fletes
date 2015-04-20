<?php $view->extend('FletesBundle::layout.html.php') ?>
<?php $view['slots']->start('_assets') ?>        
        <?php foreach ($view['assetic']->javascripts(array('bundles/fletes/js/index.js'),array(),
                   array('output' => 'js/compiled/js.js')) as $url): ?>
            <script src="<?php echo $view->escape($url) ?>"></script>
        <?php endforeach ?>
<?php $view['slots']->stop() ?>  
<div class="container" data-ng-controller="IndexCtrl">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mtop-5">
            <label>Origen</label>
            <input type="text" ng-model="viaje.origen" placeholder="Direccion de Origien" typeahead="direccion as direccion.formatted_address for direccion in cosnultarGmap($viewValue)" typeahead-loading="loadingLocations" class="form-control" typeahead-on-select="marcador_origen()">  
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mtop-5">
            <label>Destino</label>
            <input type="text" ng-model="viaje.destino" placeholder="Direccion de Destino" typeahead="direccion as direccion.formatted_address for direccion in cosnultarGmap($viewValue)" typeahead-loading="loadingLocations" class="form-control" typeahead-on-select="marcador_destino()">
        </div>
    </div>
    <div class="row mtop-10">
    <ui-gmap-google-map class="col-md-12" center="map.center" zoom="map.zoom">
        <ui-gmap-marker ng-if="viaje.origen.idKey" coords="viaje.origen.coords" idKey="viaje.origen.idKey"></ui-gmap-marker>
        <ui-gmap-marker ng-if="viaje.destino.idKey" coords="viaje.destino.coords" idKey="viaje.destino.idKey"></ui-gmap-marker>
    </ui-gmap-google-map>
    </div>
</div>