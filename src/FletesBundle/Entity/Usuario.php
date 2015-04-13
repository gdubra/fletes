<?php
namespace FletesBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="usuario")
* @ORM\HasLifecycleCallbacks
*/
class Usuario implements UserInterface, \Serializable{
    
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    public $id;
    
    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    public $username;
    
    /**
     * @ORM\Column(type="string", length=64)
     */
    public $password;
    
    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    public $email;
    
    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    public $activo;
    
    /**
    * @ORM\OneToMany(targetEntity="Viaje", mappedBy="usuario")
    **/
    public $viajesContratados;
    
    /**
    * @ORM\OneToMany(targetEntity="Viaje", mappedBy="proveedor")
    **/
    public $viajesOfrecidos;
    
    public function __construct()
    {
        $this->activo = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid(null, true));
    }
    
/**
    * @inheritDoc
    */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return md5($this->username);
    }
    
    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }
    
    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }
    
    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
        $this->id,
        $this->username,
        $this->password,
        // see section on salt below
        // $this->salt,
        ));
    }
    
    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
        $this->id,
        $this->username,
        $this->password,
        // see section on salt below
        // $this->salt
        ) = unserialize($serialized);
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
     * Set username
     *
     * @param string $username
     * @return Usuario
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Usuario
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Add viajesContratados
     *
     * @param \FletesBundle\Entity\Viaje $viajesContratados
     * @return Usuario
     */
    public function addViajesContratado(\FletesBundle\Entity\Viaje $viajesContratados)
    {
        $this->viajesContratados[] = $viajesContratados;

        return $this;
    }

    /**
     * Remove viajesContratados
     *
     * @param \FletesBundle\Entity\Viaje $viajesContratados
     */
    public function removeViajesContratado(\FletesBundle\Entity\Viaje $viajesContratados)
    {
        $this->viajesContratados->removeElement($viajesContratados);
    }

    /**
     * Get viajesContratados
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getViajesContratados()
    {
        return $this->viajesContratados;
    }

    /**
     * Add viajesOfrecidos
     *
     * @param \FletesBundle\Entity\Viaje $viajesOfrecidos
     * @return Usuario
     */
    public function addViajesOfrecido(\FletesBundle\Entity\Viaje $viajesOfrecidos)
    {
        $this->viajesOfrecidos[] = $viajesOfrecidos;

        return $this;
    }

    /**
     * Remove viajesOfrecidos
     *
     * @param \FletesBundle\Entity\Viaje $viajesOfrecidos
     */
    public function removeViajesOfrecido(\FletesBundle\Entity\Viaje $viajesOfrecidos)
    {
        $this->viajesOfrecidos->removeElement($viajesOfrecidos);
    }

    /**
     * Get viajesOfrecidos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getViajesOfrecidos()
    {
        return $this->viajesOfrecidos;
    }
}
