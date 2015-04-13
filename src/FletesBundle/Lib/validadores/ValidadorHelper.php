<?php
namespace FletesBundle\Lib\validadores;

class ValidadorHelper{
    
    static function fecha_es_mayor_o_igual($fecha, $fecha_referencia=null){
        $fecha_referencia = !$fecha_referencia? new \DateTime():$fecha_referencia;
        return $fecha>= $fecha_referencia;
    }
}