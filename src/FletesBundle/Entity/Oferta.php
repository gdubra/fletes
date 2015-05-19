<?php
namespace FletesBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="oferta")
*/
class Oferta{
    
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;
    /**
     * @ORM\Embedded(class="FletesBundle\Entity\Localidad", columnPrefix = "origen_")
    */
    private  $origen;
    
    /**
    * @ORM\Embedded(class="FletesBundle\Entity\Localidad", columnPrefix = "destino_")
    */
    private $destino;
    
    /**
    * @ORM\Column(type="text")
    */
    private $localidadesAceptadas;

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
    public function setLocalidadOrigen($localidadOrigen)
    {
        $this->localidadOrigen = $localidadOrigen;

        return $this;
    }

    /**
     * Get localidadOrigen
     *
     * @return string 
     */
    public function getLocalidadOrigen()
    {
        return $this->localidadOrigen;
    }

    /**
     * Set localidadOrigenGID
     *
     * @param string $localidadOrigenGID
     * @return Oferta
     */
    public function setLocalidadOrigenGID($localidadOrigenGID)
    {
        $this->localidadOrigenGID = $localidadOrigenGID;

        return $this;
    }

    /**
     * Get localidadOrigenGID
     *
     * @return string 
     */
    public function getLocalidadOrigenGID()
    {
        return $this->localidadOrigenGID;
    }

    /**
     * Set lngOrigen
     *
     * @param float $lngOrigen
     * @return Oferta
     */
    public function setLngOrigen($lngOrigen)
    {
        $this->lngOrigen = $lngOrigen;

        return $this;
    }

    /**
     * Get lngOrigen
     *
     * @return float 
     */
    public function getLngOrigen()
    {
        return $this->lngOrigen;
    }

    /**
     * Set latOrigen
     *
     * @param float $latOrigen
     * @return Oferta
     */
    public function setLatOrigen($latOrigen)
    {
        $this->latOrigen = $latOrigen;

        return $this;
    }

    /**
     * Get latOrigen
     *
     * @return float 
     */
    public function getLatOrigen()
    {
        return $this->latOrigen;
    }

    /**
     * Set localidadDestino
     *
     * @param string $localidadDestino
     * @return Oferta
     */
    public function setLocalidadDestino($localidadDestino)
    {
        $this->localidadDestino = $localidadDestino;

        return $this;
    }

    /**
     * Get localidadDestino
     *
     * @return string 
     */
    public function getLocalidadDestino()
    {
        return $this->localidadDestino;
    }

    /**
     * Set localidadDestinoGID
     *
     * @param string $localidadDestinoGID
     * @return Oferta
     */
    public function setLocalidadDestinoGID($localidadDestinoGID)
    {
        $this->localidadDestinoGID = $localidadDestinoGID;

        return $this;
    }

    /**
     * Get localidadDestinoGID
     *
     * @return string 
     */
    public function getLocalidadDestinoGID()
    {
        return $this->localidadDestinoGID;
    }

    /**
     * Set lngDestino
     *
     * @param float $lngDestino
     * @return Oferta
     */
    public function setLngDestino($lngDestino)
    {
        $this->lngDestino = $lngDestino;

        return $this;
    }

    /**
     * Get lngDestino
     *
     * @return float 
     */
    public function getLngDestino()
    {
        return $this->lngDestino;
    }

    /**
     * Set latDestino
     *
     * @param float $latDestino
     * @return Oferta
     */
    public function setLatDestino($latDestino)
    {
        $this->latDestino = $latDestino;

        return $this;
    }

    /**
     * Get latDestino
     *
     * @return float 
     */
    public function getLatDestino()
    {
        return $this->latDestino;
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
}
