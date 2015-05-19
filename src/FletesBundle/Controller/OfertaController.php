<?php
namespace FletesBundle\Controller;

use FletesBundle\Entity\Localidad;

use FletesBundle\Entity\Oferta;

use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class OfertaController extends BaseController{
    
    
    //NO REST AJAX
    public function prototipo(){
        $oferta = new Oferta();
        return $this->successAjaxResponse(array('oferta'=>$oferta));
    }
    //NO REST NO AJAX
    /**
     * @Route("/oferta/formulario",name="formulario_oferta")
     * @Method("GET")
     */
    public function formuario(){
        return $this->render('FletesBundle:Oferta:formularioOferta.html.php');
    }
    
    
    /**
    * @Route("/oferta/{id}",name="actualizar_oferta")
    * @Method("PUT")
    *
    */
    public function actualizar(){
        
    }
    
    /**
    * @Route("/oferta",name="crear_oferta")
    * @Method("POST")
    *
    */
    public function crear(Request $request){
        $data = json_decode($request->getContent());
        
        $oferta = new Oferta();//Creo
        $origen = new Localidad();
        $destino = new Localidad();
        
        $origen->setLocalidad($data->destino->localidad);
        $origen->setGid($localidadOrigenGID);
        $origen->setLat($latOrigen);
        $origen->setLng($lngOrigen);
        
        $destino->setLocalidad();
        $destino->setGid($localidadOrigenGID);
        $destino->setLat($latOrigen);
        $destino->setLng($lngOrigen);
        
        $oferta->setOrigen($origen);
        $oferta->setDestino($destino);
        $oferta->setLocalidadesAceptadas(json_encode($data->otrasLocalidades));
    }
    
    /**
    * @Route("/oferta/{id}",name="borrar_oferta")
    * @Method("DELETE")
    *
    */
    public function borrar(){
    
    }
    
    /**
    * @Route("/ofertas",name="listar_oferta")
    * @Method("GET")
    *
    */
    public function listar(){
    
    }
    
    /**
    * @Route("/oferta/{id}",name="obtener_oferta")
    * @Method("GET")
    *
    */
    public function obtener(){
    
    }
    
}