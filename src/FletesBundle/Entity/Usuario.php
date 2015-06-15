<?php
namespace FletesBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity(repositoryClass="FletesBundle\Repository\UsuarioRepository")
* @ORM\Table(name="usuario")
* @ORM\HasLifecycleCallbacks
*/
class Usuario implements UserInterface, \Serializable{
    
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    public $usuario;
    
    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;
    
    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;
    
    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $activo;
    
    /**
     * @ORM\OneToMany(targetEntity="Oferta", mappedBy="proveedor")
     **/
    private $ofertas;
    
    /**
     * @ORM\Column(type="string", length=128)
     */
    public $nombre;
    /**
     * @ORM\Column(type="string", length=128)
     */
    
    public $apellido;
    
    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    public $fotoPerfil;
    
    public function __construct()
    {
        
    }
    
    /**
    * @inheritDoc
    */
    public function getUsuario()
    {
        return $this->usuario;
    }
    
    public function getUsername()
    {
        return $this->usuario;
    }
    
    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return md5($this->usuario);
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
        $this->usuario,
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
        $this->usuario,
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
     * Set usuario
     *
     * @param string $usuario
     * @return Usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

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
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getApellido(){
        return $this->apellido;
    }
    
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    
    public function getFechaNacimiento(){
        return $this->apellido;
    }
    
    public function getFotoPerfil(){
        
    }
}
