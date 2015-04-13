<?php
namespace FletesBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="viaje")
* @ORM\HasLifecycleCallbacks
*/
class Viaje {
    
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="viajes")
     * @ORM\JoinColumn(name="proveedor_id", referencedColumnName="id")
     **/
    private $proveedor;
    
    /**
    * @ORM\Column(type="float")
    */
    private $latitud;
    
    /**
    * @ORM\Column(type="float")
    */
    private $longitud;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $direccion;
    
    /**
    * @ORM\Column(type="text")
    */
    private $descripcion;
    
    public function __construct()
    {
  
    }
  
    
    


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set latitud
     *
     * @param float $latitud
     * @return Viaje
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return float 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param float $longitud
     * @return Viaje
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return float 
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Viaje
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Viaje
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set proveedor
     *
     * @param \FletesBundle\Entity\Usuario $proveedor
     * @return Viaje
     */
    public function setProveedor(\FletesBundle\Entity\Usuario $proveedor = null)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return \FletesBundle\Entity\Usuario 
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }
}
