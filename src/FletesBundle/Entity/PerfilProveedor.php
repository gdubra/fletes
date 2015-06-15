<?php
namespace FletesBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @package FletesBundle\Entity
* @ORM\Embeddable
*/
class PerfilProveedor{
    /**
    * @ORM\Column(type="string", length=128)
    */
    public $nombre;
    /**
     * @ORM\Column(type="string", length=128)
     */
    public $apellido;
    /**
     * @ORM\Column(type="string", length=128)
     */
    public $fotoPerfil;
    /**
     * @ORM\Column(type="float")
     */
    public $lat;
    
    function setLocalidad($localidad){
        $this->localidad = $localidad;
    }
    
    function setGid($gid){
        $this->gid = $gid;
    }
    
    function setLng($lng){
        $this->lng = $lng;
    }
    
    function setLat($lat){
        $this->lat = $lat;
    }
}
