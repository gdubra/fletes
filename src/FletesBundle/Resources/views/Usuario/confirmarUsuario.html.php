<?php $view->extend('FletesBundle::layout.html.php') ?>
<div class="panel panel-default text-center">
      <div class="panel-body">
<?php if($confirmado):?>
    <h1>Tu cuenta ha sido activada!</h1>
    <h2>Ingresa al sitio <a href="<?php echo $view['router']->generate('login') ?>">aqui</a></h2>
<?php else:?>
    <h1 class="error">Accion invalida!</h1>
<?php endif;?>
</div>
</div>
