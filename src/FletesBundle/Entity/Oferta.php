<?php
namespace FletesBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity(repositoryClass="FletesBundle\Repository\OfertaRepository")
* @ORM\Table(name="oferta")
*/
class Oferta{
    
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    public $id;
    /**
     * @ORM\Embedded(class="FletesBundle\Entity\Localidad", columnPrefix = "origen_")
    */
    public  $origen;
    
    /**
    * @ORM\Embedded(class="FletesBundle\Entity\Localidad", columnPrefix = "destino_")
    */
    public $destino;
    
    /**
    * @ORM\Column(type="text")
    */
    public $localidadesAceptadas;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="ofertas")
     * @ORM\JoinColumn(name="proveedor_id", referencedColumnName="id")
     **/
    public $proveedor;
    
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
     * Set localidadOrigen
     *
     * @param string $localidadOrigen
     * @return Oferta
     */
    public function setOrigen($localidadOrigen)
    {
        $this->origen = $localidadOrigen;

        return $this;
    }

    /**
     * Get localidadOrigen
     *
     * @return string 
     */
    public function getOrigen()
    {
        return $this->origen;
    }


    /**
     * Set localidadDestino
     *
     * @param string $localidadDestino
     * @return Oferta
     */
    public function setDestino($localidadDestino)
    {
        $this->destino = $localidadDestino;

        return $this;
    }

    /**
     * Get localidadDestino
     *
     * @return string 
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set localidadesAceptadas
     *
     * @param string $localidadesAceptadas
     * @return Oferta
     */
    public function setLocalidadesAceptadas($localidadesAceptadas)
    {
        $this->localidadesAceptadas = $localidadesAceptadas;

        return $this;
    }

    /**
     * Get localidadesAceptadas
     *
     * @return string 
     */
    public function getLocalidadesAceptadas()
    {
        return $this->localidadesAceptadas;
    }
    
    public function setProveedor($proveedor){
        $this->proveedor = $proveedor;
    }
}
