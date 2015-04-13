<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php $view['slots']->output('title', 'Fletes') ?></title>
        <?php foreach ($view['assetic']->stylesheets(array('bootstrap/css/*','bundles/fletes/css/cc/*')) as $url): ?>
            <link rel="stylesheet" href="<?php echo $view->escape($url) ?>" />
        <?php endforeach ?>  
        <?php foreach ($view['assetic']->javascripts(array('bundles/fletes/js/thirdparty/angular.min.js','bundles/fletes/js/thirdparty/lodash.min.js','bundles/fletes/js/thirdparty/*','bootstrap/js/*','bundles/fletes/js/cc/fletes-angular.js','bundles/fletes/js/cc/fletes-fn.js','bundles/fletes/js/cc/fletes-ui.js'),array(),
                array('output' => 'js/compiled/js.js')) as $url): ?>
                <script src="<?php echo $view->escape($url) ?>"></script>
        <?php endforeach ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSe465xZBOIqSSWukgEMD5aRIZ62b0bEs&sensor=FALSE"
  type="text/javascript"></script>
        <script type="text/javascript">var ajax_urls = <?php echo json_encode($view['ajax_url_manager']->get_ajax_urls(), JSON_NUMERIC_CHECK); ?>;</script>
        <?php $view['slots']->output('_assets') ?>
    </head>
    <body data-role="document" class="container">
      	<?php echo $view->render('FletesBundle:Default:_navbar.html.php') ?>
        <div  data-ng-app="fletes">
            <div  data-ng-controller="AlertasCtrl">
                <alert ng-repeat="alerta in alertas" class="alerta-global" type="alerta.tipo" close="alertas.splice($index, 1)">
                    <span data-ng-if="alerta.tipo=='danger'" class="glyphicon glyphicon-exclamation-sign" data-aria-hidden="true"></span>
                    <span data-ng-if="alerta.tipo=='warning'" class="glyphicon glyphicon-warning-sign" data-aria-hidden="true"></span>
                    <span data-ng-if="alerta.tipo=='success'" class="glyphicon glyphicon-ok" data-aria-hidden="true"></span>
                    {{alerta.mensaje}}
                </alert>
            </div>
            <?php $view['slots']->output('_content') ?>
        </div>
        <?php echo $view->render('FletesBundle:Default:_footer.html.php') ?>
    </body>
</html>