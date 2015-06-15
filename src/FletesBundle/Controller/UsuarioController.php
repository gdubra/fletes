<?php
namespace FletesBundle\Controller;

use FletesBundle\Lib\AjaxAlerta;

use FletesBundle\Entity\Usuario;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class UsuarioController extends BaseController{
    
    /**
     * @Route("/usuario",name="crear_usuario")
     * @Method("POST")
     *
     */
    public function crear(Request $request){
        $usuario = new Usuario();
        return $this->procesarFormulario($request, $usuario);
    }
    
    private function procesarFormulario(Request $request,Usuario $usuario){
        $data = json_decode($request->getContent());
        
        if($data->password != $data->password2){
            $this->failAjaxResponse(AjaxAlerta::dangerAlert('Las contraseñas no coinciden'));
        }
        
        $usuario->setNombre($data->nombre);
        $usuario->setApellido($data->apellido);
        $usuario->setEmail($data->email);
        $usuario->setUsuario($data->usuario);
        $usuario->setActivo(false);
        $usuario->setPassword($this->get('fletes_encoder')->encodePassword($data->password,$usuario->getSalt()));
        
        $this->get('usuario_service')->crear($usuario);
        
        return $this->successAjaxResponse();//Exitoso
    }
    
    //Views
    /**
     * @Route("/usuario/formulario",name="registrar")
     * @Method("GET")
     */
    public function formuario(){
        return $this->render('FletesBundle:Usuario:formularioUsuario.html.php');
    }
    
    /**
     * @Route("/usuario/confirmar/{usuario}/{token}",name="confirmar_usuario")
     * @Method("GET")
     */
    public function confirmar_usuario($usuario,$token){
        $confirmado = false;
        try {
            $this->get('usuario_service')->activar($usuario,$token);
            $confirmado = true;
        } catch (\Exception $e) {
            //nada
        }
        
        return $this->render('FletesBundle:Usuario:confirmarUsuario.html.php',array("confirmado"=>$confirmado));
    }
    
    
    /**
     * @Route("usuario/clave/reset",name="formulario_link_resetear_clave")
     * @method("GET")
     */
    public function formularioLinkResetearClave(){
        return $this->render('FletesBundle:Usuario:formularioLinkResetearClave.html.php');
    }
    
    /**
     * @Route("usuario/clave/reset",name="confirmar_link_resetear_clave")
     * @method("POST")
     */
    public function confirmarLinkResetearClave(Request $request){
        $data = json_decode($request->getContent());
        $usuario =  $this->getRepo('Usuario')->findOneByEmail($data->usuario);
        if($usuario){
            $this->get('usuario_service')->enviarLinkReseteoClave($usuario);
            return $this->successAjaxResponse(array('mail_enviado'=>true));
        }else{
            return $this->failAjaxResponse(array(AjaxAlerta::dangerAlert('El mail ingresado no se encuentra registrado.')));
        }
        
    }
    
    /**
     * @Route("usuario/clave/reset/{token}",name="resetear_clave")
     * @method("GET")
     */
    public function formularioReseteo($token){
        $token = $this->getRepo('TokenReseteo')->findOneByToken($token);
        if(!$token){
            return $this->render('FletesBundle:Default:404.html.php');
        }
        return $this->render('FletesBundle:Usuario:formularioResetearClave.html.php',array("token"=>$token->getToken()));
    }
    
    
    
    /**
     * @Route("usuario/confirmar_reseteo",name="confirmar_reseteo")
     * @method("POST")
     */
    public function confirmarReseteo(Request $request){
        $data = json_decode($request->getContent());
        if(!$data->token || !$data->clave || !$data->clave2){
           return $this->failAjaxResponse(array(AjaxAlerta::dangerAlert("Datos Incompletos!. Revise el formulario")));
        }
        
        if($data->clave != $data->clave2){
            return $this->failAjaxResponse(array(AjaxAlerta::dangerAlert("Las claves ingresadas no coinciden.")));
        }
        
        $token = $this->getRepo('TokenReseteo')->findOneByToken($data->token);
        if(!$token){
           return $this->failAjaxResponse(array(AjaxAlerta::dangerAlert("Datos Incorrectos!")));
        }
        
        $this->get('usuario_service')->resetear_clave($token,$data->clave);
        return $this->successAjaxResponse(array("clave_confirmada"=>true));
    }
}