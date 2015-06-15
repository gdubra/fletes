<nav class="navbar navbar-fixed-top">
    <div class="container-fluid no-side-paddings">
        <h1 class="head-logo">
            <a href="<?php echo $view['router']->generate('homepage') ?>">Fletes</a>
        </h1>
        <div class="navbar-header">
            <div aria-controls="navbar" aria-expanded="true" data-target="#navbar" data-toggle="collapse" class="navbar-toggle btn btn-default glyphicon glyphicon-menu-hamburger">
            </div>
            
        </div>
        <div class="collapse navbar-collapse no-side-margins no-side-paddings" id="navbar">
            <ul class="nav navbar-nav col-xs-12 col-sm-10 col-md-10 no-side-margins no-side-margins">
                <?php if($view['security']->isGranted('IS_AUTHENTICATED_FULLY')):?>
                <li><a  href="<?php echo $view['router']->generate('logout') ?>">Salir</a></li>
                <?php else:?>
                <li><a  href="<?php echo $view['router']->generate('registrar') ?>">Registrar</a></li>
                <li><a  href="<?php echo $view['router']->generate('login') ?>">Entrar</a></li>
                <?php endif;?>
            </ul>
        </div>
        <div class="row">
           <?php $view['slots']->output('_navbar_append') ?>
        </div>
        
    </div>
</nav>