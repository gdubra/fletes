<?php
namespace FletesBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
* @ORM\Entity(repositoryClass="FletesBundle\Repository\TokenReseteoRepository")
* @ORM\Table(name="token_reseteo")
*/
class TokenReseteo{
    
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    public $id;
    /**
    * @ORM\Column(type="string", length=128)
    */
    public $token;
    /**
    * @ORM\Column(type="integer")
    */
    public $usuarioId;

    public function __construct($token,$usuarioId){
        $this->usuarioId = $usuarioId;
        $this->token = $token;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getToken(){
        return $this->token;
    }
    
    public function getUsuarioId(){
        return $this->usuarioId;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setToken($token){
        $this->token = $token;
    }
    
    public function setUsuarioId($usuarioId){
        $this->usuarioId = $usuarioId;
    }
}
