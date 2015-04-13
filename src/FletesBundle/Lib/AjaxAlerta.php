<?php

namespace FletesBundle\Lib;

class AjaxAlerta{
    
    //warning,danger,success 
    public $tipo;
    public $mensaje;
    
    public function __construct($tipo, $mensaje){
        $this->tipo = $tipo;
        $this->mensaje= $mensaje;
    }
    
    public static function successAlert($mensaje){
        return new AjaxAlerta('success',$mensaje);
    }
    
    public static function warningAlert($mensaje){
        return new AjaxAlerta('warning',$mensaje);
    }
    
    public static function dangerAlert($mensaje){
        return new AjaxAlerta('danger',$mensaje);
    }
}