<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cuenta
 * @ORM\Entity
 * @ORM\Table(name="persona")
 */
class Persona
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="nombre", type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(min = 3)
     * @Assert\Length( max = 150)
     * @Assert\NotNull()
     */
    private $nombre;

    /**
     * @var string
     * @ORM\Column(name="apellido", type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(min = 3)
     * @Assert\Length( max = 50)
     * @Assert\NotNull()
     */
    private $apellido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="datetime")
     * @Assert\NotNull()
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="calle", type="string")
     */
    private $calle;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string")
     */
    private $numero;

    /**
     * muchos Persona pueden tener una localidad
     * @ORM\ManyToOne(targetEntity="MProd\LicenciaCyPBundle\Entity\Localidad")
     */
    private $localidad;

    /**
     * @var string
     *
     * @ORM\Column(name="localidad_otra_provincia", type="string")
     */
    private $localidadOtraProvincia;



    /**
     * @var string
     *
     * @ORM\Column(name="documento", type="string", length=9, unique=true)
     * @Assert\NotBlank()
     * @Assert\Length(min = 8)
     * @Assert\Length( max = 8)
     * @Assert\NotNull()
     * @Assert\Regex(pattern="/^[F|M|f|m|\d]\d{1,7}$/")
     */
    private $documento;


    /**
     * @var String
     *
     * @ORM\Column(name="sexo", type="string", length=1, nullable=true)
     * @Assert\Length(min = 1)
     *
     */
    private $sexo;

    /**
     * @var String
     *
     * @ORM\Column(name="jubilado", type="string", length=1, nullable=true)
     * @Assert\Length(min = 1)
     *
     */
    private $jubilado;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=15, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false, unique=true)
     * @Assert\NotNull()
     * @Assert\Email()
     */
    private $email;

    /**
     * One Persona has One Provincia.
     * @ORM\OneToOne(targetEntity="MProd\LicenciaCyPBundle\Entity\Provincia")
     * @ORM\JoinColumn(name="provincia_id", referencedColumnName="id")
     */
    private $provincia;

    /**
     * @return mixed
     */

    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia(Provincia $provincia)
    {
        $this->provincia = $provincia;
    }


    function __construct()
    {
       
    }

    /**
     *  Retorna el nombre y el apellido del Usuario
     *
     * @return string
     *
     */
    public function __toString() {
        return $this->id." ".$this->getNombre() . " " . $this->getApellido();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param string $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param DateTime $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    /**
     * @return string
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * @param string $calle
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;
    }

    /**
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param string $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * @param mixed $localidad
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }

    /**
     * @return string
     */
    public function getLocalidadOtraProvincia()
    {
        return $this->localidadOtraProvincia;
    }

    /**
     * @param string $localidadOtraProvincia
     */
    public function setLocalidadOtraProvincia($localidadOtraProvincia)
    {
        $this->localidadOtraProvincia = $localidadOtraProvincia;
    }

    /**
     * @return string
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param string $documento
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    /**
     * @return String
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param String $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return String
     */
    public function getJubilado()
    {
        return $this->jubilado;
    }

    /**
     * @param String $jubilado
     */
    public function setJubilado($jubilado)
    {
        $this->jubilado = $jubilado;
    }

    /**
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param string $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }



}