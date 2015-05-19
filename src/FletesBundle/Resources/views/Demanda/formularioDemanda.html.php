<?php $view->extend('FletesBundle::layout.html.php') ?>
<div class="row">
    <form role="form " class="form-horizontal" name="form" ng-controller="FormularioDemandaCtrl" ng-submit="submit()" novalidate>
    
        <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-2" for="dOrigen">Origen</label>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <input type="text" id="dOrigen" name="dOrigen" ng-model="demanda.origen" placeholder="Localidad de salida" typeahead="localidad as localidad.formatted_address for localidad in cosnultarGmap($viewValue)" typeahead-loading="loadingLocations" class="form-control" typeahead-on-select="marcador_origen()">  
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-2" for="dDestino">Destino</label>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <input type="text" ng-model="demanda.destino" placeholder="Localidad de destino" typeahead="localidad as localidad.formatted_address for localidad in cosnultarGmap($viewValue)" typeahead-loading="loadingLocations" class="form-control" typeahead-on-select="marcador_destino()">
            </div>
        </div>
        
        <div class="form-group" validar>
            <label for="paciente_apeelido" class="col-sm-2">Apellido</label>
            <div class="col-sm-7 col-md-7">
                <input type="text" class="form-control" id="paciente_apellido" name="pApellido" ng-model="paciente.apellido" placeholder="Apellido del Paciente" required>
                <p role="alert" class="help-block error" ng-if="form.pApellido.$error.required">Requerido</p>
                <p class="error" ng-repeat="error in form.errores.paciente.appelido">{{error}}</p>
            </div>
        </div>
        <div class="form-group" validar>
            <label for="paciente_nacimento" class="col-sm-2">Fecha de Nacimiento</label>
            <div class="col-sm-3 col-md-3">
                <span class="input-group">
                <input type="text" class="form-control" datepicker-popup="dd/MM/yyyy" is-open="calendario_nacimiento" id="paciente_nacimento" name="pNacimiento" ng-model="paciente.nacimiento" required>
                <span class="input-group-btn">
                <button type="button" class="btn btn-default"  ng-click="$event.preventDefault();$event.stopPropagation();calendario_nacimiento=true" ng-init="calendario_nacimiento=false"><i class="glyphicon glyphicon-calendar"></i></button>
                </span>
                </span>
                <span role="alert" class="help-block error" ng-if="form.pNacimiento.$error.required">Requerido</span>
                <span class="error" ng-repeat="error in form.errores.paciente.nacimiento">{{error}}</span>
            </div>
        </div>
        <div class="form-group" validar>
            <label for="paciente_email" class="col-sm-2">Sexo</label>
            <div class="col-sm-3 col-md-3" ng-init="sexos =[{valor:'1',etiqueta:'Hombre'},{valor:'0',etiqueta:'Mujer'}] ">
                <label class="radio-inline" ng-repeat="opcion in sexos">
                    <input type="radio"  name="pSexo" ng-model="paciente.sexo" ng-value="opcion.valor" required/> {{opcion.etiqueta}}
                </label>
                <p role="alert" class="help-block error" ng-if="form.pSexo.$error.required">Requerido</p>
                <p class="error" ng-repeat="error in form.errores.paciente.sexo">{{error}}</p>
            </div>
        </div>
        <div class="form-group">
            <label for="paciente_email" class="col-sm-2">Email</label>
            <div class="col-sm-7 col-md-7">
                <input type="text" class="form-control" id="paciente_email" ng-model="paciente.email" >
                <p class="error" ng-repeat="error in form.errores.paciente.paciente.email">{{error}}</p>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" ng-disabled="form.$invalid">Submit</button>
    </form>
</div>

