<?php
namespace FletesBundle\Controller;

use FletesBundle\Lib\AjaxAlerta;

use FletesBundle\Entity\Localidad;

use FletesBundle\Entity\Oferta;

use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class OfertaController extends BaseController{
    
    
    /**
    * @Route("/oferta/{id}",name="actualizar_oferta"),  requirements={"id": "\d+"}
    * @Method("PUT")
    *
    */
    public function actualizar(Request $request, $id){
        $oferta = $this->getRepo('Oferta')->find($id);
        if(!$oferta){
            return $this->failAjaxResponse(AjaxAlerta::dangerAlert('La oferta no existe'));
        }
        return $this->procesarFormulario($request,$oferta);
    }
    
    /**
    * @Route("/oferta",name="crear_oferta")
    * @Method("POST")
    *
    */
    public function crear(Request $request){
        $oferta = new Oferta();
        $oferta->setProveedor($this->getUser());
        return $this->procesarFormulario($request, $oferta);
    }
    
    private function procesarFormulario(Request $request,Oferta $oferta){
        $data = json_decode($request->getContent());
        $origen = new Localidad();
        $destino = new Localidad();
    
        $origen->setLocalidad($data->origen->localidad);
        $origen->setGid($data->origen->gid);
        $origen->setLat($data->origen->lat);
        $origen->setLng($data->origen->lng);
    
        $destino->setLocalidad($data->destino->localidad);
        $destino->setGid($data->destino->gid);
        $destino->setLat($data->destino->lat);
        $destino->setLng($data->destino->lng);
    
        $oferta->setOrigen($origen);
        $oferta->setDestino($destino);
        $oferta->setLocalidadesAceptadas(json_encode($data->otrasLocalidades));
    
        $em = $this->getDoctrine()->getManager();//persisto
        $em->persist($oferta);
        $em->flush();
    
        return $this->successAjaxResponse(null,array(AjaxAlerta::successAlert('Oferta Creada')));//Exitoso
    }
    
    /**
    * @Route("/oferta/{id}",name="borrar_oferta" ,  requirements={"id": "\d+"})
    * @Method("DELETE")
    *
    */
    public function borrar($id){
    
    }
    
    /**
    * @Route("/oferta/listar",name="listar_oferta")
    * @Method("GET")
    *
    */
    public function listar(){
    
    }
    
    /**
    * @Route("/oferta/{id}",name="obtener_oferta" ,  requirements={"id": "\d+"})
    * @Method("GET")
    *
    */
    public function obtener($id){
        $oferta = $this->getRepo('Oferta')->find($id);
        if(!$oferta){
            return $this->failAjaxResponse(AjaxAlerta::dangerAlert('La oferta no existe'));
        }
        return $this->successAjaxResponse(array('oferta'=>$oferta));
    }
    
    /**
     * @Route("/paginacion/inicio",name="inicio_paginacion")
     * @Method("GET")
     *
     */
    public function inicioPaginacion(Request $request){
        try {
            $total = $this->getRepository('Oferta')->total();
            return $this->ajaxSuccessResponse(array('scheduledBrew'=>$scheduledBrew?$scheduledBrew->toJson():null,"scheduledBrewCount"=>$scheduledBrewCount,"pastBrewCount"=>$pastBrewCount),$message);
        } catch (Exception $e) {
            $this->ajaxFailResponse("Couldn't Bootstrap Scheduler");
        }
    }
    
    /**
     * @Route("/paginacion",name="paginacion")
     * @Method("GET")
     */
    public function paginacion(Request $request){
        $nroPagina = $request->query->get('pagina');
        if(!$nroPagina){
            return $this->failAjaxResponse(null,"Missing parameters");
        }
        $pagina = $this->getRepo('Oferta')->pagina($nroPagina);
        return $this->successAjaxResponse($pagina);
    }
    
    /**
     * @Route("/oferta/b",name="buscar_oferta")
     * @Method("POST")
     */
    public function busqueda(Request $request){
        $data = json_decode($request->getContent());
        
        $resultados = $this->getRepo('Oferta')->busqueda($data->filtro);
        $itemsTotal = $this->getRepo('Oferta')->cantidadResultados($data->filtro);
        return $this->successAjaxResponse(array('listado'=>$resultados,'total'=>$itemsTotal));
    }
    
    //NO REST AJAX
    public function prototipo(){
        $oferta = new Oferta();
        return $this->successAjaxResponse(array('oferta'=>$oferta));
    }
    
    //Views
    /**
     * @Route("/oferta/formulario",name="formulario_oferta")
     * @Method("GET")
     */
    public function formuario(){
        return $this->render('FletesBundle:Oferta:formularioOferta.html.php');
    }
    
    /**
     * @Route("/ofertas",name="listado_ofertas")
     * @Method("GET")
     */
    public function listado(){
        return $this->render('FletesBundle:Oferta:listadoOferta.html.php');
    }
}