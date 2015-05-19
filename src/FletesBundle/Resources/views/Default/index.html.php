<?php $view->extend('FletesBundle::layout.html.php') ?>
<?php $view['slots']->start('_assets') ?>        
        <?php foreach ($view['assetic']->javascripts(array('bundles/fletes/js/index.js'),array(),
                   array('output' => 'js/compiled/js.js')) as $url): ?>
            <script src="<?php echo $view->escape($url) ?>"></script>
        <?php endforeach ?>
<?php $view['slots']->stop() ?>  
<div class="container" data-ng-controller="IndexCtrl">
    <div class="row">
        <form class="col-xs-12 col-sm-6 col-md-6" role="form" name="form" ng-submit="submit()">
                <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12 mtop-10">
                        <label for="vOrigen">Origen</label>
                        <input type="text" id="vOrigen" name="vOrigen" ng-model="busqueda.origen" placeholder="Direccion de Origien" typeahead="direccion as direccion.formatted_address for direccion in cosnultarGmap($viewValue)" typeahead-loading="loadingLocations" class="form-control" typeahead-on-select="marcador_origen()">  
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12 mtop-10">
                        <label for="vDestino">Destino</label>
                        <input type="text" ng-model="busqueda.destino" placeholder="Direccion de Destino" typeahead="direccion as direccion.formatted_address for direccion in cosnultarGmap($viewValue)" typeahead-loading="loadingLocations" class="form-control" typeahead-on-select="marcador_destino(localidad,index)">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary center-block col-xs-12" ng-disabled="form.$invalid">Submit</button>
                
        <!-- div class="col-xs-12 col-sm-3 col-md-3 mtop-5">
            <label>Fecha Desde</label>
            <span class="input-group">
                <input type="text" class="form-control" datepicker-popup="dd/MM/yyyy" is-open="viaje_fecha_abierto" id="viajeFecha" name="viajeFecha" ng-model="busqueda.fecha">
                <span class="input-group-btn">
                <button type="button" class="btn btn-default"  ng-click="$event.preventDefault();$event.stopPropagation();viaje_fecha_abierto=true" ng-init="viaje_fecha_abierto=false"><i class="glyphicon glyphicon-calendar"></i></button>
                </span>
            </span>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 mtop-5">
            <label>Fecha limite</label>
            <span class="input-group">
                <input type="text" class="form-control" datepicker-popup="dd/MM/yyyy" is-open="viaje_fecha_abierto" id="viajeFecha" name="viajeFecha" ng-model="busqueda.fecha">
                <span class="input-group-btn">
                <button type="button" class="btn btn-default"  ng-click="$event.preventDefault();$event.stopPropagation();viaje_fecha_abierto=true" ng-init="viaje_fecha_abierto=false"><i class="glyphicon glyphicon-calendar"></i></button>
                </span>
            </span>
        </div> -->
        </form>
    <ui-gmap-google-map class="col-xs-12 col-sm-6 col-md-6  mtop-10" center="mapConfig.center" zoom="mapConfig.zoom" bounds="bounds" control="map.control">
        <ui-gmap-marker ng-if="busqueda.origen.idKey" coords="busqueda.origen.coords" idKey="busqueda.origen.idKey"></ui-gmap-marker>
        <ui-gmap-marker ng-if="busqueda.destino.idKey" coords="busqueda.destino.coords" idKey="busqueda.destino.idKey"></ui-gmap-marker>
    </ui-gmap-google-map>
    </div>
    
    
</div>