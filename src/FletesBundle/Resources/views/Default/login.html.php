<head>
<!-- Bootstrap core CSS -->
    <link href="<?php echo $view['assets']->getUrl('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $view['assets']->getUrl('bundles/fletes/css/cc/layout.css') ?>" rel="stylesheet">

</head>
<body>
<div class="container">
<div class="col-md-8 center-block">
    <div class="row">
        <form action="login_check" method="POST" class="form-horizontal">
            <div class="form-group">
                <label for="_username" class="col-sm-2 control-label">Nombre Usuario</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Nombre de usuario" name="_username"/>
                </div>
            </div>
            <div class="form-group">
                <label for="_password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" placeholder="Password" name="_password"/>
                </div>
                
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input class="btn btn-default" type="submit" value="Login"/>
                </div>
            </div>
        
        </form>
    </div>
</div>
</div>
</body>