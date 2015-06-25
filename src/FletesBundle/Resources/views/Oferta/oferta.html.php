<?php $view->extend('FletesBundle::layout.html.php') ?><body>
<?php $view['slots']->start('_assets') ?>
<?php foreach ($view['assetic']->stylesheets(array('@FletesBundle/Resources/public/css/oferta.css')) as $url): ?>
    <link rel="stylesheet" href="<?php echo $view->escape($url) ?>" />
<?php endforeach ?>
<?php $view['slots']->stop() ?>
<div class="container">
    <div class="col-xs-12 col-sm-6 col-md-6 text-center">
    <img class="center-block no-side-paddings oferta-img col-xs-12" src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyBSe465xZBOIqSSWukgEMD5aRIZ62b0bEs&scale=2&size=250x200&maptype=roadmap&markers=color:green%7C<?php echo "{$oferta->origen->lat},{$oferta->origen->lng}"?><?php echo "&markers=color:red%7C{$oferta->destino->lat},{$oferta->destino->lng}"?><?php echo "&markers=color:blue%7C{$oferta->getCoordenadasLocalidadesAceptadas()}"?>"></img>
    </div>

<div class="col-xs-12 col-sm-6 col-md-6">
    <div class="col-xs-12">
        <label class="col-xs-5 col-sm-3 text-right">Proveedor</label><div class="col-xs-7 col-sm-9"><?php echo $oferta->getProveedor()->getUsuario()?></div>
    </div>
    <div class="col-xs-12">
        <label class="col-xs-5 col-sm-3 text-right">Desde</label><div class="col-xs-7 col-sm-9"><?php echo $oferta->origen->localidad?></div>
    </div>
    <div class="col-xs-12">
    <label class="col-xs-5 col-sm-3 text-right">Hasta</label><div class="col-xs-7 col-sm-9"><?php echo $oferta->destino->localidad?></div>
    </div>
    <button class=" col-xs-12 btn btn-success">Contratar</button>
    
</div>
</div>
