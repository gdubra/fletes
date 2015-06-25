<?php $view->extend('FletesBundle::layout.html.php') ?><body>
<div class="container">
<div class="col-xs-10 col-sm-7 col-md-5 center-block">
    
    <div class="panel panel-default">
      <div class="panel-body">
            <h2 class="title">
                Iniciar sesión
            </h2>
            <form action="login_check" method="POST" class="form-horizontal">
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" placeholder="Mail o nombre de usuario " name="_username"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" placeholder="Clave" name="_password"/>
                        <a class="pull-right" href="<?php echo $view['router']->generate('formulario_link_resetear_clave')?>">¿olvidaste tu clave?</a>
                    </div>
                </div>
                    <input class="col-xs-12 btn btn-success" type="submit" value="Iniciar sesión"/>
            </form>
        </div>
        <div class="panel-footer">
            <span class="center-block text-center">Aun no te registraste, <a href="<?php echo $view['router']->generate('registrar') ?>">hazlo ahora!!!</a></span>
        </div>
    </div>
</div>
</div>