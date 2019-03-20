<?php

namespace MProd\LicenciaCyPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({ "tecnico" = "Tecnico", "administrador" = "Administrador"})
 * @UniqueEntity("email")
 */

abstract class Usuario implements AdvancedUserInterface, \Serializable {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="nombre", type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(min = 3)
     * @Assert\Length( max = 150)
     * @Assert\NotNull()
     */
    protected $nombre;

    /**
     * @var string
     * @ORM\Column(name="apellido", type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(min = 3)
     * @Assert\Length( max = 50)
     * @Assert\NotNull()
     */
    protected $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=9, unique=true)
     * @Assert\NotBlank()
     * @Assert\Length(min = 8)
     * @Assert\Length( max = 8)
     * @Assert\NotNull()
     * @Assert\Regex(pattern="/^[F|M|f|m|\d]\d{1,7}$/")
     */
    protected $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false, unique=true)
     * @Assert\NotNull()
     * @Assert\Email()
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=50, nullable=true)
     */
    protected $telefono;


    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", columnDefinition="ENUM('ROLE_ADMIN', 'ROLE_TECNICO', 'ROLE_SUPER_ADMIN')", length=50)
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"ROLE_ADMIN", "ROLE_TECNICO", "ROLE_SUPER_ADMIN"})
     */
    protected $role;

    /**
     *
     * @var  string
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    protected $password;

    /**
     * Todavia no va a ser especificado
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean")
     *
     */
    protected $isActive;

    /**
     * @var string
     * @ORM\Column(name="salt", type="string",nullable=true)
     *
     */
    protected $salt;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Usuario
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set dni
     *
     * @param string $dni
     * @return Persona
     */
    public function setDni($dni) {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni() {
        return $this->dni;
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
     * Set telefonoFijo
     *
     * @param string $telefono
     * @return Usuario
     */
    public function setTelefono($telefono) {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefonoFijo
     *
     * @return string
     */
    public function getTelefono() {
        return $this->telefono;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Usuario
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
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
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Usuario
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }
    /* ===================================Serialización ===================== */

    /** @see \Serializable::serialize() */
    public function serialize() {
        return serialize(array(
            $this->id,
            $this->email,
            $this->password,
            $this->isActive
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized) {
        list (
            $this->id,
            $this->email,
            $this->password,
            $this->isActive
            ) = unserialize($serialized);
    }

    /* ===================================Issers ===================== */

    public function isAccountNonExpired() {
        return true;
    }

    public function isAccountNonLocked() {
        return true;
    }

    public function isCredentialsNonExpired() {
        return true;
    }

    public function isEnabled() {
        return $this->isActive;
    }

    /* ===================================Método to String ===================== */

    /**
     *  Retorna el nombre y el apellido del Usuario
     *
     * @return string
     *
     */
    public function __toString() {
        return $this->id." ".$this->getNombre() . " " . $this->getApellido();
    }

    /* ===================================Métodos ===================== */

    //Para la gestión de login y seguridad
    public function eraseCredentials() {

    }

    /**
     *
     * @return Role[] The user roles
     */
    public function getRoles() {
        return array($this->role);
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUsername() {
        return $this->getEmail();
    }

    public function __construct() {
        $this->setRole("ROLE_PERSONA");
        //Esto no se ejecuta, no se porque
        //$this->setFechaAlta();
        $this->isActive = true;
    }
}
