<?php
namespace FletesBundle\Service;

use FletesBundle\Entity\TokenReseteo;

use FletesBundle\Entity\Usuario;

use Doctrine\ORM\EntityManager;

class ServicioUsuario extends ServicioBase{
    
    private $mailer;
    private $encoder;
    
    public function __construct(EntityManager $em,FletesEncoder $encoder, $templating, $mailer){
        $this->em = $em;
        $this->templating = $templating;
        $this->mailer = $mailer;
        $this->encoder = $encoder;
    }
    
    public function crear($usuario){
        $this->em->persist($usuario);
        $this->em->flush();
        $this->enviarMailConfirmacion($usuario);
    }
    
    public function activar($usuario,$token){
        $usuario = $this->repo('Usuario')->findOneByUsuario($usuario);
        if(!$usuario || $usuario->getSalt() != $token){
            throw new \Exception("");
        }
        
        $usuario->setActivo(true);
        $this->em->persist($usuario);
        $this->em->flush();
    }
    
    private function enviarMailConfirmacion(Usuario $usuario){
        $message = \Swift_Message::newInstance()
        ->setSubject("Bienvenido {$usuario->getUsuario()}")
        ->setFrom('send@example.com')
        ->setTo($usuario->getEmail())
        ->setBody($this->templating->render('FletesBundle:Email:mailConfirmacion.html.php',array('usuario' => $usuario)),'text/html');
        
        $this->mailer->send($message);
    }
    
    public function enviarLinkReseteoClave(Usuario $usuario){
        $token = $this->obtenerTokenReseteo($usuario);
        $message = \Swift_Message::newInstance()
        ->setSubject("Resetear Clave {$usuario->getUsuario()}")
        ->setFrom('send@example.com')
        ->setTo($usuario->getEmail())
        ->setBody($this->templating->render('FletesBundle:Email:mailLinkResetearClave.html.php',array('token'=>$token->getToken())),'text/html');
        
        $this->mailer->send($message);
    }
    
    private function obtenerTokenReseteo(Usuario $usuario){
        $token = $this->repo('TokenReseteo')->findOneByUsuarioId($usuario->getId());
        if(!$token){
            $token = new TokenReseteo($usuario->getSalt(),$usuario->getId());
            $this->em->persist($token);
            $this->em->flush();
        }
        return $token;
    }
    
    public function resetear_clave(TokenReseteo $token, $clave){
        $usuario = $this->repo('Usuario')->find($token->getUsuarioId());
        $usuario->setPassword($this->encoder->encodePassword($clave,$usuario->getSalt()));
        $this->em->persist($usuario);
        $this->em->flush();
    }
}