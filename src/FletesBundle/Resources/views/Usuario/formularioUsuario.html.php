<?php $view->extend('FletesBundle::layout.html.php') ?>
<?php $view['slots']->start('_assets') ?>        
        <?php foreach ($view['assetic']->javascripts(array('bundles/fletes/js/formulario-usuario-ctrl.js'),array(),
                   array('output' => 'js/compiled/js.js')) as $url): ?>
            <script src="<?php echo $view->escape($url) ?>"></script>
        <?php endforeach ?>
<?php $view['slots']->stop() ?>  
  
<div class="container" data-ng-controller="FormularioUsuarioCtrl" data-ng-init="registrado=false">
    <div class="col-xs-12 col-sm-8 col-md-8 center-block">
        <div class="panel panel-default" data-ng-show="!registrado">
        <div class="panel-body">
        <h2 class="title">
            Registrate!
        </h2>
        <form role="form " name="form" data-ng-submit="submit()" novalidate>
            <div class="form-group">
                <label for="uNombre">Nombre</label>
                <input type="text" id="uNombre" name="uNombre" data-ng-model="usuario.nombre" placeholder="Nombre" class="form-control" autocomplete="off" required>
                <span data-ng-show="form.uNombre.$dirty &&  form.uNombre.$error.required">Nombre requerido!</span>
            </div>
            
            <div class="form-group">
                <label for="uApellido">Apellido</label>
                <input type="text" data-ng-model="usuario.apellido" name="uApellido" placeholder="Apellido" class="form-control " autocomplete="off" required>
                <span data-ng-show="form.uApellido.$dirty && form.uApellido.$error.required">Apellido requerido!</span>
            </div>
        
            <div class="form-group">
                <label for="uEmail">Email</label>
                <input type="text" data-ng-model="usuario.email" name="uEmail" placeholder="Email" class="form-control " autocomplete="off" required>
                <span data-ng-show="form.uEmail.$dirty && form.uApellido.$error.required">Apellido requerido!</span>
            </div>
            
            <div class="form-group">
                <label for="uUsuario">Nombre de Usuario</label>
                <input type="text" data-ng-model="usuario.usuario" name="uUsuario" placeholder="Nombre de Usuario" class="form-control " autocomplete="off" required>
                <span data-ng-show="form.uUsuario.$dirty && form.uUsuario.$error.required">Apellido requerido!</span>
            </div>
            
            <div class="form-group">
                <label for="uContrasena">Contraseña</label>
                <input type="password" data-ng-model="usuario.password" name="uContrasena" placeholder="Contraseña" class="col-xs-12  form-control " autocomplete="off" required>
                <input type="password" data-ng-model="usuario.password2" name="uContrasena" placeholder="Repite Contraseña" class="col-xs-12  form-control mtop-5" autocomplete="off" required>
                <span data-ng-show="form.uContrasena.$dirty && form.uContrasena.$error.required">Apellido requerido!</span>
            </div>
            
            <button type="button" ng-click="submit()" class="btn btn-primary mtop-10 pull-right" data-ng-disabled="form.$invalid || !form.$dirty" boton-cmp>Publicar</button>
        </form>
        </div>
        <div class="panel-footer">
            <span class="center-block text-center">Ya estas registrastado?, <a href="<?php echo $view['router']->generate('login') ?>">simplemente accede!!!</a></span>
        </div>
        </div>
    </div>
    <div class="panel panel-default text-center" data-ng-show="registrado">
      <div class="panel-body">
        <h1>Gracias por registrarte!!</h1>
        <h4>Activa tu cuenta atravez del link que hemos enviado a tu casilla de correo</h4>
     </div>
     </div>
</div>