<?php
namespace FletesBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @package FletesBundle\Entity
* @ORM\Embeddable
*/
class Localidad{
    /**
    * @ORM\Column(type="string", length=128)
    */
    public $localidad;
    /**
     * @ORM\Column(type="string", length=128)
     */
    public $gid;
    /**
     * @ORM\Column(type="float")
     */
    public $lng;
    /**
     * @ORM\Column(type="float")
     */
    public $lat;
    
    function __construct(){
        return parent::construct();
    }
    
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
