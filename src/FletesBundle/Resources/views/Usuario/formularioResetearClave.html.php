<?php $view->extend('FletesBundle::layout.html.php') ?><body>
<?php $view['slots']->start('_assets') ?>        
        <?php foreach ($view['assetic']->javascripts(array('@FletesBundle/Resources/public/js/formulario-resetear-clave-ctrl.js'),array(),
                   array('output' => 'js/compiled/formulario_restear_clave.js')) as $url): ?>
            <script src="<?php echo $view->escape($url) ?>"></script>
        <?php endforeach ?>
<?php $view['slots']->stop() ?>
<div class="container" data-ng-controller="RstClaveCtrl" data-ng-init="token='<?php echo $token?>'">
<div class="col-xs-10 col-sm-7 col-md-5 center-block">
    <div class="panel panel-default" ng-show="!clave_confirmada">
      <div class="panel-body">
            <h2 class="title">
                Cambia tu clave!!
            </h2>
            <form method="POST" class="form-horizontal"  name="form" data-ng-submit="submit()">
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" ng-model="clave" placeholder="Nueva clave" />
                    </div>
                </div>
                <div class="form-group">
                     <div class="col-xs-12">
                        <input class="form-control" type="password" ng-model="clave2" placeholder="Repite la clave" />
                    </div>
                </div>
                <input class="col-xs-12 btn btn-success" type="submit" value="Guardar"/>
            </form>
        </div>
    </div>
</div>
<div class="panel panel-default text-center" data-ng-init="clave_confirmada=false" data-ng-show="clave_confirmada">
      <div class="panel-body">
        <h1>Cambio de clave confirmado!</h1>
        <h2>Ingresa al sitio con tu nueva clave, <a href="<?php echo $view['router']->generate('login') ?>">aqui</a></h2>
    </div>
</div>
</div>
</body>
