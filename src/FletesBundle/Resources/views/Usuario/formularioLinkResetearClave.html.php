<?php $view->extend('FletesBundle::layout.html.php') ?><body>
<?php $view['slots']->start('_assets') ?>        
        <?php foreach ($view['assetic']->javascripts(array('bundles/fletes/js/link-resetear-clave-ctrl.js'),array(),
                   array('output' => 'js/compiled/link_restear_clave.js')) as $url): ?>
            <script src="<?php echo $view->escape($url) ?>"></script>
        <?php endforeach ?>
<?php $view['slots']->stop() ?>
<div class="container" data-ng-controller="linkRstClaveCtrl" ng-init="mail_enviado=false">
<div class="col-xs-10 col-sm-7 col-md-5 center-block" data-ng-show="!mail_enviado">
    <div class="panel panel-default" ng-show="!mail_enviado">
      <div class="panel-body">
            <h2 class="title">
                ¿Olvidaste tu clave?
            </h2>
            <form method="POST" class="form-horizontal"  name="form" data-ng-submit="submit()">
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" ng-model="usuario" placeholder="Nombre de Usuario o mail" name="_username"/>
                    </div>
                </div>
                <input class="col-xs-12 btn btn-success" type="submit" value="Enviar"/>
            </form>
        </div>
    </div>
</div>
<div class="panel panel-default text-center" data-ng-show="mail_enviado">
    <div class="panel-body">
        <h1>Revisa tu casilla de correo!</h1>
    </div>
</div>
</div>
</body>
