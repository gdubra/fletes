<?php
namespace FletesBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class DemandaController extends BaseController{
    
    
    /**
    * @Route("/demanda/{id}",name="actualizar_demanda")
    * @Method("PUT")
    *
    */
    public function actualizar(){
        
    }
    
    /**
    * @Route("/demanda",name="crear_demanda")
    * @Method("POST")
    *
    */
    public function crear(){
    
    }
    
    /**
    * @Route("/demanda/{id}",name="borrar_demanda")
    * @Method("DELETE")
    *
    */
    public function borrar(){
    
    }
    
    /**
    * @Route("/demandas",name="listar_demanda")
    * @Method("GET")
    *
    */
    public function listar(){
    
    }
    
    /**
    * @Route("/demanda/{id}",name="obtener_demanda")
    * @Method("GET")
    *
    */
    public function obtener(){
    
    }
    //NO REST AJAX
    public function prototipo(){
        $demanda = new Demanda();
        return $this->successAjaxResponse(array('demanda'=>$demanda));
    }
    //NO REST NO AJAX
    /**
    * @Route("/demanda/formulario",name="formulario_demanda")
    * @Method("GET")
    */
    public function formuario(){
        return $this->render('FletesBundle:Demanda:formulario.html.php');
    }
    
}