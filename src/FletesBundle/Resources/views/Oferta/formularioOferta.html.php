<?php $view->extend('FletesBundle::layout.html.php') ?>
<?php $view['slots']->start('_assets') ?>        
        <?php foreach ($view['assetic']->javascripts(array('bundles/fletes/js/formulario-oferta-ctrl.js'),array(),
                   array('output' => 'js/compiled/js.js')) as $url): ?>
            <script src="<?php echo $view->escape($url) ?>"></script>
        <?php endforeach ?>
<?php $view['slots']->stop() ?>  
  
<div class="container" data-ng-controller="FormularioDemandaCtrl">
    <div class="row">
        <form role="form " name="form" class="col-xs-12 col-sm-6"  data-ng-submit="submit()" novalidate>
            <div class="row no-side-margins form-group">
                <label for="oOrigen">Origen</label>
                <input type="text" id="oOrigen" name="oOrigen" data-ng-model="oferta.origen" data-ng-model-options="{ debounce: 500 }" placeholder="Localidad origien" typeahead="localidad as localidad.formatted_address for localidad in consultar_localidad($viewValue)" typeahead-loading="loadingLocations" class="form-control" typeahead-on-select="marcador_origen()" autocomplete="off" required>
                <span data-ng-show="form.oOrigen.$dirty &&  form.oOrigen.$error.required">Destino Origen requerido!</span>
            </div>
            
            <div class="row no-side-margins form-group">
                <label for="oDestino">Destino</label>
                <input type="text" data-ng-model="oferta.destino" name="oDestino" placeholder="Localidad destino" data-ng-model-options="{ debounce: 500 }" typeahead="localidad as localidad.formatted_address for localidad in consultar_localidad($viewValue)" typeahead-loading="loadingLocations" class="form-control" typeahead-on-select="marcador_destino()" autocomplete="off" required>
                <span data-ng-show="form.oDestino.$dirty && form.oDestino.$error.required">Destino Origen requerido!</span>
            </div>
        
            <div class="row no-side-margins form-group" data-ng-show="oferta.otrasLocalidades.length>=1">
                <label>Otras Localidades</label>
                <div class="row no-side-margins" data-ng-repeat="localidad in oferta.otrasLocalidades track by $index">
                    <div class="col-xs-10 no-left-padding">
                        <input  type="text" data-ng-model="localidad" placeholder="Ingresar localidad" typeahead="localidad as localidad.formatted_address for localidad in consultar_localidad($viewValue)" typeahead-loading="loadingLocations" class="form-control mtop-5" typeahead-on-select="marcador_intermedio(localidad,$index)" autocomplete="off">
                    </div>
                    <div class="col-xs-2 form-group-icon-container"><span class="glyphicon glyphicon-remove-sign" data-ng-click="remover_localidad($index)"></span></div>
                </div>
            </div>
            
            <div data-ng-hide="oferta.otrasLocalidades.length>=1 && !oferta.otrasLocalidades[oferta.otrasLocalidades.length-1].gid" class="row no-side-margins form-group">
                <div class="btn btn-link" data-ng-click="agregar_localidad()">Agregar localidad</div>
            </div>
            
            <div class="row no-side-margins form-group">
                <button type="submit" class="btn btn-primary mtop-10 pull-right" data-ng-disabled="form.$invalid || !form.$dirty">Publicar</button>
            </div>
        </form>
        <ui-gmap-google-map class="col-xs-12 col-sm-6 col-md-6" center="mapConfig.center" zoom="mapConfig.zoom" bounds="bounds" control="map.control" options="mapConfig.options">
            <ui-gmap-marker data-ng-if="oferta.origen.gid" coords="{latitude:oferta.origen.lat,longitude:oferta.origen.lng}" idKey="oferta.origen.gid"></ui-gmap-marker>
            <ui-gmap-marker data-ng-if="oferta.destino.gid" coords="{latitude:oferta.destino.lat,longitude:oferta.destino.lng}" idKey="oferta.destino.gid"></ui-gmap-marker>
            <ui-gmap-marker data-ng-repeat="localidad in oferta.otrasLocalidades" data-ng-if="oferta.otrasLocalidades" models="localidad" coords="{latitude:localidad.lat,longitude: localidad.lng}" idKey="localidad.gid"></ui-gmap-markers>
        </ui-gmap-google-map>
    </div>
</div>


