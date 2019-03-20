<?php

namespace MProd\LicenciaCyPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\PrePersist;

/**
 * Licencia
 *
 * @ORM\Table(name="licencia")
 * @ORM\Entity
 * @Entity @HasLifecycleCallbacks 
 */
class Licencia
{
     /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /*============================Variables ===============================*/

    /**
     * @var integer
     *
     * @ORM\Column(name="anio", type="integer", nullable=false)
     * @Assert\Range(
     *              min = 2018
     * )
     */
    private $anio;

    /**
     * @var integer
     *
     * @ORM\Column(name="licencia", type="integer", nullable=false)
     * @Assert\Range(
     *              min = 0
     * )
     */
    private $licencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emitida", type="datetime")
     * @Assert\NotNull()
     */
    private $fechaEmitida;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_vencimiento", type="datetime")
     * @Assert\NotNull()
     */
    private $fechaVencimiento;


    /**
     *@var string
     *
     *@ORM\Column(name="comprobante", type="string")
     */
    private $comprobante;

    /**
     * @var \MProd\LicenciaCyPBundle\Entity\TipoLicencia
     * 
     * Varias licencias se pueden asociar a un mismo tipo de licencia
     * @ORM\ManyToOne(targetEntity="MProd\LicenciaCyPBundle\Entity\TipoLicencia")
     */
    private $tipoLicencia;

    /**
     * @var \MProd\LicenciaCyPBundle\Entity\Persona
     *
     * @ORM\ManyToOne(targetEntity="MProd\LicenciaCyPBundle\Entity\Persona", inversedBy="licencias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="licencia_id", referencedColumnName="id")
     * })
     */
    private $persona;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * @param int $anio
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;
    }

    /**
     * @return int
     */
    public function getLicencia()
    {
        return $this->licencia;
    }

    /**
     * @param int $licencia
     */
    public function setLicencia($licencia)
    {
        $this->licencia = $licencia;
    }

    /**
     * @return \DateTime
     */
    public function getFechaEmitida()
    {
        return $this->fechaEmitida;
    }

    /**
     * @param \DateTime $fechaEmitida
     */
    public function setFechaEmitida($fechaEmitida)
    {
        $this->fechaEmitida = $fechaEmitida;
    }

    /**
     * @return \DateTime
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * @param \DateTime $fechaVencimiento
     */
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;
    }

    /**
     * @return string
     */
    public function getComprobante()
    {
        return $this->comprobante;
    }

    /**
     * @param string $comprobante
     */
    public function setComprobante($comprobante)
    {
        $this->comprobante = $comprobante;
    }

    /**
     * @return mixed
     */
    public function getTipoLicencia()
    {
        return $this->tipoLicencia;
    }

    /**
     * @param mixed $tipoLicencia
     */
    public function setTipoLicencia(TipoLicencia $tipoLicencia)
    {
        $this->tipoLicencia = $tipoLicencia;
    }

    /**
     * @return mixed
     */
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * @param mixed $persona
     */
    public function setPersona(Persona $persona)
    {
        $this->persona = $persona;
    }

    /*============================Setter y getters ===============================*/

    public function __toString()
    {
        return $this->getLicencia(). ' ';
    }

    /** @PrePersist */
    public function onPrePersist()
    {
        $this->fechaEmitida = new \DateTime();
    }



}
