<?php
namespace FletesBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller{
    
    protected function getRepo($entity){
        return $this->getDoctrine()->getRepository($entity);
    } 
    /**
     * 
     * @param unknown_type $data
     * @param unknown_type $messages
     */
    protected function successAjaxResponse($data=null,$alertas=null){
        return new Response(json_encode(array(
                                        'success' => true,
                                        'alertas' => $alertas,
                                        'data' => $data
        ), JSON_NUMERIC_CHECK));
    }
    
    public function failAjaxResponse($alertas,$errores=null){
        return new Response(json_encode(array(
                                            'success' => false,
                                            'alertas' => $alertas,
                                            'errores' => $errores
        ), JSON_NUMERIC_CHECK));
    }
}