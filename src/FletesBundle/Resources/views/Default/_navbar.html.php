<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="true" data-target="#navbar" data-toggle="collapse" class="navbar-toggle" type="button" >
                <span class =" btn btn-default glyphicon glyphicon-menu-hamburger"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li><a  href="<?php echo $view['router']->generate('homepage') ?>" class="glyphicon glyphicon-home"></a></li>
                <li><a  href="<?php echo $view['router']->generate('logout') ?>" class="glyphicon glyphicon-log-out"></a></li>
            </ul>
        </div>
        
    </div>
</nav>