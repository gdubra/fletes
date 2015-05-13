<?php
namespace FletesBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
* @ORM\Entity
* @ORM\Table(name="demanda")
*/
class Demanda{
    
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;
    /**
    * @ORM\Column(type="string", length=128)
    */
    private $localidadOrigen;
    /**
    * @ORM\Column(type="string", length=128)
    */
    private $localidadOrigenGID;
    /**
    * @ORM\Column(type="float")
    */
    private $lngOrigen;
    /**
     * @ORM\Column(type="float")
     */
    private $latOrigen;
    
    /**
    * @ORM\Column(type="string", length=128)
    */
    private $localidadDestino;
    /**
     * @ORM\Column(type="string", length=128)
     */
    private $localidadDestinoGID;
    /**
     * @ORM\Column(type="float")
     */
    private $lngDestino;
    /**
     * @ORM\Column(type="float")
     */
    private $latDestino;
    
    /**
    * @ORM\Column(type="text")
    */
    private $descripcion;

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
     * @return Demanda
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
     * @return Demanda
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
     * @return Demanda
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
     * @return Demanda
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
     * @return Demanda
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
     * @return Demanda
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
     * @return Demanda
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
     * @return Demanda
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Demanda
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
}
